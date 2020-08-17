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
        <h1>Contenu du panier </h1>
        <?php
        include 'traitement.php';
        session_start();
        $numf=$_SESSION['cnf'];
        $panier=$_SESSION['cpa'];
        $total=0;  
             echo "<table border='2'>";
        echo "<tr>";
                          echo "<th>Code produit</th>";
                          echo "<th>prix produit</th>";
                          echo "<th>image</th>";
                          echo "<th>Qauntité commandée</th>";
      echo "</tr>";  
           for ($i = 0; $i < count($panier); $i++)
                             {
                       $achat=$panier[$i];
                       $exp= explode("/", $achat);
                       $code_article=$exp[0];
 $prix_article= getprix($code_article);
 $image= getimage($code_article);
                             $qte=$exp[2]; 
                             
                             $total+=$prix_article*$qte;                                                                                                    
        
        echo "<tr>";
echo "<form action='contenup.php'   method='POST'>";                                                                                                    
 echo "<td> <input type='text' readonly name='ca' value='$code_article' /></td>";
 echo "<td>$prix_article</td>";
 echo "<td><img src='$image' width='100' height='100'/></td>";
  echo "<td><input type='text' name='qte' value='$qte' /></td>";
echo "<td><input type='submit' name='modifier' value='Modifier' /></td>";
 echo "<td><input type='submit' name='supprimer' value='Supprimer' /></td>";
echo "</form>";
    echo "</tr>";
                             }
   echo "</table>";  
                             
  echo "<h1>Total :$total DH</h1>";  
  
  if(!empty($_POST['modifier'])){
      $code_af=$_POST['ca'];
      $qte_nv=$_POST['qte'];
      for ($i = 0; $i < count($panier); $i++) {
          $achat=$panier[$i];
          $code_ap=explode("/",$achat)[0];
          if($code_af==$code_ap){
              $achat_nv="$code_af/$numf/$qte_nv";
              $_SESSION['cpa'][$i]=$achat_nv;
              header("location:contenup.php");
          }
      }
      
  }
          if(!empty($_POST['supprimer'])){
              $code_af=$_POST['ca'];
              for($i=0;$i<count($panier);$i++){
                  $achat=$panier[$i];
                  $code_ap=explode("/",$achat)[0];
                  if($code_af==$code_ap){
            unset($_SESSION['cpa'][$i]) ;
      $_SESSION['cpa']= array_values($_SESSION['cpa']);
      header("Location:contenup.php");

                  }
              }
          }
              
              
          
  
  
  
  
  
  

                             ?>
    <a href="listearticles.php"><h1>autres achats</h1></a>
    <a href="contenup.php?actionv=v"><h1>Valider la commande</h1></a>
    <?php 
if(!empty($_GET['actionv'])){
    
    // insertion dans la table comande (code com +code cli+date )
    $codc=$_SESSION['ccode'];
    $codec=$_SESSION['cnf'];
    $a= date('Y');
    $m=date('m');
    $d=date('d');
    $datef="$a-$m-$d";
    $n= insert_cmd($codec, $codc, $datef);
$nbrachat=count($panier);
    $ct=0;
    for ($i = 0; $i < count($panier); $i++) {
        $achat=$panier[$i];
        $ta= explode('/', $achat);
        $p1=$ta[0];
        $p2=$ta[1];
        $p3=$ta[2];
        $n2=insert_lignecmd($p1, $p2, $p3);
        $ct+=1;
    }
    if($n==1 && $ct==$nbrachat){
        
        echo "<a href=facture.php ><h2> imprimer la facture</h2></a>";
    }
}
   
    ?>
    </body>
</html>
