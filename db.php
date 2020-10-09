<?php
 $connection=mysqli_connect("localhost","root","","kannan");

 if(!$connection)
 {
     echo"<script>alert('connection failed'); window.location.href='index.php';</script>";
 }

?>