<div>
    <div class='container'>
        <div class='row justify-content-center'>
            <form action="<?= $URL ?>" method="POST" class="text-center border border-light p-3">
                <?php
                foreach ($columnsNames as $name) {
                    if ($name != 'id') {
                        if ($name == 'karta') {

                            echo "<label>" . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name]);
                            echo "<br><select name='karta'>";
                            foreach ($karta as $id => $kartaName) {
                                echo "<option value='$id'>$kartaName</option>";
                            }

                            echo "</select></lable><br>";
                        }
                        if ($name == 'date') { 
                            echo "<label>"
                            . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name])
                            . "<input class='form-control mb-4' type='date' name='"
                            . $name . "' value='"
                            . ($editValues[$name] ?? '') . "'></label><br>";

                        } else {
                            echo "<label>"
                                . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name])
                                . "<input class='form-control mb-4' type='text' name='"
                                . $name . "' value='"
                                . ($editValues[$name] ?? '') . "'></label><br>";
                        }
                    }
                }
                ?>
                <input class="btn btn-info my-4" type="submit" value="OK">
            </form>
        </div>
    </div>
</div>