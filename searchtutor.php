<?php

require 'config.php';



$search = $_GET['search'];
// gets value sent over the search form

$search = htmlspecialchars($search); 
// changes characters used in html to their equivalents, for example: < to &gt;

$sql_search = $PDO->prepare("SELECT a.userID, a.firstName, a.currentProgram, b.tags, b.suggestedFee 
FROM users AS a INNER JOIN tutor AS b 
ON isTutor='1' AND a.userID=b.userID AND (a.firstName LIKE '%".$search."%' OR a.currentProgram LIKE '%".$search."%' OR b.tags LIKE '%".$search."%')");

// This query retrieves data from the tables users and tutor
// as conditions for the data retrieved, we want it to be information from only tutors (isTutor='1') and the information from the different tables must match the same user (a.userID=b.userID)
$sql_search->execute();


if($sql_search->rowCount() != 0) {

?>

    <html lang="en">
    <!-- Creates a table with the results, CSS applied -->
    <table class="tutorsess" id="search">
        <tr>
            <th>Name</th>
            <th>Program</th>
            <th>Tags</th>
            <th>Suggested Fee</th>
        </tr>

        <?php     
        while($row=$sql_search->fetch()) 
        {
            
            echo 
            "<tr class='hover' id='".$row["userID"]."'>".
            "<td><a class='modal-button' data-modal='modalTutor'>".$row["firstName"]."</a></td>".
            "<td>".$row["currentProgram"]."</td>".
            "<td>".$row["tags"]."</td>".
            "<td>".$row["suggestedFee"]."</td>".
            "</tr>
             <input id='searchValue' name='searchValue' type='hidden' value='".$search."'>";
        }

        }
        else
        {
            // If there are no results 
            echo 
                 "You searched for: ".$search.". No results found";
        }
$PDO = null;
    ?>

    </table>

    </html>