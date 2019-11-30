<?php

echo "<table class='table table-striped table-dark'>";

print_r($tableHeaders);

foreach ($table as $row) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>$value</td>";
    }
}
echo "</table>";