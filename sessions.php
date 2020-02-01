<?php

require 'config.php';

$userID = $_SESSION["userID"];
$userMail = $_SESSION["loginMail"];
// gets value sent over the user logged session

$sql_sesst = $PDO->prepare("SELECT sessID, sessName, sessStart, sessStudent 
FROM sessions WHERE sessTutor = '".$userID."' ORDER BY sessStart ASC");
// This query retrieves data from the table 'sessions' where the logged user is present as a tutor

$sql_sesst->execute();


if($sql_sesst->rowCount() != 0) {

?>
    <html lang="en">
    <h4>Sessions as a Tutor</h4>
    <!-- Creates a table with the results, CSS specially applied to the id="search" -->
    <table class="tutorsess" id="tutorsess">
        <tr>
            <th>Session</th>
            <th>Date</th>
            <th>Student</th>
        </tr>

        <?php     
        while($row=$sql_sesst->fetch()) 
        {
            $sql_stud = $PDO->prepare("SELECT firstName, surName FROM users WHERE aauMail = '".$row["sessStudent"]."'");
            $sql_stud->execute();
            if($sql_stud->rowCount() == 1) {
                $name=$sql_stud->fetch();
                $student = $name["firstName"] ." ". $name["surName"];

            } else {
                $student = "Undefined";
            }
            
            
            echo 
            "<tr class='hover' sid='".$row["sessID"]."'>".
            "<td><a class='modal-button' data-modal='modalSession'>".$row["sessName"]."</a></td>".
            "<td>".(new DateTime($row["sessStart"]))->format('d-m-Y H:i')."</td>".
            "<td>".$student."</td>".
            "</tr>";
        }

        }
        else
        {
            // gives this message if the user is a tutor and has no tutor sessions scheduled
            if($_SESSION["isTutor"] == 1) {
                 echo 
                 "<hr>
                 You have no scheduled sessions as a Tutor.";
             }
        }

    ?>

    </table>

    </html>

    <?php
    
    $sql_sesss = $PDO->prepare("SELECT sessID, sessName, sessStart, sessTutor FROM sessions WHERE sessStudent = '".$userMail."' ORDER BY sessStart ASC");
$sql_sesss->execute();


if($sql_sesss->rowCount() != 0) {

?>
        <html lang="en">
        <h4>Sessions as a Student</h4>
        <!-- Creates a table with the results, CSS specially applied to the id="search" -->
        <table class="tutorsess" id="tutorsess">
            <tr>
                <th>Session</th>
                <th>Date</th>
                <th>Tutor</th>
            </tr>

            <?php     
        while($row2=$sql_sesss->fetch()) 
        {
            $sql_tut = $PDO->prepare("SELECT firstName, surName FROM users WHERE userID = '".$row2["sessTutor"]."'");
            
            $sql_tut->execute();
            if($sql_tut->rowCount() == 1) {
                $name2=$sql_tut->fetch();
                $tutor = $name2["firstName"] ." ". $name2["surName"];

            } else {
                $tutor = "Undefined";
            }
            
            
            echo 
            "<tr class='hover' sid='".$row2["sessID"]."'>".
            "<td><a class='modal-button' data-modal='modalSession'>".$row2["sessName"]."</a></td>".
            "<td>".(new DateTime($row2["sessStart"]))->format('d-m-Y H:i')."</td>".
            "<td>".$tutor."</td>".
            "</tr>";
        }

        }
        else
        {
            // gives this message if the user is not a tutor and has no sessions scheduled 
            if($_SESSION["isTutor"] == 0) {
                 echo 
                 "<hr>
                 You have no scheduled sessions.";
             }
                 
        }
$PDO = null;
    ?>

        </table>

        </html>