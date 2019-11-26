<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<body>
<?php

// $paginationHTML = "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center'><li class='page-item'><a class='page-link' href='" . $paginationLink . max($currentPage - 1, 1) . "'><<</a></li>";
// for ($i = 1; $i <= $pageCount; $i++) {
//     $paginationHTML .= '<li class="page-item ' . (($i == $currentPage) ? "active" : "") . '"><a class="page-link " href="' . $paginationLink . $i . '">' . $i . '</a></li>';
// }
// $paginationHTML .= "<li class='page-item'><a class='page-link' href='" . $paginationLink . min($currentPage + 1, $pageCount) . "'>>></a></li></ul></nav>";

// echo $paginationHTML;

// echo "<div class='container'><div class='row justify-content-center'>";

// echo "<table class='table table-striped table-dark'>";

// echo "<tr>";
// foreach ($tableHeaders as $fieldName => $th ) {
//     echo "<th>".(empty($th) ? $fieldName : $th)."</th>";
// }
// echo "<th colspan='2'></th></tr>";

// foreach ($table as $row) {
//     echo "<tr>";
//     foreach ($row as $value) {
//         echo "<td>$value</td>";
//     }
//     echo "<td><a href='$editLink" . $row['id'] . "' class='btn btn-warning'>Edit</a></td>";
//     echo "<td><a href='$delLink" . $row['id'] . "' class='btn btn-danger'>Delete</a></td></tr>";
// }
// echo "</table>";
// echo "<a href='$addLink' class='btn btn-success'>Add new</a>";
// echo "</div></div>";
// echo $paginationHTML;
// $res=$mysqli->query("SELECT*FROM 'karta','patients','privivki' ORDER BY 'karta'.'patients_id'";
while ($row=$res->fetch_assoc()){ 
    ?>

    <div>имя:<?=$row['fio']?></div>
    <div>дата рождения:<?= $row['birth_date']?></div>
   <div>адрес:<?=$row['adres']?></div>
   <?php
}
echo "</div>";
$res->close();
$mysqli->close();

  
   $res1 = mysqli_query($link, "SELECT*FROM 'karta','privivki'");
    echo '<table>';
    while ($row = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
        echo "<tr><td>" . $row['date'] . "</td><td>" . $row['name'] . "</td><td>" . $row['vaccine'] . "</td></tr>";
    }
    echo '</table>';
    

        mysqli_free_result($res1);
        mysqli_close($link);

    
// <?php
?>

</body>
</html>



