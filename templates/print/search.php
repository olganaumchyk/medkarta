<?php

echo "<div class='container'><div class='row justify-content-center'>";

echo "<table class='table table-striped table-primary'>";

echo "<tr>";
foreach ($tableHeaders as $fieldName => $th) {
    echo "<th>" . (empty($th) ? $fieldName : $th) . "</th>";
}
echo "<th colspan='2'></th></tr>";

foreach ($table as $row) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>$value</td>";
    }
}
echo "</table>";
echo "</div>";
