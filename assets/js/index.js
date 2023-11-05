console.log("js chargé");

//*************** Navigation menu burger mobile  *************/

const btnMenu = document.querySelector(".btn-menu");
const header = document.querySelector(".header");
const navMobile = document.querySelector(".navigation-mobile");
const mobileLinks = document.querySelectorAll(".mobile-link");
let menuOpen = false;

// Fonction pour header page d'accueil
function toggleMenu() {
  header.classList.toggle("open");
  navMobile.classList.toggle("open");

  // Basculer la valeur de menuOpen
  menuOpen = !menuOpen;

  // Changer l'icône en fonction de l'état du menu
  if (menuOpen) {
    btnMenu.innerHTML =
      '<img width="34" height="34" src="https://img.icons8.com/ios-filled/50/f6f6f6/delete-sign--v1.png" alt="delete-sign--v1"/>';
  } else {
    btnMenu.innerHTML =
      '<img width="34" height="34" src="https://img.icons8.com/material/24/f6f6f6/squared-menu--v2.png" alt="squared-menu--v2" />';
  }
}

btnMenu.addEventListener("click", toggleMenu);
mobileLinks.forEach((link) => {
  link.addEventListener("click", toggleMenu);
});

//****************** Animation scroll image profil ***************/

  // Fonction pour vérifier si l'écran est en mode "desktop"
  function isDesktop() {
    return window.matchMedia("(min-width: 1280px)").matches; // Vous pouvez ajuster cette valeur en fonction de votre conception responsive
  }
  // Fonction pour vérifier si l'écran est en mode "grand écran" (hauteur minimale de 1027px)
  function isTallScreen() {
    return window.matchMedia("(min-height: 1027px)").matches;
  }

  function scrollPhoto() {
    // Sélectionnez l'élément de l'image
    const blocPhoto = document.querySelector(".bloc-photo");

    // Vérifiez si l'écran est en mode "desktop"
    if (!isDesktop() || !blocPhoto) {
      return; // Ne rien faire si ce n'est pas en mode "desktop" ou si l'élément n'existe pas
    }

    if (isDesktop()) {
      gsap.to(blocPhoto, {
        y: "550px", // Déplacez l'élément de 550px vers le bas
        scale: 0.7,
        duration: 2,
        scrollTrigger: {
          trigger: ".banner",
          start: "top",
          end: "bottom",
          scrub: true,
          ease: "Power1.easeInOut",
          //markers: true,
        },
      });
    }
    if (isTallScreen()) {
      // Créez une animation spécifique pour les grands écrans si nécessaire
      gsap.to(blocPhoto, {
        y: "800px", // Déplacez l'élément de 800px vers le bas (par exemple)
        scale: 0.5,
        duration: 2,
        scrollTrigger: {
          trigger: ".banner",
          start: "top",
          end: "bottom",
          scrub: true,
          ease: "Power1.easeInOut",
          //markers: true,
        },
      });
    }
  }

  // Appel de la fonction  de l'animation au chargement de la page
  window.addEventListener("load", () => {
    scrollPhoto();

    // Rafraîchir ScrollTrigger après un court délai pour garantir l'activation des positions de départ et d'arrivée dès le premier chargement
    setTimeout(() => {
      ScrollTrigger.refresh();
    }, 100);
  });


//******************* animation bloc de titre *****************/

const titres = document.querySelectorAll(".bloc-titre");

titres.forEach((titre) => {
  ScrollTrigger.create({
    trigger: titre, // L'élément qui déclenche l'animation
    start: "top 60%", // Déclenche l'animation lorsque l'élément est à 80% du haut de la fenêtre
    end: "bottom 20%", // Arrête l'animation lorsque l'élément est à 20% du bas de la fenêtre
    onEnter: () => {
      titre.classList.add("visible"); // Ajoute la classe "visible" pour déclencher l'animation
    },
    onEnterBack: () => {
      titre.classList.add("visible"); // Réajoute la classe "visible" lorsqu'on revient en arrière
    },
    onLeaveBack: () => {
      titre.classList.remove("visible"); // Retire la classe "visible" lorsque l'élément sort de la vue
    },
  });
  /* markers: true,  */
});

//*******************  animation fade in bloc text et projets *****************/

const texts = document.querySelectorAll(".bloc-text");
const projets = document.querySelectorAll(".post-container");

// Fonction pour gérer l'animation d'entrée/sortie
function handleAnimation(element) {
  element.classList.add("visible");
}

