<?php
include 'traitement.php';
$p1=$_POST['ctype'];
$cur= question_ajax($p1);
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
