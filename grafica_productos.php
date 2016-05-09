<?php
include 'funciones.php';
function getValores($eje){
	$query="SELECT nombre, COUNT(*) as num FROM compras GROUP BY nombre ORDER BY num desc";
	
 if($resultset=getSQLResult($query)){

        $arr=array();

        $s=0;

        while($row = $resultset->fetch_assoc()){


            if($eje==1){
                $arr[$s]=$row['nombre'];

                $s+=1;



            }else{
                $arr[$s]=(int)$row['num'] ;
                $s+=1;

            }

        }
 }
    return $arr;
}    
    $arreglo1=getValores(2);
    $arr2=getValores(1);
    
      $visitas = array( 'name' => 'Por Más vendido' , 'data' => $arreglo1) ;
      //$unicas = array( 'name' => 'Cumplimiento de Preguntas' , 'data' => array(21,278,203,370,810,213,0,134,1991,3122,2870,3655,6400,5818,5581,8529,8261));
      //$pagVistas = array( 'name' => 'Cumplimiento por maquina' , 'data' => array(1064,1648,1040,1076,2012,397,0,325,3732,6067,5226,6482,11503,11937,9751,16061,15643)) ;
      
      $entrenamientos = array();
      array_push( $entrenamientos, $visitas);
      //array_push( $entrenamientos, $unicas);
      //array_push( $entrenamientos, $pagVistas);
      
      // Se hace un array para ponerlo en el eje de las 'X'
      $semanas = $arr2;
include 'templates/header_graficas.php'; ?>

</div>
    <div class="container">
		<div id="container" style="width: 100%; height: 500px; margin: 0 auto"></div>
		</div>	
	
<?php include 'templates/footer.php'; ?>