<!-- BARRA LATERAL -->
<aside id="Lateral"> <!-- Permite hacer una barra lateral en la pagina web-->
    <div id="Login" class="block_aside">

        <?php if(!isset($_SESSION['identity'])): ?>
        <h3> Ingresar a la Web </h3>
        <form action="<?= base_url ?>usuario/login" method="post">
            <label for="Email">Email</label>
            <input for="Email" name="Email" />
            <label for="password">Contraseña</label>
            <input type="password" name="password" />
            <input type="submit" value="Enviar" /><!-- Permite dar la orden de enviar la informacion de los formularios.-->
        </form>
        <?php else: ?>
        <h3><?= $_SESSION['identity']->nombre?>.<?= $_SESSION['identity']->apellido?></h3>
        <?php endif; ?>
        <ul>
            <li>  <a href="#">Mis Pedidos </a>    </li>
            <li>  <a href="#">Gestionar Pedidos </a> </li>
            <li>  <a href="#">Gestor de Categorias </a></li>
            <li> <a href="#">Novedades </a> </li>
        </ul>

    </div>

</aside>

<!-- CONTENIDO CENTRAL -->

<div id="Central">
