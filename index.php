<?php
if(!$_GET){
    header('Location:index.php?page=1');
}
$conexion= new mysqli('localhost','root','','db_practica');
if($conexion){
    // echo "bien";
}
$query="SELECT * FROM tbl_practica";
$ejecutar=mysqli_query($conexion,$query);
$filas=mysqli_num_rows($ejecutar);
// echo $filas;
$datos=2;
$paginador= round($filas/$datos);
$iniciar= ($_GET['page']-1)*$datos;
// echo $paginador;
$consutadata="SELECT * FROM tbl_practica LIMIT $iniciar,$datos";
$ejecutardata=mysqli_query($conexion,$consutadata);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?php

while($data=mysqli_fetch_array($ejecutardata)){
    echo $data['estudiante']." ".$data['materia']."<br>";     
}
?>
    
</head>
<style>
    ul,li{
        display: inline;
    }
</style>
<body>
    <ul>
        <?Php
         if($_GET['page']<=1){

        }else{
            echo "<li ><a href='index.php?page=".($_GET['page']-1)."'>Anterior</a></li>";
        }
          for($i=1; $i<=$paginador;$i++){
        ?>
   <li> <a href="index.php?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
   <?php
          }
 
        if($_GET['page']>=$paginador){

        }else{
            echo "<li ><a href='index.php?page=".($_GET['page']+1)."'>Siguiente</a></li>";
        }
        
        ?>
    </ul>
    
</body>
</html>
