<?php

/* Comprobacion de seguridad */
if (!defined('ABSPATH')) die();

/* Aqui se construye el widget */
class GymFitness_Clases_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            /* gymfitness_widget se convierte en el id unico del widget */
            'gymfitness_widget',
            /* GymFitness Clases es el nombre que aparecera en el administrador */
            esc_html__('GymFitness Clases', 'gymfitness'),
            /* Descripcion del widget */
            array('description' => esc_html__('Agrega las Clases como Widget', 'gymfitness'),)
        );
    }




    /* 
    FORM SE UTILIZA PARA PRESENTAR EL FORMULARIO AL USUARIO
    Aqui se añade un formulario al widget y dar opciones al usuario
    */
    public function form($instance)
    {
        //   Obtener el valor actual de 'cantidad' o establecerlo como una cadena vacía si no está definido
        $cantidad = !empty($instance['cantidad']) ? $instance['cantidad'] : esc_html('');
?>
        <p>
            <!-- Se genera un ID único para el campo del formulario, basado en el identificador del widget y el nombre del campo (cantidad). esc_attr asegura que el valor esté correctamente escapado para su uso en un atributo HTML. -->
            <label for="<?php echo esc_attr($this->get_field_id('cantidad')) ?>">
                <?php esc_attr_e('Cuantes clases deseas Mostrar?') ?>
            </label>

            <!-- 
            class='widefat': Clase CSS estándar de WordPress para campos de entrada anchos.
            id y name: Se generan utilizando esc_attr($this->get_field_id('cantidad')) y esc_attr($this->get_field_name('cantidad')) respectivamente, asegurando que los atributos sean únicos y seguros. 
            value='echo esc_attr($cantidad)': Establece el valor actual del campo, asegurando que el valor esté escapado correctamente.
            -->
            <input class='widefat' id="<?php echo esc_attr($this->get_field_id('cantidad')) ?>" name="<?php echo esc_attr($this->get_field_name('cantidad')) ?>" type="number" value='<?php echo esc_attr($cantidad) ?>' />
        </p>

    <?php
    } /* END function form */


    /* 
    UPDATE SE UTILIZA PARA ACTUALIZAR LOS VALORES
    Aqui se Actualiza el valor
     */
    public function update($new_instance, $old_instance)
    {
        /* Inicializa un array vacío para almacenar los valores actualizados */
        $instance = array();

        /* Actualiza el valor de 'cantidad' si está presente en $new_instance */
        $instance['cantidad'] = (!empty($new_instance['cantidad'])) ? sanitize_text_field($new_instance['cantidad']) : '';

        /* Retorna la instancia actualizada */
        return $instance;
    } /* END function update */


    /* 
    WIDGET ES LO QUE SE PRESENTA EN PANTALLA.
    */
    /* $args: Parámetros para la consulta de posts de tipo gymfitness_clases */
    public function widget($args, $instance)
    {
    ?>

        <ul class="clases-sidebar">
            <?php
            $args = array(
                'post_type' => 'gymfitness_clases',
                'posts_per_page' => $instance['cantidad']
            );
            /* Se ejecuta la consulta */
            $clases = new WP_Query($args);
            /* Bucle que recorre cada post encontrado. */
            while ($clases->have_posts()) {
                $clases->the_post();
            ?>
                <li>
                    <div class="imagen">
                        <!-- Muestra la imagen destacada del post. -->
                        <?php the_post_thumbnail('thumbnail') ?>
                    </div>
                    <div class="contenido-clase">
                        <!-- Enlace al post. -->
                        <a href="<?php the_permalink(); ?>">
                            <h3><?php the_title(); ?></h3>
                        </a>

                        <!-- Campos personalizados del post. -->
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
    } /* END function widget */
}



/* Registrando el widget */
function gymfitness_registrar_widget()
{
    register_widget('GymFitness_Clases_Widget');
}
add_action('widgets_init', 'gymfitness_registrar_widget');
