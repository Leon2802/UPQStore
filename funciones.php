<?php 

header ("Content-Type:text/html; charset=utf-8");

 
  
function ejecutarSQLCommand($commando){
 

  $mysqli=new mysqli("localhost","root","","upqstore");
  //$mysqli=new mysqli("localhost","sistemascm","Riveredge2507","centurymold");
  
  $mysqli->query("SET NAMES 'utf8'");
//Revisar Conexion

  if($mysqli->connect_error){
    printf("Connect Failed :%s\n", $mysqli->connect_error);
    exit();

  }

  if($mysqli->multi_query($commando)){
   
    if($resultset=$mysqli->store_result()){
      while($row=$resultset->fetch_array(MYSQLI_BOTH)){
      }
      $resultset->free();
    }
  }


  $mysqli->close();
  

}
function getSQLResult($commando){
  
  $mysqli=new mysqli("localhost","root","","upqstore");
  //$mysqli=new mysqli("localhost","sistemascm","Riveredge2507","centurymold");
  
  $mysqli->query("SET NAMES 'utf8'");
  
  if($mysqli->connect_error){
    printf("Connect Failed :%s\n", $mysqli->connect_error);
    exit();
  }
  
  
  
	if(!$result = $mysqli->query($commando)){
		die('{"resp": "There was an error running the query [' . $mysqli->error.']"}'.$commando);
	}
  
  if($mysqli->multi_query($commando)){
    return $mysqli->store_result();
    
  }
  $mysqli->close();
  

}

function getUsuario($id){
 $query="SELECT `user`  FROM usuarios where id_user=".$id." ;";
 
  
 if($resultset=getSQLResult($query)){


        while($row = $resultset->fetch_assoc()){
                $arr=$row['user'];
        }
 }
    return $arr; 

}
function getporusuario($eje){
  $query="SELECT id_usuario, COUNT(*) as num FROM compras GROUP BY id_usuario ORDER BY num desc";
  
 if($resultset=getSQLResult($query)){

        $arr=array();

        $s=0;

        while($row = $resultset->fetch_assoc()){


            if($eje==1){
              $arr[$s]=getUsuario($row['id_usuario']);

                $s+=1;



            }else{
                $arr[$s]=(int)$row['num'] ;
                $s+=1;

            }

        }
 }
    return $arr;
}
?>