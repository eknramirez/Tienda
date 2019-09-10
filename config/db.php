<?php
class Database{ // coneccion a la base de datos.//
    public static function connect ( ){
        $db = new mysqli('localhost', 'root',' ','tienda_online');
        $db->query("SET NAMES 'utf' ");
        return $db;
    }
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

