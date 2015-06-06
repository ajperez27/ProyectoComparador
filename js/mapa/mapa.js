var arrayAlcampo = new Array();
var arrayCarrefour = new Array();
var arrayDia = new Array();
var arrayCoviran = new Array();

arrayAlcampo[0] = {latitude: 37.2010989, longitude: -3.6147144};
arrayAlcampo[1] = {latitude: 36.741992, longitude: -3.530742};


arrayCarrefour[0] = {latitude: 37.1256098, longitude: -3.6203127};
arrayCarrefour[1] = {latitude: 37.2226455, longitude: -3.6081631};


arrayDia[0] = {latitude: 37.165705, longitude: -3.594691};
arrayDia[1] = {latitude: 37.159481, longitude: -3.593957};


arrayCoviran[0] = {latitude: 37.205593, longitude: -3.664775};
arrayCoviran[1] = {latitude: 37.164830, longitude: -3.581683};


var mapa; // va a contener el mapa Google después de crearlo
window.onload = obtenerSituacion;

function obtenerSituacion() {
    if (navigator.geolocation) { // Nos aseguramos de que el navegador soporta la API Geolocation
        navigator.geolocation.getCurrentPosition(visualizarSituacion, errorSituacion);
        //Llamamos al método getCurrentPosition y le pasamos una función manejadora
    } else {
        alert("No hay soporte de geolocalización");
    }
}
// El manejador que será llamado cuando el navegador tenga una situación
// Recibe una variable que contiene la longitud y la latitud así como información sobre la exactitud
function visualizarSituacion(posicion) {
    // Obtenemos latitud y longitud del objeto posicion.coords
    var latitud = posicion.coords.latitude;
    var longitud = posicion.coords.longitude;

    var div = document.getElementById("situacion");
    mostrarMapa(posicion.coords);
}

function errorSituacion(error) {
    var tiposError = {
        0: "Error desconocido",
        1: "Permiso denegado por el usuario",
        2: "Posicion no disponible",
        3: "Tiempo excedido"
    };

    var mensajeError = tiposError[error.code];

    if (error.code === 0 || error.code === 2) {
        mensajeError = mensajeError + " " + error.message;
    }

    var div = document.getElementById("situacion");
    div.innerHTML = mensajeError;
}

function mostrarMapa(coordenadas) {
    var googleLatLong = new google.maps.LatLng(coordenadas.latitude, coordenadas.longitude);
    var opcionesMapa = {
        zoom: 12,
        center: googleLatLong,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var divMapa = document.getElementById("mapa");
    var titulo = "Usted está aquí";
    mapa = new google.maps.Map(divMapa, opcionesMapa);


    var drop = google.maps.Animation.DROP;
    var bounce = google.maps.Animation.BOUNCE;

    addMarker(mapa, googleLatLong, titulo, drop);

    var tituloAlcampo = "Alcampo";
    var iconoAlcampo = "Imagenes/supermercados/iconoMapa/alcampo.png";

    añadirMarcadores(arrayAlcampo, tituloAlcampo, bounce, iconoAlcampo);


    var tituloCarrefour = "Carrefour";
    var iconoCarrefour = "Imagenes/supermercados/iconoMapa/carrefour.png";

    añadirMarcadores(arrayCarrefour, tituloCarrefour, bounce, iconoCarrefour);

    var tituloDia = "Dia";
    var iconoDia = "Imagenes/supermercados/iconoMapa/dia.png";

    añadirMarcadores(arrayDia, tituloDia, bounce, iconoDia);

    var tituloCoviran = "Covirán";
    var iconoCoviran = "Imagenes/supermercados/iconoMapa/coviran.png";

    añadirMarcadores(arrayCoviran, tituloCoviran, bounce, iconoCoviran);

}

function añadirMarcadores(array, titulo, animacion, icono) {
    var coordenadasCarrefour;

    for (var i = 0; i < array.length; i++) {
        coordenadas = new google.maps.LatLng(array[i].latitude, array[i].longitude);
        addMarker(mapa, coordenadas, titulo, animacion, icono);
    }
}

function addMarker(mapa, googleLatLong, titulo, animacion, icono) {
    // Crear el marcador
    var opcionesMarker = {
        position: googleLatLong,
        map: mapa,
        title: titulo,
        clickable: true,
        icon: icono,
        //animation: animacion
    };
    var marcador = new google.maps.Marker(opcionesMarker);
}