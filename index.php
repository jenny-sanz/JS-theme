<?php get_header(); ?>

<main id="main" class="site-main" role="main">

    <!-- A PROPOS -->
    <section id="profil" class="profil">
        <article class="container">
            <div class="content">
                <div class="bloc-titre">
                    <h2>À Propos</h2>
                </div>
                <div class="bloc-text">
                    <i class="fa-solid fa-quote-left" style="color: #333333;"></i>
                    <p>Formée en <strong>Design UI</strong> et spécialisée en <strong>Développement WordPress</strong> ,
                        mon parcours m'a équipé pour concevoir des <strong>expériences web esthétiques et fonctionnelles</strong>.
                        De la première étincelle d'une idée à la réalisation concrète.<br> </p>
                    <h3 class="sub-subtitle">Un mariage harmonieux entre la <span>créativité</span> du design et la puissance du <span>développement</span></h3>
                    <p><!-- Vous pouvez compter sur moi pour donner vie à votre vision en ligne.<br><br> -->
                        <strong>Explorez mon portfolio </strong>pour voir comment je mets en œuvre cette fusion pour créer des <strong>sites web responsives </strong>qui vous ressemblent.
                    </p>
                    <i class="fa-solid fa-quote-right" style="color: #333333;"></i>
                </div>
                <!-- flèche animée -->
                <div class="arrow-wrapper">
                    <div class="arrow-explose hidden">
                        <div class="dot center"></div>
                        <div class="dot center"></div>
                        <div class="dot center"></div>
                        <div class="dot center"></div>
                        <div class="dot center"></div>
                        <div class="dot center"></div>
                        <div class="dot left-1"></div>
                        <div class="dot left-2"></div>
                        <div class="dot right-1"></div>
                        <div class="dot right-2"></div>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <!-- PORTFOLIO -->
    <section id="portfolio" class="portfolio">
        <article class="container">
            <div class="bloc-titre">
                <h2>Portfolio</h2>
            </div>
            <div class="bloc-text">
                <p>Dans le cadre de ma formation WordPress, j'ai acquis une expertise en <strong>intégration</strong> et <strong>développement de sites web variés</strong>, allant de <strong>la personnalisation de thèmes existants</strong> à <strong>la conception de thèmes sur mesure</strong>.
                    <br><br>
                    Mais aussi dans <strong>l'optimisation des performances et du référencement naturel</strong> sur les moteurs de recherche et <strong>le debogage et maintenance</strong> de site existant.
                </p>
                <h3 class="sub-subtitle">L'art de <span>fusionner</span> les langages</h3>
                <p>Des langages du web <strong>HTML5</strong> et <strong>CSS3</strong> aux langages de programmation <strong>PHP</strong> et <strong>JavaScript</strong> pour créer des sites web dynamiques qui dépassent les attentes, tout en offrant <strong>une expérience utilisateur exceptionnelle</strong>.</p>
            </div>

            <!-- PICTOGRAMMES-->
            <div class="container-pictos">
                <div class="picto">
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/picto/wp.png" alt="">
                    </div>

                    <p>Développement de sites
                        WordPress</p>
                </div>
                <div class="picto">
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/picto/dev.png" alt="">
                    </div>

                    <p>Conception & développement <br>Web</p>
                </div>
                <div class="picto">
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/picto/seo.png" alt="">
                    </div>

                    <p>Performances & référencement <br>
                        SEO</p>
                </div>
            </div>
        </article>

        <!-- PROJETS -->
        <article class="container">
            <h3 id="projets">Mes projets</h3>
            <div id="catalogue-projets" class="container-projets" data-page="1">
                <?php
                get_template_part('template-parts/container_projet');

                ?>
            </div>
            <div id="load-more-container">
                <button id="load-more-btn" class="btn">Plus de projets</button>
            </div>
        </article>

    </section>

    <!-- CONTACT -->
    <section class="contact">
        <article class="container">
            <div class="bloc-titre">
                <h2>Un projet ? Une question ?</h2>
            </div>
            <p>N’hésitez pas à me contacter<br>
                Ensemble, nous pouvons transformer vos idées en réalité numérique !
            </p>
            <button class="button-contact">Contact</button>

        </article>

    </section>

</main>

<?php get_footer(); ?>