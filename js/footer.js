const message =
  "Votre demande de Newsletter a bien été prise en compte. Merci beaucoup!";

document
  .getElementById("contactForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    alert(message);
  });