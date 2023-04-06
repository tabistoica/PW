<?php
$link = mysqli_connect("localhost","angajat","","test","PERSONAL") or die ("Nu se poate conecta la serverul MySQL");
echo"<br><br>";

//Preluarea cu metoda POST a parametrilor transmişi de către fişierul HTML
// spre scriptul PHP
$cnp=$_POST['cnp'];

// Interogare cu parametri
$query=mysqli_query($link, "select * from resurse_umane where cnp='$cnp'");
 //Calculeaza nr. de înregistrări returnate prin interogare
$nr_inreg=mysqli_num_rows($query);

if ($nr_inreg>0){
 echo "<center>";
 echo "S-au gasit " . $nr_inreg . " inregistrari";
 echo"</center>";
 //creează capul de tabel
 echo "<table border='2' align='center'>";
 echo"<tr bgcolor='silver'>";
 echo"<th>CNP</th>";
 echo"<th>Nume</th>";
 echo"<th>Prenume</th>";
 echo"<th>Salar</th>";
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