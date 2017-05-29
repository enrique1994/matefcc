<?php
class alumno{
    private $db;
 
    function __construct($DB_con){
      $this->db = $DB_con;
    }
                      public function getAnuncios($id_alumno){
                try
  { 
  
   $stmt = $this->db->prepare("SELECT descripcion, fecha_final, anuncio.id_curso from anuncio
    inner join inscripcion on anuncio.id_curso = inscripcion.id_curso where
     inscripcion.id_alumno = :id_alumno order by (fecha_final) desc");
   $stmt->execute(array(":id_alumno"=>$id_alumno));
   
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
        public function registrar($matricula,$nombre,$paterno,$materno,$email,$password,$celular,$prog_edu){
       try
       {
            $stmt = $this->db->prepare("SELECT * FROM alumno WHERE matricula=:matricula");
			$stmt->execute(array(":matricula"=>$matricula));
			$count = $stmt->rowCount();
           
           	if($count==0){
				
			$stmt = $this->db->prepare("INSERT INTO alumno(matricula,nombre,paterno,materno,email,password,celular,prog_edu) VALUES(:matricula, :nombre, :paterno, :materno, :email, :password, :celular, :prog_edu)");
			$stmt->bindParam(":matricula",$matricula);
			$stmt->bindParam(":nombre",$nombre);
			$stmt->bindParam(":paterno",$paterno);
			$stmt->bindParam(":materno",$materno);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":password",$password);
            $stmt->bindParam(":celular",$celular);
            $stmt->bindParam(":prog_edu",$prog_edu);
					
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
 public function login($uname,$upass)
    {
       try
       {
        
          $stmt = $this->db->prepare("SELECT * FROM alumno WHERE matricula=:uname LIMIT 1");
          $stmt->execute(array(':uname'=>$uname));
          
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          
          if($stmt->rowCount() > 0)
          {
             if($upass == $userRow['password'])
             {
                $_SESSION['user_session'] = $userRow['matricula'];
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

