<?php
//* Configuration du thème

if (!function_exists('js_theme_setup')) {
    function js_theme_setup()
    {
        // Ajouter la prise en charge des images mises en avant
        add_theme_support('post-thumbnails');

        // Ajouter une taille d'image personnalisée pour les miniatures
        add_image_size('thumbnail', 150, 150, true);

        // Ajouter une taille d'image personnalisée pour les images moyennes
        add_image_size('medium', 300, 200, true);

        // Ajouter une taille d'image personnalisée pour les images moyennes plus grandes
        add_image_size('medium-large', 768, 512, true);

        // Ajouter une taille d'image personnalisée pour les grandes images
        add_image_size('large', 1024, 768, true);

        // Ajouter automatiquement le titre du site dans l'en-tête du site
        add_theme_support('title-tag');

        // Déclarer deux emplacements de menu : menu principal et footer
        register_nav_menus(array(
            'main' => 'Menu principal',
            'footer' => 'Bas de page',
        ));

        // Activer la prise en charge des formats
        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video',));
    }
    add_action('after_setup_theme', 'js_theme_setup');
};

//* Chargement css et scripts

function theme_scripts()
{
    // CSS
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'));

    // JS de base
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/assets/js/index.js', array('jquery'), '1.0', true);


    // modale contact
    wp_enqueue_script('contact', get_template_directory_uri() . '/assets/js/modale_contact.js', array('jquery'), '1.0', true);

    // script personnalisé pour la pagination Ajax
    wp_enqueue_script('custom-ajax', get_template_directory_uri() . '/assets/js/custom-ajax.js', array('jquery'), '1.0', true);
    wp_localize_script('custom-ajax', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

    // Bibliothèque FontAwesome
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array());

    //gsap et scroll trigger pour parallaxe
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js', array(), true);
    wp_enqueue_script('scroll-trigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollTrigger.min.js', array('gsap'), true);

    // Passe la variable PHP à JavaScript
    wp_localize_script('your-custom-script', 'theme_vars', array(
        'is_home' => is_home_page()
    ));
}
add_action('wp_enqueue_scripts', 'theme_scripts');

//* fonction pour definir la page d'accueil à recuperer en js
function is_home_page()
{
    return is_front_page() && !is_home();
}


//* Fonction pour charger davantage de projets
function load_more_projects()
{
    $page = isset($_POST['page']) ? intval($_POST['page']) + 1 : 1;

    $args_projet = array(
        'post_type' => 'projets',
        'posts_per_page' => 4, // Nombre de projets par page
        'paged' => $page,
    );

    $query_projets = new WP_Query($args_projet);

    ob_start();

    if ($query_projets->have_posts()) {
        while ($query_projets->have_posts()) {
            $query_projets->the_post();
            // récupérer les infos : image mise en avant (thumbnail_url), url du post, titre, catégorie, réf
            $thumbnail_url = get_the_post_thumbnail_url();
            $post_url = get_permalink();
            $post_title = get_the_title();
            // Récupérer le client
            $client = get_field('client');
?>
            <div class="post-container custom-post-<?php the_ID(); ?>">
                <h3 class="titre-projet"><?php echo $post_title; ?></h3>
                <a class="bloc-img" href="<?php echo $post_url; ?>">
                    <img src="<?php echo $thumbnail_url; ?>" alt="<?php echo $post_title; ?>">
                </a>
                <h4><?php echo ($client); ?></h4>
                <img class="arrow-down" width="40" height="40" src="https://img.icons8.com/ios/50/down--v1.png" alt="down--v1" />
                <a class="link-post" href="<?php echo $post_url; ?>" target="_blank">Découvrir</a>
            </div>
<?php
        }
    }
    wp_reset_postdata();
    $response = ob_get_clean();
    echo $response;
    exit;
}

add_action('wp_ajax_load_more_projects', 'load_more_projects');
add_action('wp_ajax_nopriv_load_more_projects', 'load_more_projects');



 