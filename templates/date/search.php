<?php

echo "<div class='container'><div class='row justify-content-center'>";

echo "<table class='table table-striped table-primary'>";

echo "<tr>";
foreach ($tableHeaders as $fieldName => $th) {
    echo "<th>" . (empty($th) ? $fieldName : $th) . "</th>";
}


foreach ($table as $row) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>$value</td>";
    }
}
echo "</table>";
echo "</div>";
