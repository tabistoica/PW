<!DOCTYPE html>

<?php
$conn=mysqli_connect("localhost","root","","evidenta") or die("Eroare!");
?>

<div class="container">
<?php
       if(isset($_POST["button_restante"]))
       {
           $q="select * from studenti where media<5";
           $result=$conn->query($q);
           echo "<div class=\"container\">";
           echo "<table class=\"table\">";
           echo "<thead>";
           echo "<tr>";
           echo "<th>id</th>";
           echo "<th>nume</th>";
           echo "<th>prenume</th>";
           echo "<th>grupa</th>";
           echo "<th>nota1</th>";
           echo "<th>nota2</th>";
           echo "<th>medie</th>";
           echo "</tr>";
           echo "</thead>";
           echo "<tbody>";
           if($result->num_rows>0){
               while($a=$result->fetch_row()){
                 echo "<tr>";
                 foreach ($a as $key) {
                   echo "<td>$key</td>";
                 }
                 echo "</tr>";
               }
             }
           echo "</tbody>";
           echo "</table>";
           echo "</div>";
       }
       
    ?>
    

</html>