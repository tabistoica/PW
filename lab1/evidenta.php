<?php
$link = mysqli_connect("localhost","root","","BAZA") or die ("Nu se poate conecta la serverul MySQL");
echo"<br><br>";

// Interogare cu parametri
$query=mysqli_query($link, "select * from EVIDENTA");
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
 echo"<th>Varsta</th>";
 echo"<th>Localitate</th>";
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