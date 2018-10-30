<html> 
    <head> 
        <title>Count Page Access</title> 
   </head> 
  <body> 
<?php 

    $rad = (float) 5; 
    $cir = $rad * 2 * pi();
    $area = pow($rad, 2) * pi();

    echo "De omtrek van een cirkel met straal 5 is "; echo $cir; 
    echo "<br>";
    echo "De oppervlakte van een cirkel met straal 5 is: "; echo $area;  
?>
<?php  ?> 
   </body> 
</html>