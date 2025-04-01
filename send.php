<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $company = isset($_POST['company']) ? $_POST['company'] : '';
    $size = isset($_POST['size']) ? $_POST['size'] : '';
	$type = isset($_POST['type']) ? $_POST['type'] : '';
	$barcode = isset($_POST['barcode']) ? $_POST['barcode'] : '';
    // Open the CSV file for appending (create it if it doesn't exist)
    $file = fopen("master_doc.csv", "a");

    // Check if the file is opened successfully
    if ($file) {
        // Create an array of the data
        $data = array($barcode, $company, $size, $type);

        // Write the data to the CSV file
        fputcsv($file, $data);

        // Close the file
        fclose($file);

       
    }
	$file = fopen("paints.csv", "a");

    // Check if the file is opened successfully
    if ($file) {
        // Create an array of the data
        $data = array($barcode, $company, $size, $type);

        // Write the data to the CSV file
        fputcsv($file, $data);

        // Close the file
        fclose($file);

       
    }
	
} 
header("Location: new2.html"); // redirects me to initial page
exit();
?>
