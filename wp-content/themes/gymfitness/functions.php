<?php

/* widgets setup */
require get_template_directory() . '/includes/widgets.php';
require get_template_directory() . '/includes/queries.php';

/* theme setup */
function gymfitness_setup()
{
    //Imagenes destacadas
    add_theme_support('post-thumbnails');

    //Titulos para SEO
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'gymfitness_setup');


/* menus */
function gymfitness_menus()
{
    register_nav_menus(array(
        'menu-principal' => __('Menu Principal', 'gymfitness')
    ));
}

add_action('init', 'gymfitness_menus');

/* css & js */
function gymfitness_scripts_styles()
{
    /* css */
    wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '8.0.1');
    if (is_page('galeria')) {
        wp_enqueue_style('lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.4');
    }
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.1.5');
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), '1.0.0');

    /* js */
    wp_enqueue_script('lightboxjs', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.4', true);
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.1.5', true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('swiper-js'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');

// Zona de widgets
function gymfitness_widgets()
{
    register_sidebar(
        array(
            'name' => 'sidebar 1',
            'id' => 'sidebar_1',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="text-center text-primary">',
            'after-title' => '</h3>'
        )
    );
}
add_action('widgets_init', 'gymfitness_widgets');

// Crear shortcode
function gymfitness_ubicacion_shortcode()
{
?>

    <div class="mapa">
        <?php
        the_field('ubicacion');
        ?>
    </div>
<?php
}
add_shortcode('gymfitness_ubicacion', 'gymfitness_ubicacion_shortcode');

/* Imagenes dinamicas */
function gymfitness_her_image()
{
    /* Obntiene ID de pagina principal, mediante el acceso a configuracion */
    $front_id = get_option('page_on_front');

    /* Obtiene imagen mediante ACF */
    $id_img = get_field('hero_imagen', $front_id);
    /* Obtiene ruta de imagen */
    $src = wp_get_attachment_image_src($id_img, 'fill')[0];
    /* Crea css */
    wp_register_style('custom', false);
    wp_enqueue_style('custom');
    $imagen_header_css = "
    body.home .header {
    background-image: linear-gradient( rgb(0 0 0 / .75), rgb(0 0 0 / .75)), url($src);   
    }
    ";
    /* Inyecta css */
    wp_add_inline_style('custom', $imagen_header_css);
}
add_action('init', 'gymfitness_her_image');