texts.forEach((text) => {
  ScrollTrigger.create({
    trigger: text,
    start: "top 100%",
    end: "bottom 20%",
    onEnter: () => {
      handleAnimation(text);
    },
    onEnterBack: () => {
      handleAnimation(text);
    },
    onLeaveBack: () => {
      text.classList.remove("visible");
    },
  });
});

projets.forEach((projet) => {
  ScrollTrigger.create({
    trigger: projet,
    start: "top 100%",
    end: "bottom 20%",
    onEnter: () => {
      handleAnimation(projet);
    },
    onEnterBack: () => {
      handleAnimation(projet);
    },
    onLeaveBack: () => {
      projet.classList.remove("visible");
    },
  });
});

//*******************  animation pictos portfolio ********************/

const blocPictos = document.querySelector(".container-pictos");
const pictos = document.querySelectorAll(".picto");

ScrollTrigger.create({
  trigger: blocPictos,
  start: "top 80%",
  end: "bottom 20%",
  onEnter: () => {
    pictos.forEach((picto, index) => {
      setTimeout(() => {
        picto.classList.add("visible"); // Ajoute la classe "visible" pour déclencher l'animation CSS
      }, index * 1000); // Utilisez un délai en millisecondes (par exemple, 200ms) entre chaque picto
    });
  },
  /* markers: true,  */
});

//******************** bouton retour vers le haut de la page : INTERSECTION OBSERVER *************/

const backToTopButton = document.querySelector(".to-top");

// Fonction pour afficher/masquer le bouton en fonction de la position de défilement

function toggleBackToTopButton() {
  const scrollPosition = window.scrollY;

  if (scrollPosition > 500) {
    backToTopButton.classList.add("active");
  } else {
    backToTopButton.classList.remove("active");
  }
}

// Écouteur d'événement pour détecter le défilement
window.addEventListener("scroll", toggleBackToTopButton);

// Initialisez l'état du bouton au chargement de la page
toggleBackToTopButton();

// Sélectionnez le footer et le container-pictos s'ils existent
const footer = document.querySelector("footer");
const containerPictos = document.querySelector(".container-pictos");

if (footer) {
  // Configurez l'observateur pour surveiller le footer s'il existe
  const footerObserver = new IntersectionObserver(handleFooterIntersection, {
    root: null,
    rootMargin: "0px",
    threshold: 0.01,
  });

  // Ajoutez le footer à observer s'il existe
  footerObserver.observe(footer);
}

if (containerPictos) {
  // Configurez l'observateur pour surveiller le container-pictos s'il existe
  const containerPictosObserver = new IntersectionObserver(
    handleContainerPictosIntersection,
    {
      root: null,
      rootMargin: "-700px 0px 0px 0px",
      threshold: 0.01,
    }
  );

  // Ajoutez le container-pictos à observer s'il existe
  containerPictosObserver.observe(containerPictos);
}

// Créez une fonction de callback pour l'observateur du footer
function handleFooterIntersection(entries) {
  if (entries[0].isIntersecting) {
    backToTopButton.classList.add("white");
  } else {
    backToTopButton.classList.remove("white");
  }
}

// Créez une fonction de callback pour l'observateur du container-pictos
function handleContainerPictosIntersection(entries) {
  if (entries[0].isIntersecting) {
    backToTopButton.classList.add("white");
  } else {
    backToTopButton.classList.remove("white");
  }
}

//********************  animation fleche profil ******************/

let arrow = document.querySelector(".arrow-explose");
if (arrow) {
  setInterval(() => {
    arrow.classList.toggle("hidden");
  }, 1000);
}

//********************  animation fleche projets ****************/

const arrowsProjects = document.querySelectorAll(".arrow-down");

arrowsProjects.forEach((arrowProject) => {
  ScrollTrigger.create({
    trigger: arrowProject, // L'élément qui déclenche l'animation
    start: "top 80%", // Déclenche l'animation lorsque l'élément est à 80% du haut de la fenêtre
    end: "bottom 20%", // Arrête l'animation lorsque l'élément est à 20% du bas de la fenêtre
    onEnter: () => {
      arrowProject.classList.add("visible"); // Ajoute la classe "visible" pour déclencher l'animation
    },
    onEnterBack: () => {
      arrowProject.classList.add("visible"); // Réajoute la classe "visible" lorsqu'on revient en arrière
    },
    onLeaveBack: () => {
      arrowProject.classList.remove("visible"); // Retire la classe "visible" lorsque l'élément sort de la vue
    },
  });
  /* markers: true,  */
});






