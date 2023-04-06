<?php
$link = mysqli_connect("localhost","root","","magazin") or die ("Nu se poate conecta la serverul MySQL");
echo"<br><br>";

//Preluarea cu metoda POST a parametrilor transmişi de către fişierul HTML
// spre scriptul PHP
$nume_produs=$_POST['nume_produs'];

// Interogare cu parametri
$query=mysqli_query($link, "select * from produse where nume_produs='$nume_produs'");
 //Calculeaza nr. de înregistrări returnate prin interogare
$nr_inreg=mysqli_num_rows($query);

if ($nr_inreg>0){
 echo "<center>";
 echo "S-au gasit " . $nr_inreg . " inregistrari";
 echo"</center>";
 //creează capul de tabel
 echo "<table border='2' align='center'>";
 echo"<tr bgcolor='silver'>";
 echo"<th>Id</th>";
 echo"<th>Nume produs</th>";
 echo"<th>Pret</th>";
 echo"<th>Cantitate</th>";
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

// Calculeza valoarea intregii cantitati a produsului respectiv
$query=mysqli_query($link, "select * from produse where nume_produs='$nume_produs'");
if ($query->num_rows > 0) {
  // afiseaza datele din fiecare rand din $result
  while($row = $query->fetch_assoc()) {
    $pret = $row['pret'];
    $cant = $row['cantitate'];
    $total =  $pret * $cant;
    echo "<center>";
    echo "Pret total: ".$total;
    echo "</center>";
  }
}
else {
  echo "0 rezultate";
}


// închide conexiunea cu serverul MySQL
mysqli_close($link);
?> 