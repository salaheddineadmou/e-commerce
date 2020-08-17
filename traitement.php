<?php

function lister_partype(){
    $cn= mysqli_connect('localhost', 'root', '', 'site_ecommerce');
    $req="select a.*,t.libeele_type from accessoires a ,type_accessoire t where a.code_type=t.code_type ";
$cur= mysqli_query($cn,$req) or die(mysqli_error($cn));
mysqli_close($cn);
return $cur;
    
}
function charger_combo(){
    $cn= mysqli_connect('localhost', 'root', '', 'site_ecommerce');
    $req="select * from type_accessoire  ";
$cur= mysqli_query($cn,$req) or die(mysqli_error($cn));
mysqli_close($cn);
return $cur;
}
function question_ajax($p1){
    $cn= mysqli_connect('localhost', 'root', '', 'site_ecommerce');
$req="select * from accessoires where code_type='$p1'  ";
$cur= mysqli_query($cn,$req) or die(mysqli_error($cn));
mysqli_close($cn);
return $cur;

}
function add_client($p1,$p2,$p3,$p4,$p5,$p6){
    $cn= mysqli_connect('localhost', 'root', '', 'site_ecommerce');
    $req="insert into client(nom_client,prenom_client,adresse,tel,email,pass) values('$p1','$p2','$p3','$p4','$p5','$p6') ";
$nb= mysqli_query($cn,$req) or die(mysqli_error($cn));
mysqli_close($cn);
return $nb;
}
function authentification($p1,$p2)
{ 
$cn=mysqli_connect('localhost','root','','site_ecommerce');
 $req="select * from client where email='$p1' and pass='$p2' ";
 $cur= mysqli_query($cn, $req)  or die(mysqli_error($cn));
   $n= mysqli_num_rows($cur) ;
   mysqli_close($cn);
    return $n;
}
function getnumf()
{
$cn=mysqli_connect('localhost','root','','site_ecommerce');
 $numf=0;
 $req="select max(code_cmd) from command ";
 $cur= mysqli_query($cn, $req)  or die(mysqli_error($cn));
 while ($row = mysqli_fetch_row($cur)) {
   $numf=$row[0]+1;  
 }
   mysqli_close($cn);
   return $numf;
}
function getaccesoires()
{
 $cn=mysqli_connect('localhost','root','', 'site_ecommerce');
 $req="select acc_code,photo,prix_acc from accessoires ";
 $cur= mysqli_query($cn, $req)  or die(mysqli_error($cn));
   mysqli_close($cn);
   return $cur;
}
function getprix($code){
    $prix=0;
    $cn=mysqli_connect('localhost','root','', 'site_ecommerce');
 $req="select prix_acc from accessoires where acc_code='$code' ";
 $cur= mysqli_query($cn, $req)  or die(mysqli_error($cn));
   while($r=mysqli_fetch_row($cur)){
       $prix=$r[0];
   }
 mysqli_close($cn);
   return $prix;
}
function getimage($code){
   $im="";
    $cn=mysqli_connect('localhost','root','', 'site_ecommerce');
 $req="select photo from accessoires where acc_code='$code' ";
 $cur= mysqli_query($cn, $req)  or die(mysqli_error($cn));
   while($r=mysqli_fetch_row($cur)){
       $im=$r[0];
   }
 mysqli_close($cn);
   return $im;
}
function insert_cmd($p1,$p2,$p3){
     $cn=mysqli_connect('localhost','root','', 'site_ecommerce');
 $req="insert into command values('$p1','$p2','$p3') ";
 $n= mysqli_query($cn, $req)  or die(mysqli_error($cn));
 mysqli_close($cn);
   return $n;
    
}
function insert_lignecmd($p1,$p2,$p3){
     $cn=mysqli_connect('localhost','root','', 'site_ecommerce');
 $req="insert into ligne_command values('$p1','$p2','$p3') ";
 $n= mysqli_query($cn, $req)  or die(mysqli_error($cn));
 mysqli_close($cn);
   return $n;
    
}
function get_codeclient($p){
    $code=0;
    $cn=mysqli_connect('localhost','root','', 'site_ecommerce');
 $req="select cli_code from client where email='$p' ";
 $cur= mysqli_query($cn, $req)  or die(mysqli_error($cn));
   while($r=mysqli_fetch_row($cur)){
       $code=$r[0];
   }
 mysqli_close($cn);
   return $code;
    
}
function get_datefct($p){
    $date="";
    $cn=mysqli_connect('localhost','root','', 'site_ecommerce');
 $req="select cmd_date from command where code_cmd='$p' ";
 $cur= mysqli_query($cn, $req)  or die(mysqli_error($cn));
   while($r=mysqli_fetch_row($cur)){
       $date=$r[0];
   }
 mysqli_close($cn);
   return $date;
    
}
function get_achat($p){
    
    $cn=mysqli_connect('localhost','root','', 'site_ecommerce');
 $req="select l.acc_code,a.libelle_acc,a.prix_acc,l.qte from ligne_command l,accessoires a where a.acc_code=l.acc_code and l.code_cmd='$p'";
 $cur= mysqli_query($cn, $req)  or die(mysqli_error($cn));
  
 mysqli_close($cn);
   return $cur;
    
}
function get_total($p){
    $total=0;
    $cn=mysqli_connect('localhost','root','', 'site_ecommerce');
 $req="select a.prix_acc,l.qte from accessoires a ,ligne_command l where a.acc_code=l.acc_code and l.code_cmd='$p'";
 $cur= mysqli_query($cn, $req)  or die(mysqli_error($cn));
  while($r=mysqli_fetch_row($cur)){
      $total=$total+($r[0]*$r[1]);
  }
 mysqli_close($cn);
   return $total;
    
}