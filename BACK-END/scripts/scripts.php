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

   /*function signup(){ 
        $firstname=$_POST["firstname"];
        $lastname=$_POST["lastname"];
        $phone=$_POST["phone"];
        $email=$_POST["email"];
        $imid=$_POST["imid"];
        $imservice=$_POST["imservice"];
        $username=$_POST["username"];
        $password=$_POST["password"];
        $challengequestion=addslashes($_POST["challengequestion"]);
        $answer=$_POST["answer"];
        $paymentname=$_POST["paymentname"];
        $paymentmethod=$_POST["paymentmethod"];
        $paymentinfos=$_POST["paymentinfos"];
        $statut="Under Review";
        $dateadd=date('Y-m-d h:i:s');
        $dateset=date('Y-m-d h:i:s');
        bd::query("INSERT INTO mailer VALUES (NULL, '$firstname', '$lastname', '$phone', '$email', '$imid', '$imservice', '$username', '$password', '$challengequestion', '$answer', '$paymentname', '$paymentmethod', '$paymentinfos', '$statut','$dateadd', '$dateset');");
   }*/
   
   
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
                    
                    //$_SESSION['start'] = time();
                    //$_SESSION['expire'] = $_SESSION['start'] + (30*60);
                    //add_log("<span class='badge badge-success'>Logged in sucessfully</span>");
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
   
   function forgot(){ 
        
   }
   
   /*function add_log($str){
        $mailer=$_SESSION['id-mailer'];
        $ip=$_SERVER["REMOTE_ADDR"];
        $activity=addslashes($str);
        $dateactivity=date('Y-m-d h:i:s');
        bd::query("INSERT INTO mailer_log VALUES (NULL, '$mailer', '$ip', '$activity', '$dateactivity');");
   }*/
   
  