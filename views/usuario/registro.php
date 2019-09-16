<h1>Registrarse</h1> <!--Opcion de registrarse etiqueta para titulo-->
<form action=<?=base_url?>usuario/save method="POST"> <!--metodo para llamar *-->
<!-- Etiquetas para la creacion de un formulari0 para el cliente.-->
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required/>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" required/>

    <label for="email">Email</label>
    <input type="text" name="email" required/>

    <label for="Correo">Contraseña</label>
    <input type="password" name="correo" required/>
     <input type="submit" value="Registrarse" />
</form>


