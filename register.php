<?php
//include config file
require 'config.php';

//$sql_user->bindParam(':aauMail', $aauMail);


// register the user:

if (isset($_POST['signUp_btn'])){ 
    
    try {
       
    //Check if AAUMail has already been registered:
    $sql_user = $PDO->prepare("SELECT userID FROM Users WHERE aauMail = :aauMail");
    
    if($sql_user->rowCount() > 0){
    $mailErr = "AAU mail already exists";
    } else if (isset($_POST['chkbox'])){

        
        //Insertion into User table:
        $sql = "INSERT INTO Users (userPassword, firstName, surName, aauMail, currentProgram, currentSemester, isTutor)
        VALUES ('".$_POST["userPassword"]."','".$_POST["firstName"]."','".$_POST["surName"]."','".$_POST["aauMail"]."','".$_POST["currentProgram"]."','".$_POST["currentSemester"]."', 1)";
        
        
        //Insertion into Tutor table:
        $sqlTwo = "INSERT INTO Tutor (userID, bio, suggestedFee, tags, profilePicture) VALUES ((SELECT userID FROM Users WHERE aauMail = '".$_POST["aauMail"]."'),'".$_POST["bio"]."','".$_POST["fee"]."','".$_POST["tags"]."','".$_FILES["imageUpload"]."')";
        
        
        //execute the queries:
        $stmt1 = $PDO->prepare($sql);
        $stmt2 = $PDO->prepare($sqlTwo);
        $stmt1->execute();
        $stmt2->execute();
        
    
        //Return to index.html if insert is successful:
        header('Location: index.php');
    
        
    } else {
        //Only insert into User table with no Tutor extension:
        $sql = "INSERT INTO Users (userPassword, firstName, surName, aauMail, currentProgram, currentSemester)
        VALUES ('".$_POST["userPassword"]."','".$_POST["firstName"]."','".$_POST["surName"]."','".$_POST["aauMail"]."','".$_POST["currentProgram"]."','".$_POST["currentSemester"]."')";
        
        $stmt = $PDO->prepare($sql);
        $stmt->execute();
        header('Location: index.php');
    }
exit;
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
}





//Login and create session for remembering user:

if(isset($_POST['login_Btn'])) {
    
    try{
        
session_start();
        

{  
           if(empty($_POST["loginMail"]) || empty($_POST["loginPassword"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT userID, firstName, surName, aauMail, currentProgram, currentSemester, isTutor FROM Users WHERE aauMail = '".$_POST["loginMail"]."' AND userPassword = '".$_POST["loginPassword"]."'";  

                $statement = $PDO->prepare($query);  
                $statement->execute();
               
                $count = $statement->rowCount();  
                if($count > 0)
                {  
                     
                    $row= $statement-> fetch();
                    $_SESSION["userID"] = $row["userID"];
                    $_SESSION["loginMail"] = $row["aauMail"]; 
                    $_SESSION["firstName"] = $row["firstName"]; 
                    $_SESSION["surName"] = $row["surName"];
                    $_SESSION["currentSemester"] = $row["currentSemester"];
                    $_SESSION["currentProgram"] = $row["currentProgram"];
                    $_SESSION["isTutor"] = $row["isTutor"];
                    $_SESSION["loggedIn"] = true;
                    
                    
                    //Get info from Tutor table if User is also tutor:
                    
                    if ($_SESSION["isTutor"] == 1) {
                        $query2 = "SELECT bio, suggestedFee, tags FROM Tutor WHERE userID = '".$_SESSION["userID"]."'" ;
                        
                        $statement2 = $PDO->prepare($query2);
                        $statement2->execute();
                        $row2= $statement2-> fetch();
                        $_SESSION["bio"] = $row2["bio"];
                        $_SESSION["suggestedFee"] = $row2["suggestedFee"];
                        $_SESSION["tags"] = $row2["tags"];
                        
                    }
                    
                    
                    header("location:home.php");  
                    }
                  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                    echo "Wrong password";
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
    



}
 

$PDO = null;

?>
