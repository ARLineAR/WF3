<?php
//---- REGION/WIDGET
add_action('widgets_init', 'eprojet_init_sidebar'); // j'exécute la fonction nommée "eprojet_init_sidebar".
function eprojet_init_sidebar() //fonction qui contient la déclaration des mes régions

{


    if (function_exists('register_sidebar')){ // si la fonction register_sidebar_nav_menu existe (c'est une fonction interne à wordPress), alors je déclare des régions

        register_sidebar(array(
            'name'          => __('region-entete', 'eprojet'),
            'id'            => 'region-entet',
            'description'   => __('Add widgets here to appear in your entet region', 'eprojet')


        ));


        register_sidebar(array(
            'name'          => __('colone de droite', 'eprojet'),
            'id'            => 'colonne-droite',
            'description'   => __('Add widgets here to appear in your right column region', 'eprojet')


        ));

        register_sidebar(array(
            'name'          => __('region-footer', 'eprojet'),
            'id'            => 'region-footer',
            'description'   => __('Add widgets here to appear in your footer region', 'eprojet')


        ));

    }

     
}

// ---- MENU
add_action('init', 'eprojet_init_menu'); // j'exécute la fonction nommée "eprojet_init_menu()'
function eprojet_init_menu() // fonction qui contient la déclaration de mes régions
{
    if(function_exists('register_nav_menu')) // si la fonction register_sidebar_nav_menu existe (c'est une fonction interne à wordPress), alors je déclare des régions

    {
        register_nav_menu('primary', __('Primary Menu', 'eprojet'));
    }


}

// -------- ACCUEIL

function showCategory(){
    $cat = '';
    $categories = get_categories(array('category_name' => 'ville', 'orderby' => 'name', 'exclude' => 1)); // on exclut la catégorie appartenant à "non classé".
    print '<pre>'; print_r ($categories); print '</pre>';
    foreach($categories as $category){

        $cat .= '<a href="'. get_category_link( $category->term_id) .'">' . $category->name .'</a> <br>';
    }
    return $cat;
}
// fonction permettant de récupérer tous les contenus en fonction d'une catégorie
function showCategoryByPostType(){
    $current_cat = get_query_var('cat');
    query_post("post_type=$type&cat=$current_cat");
}

// fonction permettant de récupérer toutes les images déposées dans le corps d'un texte
function getImage(){

    $content = '';
    $images = get_children('post_parent=' . get_the_ID() .'$post_type=attachment&post_mine_type=image&post_per_page=10');
    foreach($images as $image_id => $a){
        $content .= wp_get_attachment($image_id, 'medium');
    }

    return $content;

}