<?php
//* Récupérer les champs ACF
/* création d'un tableau avec tous les champs acf de langages recupérés */
$langages = [
    'php' => get_field('php'),
    'html' => get_field('html'),
    'css' => get_field('css'),
    'js' => get_field('js'),
    'wordpress' => get_field('wordpress'),
    'elementor' => get_field('elementor')
];
// Récupérer le descriptif du projet à partir du champ ACF "Description"
$description_projet = get_field('descriptif');
// Récupérer le client
$client = get_field('client');
// Récupérer liens github
$github = get_field('github');



//* Structure du contenu de la publication
?>
<article class="container">
    <div class="content">
        <!-- Descritptif du projet -->
        <div class="descriptif">
            <!-- titre -->
            <h2 class="title-photo"><?php the_title(); ?></h2>
            <h3><?php echo ($client); ?></h3>

            <!-- La description intégrée dynamiquement grâce au champs acf récupéré -->
            <?php if (!empty($description_projet)) { ?>
                <p><?php echo ($description_projet); ?></p>
            <?php   } ?>

            <!-- itération sur le tableau des langages pour affichage dynamique -->
            <div class="langages">
                <?php
                // Afficher les images des langages en Bouclant à travers le tableau pour récupérer les images associées aux URL
                foreach ($langages as $langage => $url) {
                    // Vérifier si l'URL existe
                    if (!empty($url)) { ?>
                        <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_url($langage); ?> ">
                <?php }
                }
                ?>
            </div>
            <!-- lien vers github  -->
            <div class="link-code">
                <img class="arrow-right" width="50" height="50" src="https://img.icons8.com/ios/50/right--v1.png" alt="right--v1" />
                <a href="<?php echo esc_url($github); ?>" target="_blank">Voir le code</a>
            </div>
        </div>
        <!-- Photo du projet -->
        <div class="photo-projet">
            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID())); ?>" alt="<?php the_title(); ?>">
        </div>
        <div class="bloc-btn">
            <a href="<?php echo esc_url(home_url('#catalogue-projets')); ?>" class="bouton">Tous les projets</a>
        </div>
    </div>

</article>
