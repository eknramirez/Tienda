/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Usuario
 * Created: 29/08/2019

 */

CREATE DATABASE tienda_online;
USE tienda_online;

CREATE TABLE usuarios(
id                      int(255) auto_increment not null,
nombre             varchar(100) not null,
apellido            varchar(100) ,
email                varchar(255) not null,
password          varchar(255) not null,
rol                    varchar(20),
imagen             varchar(255),
CONSTRAINT pk_usuarios PRIMARY KEY (id),
CONSTRAINT uq_email UNIQUE(email
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(NULL,'admin','admin','admin@admin,com','contraseña','admin',NULL);

CREATE TABLE  Categorias(
id                      int(255) auto_increment not null,
nombre            varchar(100) not null,
a
CONSTRAINT pk_Categorias PRIMARY KEY (id),
)ENGINE=InnoDb;

INSERT INTO Categorias VALUES (NULL,'accion');
INSERT INTO Categorias VALUES (NULL,'aventura');
INSERT INTO Categorias VALUES (NULL,'battle royale');
INSERT INTO Categorias VALUES (NULL,'combate');
INSERT INTO Categorias VALUES (NULL,'Shooter');


CREATE TABLE productos(
id                     int(255) auto_increment not null,
categoria_id     int(255) not null,
descripcion      text,
precio              float(100,2) not null,
stock               int(255) not null,
oferta              varchar(2),
fecha               date not null,
imagen            varchar(255),
CONSTRAINT pk_Categorias PRIMARY KEY (id),
CONSTRAINT fk_producto_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;


CREATE TABLE pedidos(
id                      int(255) auto_increment not null,
usuario_id         int(255) not null,
ciudad               varchar(255) not null,
barrio                varchar(255) not null,
direccion           varchar(255) not null,
telefono            int(20) not null,
coste                 float(200,2),
estado               varchar(255) not null,
fecha                date not null,
hora                  time,
CONSTRAINT pk_pedidos PRIMARY KEY (id),
CONSTRAINT fk_pedidos_usuario FOREIGN KEY (usuario_id) REFERENCES Usuarios(id)
)ENGINE=InnoDb;

CREATE TABLE  Lineas_Pedidos(
id                            int(255) auto_increment not null,
pedido_id               int(255) not null,
producto_id           int(255) not null,
CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_lineas_pedidos FOREIGN KEY (pedido_id) REFERENCES Pedidos(id)
CONSTRAINT fk_lineas_producto FOREIGN KEY (producto_id) REFERENCES Productos(id)
)ENGINE=InnoDb;
