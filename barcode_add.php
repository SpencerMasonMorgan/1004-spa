<?php
$filename = 'master_doc.csv';
$filename1 = 'paints.csv';
$searchValue = isset($_POST['barcode']) ? $_POST['barcode'] : ''; 

// Open the source CSV file for reading
if (($filenamehandle = fopen($filename, 'r')) !== FALSE) {
    // Open the destination CSV file for writing (create if doesn't exist)
    if (($filename1handle = fopen($filename1, 'a+')) !== FALSE) {

        // Loop through each row in the source CSV
        while (($data = fgetcsv($filenamehandle)) !== FALSE) {
            // Check if the value in the first column matches the search value
            if ($data[0] == $searchValue) {
                // Write the matching row to the destination CSV
				implode(", ", $data);
			    fputcsv($filename1handle, $data);
                echo "Row with '$searchValue' found and added to destination CSV.<br>";
				$found = true;
            }
        }

        // Close the destination file
        fclose($filename1handle);
    } else {
        echo "Error: Could not open the destination file for writing.";
    }

    // Close the source file
    fclose($filenamehandle);
} else {
    echo "Error: Could not open the source file for reading.";
}
if ($found) {
    header("Location: new2.html?status=success");
} else {
    header("Location: new2.html?status=notfound");
}

exit();
?>
