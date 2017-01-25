<?php
class alumno{
    private $db;
 
    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
    
        public function registrar($matricula,$nombre,$paterno,$materno,$correo,$password){
       try
       {
            $stmt = $this->db->prepare("SELECT * FROM alumno WHERE matricula=:matricula");
			$stmt->execute(array(":matricula"=>$matricula));
			$count = $stmt->rowCount();
           
           	if($count==0){
				
			$stmt = $this->db->prepare("INSERT INTO alumno(matricula,nombre,paterno,materno,correo,password) VALUES(:matricula, :nombre, :paterno, :materno, :correo, :password)");
			$stmt->bindParam(":matricula",$matricula);
			$stmt->bindParam(":nombre",$nombre);
			$stmt->bindParam(":paterno",$paterno);
			$stmt->bindParam(":materno",$materno);
            $stmt->bindParam(":correo",$correo);
            $stmt->bindParam(":password",$password);
					
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
 
 /*   public function login($email,$password)
    {
        try
  { 
  
   $stmt = $this->db->prepare("SELECT * FROM cliente WHERE email=:email");
   $stmt->execute(array(":email"=>$email));
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $count = $stmt->rowCount();
   
   if($row['password']==$password){
    
    echo "ok"; // log in
    $_SESSION['user_session'] = $row['email'];
   }
   else{
    
    echo "email o contraseña no existe."; // wrong details 
   }
    
  }
  catch(PDOException $e){
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
*/
}

