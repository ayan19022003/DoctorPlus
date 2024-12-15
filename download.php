<?php
// Read the HTML file content
$html = file_get_contents('Prescription.php');

// Set the appropriate headers for file download
header('Content-Type: text/php');
header('Content-Disposition: attachment; filename="download.pdf"');

// Output the HTML content as a file download
echo $html;
?>
