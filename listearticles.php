<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Liste des accessoires</h1>
        <?php
        include 'traitement.php';
        $cur= getaccesoires();
        echo "<table border='2'>";
        echo "<tr>";
        echo "<th>Code produit</th>";
        echo "<th>photo</th>";
        echo "<th>prix</th>";
        echo "<th>qte</th>";
        echo "</tr>";
        while($r=mysqli_fetch_row($cur)){
            echo "<tr>";
            echo "<form action='#' method='POST'>";
            echo "<td><input type='text' name='codeacc' readonly value='$r[0]'/></td>";
            echo "<td><img src='$r[1]' width='100' height='100'/></td>";
            echo "<td>$r[2]</td>";
            echo "<td><input type='text' value='' name='qte' /></td>";
            echo "<td><input type='submit' name='action' value='ajouter au panier' /></td>";
            echo "</form>";
            echo "</tr>";
        }
        echo "</table>";
        
        
        echo "<a href='contenup.php'><h1>Contenu du panier</h1></a>";
      
        // traitement ajouter au panier
      
        if(!empty($_POST['action'])){
            session_start();
            $code=$_POST['codeacc'];
            $qte=$_POST['qte'];
            $codec=$_SESSION['cnf'];
            $achat="$code/$codec/$qte";
            $_SESSION['cpa'][]=$achat;
            
        }
        
        
        
        
        
        
        ?>
    </body>
</html>
