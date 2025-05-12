document.addEventListener("keyup", detectTabKey);

function detectTabKey(e) {
    if (e.keyCode == 9) {
      if (document.getElementById("botoncontraste").classList.contains("active-barra-accesibilidad-govco")) {
        document.getElementById("botoncontraste").classList.toggle("active-barra-accesibilidad-govco");}
        if (document.getElementById("botonaumentar").classList.contains("active-barra-accesibilidad-govco")) {
          document.getElementById("botonaumentar").classList.toggle("active-barra-accesibilidad-govco");}
          if (document.getElementById("botondisminuir").classList.contains("active-barra-accesibilidad-govco")) {
            document.getElementById("botondisminuir").classList.toggle("active-barra-accesibilidad-govco");}
    }
}

function cambiarContexto() {
  var botoncontraste = document.getElementById("botoncontraste");
  var botonaumentar = document.getElementById("botonaumentar");
  var botondisminuir = document.getElementById("botondisminuir");

    if (!botoncontraste.classList.contains("active-barra-accesibilidad-govco")) {
      botoncontraste.classList.toggle("active-barra-accesibilidad-govco");
      document.getElementById("titleaumentar").style.display="";
      document.getElementById("titledisminuir").style.display="";
      document.getElementById("titlecontraste").style.display="none";
    }
    if (botondisminuir.classList.contains("active-barra-accesibilidad-govco")) {
      botondisminuir.classList.remove("active-barra-accesibilidad-govco");
    }
    if (botonaumentar.classList.contains("active-barra-accesibilidad-govco")) {
      botonaumentar.classList.remove("active-barra-accesibilidad-govco");
    }

  var element = document.getElementById('para-mirar');
  if (element.className == 'modo_oscuro-govco') {
    var element = document.getElementById('para-mirar');
    element.className = "modo_claro-govco";
  } else {
    var element = document.getElementById('para-mirar');
    element.className = "modo_oscuro-govco";
  }
}

function disminuirTamanio(operador) {

  var botoncontraste = document.getElementById("botoncontraste");
  var botonaumentar = document.getElementById("botonaumentar");
  var botondisminuir = document.getElementById("botondisminuir");

    if (!botondisminuir.classList.contains("active-barra-accesibilidad-govco")) {
      botondisminuir.classList.toggle("active-barra-accesibilidad-govco");
      document.getElementById("titleaumentar").style.display="";
      document.getElementById("titledisminuir").style.display="none";
      document.getElementById("titlecontraste").style.display="";
    }
    if (botonaumentar.classList.contains("active-barra-accesibilidad-govco")) {
      botonaumentar.classList.remove("active-barra-accesibilidad-govco");
    }
    if (botoncontraste.classList.contains("active-barra-accesibilidad-govco")) {
      botoncontraste.classList.remove("active-barra-accesibilidad-govco");
    }

  var div1 = document.getElementById("para-mirar")
  var texto = div1.querySelectorAll("a, p, h1, h2, h3, span");
  for (let element of texto) {
    const total = tamanioElemento(element);
    const nuevoTamanio = (operador === 'aumentar' ? (total + 1) : (total - 1)) + 'px';
    element.style.fontSize = nuevoTamanio
  }
}

function aumentarTamanio(operador) {

  var botoncontraste = document.getElementById("botoncontraste");
  var botonaumentar = document.getElementById("botonaumentar");
  var botondisminuir = document.getElementById("botondisminuir");

    if (!botonaumentar.classList.contains("active-barra-accesibilidad-govco")) {
      botonaumentar.classList.toggle("active-barra-accesibilidad-govco");
      document.getElementById("titleaumentar").style.display="none";
      document.getElementById("titledisminuir").style.display="";
      document.getElementById("titlecontraste").style.display="";
    }
    if (botondisminuir.classList.contains("active-barra-accesibilidad-govco")) {
      botondisminuir.classList.remove("active-barra-accesibilidad-govco");
    }
    if (botoncontraste.classList.contains("active-barra-accesibilidad-govco")) {
      botoncontraste.classList.remove("active-barra-accesibilidad-govco");
    }

  var div1 = document.getElementById("para-mirar")
  var texto = div1.querySelectorAll("a, p, h1, h2, h3, span");
  for (let element of texto) {
    const total = tamanioElemento(element);
    if(total<=30)
    {
    const nuevoTamanio = (operador === 'aumentar' ? (total + 1) : (total - 1)) + 'px';
    element.style.fontSize = nuevoTamanio
    }
  }
}

function tamanioElemento(element) {
  const tamanioParrafo = window.getComputedStyle(element, null).getPropertyValue('font-size');
  return parseFloat(tamanioParrafo);
}

window.addEventListener("load", function() {
  initHeader();

});

function initHeader() {
  initTopBar();
  initMenu();
}

// Barra superior
function initTopBar() {
  const translateElement = document.querySelector(".idioma-icon-barra-superior-govco");
  translateElement.addEventListener("click", translate, false);

  function translate() {
      // ... // Implementar traducción
  }
}

// Menu de navegacion 
function initMenu() {
  initSearchBar();

  /////// Prevent closing from click inside dropdown
  document.querySelectorAll('.dropdown-menu').forEach(function(element){
    element.addEventListener('click', function (e) {
      e.stopPropagation();
    });
  });

  document.querySelectorAll('.navbar-menu-govco a.dir-menu-govco').forEach(function(element){
    element.addEventListener("click", eventClickItem, false);
  });
}

function eventClickItem() {
  const parentNavbar = this.closest('.navbar-menu-govco');
  parentNavbar.querySelectorAll('a.active').forEach(function(element){
      element.classList.remove('active');
  });

  this.classList.add('active');
  const container = this.closest('.nav-item');
  const itemParent =  container.querySelector('.nav-link');
  itemParent.classList.add('active');
}

// Boton arriba
var backGoToUpElement = document.querySelector(".volver-arriba-govco");
backGoToUpElement.addEventListener("click", backGoToUp, false);

function backGoToUp() {
  document.body.scrollTop = document.documentElement.scrollTop = 0;
}
