<?php get_header(); ?>

<main id="main" class="site-main" role="main">

    <?php
/* Récupération des customs post type Projets */
    $args = array(
        'post_type' => 'projets',
        'p' => get_the_ID(),

    );

    $projet = new WP_Query($args);

    if ($projet->have_posts()) {
        while ($projet->have_posts()) {
            $projet->the_post();

            get_template_part('template-parts/projet_details');
     
        
        }
        wp_reset_postdata(); // Réinitialise les données originales de la requête 
    }
    ?>
</main>

<?php get_footer(); ?>