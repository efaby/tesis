<?php

include("estructura/conecta.php");

$q=$_POST['q'];
echo $q;


$sql="SELECT * FROM clientes where nombre LIKE '".$q."%' or apellido LIKE '".$q."%' and id_cliente in (select id_cliente from reparacion) ";

$res= mysql_query($sql) or die(mysql_error());
$totalRows_res = mysql_num_rows($res);


if($totalRows_res==0){

 echo '<br><b>No hay sugerencias. Por favor ingrese datos del nuevo cliente en el men&uacute; cliente </b>';

}else{


 while($row_res=  mysql_fetch_array($res))
 {

  echo '<div class="sugerencias" onclick="myFunction2('.$row_res["id_cliente"].')">'.$row_res['nombre']." ".  $row_res['apellido'].'</div>';

 }


}

?>