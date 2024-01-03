<?php


$indianTeamPlayers = array(
    
    "Mohammed Shami",
    "Shikhar Dhawan",
    "Ajinkya Rahane",
      "Virat Kohli",
    "Rohit Sharma",
    "KL Rahul",
    "Rishabh Pant",
    "Hardik Pandya",
    "Ravindra Jadeja",
    "Jasprit Bumrah",
);


echo "<table border='1'>
        <tr>
            <th>Player Name</th>
        </tr>";


foreach ($indianTeamPlayers as $player) {
    echo "<tr>
            <td>$player</td>
          </tr>";
}


echo "</table>";

?>
