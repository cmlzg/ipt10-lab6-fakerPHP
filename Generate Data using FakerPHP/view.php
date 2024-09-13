<?php

require 'FileUtility.php';

$filename = 'persons.csv';

if (!file_exists($filename)) {
    die("File not found. Generate the file first.\n");
}

$fileContent = FileUtility::readFile($filename);
$rows = explode("\n", $fileContent);
$header = str_getcsv(array_shift($rows));

echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<head><meta charset="UTF-8"><title>Persons Data</title></head>';
echo '<body>';
echo '<table border="1">';
echo '<thead><tr>';

foreach ($header as $col) {
    echo "<th>{$col}</th>";
}

echo '</tr></thead>';
echo '<tbody>';

foreach ($rows as $row) {
    if (trim($row) !== '') {
        $data = str_getcsv($row);
        echo '<tr>';
        foreach ($data as $cell) {
            echo "<td>{$cell}</td>";
        }
        echo '</tr>';
    }
}

echo '</tbody>';
echo '</table>';
echo '</body>';
echo '</html>';
