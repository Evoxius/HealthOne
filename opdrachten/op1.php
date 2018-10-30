<html> 
    <head> 
        <title>Count Page Access</title> 
   </head> 
  <body> 
<?php 

    if (!isset($_COOKIE['count']))
    {
        ?> 
Welcome! This is the first time you have viewed this page. 
<?php 
        $cookie = 1;
        setcookie("count", $cookie);
    }
    else
    {
        $cookie = ++$_COOKIE['count'];
        setcookie("count", $cookie);
        ?> 
Je hebt deze pagina in totaal <?= $_COOKIE['count'] ?> keer bekeken. 

<?php  }// end else  ?> 
   </body> 
</html>