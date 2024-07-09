<footer class="footer contenedor">

    <hr />

    <div class="contenido-footer">
        <!-- menu -->
        <?php
        $args = array(
            'theme_location' => 'menu-principal',
            'container' => 'nav',
            'container_class' => 'menu-principal nav'
        );
        wp_nav_menu($args);
        ?>

        <p class="copyright">Todos los derechos reservados. <?php echo get_bloginfo('name') ?> <?php echo date('Y') ?></p>
    </div>
</footer>

<?php 
    wp_footer();
?>

</body>
</html>