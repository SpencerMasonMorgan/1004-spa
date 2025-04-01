<?php
$filename = 'final.csv';   // Destination file
$filename1 = 'paints.csv'; // Source file
$rows = [];  // Stores all rows
$counter = [];  // Associative array to count occurrences
$uniquerow = []; //so duplicates dont get written into the file

// Read the source CSV file
if (($filenamehandle1 = fopen($filename1, 'r')) !== FALSE) {
    while (($data = fgetcsv($filenamehandle1)) !== FALSE) {
        $rows[] = $data;  // Store row

        // Convert row to string (so it can be used as a key in $count_map)
        $key = implode(',', $data);
        
        // Increment count for that row
        if (!isset($counter[$key])) {
            $counter[$key] = 1;
			$uniquerow[$key] = $data;
		} else {
            $counter[$key]++;
        }
    }   
    fclose($filenamehandle1); // Close source file
}

// Write updated data to the final CSV file
if (($filenamehandle = fopen($filename, 'a')) !== FALSE) { // Open in 'w' mode to overwrite old data
    foreach ($uniquerow as $key => $row) {
        $row[] = $counter[$key]; // Append count to the row
        fputcsv($filenamehandle, $row); // Write to final.csv
    }
    fclose($filenamehandle); // Close destination file
}

header("Location: new2.html"); // redirects me to initial page
exit();
?>
