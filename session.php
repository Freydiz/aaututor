<?php
require 'config.php';




// opens a modal if the session ID has been parsed through the url
if (isset($_GET['sid'])){ 
    echo '<style type="text/css">
        #modalSession {
            display: block;
        }
        </style>';
    try {
        
        $ID = $_GET['sid'];
        // gets value sent over the url by the javacript

        $sql_session = $PDO->prepare("SELECT sessName, sessStart, sessDesc, sessStudent, sessTutor, duration, fee FROM sessions WHERE sessID =".$ID); 
        // This query retrieves data from the table sessions respective to a selected session

        $sql_session->execute();

        if($sql_session->rowCount() != 0) {
        //verifies result


            while($row=$sql_session->fetch()) {

            // this query fetches the info of the student associated with the session
            $sql_stud = $PDO->prepare("SELECT firstName, surName, currentProgram FROM users WHERE aauMail = '".$row["sessStudent"]."'");
            $sql_stud->execute();
            if($sql_stud->rowCount() == 1) {
                $name=$sql_stud->fetch();
                $student = $name["firstName"] ." ". $name["surName"];
                $studentPrg = $name["currentProgram"];

            } else {
                // for testing cases
                $student = "Undefined";
            }
       
        $title = $row["sessName"];
        $desc = $row["sessDesc"];
        $start = (new DateTime($row["sessStart"]))->format('d-m-Y H:i') . "h";
        $duration = new DateInterval($row["duration"]);
        $duration = $duration->format('%h:%Ih');
                         
        $fee = $row["fee"];
        $studentMail = $row["sessStudent"];

        //Show delete button if tutor:
        if($_SESSION["userID"] == $row["sessTutor"]) {
        echo "<script>
        window.onload = function() {
        document.getElementById('deleteSession').style.display = 'block';};
        </script>";
}
    }

    } else {
        echo "Something went wrong";
    }    
    }
    catch(PDOException $e) { 
        echo $e->getMessage();
    }
}

//Delete session:

if(isset($_POST['deleteSession'])) {
	$sqlDelete = ("DELETE FROM Sessions WHERE sessID ='".$_GET["sid"]."'");
	$stmt = $PDO->prepare($sqlDelete);
    $stmt->execute();	
    header('Location: home.php');
}

$PDO = null;
?>
