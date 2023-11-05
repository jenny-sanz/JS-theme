<?php 

/* The template for displaying 404 pages (Not Found) */

get_header(); ?>


<div id="content" role="main">

    <header class="page-header">
        <div class="page-title">
            <h1>4<span>0</span>4</h1>
        </div>
    </header>

    <div class="page-wrapper">
        <div class="page-content">
            <h2>Oops ! C'est embarassant la page que vous recherchez n'existe pas, mais pas de panique !</h2>
            <p>S'il s'agit d'une erreur vous pouvez me<a class="contact" href="#contact"> contacter</a> je reviendrai vers vous rapidement <br> ou vous pouvez reprendre votre navigation vers la page d'accueil </p> <br>
            <a href="<?php echo home_url('/'); ?>"" class=" button"> Par ici</a>

        </div><!-- .page-content -->
    </div><!-- .page-wrapper -->

</div><!-- #content -->


<?php get_footer(); ?>