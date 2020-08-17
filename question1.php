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
        <script src="jquery.js"></script>
        <script laguage="JavaScript">
        
        $(function(){
  
            $('#ic').change(function (){
                
    var ct=$('#ic').val();
    $.ajax({ 
     type: "POST", 
     url: "server.php", 
     data: 'ctype=' + ct
  }).done(function(msg){ 
  $('#ir').html(msg); 
   
  });                        
            })           
        });
  
        </script>

    </head>
    <body>
        
     <h1>Liste des accessoires par type</h1>
     
         
         <?php
        include 'traitement.php';
        $cur= lister_partype();
        echo "<table border='2'>";
        echo "<tr>";
        while($f=mysqli_fetch_field($cur)){
            echo "<th>$f->name</th>";
        }
        echo "</tr>";
        while($r=mysqli_fetch_row($cur)){
            echo "<tr>";
            for($i=0;$i<count($r);$i++){
                echo "<td>$r[$i]</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>
     <h2>question 1_2</h2>
     <?php
     $cur1= charger_combo();
     ?>
     choisir un type : <select id="ic" name="cbm"><?php while($row=mysqli_fetch_row($cur1)){
         echo "<option value='$row[0]'>$row[1]</option>";
     }  ?>
     </select>
       <div id="ir"></div>
    </body>
</html>
