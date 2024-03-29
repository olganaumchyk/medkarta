<?php

$paginationHTML = "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center'><li class='page-item'><a class='page-link' href='" . $paginationLink . max($currentPage - 1, 1) . "'><<</a></li>";
for ($i = 1; $i <= $pageCount; $i++) {
    $paginationHTML .= '<li class="page-item ' . (($i == $currentPage) ? "active" : "") . '"><a class="page-link " href="' . $paginationLink . $i . '">' . $i . '</a></li>';
}
$paginationHTML .= "<li class='page-item'><a class='page-link' href='" . $paginationLink . min($currentPage + 1, $pageCount) . "'>>></a></li></ul></nav>";

echo $paginationHTML;

echo "<div class='container'><div class='row justify-content-center'>";

echo "<table class='table table-striped table-info'>";

echo "<tr>";
foreach ($tableHeaders as $fieldName => $th) {
    echo "<th>" . (empty($th) ? $fieldName : $th) . "</th>";
}
if ($_SESSION['user']['cod'] != "usr" ? " disabled" : "") {
    echo "<th colspan='2'></th></tr>";
} else {
    echo "<th colspan='1'></th></tr>";
}
foreach ($table as $row) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>$value</td>";
    }
    echo "<td><a href='$editLink" . $row['id'] . "' class='btn btn-success'>Edit</a></td>";
    if ($_SESSION['user']['cod'] != "usr" ? " disabled" : "") {
        echo "<td><a href='$delLink" . $row['id'] . "' class='btn btn-secondary'>Delete</a></td></tr>";
    }
}
echo "</table>";
echo "<a href='$addLink' class='btn btn-success'>Add new</a>";
echo "</div></div>";
echo $paginationHTML;
