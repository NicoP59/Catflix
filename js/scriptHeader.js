let texte = `The reason the internet was invented !`;
let container = document.getElementById('type-js-auto');
let emplacement = 0;
let stock_texte = '';

function write_text() {
  if (texte[emplacement] == 'µ') {
    stock_texte += '<br>';
    // }else if(texte[emplacement] == "*") {
    // stock_texte += "&nbsp"
    // }else if(texte[emplacement] == "~") {
    // stock_texte += "<span class='span'>"
    // }else if(texte[emplacement] == "ù") {
    // stock_texte += "</span>"
  } else {
    stock_texte += texte[emplacement];
  }

  container.innerHTML = stock_texte;

  emplacement += 1;

  if (emplacement >= texte.length) {
    container.innerHTML =
      stock_texte + "<span class='blink'>|</span>"; /*le baton à la fin*/
    clearInterval(inter);
    emplacement = 0;
  }
}

let inter = setInterval(function () {
  write_text();
}, 50);

///////////////////// bouton DarkMode ////////////////////////

let theme_toggler = document.querySelector('#chk');
let count = 1;
theme_toggler.addEventListener('click', function () {
  document.body.classList.toggle('dark_mode');
  count++;
});

const chk = document.getElementById('chk');

chk.addEventListener('change', () => {
  document.body.classList.toggle('dark');
});

//////////////////////////////////////////////////////////////
