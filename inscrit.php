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
        <h1>Inscription</h1>
        <form action="inscrit.php" method="POST">
            nom : <input type="text" name="nom" value="" /><br/>
            prenom : <input type="text" name="prenom" value="" /><br/>
            adresse : <textarea name="adr"></textarea><br/>
            telephone : <input type="text" name="tel" value="" /><br/>
            email : <input type="text" name="email" value="" /><br/>
            password : 
            <input type="text" name="pass" value="" /><br/>
            <input type="submit" value="inscription" name="action" />
        </form>
        
        <?php
        include 'traitement.php';
        if(!empty($_POST['action'])){
            $p1=$_POST['nom'];
            $p2=$_POST['prenom'];
            $p3=$_POST['adr'];
            $p4=$_POST['tel'];
            $p5=$_POST['email'];
            $p6=$_POST['pass'];
            $nb= add_client($p1, $p2, $p3, $p4, $p5, $p6);
        if($nb!=0){
            echo "Merci pour votre inscription";
        }
            
        }
        ?>
    </body>
</html>
