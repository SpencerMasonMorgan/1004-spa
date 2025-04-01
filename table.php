<?php
header("Access-Control-Allow-Origin: *"); //allows requests from any domain
header("Access-Control-Allow-Methods: POST"); //allows the method post 

//get the requested file to read and put it in a suitable format
$filename = isset($_POST['filename']) ? $_POST['filename'] : '';
$filename = "{$filename}.csv";
//open it in read
if (($handle = fopen($filename, 'r')) !== FALSE) {
    echo "<table border='1'>"; //set the border of the table
    while (($data = fgetcsv($handle)) !== FALSE) { // whilst there is data 
        echo "<tr>"; // display it
        echo "<td>" . htmlspecialchars($data[0]) . "</td>"; //puts the characters into html equivalent
        echo "<td>" . htmlspecialchars($data[1]) . "</td>"; 
        echo "<td>" . htmlspecialchars($data[2]) . "</td>"; 
        echo "<td>" . htmlspecialchars($data[3]) . "</td>"; 
        echo "</tr>";
    }
    echo "</table>";
    fclose($handle);
} else { //if the file cant be opened
    echo "Error: Could not open the file.";
}
?>
