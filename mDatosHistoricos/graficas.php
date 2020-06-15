<?php
 require_once('../conexion/conexionli.php');


$_fini = $_POST['fini'];
$_fend = $_POST['fend'];
$_grafica = $_POST['grafica'];



/*
  Se invoca a la funcion principal que se encarga de 
  ejecutar las funciones de graficas (Dependiendo de la grafica que se envíe desde el cliente (javascript)).
*/
main($_grafica, $_fini, $_fend, $conexionLi);




// Cuerpo de la funcion Principal (Agregar tantos "cases" por grafica como sean necesarios)
function main($grafica, $fIni ,$fEnd, $cnn){
     switch ($grafica) {
          case "G1":
               G1($fIni ,$fEnd, $cnn);
              break;
          case "G2":
               G2($fIni ,$fEnd, $cnn);
              break;
          case "G3":
               G3($fIni, $fEnd, $cnn);
          break;
      } 
}





// Funcion de la grafica 1 
function G1($fIni ,$fEnd, $cnn){
 
     $sql="CALL sp_positivos_vs_sospechosos ('".$fIni."','".$fEnd."')";     
     $result= mysqli_query($cnn , $sql);
     $data = array();
     
     while($registros = mysqli_fetch_assoc($result)){
          $data[] = $registros; //para graficas tipo pie
     }
     
     echo json_encode($data,JSON_NUMERIC_CHECK);

}


// Funcion de la grafica 2
function G2($fIni ,$fEnd, $cnn){

     $sql="CALL sp_casos_positivos ('".$fIni."','".$fEnd."')";     
     $result= mysqli_query($cnn , $sql);
     $data = array();
     
     while($registros = mysqli_fetch_assoc($result)){
        //$data[] = $registros; //para graficas tipo pie
         $data['X'][] = $registros['soloFecha']; //para graficas tipo line
         $data['Y'][] = $registros['cant'];      //para graficas tipo line
     }
     
     echo json_encode($data,JSON_NUMERIC_CHECK);

}



// Funcion de la grafica 3 (SIMPLEIFICADO USANDO JSON_ENCODE con revisión numerica)
function G3($fIni ,$fEnd, $cnn){

     $sql="CALL sp_casos_positivos ('".$fIni."','".$fEnd."')";     
     $result= mysqli_query($cnn , $sql);
     $data = array();
     
     while($registros = mysqli_fetch_assoc($result)){
          //$data[] = $registros; //para graficas tipo pie
          $data['X'][] = $registros['soloFecha']; //para graficas tipo line
          $data['Y'][] = $registros['cant'];      //para graficas tipo line
     }
     
     echo json_encode($data,JSON_NUMERIC_CHECK);
}
?>
