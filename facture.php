<?php
include('html2pdf/html2pdf.class.php');
ob_start();
session_start();
include 'traitement.php';
$numfacture=$_SESSION['cnf'];
$date= get_datefct($numfacture);
$cur= get_achat($numfacture);
$total=get_total($numfacture);
echo "<h1>Facture Numero : $numfacture</h1>";
echo "<h2>Date : $date</h2>";
echo "<h2>Liste Des Achats :</h2>";
echo "<table border='2' >";
echo "<tr>";
echo "<th>Code Accesoire</th>";
echo "<th>Image</th>";
echo "<th>Libelle</th>";
echo "<th>Prix U</th>";
echo "<th>Qte</th>";
echo "</tr>";
while($row=mysqli_fetch_row($cur)){
    echo "<tr>";
echo "<td>$row[0]</td>";
$image=getimage($row[0]);
echo "<td><img src='$image' width='100' height='100' /></td>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";

echo "</tr>";
}
echo "</table>";

echo "<h1>Total: $total DH</h1>";


$content=ob_get_clean();// fin du flux HTML
$html2pdf = new HTML2PDF('P','A4','fr');
$html2pdf->WriteHTML($content);
$html2pdf->Output('liste.pdf');