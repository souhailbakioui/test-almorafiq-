<?php
   include_once 'bd.php';
   
   if(isset($_POST['prenom'])){
    $name=$_POST["name"];
    $prenom=$_POST['prenom'];
    $genre=$_POST["genre"];
    $age=$_POST["age"];
    bd::query("INSERT INTO student VALUES (NULL, '$name', '$prenom', '$genre', '$age');");

    exit;
   }
   if(isset($_POST['id_s'])){
    $id=$_POST["id_s"];
    bd::query("DELETE FROM `student` WHERE `student`.`id` = $id");

    exit;
   }
   if(isset($_GET['action']))
   {
    $list=array();
    $data= bd::query("SELECT id,nom,prenom,gender,age FROM student");
    while ($row = $data->fetchAll()) {
        $list[]=$row;
    }
    echo json_encode($list);
    exit;
   }
   if(isset($_POST['m']))
   {
    $list=array();
    $data= bd::query("SELECT id,nom,gender,prenom,age FROM student where id='".$_POST['id_u']."'");
    while ($row = $data->fetchAll()) {
        $list[]=$row;
    }
    echo json_encode($list);
    exit;
   }
   if(isset($_POST['id_u']))
   {
    $id=$_POST["id_u"];
    $name=$_POST["name_u"];
       $prenom=$_POST["prenom_u"];
       $gender=$_POST["genre_u"];
       $age=$_POST["age_u"];
       $ok=0;
            $rep=bd::query("UPDATE student SET id='$id' , nom='$name', prenom='$prenom', gender='$gender', age='$age' where id = $id");
            if(!$rep){
               $ok=2; 
            }
        else{
            $ok=1; 
        }
        echo $ok;
    exit;
   }

  
   
   
   function signin(){
       if(isset($_POST["username"]) && isset($_POST["password"])){
       $username=str_replace(array("'","=","".'"'),"",$_POST["username"]);
       $password=str_replace(array("'","=","".'"'),"",$_POST["password"]); 
        
        $data = bd::query("SELECT * FROM account_manager WHERE username='$username'");
        $row  = $data->fetch(PDO::FETCH_BOTH);
        if($row!=null){
           if($row['password']==$password){
               if($row['status'] == 'Active') {
                    session_start();
                    $_SESSION["id-manager"] = $row['id'];
                    $_SESSION["username-manager"] = $row['username'];
                    
              
                    header("Location: /app/manager/");
                }else{
                    return 'Your Acount is ' . $row['status'];
                }
            }else{
                return 'Username or Password Not Match';
            }
        }else{
          return 'Username or Password Not Match';
        }
      }
   }
   
