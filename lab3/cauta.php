<?php
$link = mysqli_connect("localhost","root","","evidenta") or die ("Nu se poate conecta la serverul MySQL");
echo"<br><br>";

//Preluarea cu metoda POST a parametrilor transmişi de către fişierul HTML
// spre scriptul PHP
$media=$_POST['media'];

// Interogare cu parametri
$query=mysqli_query($link, "select * from studenti where media>=$media");
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
 echo"<th>Nume</th>";
 echo"<th>Prenume</th>";
 echo"<th>Grupa</th>";
echo"<th>Nota1</th>";
echo"<th>Nota2</th>";
echo"<th>Media</th>";
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

// închide conexiunea cu serverul MySQL
mysqli_close($link);
?> 