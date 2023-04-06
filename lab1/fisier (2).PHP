<!DOCTYPE html>

<div class="container">
    <form method="post">
        <input class="textbox" type="text" name="id" placeholder="Introduceti id">
        <input class="textbox" type="text" name="nume_produs" placeholder="Introduceti nume produs">
        <input class="textbox" type="text" name="stoc" placeholder="Introduceti stoc">
        <input class="textbox" type="text" name="pret_unitar" placeholder="Introduceti pret unitar">
        <input class="textbox" type="text" name="observatii" placeholder="Introduceti observatii">
        <input class="button" type="submit" name="sub" value="OK">
    </form>
</div>


<?php

$conn=mysqli_connect("localhost","root","","MAGAZIN_ONLINE") or die("Eroare!");

if(isset($_POST['sub'])){
    $id=$_POST['id'];
    $nume_produs=$_POST['nume_produs'];
    $stoc=$_POST['stoc'];
    $pret_unitar=$_POST['pret_unitar'];
   $observatii=$_POST['observatii'];

    $sql="insert into items values($id,'$nume_produs','$stoc','$pret_unitar','$observatii')";
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

$query=mysqli_query($conn, "select * from studenti");
 //Calculeaza nr. de înregistrări returnate prin interogare
$nr_inreg=$query->num_rows;

if ($nr_inreg>0){
 echo "<center>";
 echo "S-au gasit " . $nr_inreg . " inregistrari";
 echo"</center>";
 //creează capul de tabel
 echo "<table border='2' align='center'>";
 echo"<tr bgcolor='silver'>";
 echo"<th>Id</th>";
 echo"<th>Nume_produs</th>";
 echo"<th>Stoc</th>";
 echo"<th>Pret_unitar</th>";
echo"<th>Observatii</th>";
 echo"</tr>";
 // afişează înregistrările găsite în urma interogarii
 while($row=mysqli_fetch_row($query)){
 echo"<tr>";
 foreach ($row as $value){
 echo "<td>$value</td>";
 }
 echo"<?tr>";
 }
 echo"</table>"; 
}

else{
 echo"<center>";
 echo "Nu s-a gasit nici o inregistrare!!!";
 echo"</center>"; }


?>

</html>