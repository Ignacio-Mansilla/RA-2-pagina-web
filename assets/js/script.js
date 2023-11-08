// Función para realizar una solicitud AJAX y obtener los datos de los sensores
function obtenerDatosSensores() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var datos = JSON.parse(this.responseText);
      document.getElementById("valor-ultrasonido").textContent = datos.distancia + " cm";
      document.getElementById("valor-peso").textContent = datos.peso + " kg";
    }
  };
  xhttp.open("GET", "datos_sensores.php", true);
  xhttp.send();
}

// Actualizar los datos de los sensores cada 5 segundos
setInterval(obtenerDatosSensores, 5000);
