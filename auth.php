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
        <form action="auth.php" method="POST">
            email : <input type="email" name="eml" value="" /><br/>
            password : <input type="password" name="pass" value="" />
            <input type="submit" value="Connexion" name="action" />
        
        </form>
        <a href="inscrit.php"><h2>Inscription</h2></a>
        <?php
        include 'traitement.php';
        if(!empty($_POST['action'])){
        $p1=$_POST['eml'];
        $p2=$_POST['pass'];
        $n= authentification($p1, $p2);
                 if($n!=0)
         {
                     
             session_start();
             $_SESSION['slog']=$p1;
             $_SESSION['spass']=$p2;
             $numf= getnumf();
             $_SESSION['cnf']= $numf;
              $code= get_codeclient($p1);
             
             $_SESSION['ccode']=$code;
             $panier=array();  // tableau des achats (panier)
             $_SESSION['cpa']= $panier;
             header("Location:listearticles.php");  
       
                  
                     
           }           
         else{
             echo "     <h1 style='color:red'>Login ou pass incorrect !!!</h1>";   }    }

        
        ?>
    </body>
</html>
