<?php
require 'FileUtility.php';
require 'Random.php';

$filename = 'persons.csv';
$numberOfRecords = 300;

$random = new Random();
$csvData = [
    ["UUID", "Title", "First Name", "Last Name", "Street Address", "Barangay", "Municipality", "Province", "Country", "Phone Number", "Mobile Number", "Company Name", "Company Website", "Job Title", "Favorite Color", "Birthdate", "Email Address", "Password"]
];

for ($i = 0; $i < $numberOfRecords; $i++) {
    $person = $random->generatePerson();
    $csvData[] = $person;
}


$fp = fopen($filename, 'w');
foreach ($csvData as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);

echo "Data generated and saved to $filename.";
?>
