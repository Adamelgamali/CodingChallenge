<?php
require ('../Model/bddconnection.php');

         $mail = htmlspecialchars($_POST['mail']);
         $password = md5($_POST['mdp']);


         $reqmail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
         $reqmail->execute(array($mail));
         $mailexist = $reqmail->rowcount();
         if ($mailexist == 0) 
         {

            $reqbdd=$bdd->prepare('INSERT INTO users(email,password) VALUES (?,?)');
                
            $reqbdd->execute(array($mail, $password));
            $reqbdd->CloseCursor();      
         }
         else
         {
            echo '<script>';

        echo 'alert("Email already used")';

        echo '</script>';

        echo("<script>window.location = '../index.html';</script>");
         }
header("Location: ../View/mainpage.php");
?>
   