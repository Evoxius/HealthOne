<html> 
    <head> 
        <title>Count Page Access</title> 
   </head> 
  <body> 
<?php 

$my_rand_strng = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -2);
echo "Een willekeurige postcode is:  "; echo (rand(10,100)); echo (rand(10,100)); echo "  ";  echo $my_rand_strng;

        ?> 
<?php  ?> 
   </body> 
</html>