<?php
     
    session_start();


     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "crudtareas";

     $conn = new mysqli($servername, $username, $password, $dbname);
     if($conn->connect_error)
     {
         echo "mi conexión con la bd falló";
         die("la conexión falló " . $conn->connect_error);
     }
     else
        {
            echo "conexión establecida entre php y mysql</br>";
        }
?>



