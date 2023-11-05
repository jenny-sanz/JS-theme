<?php

$args_projet = array(
    'post_type' => 'projets',
    'posts_per_page' => 4,
);

$query_projets = new WP_Query($args_projet);
if ($query_projets->have_posts()) {
    while ($query_projets->have_posts()) {
        $query_projets->the_post();

        // récupere les infos : image mise en avant(thumbnail_url), url du post, titre, categorie, réf
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
            <!-- <i class="fa fa-thin fa-arrow-down" style="color: #181818;"></i> -->
            <img class="arrow-down" width="40" height="40" src="https://img.icons8.com/ios/50/down--v1.png" alt="down--v1" />
            <a class="link-post" href="<?php echo $post_url; ?>" target="_blank">Découvrir</a>

        </div>
<?php

    }
    wp_reset_postdata();
}
?>