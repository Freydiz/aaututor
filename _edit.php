<?php 
require 'config.php';

//Update user profile

if (isset($_POST['update_profile'])){   
    
    //If firstName is changed:
    if ($_POST["firstName"] != $_SESSION["firstName"] ) {
        $sqlFirstName = "UPDATE Users SET firstName= '".$_POST["firstName"]."' WHERE userID = '".$_SESSION["userID"]."'";
        $stmt = $PDO->prepare($sqlFirstName);
        $stmt->execute();
        $_SESSION["firstName"] = $_POST["firstName"];
        }
    
    //If surName is changed:
    if ($_POST["surName"] != $_SESSION["surName"] ) {
        $sqlSurName = "UPDATE Users SET surName= '".$_POST["surName"]."' WHERE userID = '".$_SESSION["userID"]."'";
        $stmt = $PDO->prepare($sqlSurName);
        $stmt->execute();
        $_SESSION["surName"] = $_POST["surName"];
        }
    
    //If currentProgram is changed:
    if ($_POST["currentProgram"] != $_SESSION["currentProgram"] ) {
        $sqlCurrentProgram = "UPDATE Users SET currentProgram= '".$_POST["currentProgram"]."' WHERE userID = '".$_SESSION["userID"]."'";
        $stmt = $PDO->prepare($sqlCurrentProgram);
        $stmt->execute();
        $_SESSION["currentProgram"] = $_POST["currentProgram"];
        }
    
    //If currentSemester is changed:
    if ($_POST["currentSemester"] != $_SESSION["currentSemester"] ) {
        $sqlCurrentSemester = "UPDATE Users SET currentSemester= '".$_POST["currentSemester"]."' WHERE userID = '".$_SESSION["userID"]."'";
        $stmt = $PDO->prepare($sqlCurrentSemester);
        $stmt->execute();
        $_SESSION["currentSemester"] = $_POST["currentSemester"];
        }
    
    // updates for tutors:
    if($_SESSION["isTutor"] == 1) {
    
        //If bio is changed:
        if ($_POST["bio"] != $_SESSION["bio"]) {
            $sqlBio = "UPDATE Tutor SET bio= '".$_POST["bio"]."' WHERE userID = '".$_SESSION["userID"]."'";
            $stmt = $PDO->prepare($sqlBio);
            $stmt->execute();
            $_SESSION["bio"] = $_POST["bio"];
            }

        //If tags is changed:
        if ($_POST["tags"] != $_SESSION["tags"] ) {
            $sqlTags = "UPDATE Tutor SET tags= '".$_POST["tags"]."' WHERE userID = '".$_SESSION["userID"]."'";
            $stmt = $PDO->prepare($sqlTags);
            $stmt->execute();
            $_SESSION["tags"] = $_POST["tags"];
            }

        //If suggestedFee is changed:
        if ($_POST["fee"] != $_SESSION["suggestedFee"] ) {
            $sqlFee = "UPDATE Tutor SET suggestedFee= '".$_POST["fee"]."' WHERE userID = '".$_SESSION["userID"]."'";
            $stmt = $PDO->prepare($sqlFee);
            $stmt->execute();
            $_SESSION["suggestedFee"] = $_POST["fee"];
            }
    }
    
    //if userPassword and retypePasword is set:
    if (isset($_POST["userPassword"], $_POST["retypePassword"])) {
        if ($_POST["userPassword"] = $_POST["retypePassword"]) {
            $sqlPassword = "UPDATE Users SET userPassword = '".$_POST["userPassword"]."'  WHERE userID = '".$_SESSION["userID"]."'";
            $stmt = $PDO->prepare($sqlPassword);
            $stmt->execute();
            $_SESSION["userPassword"] = $_POST["userPassword"];
        }
    }
    
}
    
    
    

?>