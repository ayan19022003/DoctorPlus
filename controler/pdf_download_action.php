<?php
    $url = '../Prescription.html';
    $pdf_file = 'Prescription.pdf';
    $down = shell_exec("wkhtmltopdf {$url} {$pdf_file}");
    if ($down){
        echo "<script>window.location.href='../appointment.php';</script>";
    }
?>