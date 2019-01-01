 <!doctype html>
      
      <head>
  <title>Main page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
      </head>


 <div id="map" style="width: auto; height: 600px;"></div>

<!--map -->

<script>
window.onload = function() {
  getLocation();
};
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
   
  }
}
function showPosition(position) {
var locations = [
		["SHOP 1",position.coords.latitude-0.002, position.coords.longitude-0.003],
		["SHOP 2",position.coords.latitude-0.004, position.coords.longitude+0.004],
		["SHOP 3",position.coords.latitude-0.00156,position.coords.longitude-0.008],
		["SHOP 4",position.coords.latitude-0.008,position.coords.longitude-0.006],
		["SHOP 5",position.coords.latitude-0.0003,position.coords.longitude+0.020],
    ["SHOP 6",position.coords.latitude-0.001,position.coords.longitude-0.001]
		];
var map = L.map('map').setView([position.coords.latitude-0.01, position.coords.longitude], 14);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
}).addTo(map);
for (var i = 0; i < locations.length; i++) {
			marker = new L.marker([locations[i][1],locations[i][2]])
				.bindPopup(locations[i][0])
				.addTo(map);
				L.marker([locations[i][1],locations[i][2]]).addTo(map)
                 .bindPopup(locations[i][0])
                    .openPopup();
		}
L.marker([position.coords.latitude, position.coords.longitude]).addTo(map)
    .bindPopup("I'm here !")
    .openPopup();

}
</script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

    <a href="mainpage.php"> Nearby shops</a> &ensp;

    <a href="preferedshops.php"> My prefered shops</a>
<?php 
require ('../Model/bdd.php');    
$query = "SELECT name FROM shops WHERE prefered ='0' ORDER BY distance";
$result = $conn->query($query); 
?>
           <h1 align="center">Nearby shops</h1>
        <?php
        //Fetch Data form database
        if($result->num_rows > 0){
         while($row = $result->fetch_assoc()){
         ?>
         <div class="container" >      
          <div class="card-deck" >
           <div class="card bg-primary" >
            <div class="card-body text-center" style='background-color: white'>
              <p class="card-text"> <?php echo "". $row["name"]. " " ; ?> </p>
              <img id="card-image" style ="width : 15%" src="https://image.flaticon.com/icons/svg/281/281663.svg" alt="SHOP" >

              <form method="post" action="../Controller/handler.php">
              <br>
                 <button type="submit" name="LIKE" id="LIKE" class="btn btn-success btn-flat" style='background-color: green' value=<?php echo "". $row["name"]. " " ; ?> >  LIKE</button>
                 <button type="submit" name="DISLIKE" id="DISLIKE" class="btn btn-danger btn-flat" style='background-color: red' value=<?php echo "". $row["name"]. " " ; ?> > DISLIKE</button>
              </form>
            </div>
           </div>   
          </div>
        </div>
         <?php
           }
           }
           else
            { echo "No shop available"; } ?>
</body>
</html> 