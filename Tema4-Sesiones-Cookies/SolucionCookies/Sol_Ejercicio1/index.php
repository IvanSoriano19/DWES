<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    	$color="";
    
        if(isset($_REQUEST["colores"])){
            $color=strip_tags($_REQUEST["colores"]);
            setcookie("colores", "$color",time()+ 5);
            header("location:comprobar.php");
        }
           
   
    ?>
      
   <br>   
 <form action="" method="POST">     
<select name="colores">    
<option value="green">Verde</option>    
<option value="blue">Azul</option>    
<option value="red">Rojo</option>   
  
</select><br>  
<input type="submit" value="Enviar datos!" > 
</form>
</body>
</html>