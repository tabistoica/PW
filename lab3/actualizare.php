<?php

$link = mysqli_connect("localhost","root","","evidenta") 
or die ("Nu se poate conecta la serverul MySQL");

$query = mysqli_query($link, "select * from studenti");

$nr_inreg = mysqli_num_rows($query);

if ($nr_inreg>0){
 while($row = $query->fetch_assoc()) {
    $nota1 = $row['nota1'];
    $nota2 = $row['nota2'];
    $media =  ($nota1 + $nota2)/2;

    $media="UPDATE studenti SET studenti.media=$media WHERE studenti.nota1=$nota1";
	if(mysqli_query($link,$media,MYSQLI_STORE_RESULT)){
        $ok=true;
      }
      else{
        $ok=false;
      }
   }
    if($ok==true){
      echo "<section class=\"section\"";
      echo "<h2 class=\"h2\">UPDATE SUCCESSFUL!</h2>";
      echo "</section>";
    }
    else{
      echo "<section class=\"section\"";
      echo "<h2 class=\"h2\">UPDATE UNSUCCESSFUL!</h2>";
      echo "</section>";
    }
}

mysqli_close($link);
?>