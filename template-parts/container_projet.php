<?php
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
    <img class="arrow-down" width="40" height="40" src="https://img.icons8.com/ios/50/down--v1.png" alt="down--v1" />
    <a class="link-post" href="<?php echo $post_url; ?>" target="_blank">Découvrir</a>

</div>