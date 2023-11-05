<?php


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>


<!-- coder mon footer  -->
<footer class="site__footer">
    <p>&copy Jennifer Sanz - 2023 | Tous droits réservés </p>
    <!-- menu de navigation wordpress footer -->
    <?php wp_nav_menu(
        array(
            'theme_location' => 'footer',
            'container' => 'ul',
            'menu_class' => 'site__footer__menu', // ma classe personnalisée 
        )
    );

    ?>
    <?php
    // integration de la popup de contact
    get_template_part('template-parts/modale_contact') ?>

    <a href="#top" class="to-top">Back to top</a>
</footer>

<?php wp_footer(); ?>

</body>

</html>