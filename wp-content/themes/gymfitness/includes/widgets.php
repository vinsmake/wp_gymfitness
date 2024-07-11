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

    public function widget($args, $instance)
    {
    }

    public function form($instance)
    {
        /* Verifica si el valor 'cantidad' está presente en la instancia; si no, establece un valor predeterminado. */
        $cantidad = !empty($instance['cantidad']) ? $instance['cantidad'] : esc_html('¿Cuántas clases deseas mostrar?');
        ?>
        <p>
            <label for="<?php esc_attr($this->get_field_id('cantidad'))?>">
                <?php esc_attr_e('¿Cuántas clases deseas mostrar?') ?>
            </label>
                <input
                    class="widefat"
                    id="<?php esc_attr($this->get_field_id('cantidad'))?>" 
                    name="<?php esc_attr($this->get_field_name('cantidad'))?>"
                    type="number"
                    value="<?php echo esc_attr($cantidad)?>"
                />

        </p>

        <?php 
    }

    public function update($new_instance, $old_instance)
    {
    }
}

function gymfitness_registrar_widget()
{
    register_widget('GymFitness_Clases_Widget');
}
add_action('widgets_init', 'gymfitness_registrar_widget');
