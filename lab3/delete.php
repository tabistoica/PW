<!DOCTYPE html>

<div class="container">
    <form method="post">
        <input class="textbox" type="text" name="text" placeholder="Introduceti medie">
        <input class="button" type="submit" name="sub" value="OK">
    </form>
</div>

<?php
    $conn=mysqli_connect("localhost","root","","evidenta") or die("Eroare!");

    if(isset($_POST['sub'])){
        $x=$_POST['text'];
        $sql="delete from studenti where media<$x";
        $ok=false;
        if(mysqli_query($conn,$sql,MYSQLI_STORE_RESULT)){
            $ok=true;
        }
        else{
            $ok=false;
        }
        if($ok){
            $q="select * from studenti";
            $result=$conn->query($q);
            echo "<link rel=\"stylesheet\" href=\"form_style.css\">";
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
    }

?>

</html>