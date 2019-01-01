<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require ('../Model/bddconnection.php');

   $mailconnect = htmlspecialchars($_POST['mail']);
   $mdpconnect = md5($_POST['password']);

   if(!empty($mailconnect) AND !empty($mdpconnect))  
   {
      $requser = $bdd->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();

      if($userexist == 1) 
      {
         session_start();
         header("Location: ../View/mainpage.php");
      } 
      else 
      {
        echo '<script>';

        echo 'alert("Wrong mail or password")';

        echo '</script>';

        echo("<script>window.location = '../index.html';</script>");
         
      }
   } 
   else
    {
      $erreur = "Tous les champs doivent être remplis ";
   }
?>