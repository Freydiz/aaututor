<?php 

session_start();
require 'config.php';


//Logout function and system ending

if(isset($_POST["logOutBtn"])) {
    session_start();
    session_destroy();
    header("location: index.php");
    
}

$sessErr = null;




//If logged in user is tutor, then button to crreate new session shows

if($_SESSION["isTutor"] == 1) {
    
    echo "<script>
    window.onload = function() {
    document.getElementById('btnSess').style.display = 'block';};
    </script>";
}

// create new session:
if (isset($_POST['createSess_btn'])){ 
    
        
    try {
       
    //Check if there is an exsting session from the same tutor at the same time as the one the user is trying to create:
    $sql_existSess = $PDO->prepare("SELECT sessID FROM sessions WHERE sessTutor = '".$_SESSION['userID']."' AND  ('".$_POST["sessStart"]."' BETWEEN sessStart AND sessEnd)");
    $sql_existSess->execute();
        
    $sql_existStud = $PDO->prepare("SELECT userID FROM users WHERE aauMail = '".$_POST["sessStudent"]."'");
    $sql_existStud->execute();
       
        
    if($sql_existSess->rowCount() > 0){
       throw new Exception("You already have a session at the given time.");
         
            
         } else if($sql_existStud->rowCount() == 0){
        throw new Exception("The inserted AAU mail doesn't exist in the system");
    } else {
        
        // add duration to the session start, in order to get the session end
        $sessEnd = new DateTime($_POST["sessStart"]);
        $sessEnd->add(new DateInterval($_POST["duration"]));
        $sessEnd = $sessEnd->format('Y-m-d H:i:s');

    
        //Insertion into Sessions table in database:
        $sql = "INSERT INTO sessions (sessName, sessStart, sessEnd, duration, sessDesc, sessTutor, sessStudent, fee)
        VALUES ('".$_POST["sessName"]."','".$_POST["sessStart"]."','".$sessEnd."','".$_POST["duration"]."','".$_POST["sessDesc"]."', '".$_SESSION['userID']."','".$_POST["sessStudent"]."','".$_POST["fee"]."')";
    
       
        
        //execute the query:
        $PDO->exec($sql);
      
    
        echo "New record created successfully";
        //Return to home.html if insert is successful:
        header('Location: home.php');
    
        
    
    }
        
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

exit;
}

?>
