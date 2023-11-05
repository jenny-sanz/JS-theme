console.log("script modale chargé");
//* Popup contact

document.addEventListener("DOMContentLoaded", function () {
  const contactLink = document.querySelectorAll('a[href="#contact"]');
  const iconMail = document.querySelector(".contact");
  const contactButtons = document.querySelectorAll(".button-contact");
  const modalContainer = document.querySelector(".modal-container");
  const btnClose = document.querySelector(".close");

  function openModal(e) {
    e.preventDefault();
    modalContainer.classList.add("open");
  }

  function closeModal() {
    modalContainer.classList.add("close-anim"); // Ajoutez la classe "close-anim"
    setTimeout(() => {
      modalContainer.classList.remove("open");
      modalContainer.classList.remove("close-anim"); // Supprimez la classe "close-anim" après l'animation
    }, 500); // Attendez la fin de l'animation (ajustez la durée en fonction de votre animation)
  }

  if (contactLink && iconMail && contactButtons && btnClose) {
    contactLink.forEach((contact) => {
      contact.addEventListener("click", openModal);
    });

    iconMail.addEventListener("click", openModal);

    contactButtons.forEach((button) => {
      button.addEventListener("click", openModal);
    });

    btnClose.addEventListener("click", closeModal);
  }
});
