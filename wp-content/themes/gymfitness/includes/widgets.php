<?php

if (!defined('ABSPATH')) die();

class GymFitness_Clases_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'gymfitness_widget',
            esc_html__('GymFitness Clases', 'gymfitness'),
            array('description' => esc_html__('Agrega las Clases como Widget', 'gymfitness'),)
        );
    }

    /* 
    WIDGET ES LO QUE SE PRESENTA EN PANTALLA.
    */
    public function widget($args, $instance)
    {
?>

        <ul class="clases-sidebar">
            <?php
            $args = array(
                'post_type' => 'gymfitness_clases',
                'posts_per_page' => $instance['cantidad']
            );
            $clases = new WP_Query($args);
            while ($clases->have_posts()) {
                $clases->the_post();
            ?>
                <li>
                    <div class="imagen">
                        <?php the_post_thumbnail('thumbnail') ?>
                    </div>
                    <div class="contenido-clase">
                        <a href="<?php the_permalink(); ?>">
                            <h3><?php the_title(); ?></h3>
                        </a>

                        <?php
                        $hora_inicio = get_field('hora_inicio');
                        $hora_fin = get_field('hora_fin');
                        ?>

                        <p><?php the_field('dias_clase');
                            echo " - " . $hora_inicio . " a " . $hora_fin; ?></p>
                    </div>
                </li>
            <?php
            }
            wp_reset_postdata();
            ?>
        </ul>

    <?php
    }


    /* 
    Para añadir un formulario al widget y dar opciones al usuario
    FORM SE UTILIZA PARA PRESENTAR EL FORMULARIO AL USUARIO
    */
    public function form($instance)
    {
        /* Creamos la instancia cantidad $instance['cantidad'] */
        $cantidad = !empty($instance['cantidad']) ? $instance['cantidad'] : esc_html('');
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cantidad')) ?>">
                <?php esc_attr_e('Cuantes clases deseas Mostrar?') ?>
            </label>

            <input class='widefat' id="<?php echo esc_attr($this->get_field_id('cantidad')) ?>" name="<?php echo esc_attr($this->get_field_name('cantidad')) ?>" type="number" value='<?php echo esc_attr($cantidad) ?>' />
        </p>

<?php
    }


    /* 
    Para Actualizar el valor
    UPDATE SE UTILIZA PARA ACTUALIZAR LOS VALORES
     */
    public function update($new_instance, $old_instance)
    {
        /* Para actualizar el valor de la $instance['cantidad'] previamente creada */
        $instance = array();

        $instance['cantidad'] = (!empty($new_instance['cantidad'])) ? sanitize_text_field($new_instance['cantidad']) : '';
        return $instance;
    }
}

/* Registrando el widget */
function gymfitness_registrar_widget()
{
    register_widget('GymFitness_Clases_Widget');
}
add_action('widgets_init', 'gymfitness_registrar_widget');
