<?php
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // Allow only these HTTP methods
header("Access-Control-Allow-Headers: Content-Type"); // Allow this header

// Path to the CSV file
$filename = isset($_POST['filename']) ? $_POST['filename'] : '';
$filename = "{$filename}.csv";

if (($handle = fopen($filename, 'r')) !== FALSE) {
    echo "<table border='1'>";
    while (($data = fgetcsv($handle)) !== FALSE) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($data[0]) . "</td>"; 
        echo "<td>" . htmlspecialchars($data[1]) . "</td>"; 
        echo "<td>" . htmlspecialchars($data[2]) . "</td>"; 
        echo "<td>" . htmlspecialchars($data[3]) . "</td>"; 
        echo "</tr>";
    }
    echo "</table>";
    fclose($handle);
} else {
    echo "Error: Could not open the file.";
}
?>
