<h1>Registrarse</h1> <!--Opcion de registrarse etiqueta para titulo-->

<?php if(isset($_SESSION['register']) &&  $_SESSION['register']=='complete'): ?> 
        <strong class="alert_green">Registro Completado con Exito</strong>
<?php elseif(isset($_SESSION['register'])  &&  $_SESSION['register']=='failed'): ?>
<strong class=""alert_red>Registro Fallido, Introduce Bien los Datos Solicitados</strong>
<?php endif; ?>

<?php Utils::deleteSession('register'); ?>

<form action="<?=base_url?>usuario/save" method="POST"> <!--metodo para llamar *-->
    
<!-- Etiquetas para la creacion de un formulari0 para el cliente.-->
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre"required="" />

    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos"required="" />

    <label for="email">Email</label>
    <input type="text" name="email" required=""/>

    <label for="Correo">Contraseña</label>
    <input type="password" name="password" required/>
     <input type="submit" value="Registrarse" />
</form>


