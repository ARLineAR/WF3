<?php
/*
Plugin Name: MonPlugin
Plugin URI: http://wwww.test.fr
Descritption: Plugin pour personnalisation de widget
Version: 1
Author: Grégory LACROIX
License: -
*/

class MonPluginW extends WP_Widget{
    public function __construct(){
        $options = array(
            'classname' =>'maclasseCSS',
            'description' => 'exemple de widget aevc 3 informations'
        );
        $control = array(
            'width' => 100,
            'height' => 500
        );

        $this->WP_widget('widget-exemple', 'widget exemple', $otpions, $control);
        add_action('widgets_init', function(){register_widget('MonPlugin');}); // appel et initialisation des widgets

    }

      public function widget($args, $instance){
            extract($args);
            echo $before_widget;
            echo $before_title . $instance['titre'] . $after_title;
            echo $instance['nom']. '' . $intance['age'];
            echo $after_widget;
            
        }
        public function update($new, $old){

            return $new;

        }

        public function form ($instance){
            $default = array(
                'titre' => 'widget exemple',
                'age' => '20'
            );

            $instance = wp_parse_args($instance, $default);
            echo '<p>';

            echo '<label>Titre :</label>';
            echo '<input type="text" name="'; 
                echo $this->get_fieldname('titre');
            echo '"value="';
                echo $instance ['titre'];
            echo '">';

            echo '<label>Nom :</label>';
            echo '<input type="text" name="'; 
                echo $this->get_fieldname('nom');
            echo '"value="';
                echo $instance ['nom'];
            echo '">';

            echo '<label>Âge :</label>';
            echo '<input type="text" name="'; 
                echo $this->get_fieldname('age');
            echo '"value="';
                echo $instance ['age'];
            echo '">';
        }
}