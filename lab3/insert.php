<!DOCTYPE html>

<div class="container">
    <form method="post">
        <input class="textbox" type="text" name="id" placeholder="Introduceti id">
        <input class="textbox" type="text" name="nume" placeholder="Introduceti nume">
        <input class="textbox" type="text" name="pren" placeholder="Introduceti pren">
        <input class="textbox" type="text" name="grupa" placeholder="Introduceti grupa">
        <input class="textbox" type="text" name="nota1" placeholder="Introduceti nota1">
        <input class="textbox" type="text" name="nota2" placeholder="Introduceti nota2">
        <input class="button" type="submit" name="sub" value="OK">
    </form>
</div>


<?php

$conn=mysqli_connect("localhost","root","","evidenta") or die("Eroare!");

if(isset($_POST['sub'])){
    $id=$_POST['id'];
    $nume=$_POST['nume'];
    $prenume=$_POST['pren'];
    $grupa=$_POST['grupa'];
    $n1=$_POST['nota1'];
    $n2=$_POST['nota2'];
    $media=($n1+$n2)/2;

    $sql="insert into studenti values($id,'$nume','$prenume',$grupa,$n1,$n2,$media)";
    $ok=false;
        if(mysqli_query($conn,$sql,MYSQLI_STORE_RESULT)){
            $ok=true;
        }
        else{
            $ok=false;
        }
    if($ok){
        echo "<center><b>INSERT SUCCESSFUL!</b><center>";
    }
    else{
        echo "<center><b>INSERT UNSUCCESSFUL!</b><center>";
    }
}

?>

</html>