<?php 
require ('../Model/bdd.php'); 
$dislike = $_POST['DISLIKE'];
$like = $_POST['LIKE'];

if(isset($_POST['LIKE'])){
	$query = "UPDATE shops SET prefered = '1' WHERE name = '$like'";
$result = $conn->query($query); 

}

if(isset($_POST['DISLIKE'])){

$query = "UPDATE shops SET prefered = '0' WHERE name = '$dislike'";
$result = $conn->query($query); 

}
header('Location: ../View/mainpage.php');
?>