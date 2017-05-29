<?php
class profesor{
    private $db;
 
    function __construct($DB_con){
      $this->db = $DB_con;
    }

                  public function getAnunciosCoor(){
                try
  { 
  
   $stmt = $this->db->prepare("SELECT descripcion, fecha_final FROM anuncio
    WHERE id_curso = 0 ORDER by (fecha_final) desc");
   $stmt->execute(array());
   
  // $count = $stmt->rowCount();
       $jsonData = array();
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $jsonData[] = $row;
            // echo gettype($row), "\n";
            
   
       }
       //print_r(json_encode($jsonData, JSON_PRETTY_PRINT));
       echo json_encode($jsonData);
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }

    }
               public function getAVG($id,$nrc){
                try
  { 
  
   $stmt = $this->db->prepare("SELECT AVG(inscripcion.calificacion) AS promedio FROM curso inner JOIN inscripcion on curso.nrc = inscripcion.id_curso where 
   curso.id_profesor = :id AND curso.nrc = :nrc");
   $stmt->execute(array(":id"=>$id, ":nrc"=>$nrc));
   
  // $count = $stmt->rowCount();
       $jsonData = array();
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $jsonData[] = $row;
            // echo gettype($row), "\n";
            
   
       }
       //print_r(json_encode($jsonData, JSON_PRETTY_PRINT));
       echo json_encode($jsonData);
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }

    }
           public function getNRCPY($id,$periodo,$year){
                try
  { 
  
   $stmt = $this->db->prepare("SELECT curso.nrc, materia.nombre from curso inner join periodo on curso.periodo = periodo.id
    inner join materia on curso.id_materia = materia.id WHERE periodo.ciclo = :periodo AND periodo.year = :year AND curso.id_profesor = :id");
    $periodo2 = " ".$periodo." ";
   $stmt->execute(array(":id"=>$id, ":periodo"=>$periodo2, ":year"=>$year));
   
  // $count = $stmt->rowCount();
       $jsonData = array();
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $jsonData[] = $row;
            // echo gettype($row), "\n";
            
   
       }
       //print_r(json_encode($jsonData, JSON_PRETTY_PRINT));
       echo json_encode($jsonData);
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }

    }
         public function getClases($id){
                try
  { 
  
   $stmt = $this->db->prepare("SELECT horarios.hora, horarios.dias, materia.nombre FROM horarios,curso,materia WHERE horarios.nrc_curso = curso.nrc and curso.id_materia = materia.id and curso.id_profesor =:id");
   $stmt->execute(array(":id"=>$id));
   
  // $count = $stmt->rowCount();
       $jsonData = array();
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $jsonData[] = $row;
            // echo gettype($row), "\n";
            
   
       }
       //print_r(json_encode($jsonData, JSON_PRETTY_PRINT));
       echo json_encode($jsonData);
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }

    }
     public function getAsesorias($id){
                try
  { 
  
   $stmt = $this->db->prepare("SELECT asesorias.id_profesor, asesorias.hora, asesorias.dia, asesorias.tipo FROM asesorias, profesor WHERE asesorias.id_profesor = profesor.id and asesorias.id_profesor =:id");
   $stmt->execute(array(":id"=>$id));
   
  // $count = $stmt->rowCount();
       $jsonData = array();
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $jsonData[] = $row;
            // echo gettype($row), "\n";
            
   
       }
       //print_r(json_encode($jsonData, JSON_PRETTY_PRINT));
       echo json_encode($jsonData);
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }

    }
    public function getProfesores(){
                try
  { 
  
  $stmt = $this->db->prepare("SELECT id,nombre,materno,paterno FROM `profesor` WHERE 1");
   $stmt->execute();

       $jsonData = array();
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $jsonData[] = $row;
            // echo gettype($row), "\n";
            
   
       }
       //print_r(json_encode($jsonData, JSON_PRETTY_PRINT));
       echo json_encode($jsonData);
    
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }

    }
    public function getDatos($id){
                try
  { 
  
   $stmt = $this->db->prepare("SELECT * FROM profesor  WHERE id=:id");
   $stmt->execute(array(":id"=>$id));
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
  // $count = $stmt->rowCount();
   echo json_encode($row);
    
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }

    }

    public function editarProfesor($id,$nombre,$paterno,$materno,$email,$password,$num_cub,$ext_tel){
                    try
  { 
   $stmt = $this->db->prepare("UPDATE profesor SET nombre=:nombre, paterno=:paterno, materno=:materno, email=:email, password=:password, 
   num_cub=:num_cub, ext_tel=:ext_tel WHERE id=:id");
	        $stmt->bindParam(":nombre",$nombre,PDO::PARAM_STR);
			    $stmt->bindParam(":paterno",$paterno,PDO::PARAM_STR);
			    $stmt->bindParam(":materno",$materno,PDO::PARAM_STR);
          $stmt->bindParam(":email",$email,PDO::PARAM_STR);
			    $stmt->bindParam(":password",$password,PDO::PARAM_STR);
          $stmt->bindParam(":num_cub",$num_cub,PDO::PARAM_INT);
          $stmt->bindParam(":ext_tel",$ext_tel,PDO::PARAM_INT);
          $stmt->bindParam(":id",$id,PDO::PARAM_STR);

  		if($stmt->execute())
				{
					echo "editado";
				}
				else
				{
					echo "error";
				}
      return $stmt;
                  
  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
    }
    
             public function registrar($id,$nombre,$paterno,$materno,$correo,$password,$num_cub,$ext_tel){
       try
       {
            $stmt = $this->db->prepare("SELECT * FROM profesor WHERE id=:id");
			$stmt->execute(array(":id"=>$id));
			$count = $stmt->rowCount();
           
           	if($count==1){
				

        
			$stmt = $this->db->prepare("UPDATE profesor set id=:id, nombre=:nombre,paterno=:paterno,materno=:materno,email=:correo,password=:password,num_cub=:num_cub,ext_tel=:ext_tel,tipo=1 where id=:id");
			$stmt->bindParam(":id",$id);
			$stmt->bindParam(":nombre",$nombre);
			$stmt->bindParam(":paterno",$paterno);
			$stmt->bindParam(":materno",$materno);
            $stmt->bindParam(":correo",$correo);
            $stmt->bindParam(":password",$password);
			$stmt->bindParam(":num_cub",$num_cub);
            $stmt->bindParam(":ext_tel",$ext_tel);
				if($stmt->execute())
				{
					echo "registrado";
				}
				else
				{
					echo "No se puede ejecutar !";
				}
                
                return $stmt;
			
			}
			else{
				
				echo "1"; //  not available
			}
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    public function registrar_curso($id,$nrc,$materia,$seccion,$dias,$hora,$periodo,$fecha,$fecha2,$dia1,$dia2,$dia3){
//variables
      $count=0;
      $ct2=0;

      try{
//obtiene el maximo/ultimo id  de sección y le suma 1 .-. ???
      $stmt2 = $this->db->prepare("select max(id) from seccion");
      $stmt2->execute();
      $maxsec=$stmt2->fetch();
      $maxsec=$maxsec[0]+1;
//obtiene los nrc de los cursos del profesor
      $sql = $this->db->prepare("SELECT nrc FROM curso WHERE id_profesor= :prof");
      $sql->bindParam(":prof",$prof);
      $sql->execute();

      while ($row=$sql->fetch()) {
        //obtiene dias, hora de horarios del nrc del curso ???
        $stmtv21 = $this->db->prepare("select dias,hora from horarios where nrc_curso =:nrc and
                                      dias='lunes' and hora='$hora'");
        $stmtv21->bindParam(":nrc",$nrc);

      if($stmtv21->execute()){
          $count = $stmtv21->rowCount();
         // echo $count;
      }
        else
          $count=0;  

      }


        //no se empalma
    if($count==0){
      //separa la cadena periodo
      $per=explode("-",$periodo);

      $st = $this->db->prepare("select * from periodo where ciclo=:ciclo and year=:year");

      if($st->execute(array(':ciclo'=>$per[0], ':year'=>$per[1])))
      {
        $ct2 = $st->rowCount();
          $cn=$st->fetch(PDO::FETCH_ASSOC);
        
      $maxper=$cn['id'];
      //echo "idperiodo=".$maxper;
      }else
        $ct2=0;

    

      

       // echo "Este es el contador".$ct2;
       //no hay mismo periodo
      if($ct2 == 0){
      $stmt7 = $this->db->prepare("INSERT INTO periodo(ciclo,year) VALUES(:ciclo,:year)");
      $stmt7->bindParam(":ciclo",$per[0]);
      $stmt7->bindParam(":year",$per[1]);
        
        if($stmt7->execute())
        {
        
        //$maxper=$cn[0];
        $maxper = $this->db->lastInsertId();
       // echo $maxper;

        }
        else
        {
         // echo "No se puede ejecutar !";
        }
        

         $stmt8 = $this->db->prepare("INSERT INTO seccion(id,secc) VALUES(:id,:seccion)");
      $stmt8->bindParam(":id",$maxsec);
      $stmt8->bindParam(":seccion",$seccion);
      
        if($stmt8->execute())
        {
        //  echo " Seccion registrada";
        }
        else
        {
          //echo "No se puede ejecutar !";
        }




        
      $stmt3 = $this->db->prepare("INSERT INTO curso(nrc,id_materia,seccion,id_profesor,periodo) VALUES(:nrc,:id_materia,:seccion,:id_profesor,:periodo)");
      $stmt3->bindParam(":nrc",$nrc);
      $stmt3->bindParam(":id_materia",$materia);
      $stmt3->bindParam(":seccion",$maxsec);
      $stmt3->bindParam(":id_profesor",$id);
      $stmt3->bindParam(":periodo",$maxper);
        if($stmt3->execute())
        {
        //  echo " curso registrado";
        }
        else
        {
         // echo "No se puede ejecutar !";
        }
              



    


    if (strcasecmp($dias[1], "martes")==0){
      switch ($hora) {
        case "7:00":
          $horas="8:00";
          break;
        case "9:00":
          $horas="10:00";
          break;
        case "11:00":
          $horas="12:00";
          break;
        case "13:00":
          $horas="14:00";
          break;
        case "15:00":
          $horas="16:00";
          break;
        case "17:00":
          $horas="18:00";
          break;

        default:
          $horas=$hora;
                    break;
      }
    }
    else
      $horas=$hora;








    
      $stmt4 = $this->db->prepare("INSERT INTO horarios(salon,dias,hora,nrc_curso,fecha_inicio,fecha_final) VALUES(:salon,:dias,:hora,:nrc_curso,:fecha_inicio,:fecha_final)");
      $stmt4->bindParam(":salon",$dia1);
      $stmt4->bindParam(":dias",$dias[0]);
      $stmt4->bindParam(":hora",$horas);
      $stmt4->bindParam(":nrc_curso",$nrc);
      $stmt4->bindParam(":fecha_inicio",$fecha);
      $stmt4->bindParam(":fecha_final",$fecha2);
        if($stmt4->execute())
        {
         // echo "horario 1 registrado";
        }
        else
        {
         // echo "No se puede ejecutar !";
        }
      



      $stmt5 = $this->db->prepare("INSERT INTO horarios(salon,dias,hora,nrc_curso,fecha_inicio,fecha_final) VALUES(:salon,:dias,:hora,:nrc_curso,:fecha_inicio,:fecha_final)");
      $stmt5->bindParam(":salon",$dia2);
      $stmt5->bindParam(":dias",$dias[1]);
      $stmt5->bindParam(":hora",$hora);
      $stmt5->bindParam(":nrc_curso",$nrc);
      $stmt5->bindParam(":fecha_inicio",$fecha);
      $stmt5->bindParam(":fecha_final",$fecha2);
        if($stmt5->execute())
        {
         // echo "horario 2 registrado";
        }
        else
        {
          //echo "No se puede ejecutar !";
        }
        


      $stmt6 = $this->db->prepare("INSERT INTO horarios(salon,dias,hora,nrc_curso,fecha_inicio,fecha_final) VALUES(:salon,:dias,:hora,:nrc_curso,:fecha_inicio,:fecha_final)");
      $stmt6->bindParam(":salon",$dia3);
      $stmt6->bindParam(":dias",$dias[2]);
      $stmt6->bindParam(":hora",$hora);
      $stmt6->bindParam(":nrc_curso",$nrc);
      $stmt6->bindParam(":fecha_inicio",$fecha);
      $stmt6->bindParam(":fecha_final",$fecha2);
        if($stmt6->execute())
        {
         echo "registrado";
        }
        else
        {
         // echo "No se puede ejecutar !";
        }
        
      }else
    {
      //declan
               $stmt8 = $this->db->prepare("INSERT INTO seccion(id,secc) VALUES(:id,:seccion)");
      $stmt8->bindParam(":id",$maxsec);
      $stmt8->bindParam(":seccion",$seccion);
      
        if($stmt8->execute())
        {
         // echo " Seccion registrada";
        }
        else
        {
         // echo "No se puede ejecutar !";
        }

        
      $stmt3 = $this->db->prepare("INSERT INTO curso(nrc,id_materia,seccion,id_profesor,periodo) VALUES(:nrc,:id_materia,:seccion,:id_profesor,:periodo)");
      $stmt3->bindParam(":nrc",$nrc);
      $stmt3->bindParam(":id_materia",$materia);
      $stmt3->bindParam(":seccion",$maxsec);
      $stmt3->bindParam(":id_profesor",$id);
      $stmt3->bindParam(":periodo",$maxper);
        if($stmt3->execute())
        {
         // echo " curso registrado";
        }
        else
        {
         // echo "No se puede ejecutar !";
        }
              



    


    if (strcasecmp($dias[1], "martes")==0){
      switch ($hora) {
        case "7:00":
          $horas="8:00";
          break;
        case "9:00":
          $horas="10:00";
          break;
        case "11:00":
          $horas="12:00";
          break;
        case "13:00":
          $horas="14:00";
          break;
        case "15:00":
          $horas="16:00";
          break;
        case "17:00":
          $horas="18:00";
          break;

        default:
          $horas=$hora;
                    break;
      }
    }
    else
      $horas=$hora;








    
      $stmt4 = $this->db->prepare("INSERT INTO horarios(salon,dias,hora,nrc_curso,fecha_inicio,fecha_final) VALUES(:salon,:dias,:hora,:nrc_curso,:fecha_inicio,:fecha_final)");
      $stmt4->bindParam(":salon",$dia1);
      $stmt4->bindParam(":dias",$dias[0]);
      $stmt4->bindParam(":hora",$horas);
      $stmt4->bindParam(":nrc_curso",$nrc);
      $stmt4->bindParam(":fecha_inicio",$fecha);
      $stmt4->bindParam(":fecha_final",$fecha2);
        if($stmt4->execute())
        {
        //  echo "horario 1 registrado";
        }
        else
        {
        //  echo "No se puede ejecutar !";
        }
      



      $stmt5 = $this->db->prepare("INSERT INTO horarios(salon,dias,hora,nrc_curso,fecha_inicio,fecha_final) VALUES(:salon,:dias,:hora,:nrc_curso,:fecha_inicio,:fecha_final)");
      $stmt5->bindParam(":salon",$dia2);
      $stmt5->bindParam(":dias",$dias[1]);
      $stmt5->bindParam(":hora",$hora);
      $stmt5->bindParam(":nrc_curso",$nrc);
      $stmt5->bindParam(":fecha_inicio",$fecha);
      $stmt5->bindParam(":fecha_final",$fecha2);
        if($stmt5->execute())
        {
        //  echo "horario 2 registrado";
        }
        else
        {
        //  echo "No se puede ejecutar !";
        }
        


      $stmt6 = $this->db->prepare("INSERT INTO horarios(salon,dias,hora,nrc_curso,fecha_inicio,fecha_final) VALUES(:salon,:dias,:hora,:nrc_curso,:fecha_inicio,:fecha_final)");
      $stmt6->bindParam(":salon",$dia3);
      $stmt6->bindParam(":dias",$dias[2]);
      $stmt6->bindParam(":hora",$hora);
      $stmt6->bindParam(":nrc_curso",$nrc);
      $stmt6->bindParam(":fecha_inicio",$fecha);
      $stmt6->bindParam(":fecha_final",$fecha2);
        if($stmt6->execute())
        {
          echo "registrado";
        }
        else
        {
        //  echo "No se puede ejecutar !";
        }
       
    }
 

    

     }
     else
          echo "empalmado"; //se empalma






     

 



      }catch(PDOException $e)
       {
           echo $e->getMessage();
       }

    
   
    }
 
public function login($uname,$upass)
    {
       try
       {
        
          $stmt = $this->db->prepare("SELECT * FROM profesor WHERE id=:uname LIMIT 1");
          $stmt->execute(array(':uname'=>$uname));
          
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          
          if($stmt->rowCount() > 0)
          {
             if($upass == $userRow['password'])
             {
                $_SESSION['user_session'] = $userRow['id'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }

   
}

