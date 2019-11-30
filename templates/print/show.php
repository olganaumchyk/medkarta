<div>
<form action="<?= Dispatcher::dispatcher()->encodeUri("print/searchform") ?>" method="POST">
    <input type="text" name="fio" placeholder="введите имя пациента">
    <input type="submit" name="поиск"> поиск

</form>
</div>
<?php
echo "<table>";

echo "<tr>";
foreach ($tableHeaders as $fieldName => $th ) {
    echo "<th>".(empty($th) ? $fieldName : $th)."</th>";
}
echo "<th></th></tr>";

foreach ($table as $row) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>$value</td>";
    }
}
echo "</table>";


?>