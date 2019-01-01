<!DOCTYPE html>
<html lang="en">
<head>
  <title>My prefered shops</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<?php require ('../Model/bdd.php');    
$query = "SELECT name FROM shops WHERE prefered ='1' ORDER BY distance";
$result = $conn->query($query); 
?>
              <a href="mainpage.php"> Nearby shops</a> &ensp;

               <a href="preferedshops.php"> My prefered shops</a>
               <br><br>
           <h1 align="center">My prefered shops</h1>

        <?php
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
               <button type="submit" name="DISLIKE" id="DISLIKE" class="btn btn-danger btn-flat" style='background-color: red' value=<?php echo "". $row["name"]. " " ; ?>"> DISLIKE</button> 
              </form>
            </div>
           </div>   
          </div>
        </div>
         <?php
           }
           }
           else
            { echo "No prefered shop"; } ?>
</body>
</html>