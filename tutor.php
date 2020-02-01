<?php
require 'config.php';
// shows the Tutot Modal if there is a userID parsed through the urls
if (isset($_GET['id'])){ 
    echo '<style type="text/css">
        #modalTutor {
            display: block;
        }
        </style>';
    try {
        
        // gets value sent over the url by the javacript
        $ID = $_GET['id'];
        
        // This query retrieves data from the tables users and tutor 
        $sql_tutor = $PDO->prepare("SELECT a.userID, a.aauMail, a.firstName, a.surName, a.currentProgram, a.currentSemester, b.profilePicture, b.bio, b.suggestedFee, b.tags FROM users AS a INNER JOIN tutor AS b ON a.userID=".$ID." AND a.userID=b.userID"); 

        $sql_tutor->execute();

        if($sql_tutor->rowCount() != 0) {
    //verifies result

            while($row=$sql_tutor->fetch()) {

        
            $name = $row["firstName"] . " " . $row["surName"];
            $program = $row["currentProgram"];
            $semester = $row["currentSemester"];
            $bio = $row["bio"];
            $fee = $row["suggestedFee"];
            $mail = $row["aauMail"];
            $tags = $row["tags"];
            $nameForEmail = $row["firstName"];
        
            $picture = $row["profilePicture"];
            $printPicture = "data:image/jpeg;base64," .base64_encode( $picture );
    


            }

        } else {
            echo "Something went wrong";
        }


            
    }
    catch(PDOException $e) { 
        echo $e->getMessage();
    }
} 
$PDO = null;
?>
