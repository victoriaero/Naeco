<?php 

  include '../../inc/header_parceiro.php';

  require_once "../../inc/config.php";

  if (! isset($_SESSION["parceiro"])) {
    header("Location:../login_parceiro.php");
    exit;
  }

?>

  <div class="row">
		<div class="col-md-6">

    </div>    
    <div class="col-sm-8">
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
  var uluru = {lat: -19.9364, lng: -43.9663};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 14, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
        };
      
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzrSABqzTvJK-3GEg9GSayuxVN0-3FxnY&callback=initMap"
    async defer></script>
		  </div>
		<div class="col-sm-4 txt-home">
			<h2>Pontos de Coleta</h2>
      <h4>Incentive seus clientes a reciclar com a Naeco!</h4>
      
     
		</div>
</div>


<?php include '../../inc/footer_sistema_parceiro.php'; ?>