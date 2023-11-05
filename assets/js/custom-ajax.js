console.log('Ajax chargé');
//* Requête Ajax chargement de projets

jQuery(function ($) {
  function loadMorePosts() {
    const catalogue = $("#catalogue-projets");
    const currentPage = parseInt(catalogue.data("page"));
   
    // Effectuer la requête Ajax
    $.ajax({
      url: myAjax.ajaxurl,
      type: "POST",
      dataType: "html",
      data: {
        action: "load_more_projects",
        page: currentPage,
      },

      success: function (response) {
        if (response) {
          // Ajouter les nouvelles images au catalogue
          catalogue.append(response);
          // Mettre à jour le numéro de page dans le conteneur
          catalogue.data("page", currentPage + 1);
          // Rétablir le texte du bouton "Charger plus"
          $("#load-more-btn").text("Charger plus");
        } else {
          // Aucune nouvelle image disponible, cacher le bouton
          $("#load-more-btn").hide();
        }
      },
      error: function () {
        // Gérer les erreurs
        $("#load-more-btn").text("Erreur lors du chargement");
      },
    });
  }

  // Attachez les écouteurs d'événements une fois que le DOM est prêt
  $(document).ready(function () {
    $("#load-more-btn").on("click", function () {
      loadMorePosts();
    });
  });
});

