<?php
class coordinador{
    private $db;
 
    function __construct($DB_con){
      $this->db = $DB_con;
    }
    
        public function registrar($id,$password2){
       try
       {
            $stmt = $this->db->prepare("SELECT * FROM profesor WHERE tipo=2");
			$stmt->execute(array(":id"=>$id));
			$count = $stmt->rowCount();
           
           	if($count<1){
		




			$stmt = $this->db->prepare("UPDATE profesor set tipo=2, password2=:password2 WHERE id=:id");
			$stmt->bindParam(":password2",$password2);
            $stmt->bindParam(":id",$id);
      


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
        
          $stmt = $this->db->prepare("SELECT * FROM profesor WHERE id=:uname  and tipo=2 LIMIT 1");
          $stmt->execute(array(':uname'=>$uname));
          
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          
          if($stmt->rowCount() > 0)
          {
             if($upass == $userRow['password2'])
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

