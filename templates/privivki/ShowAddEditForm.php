<div>
    <div class='container'>
        <div class='row justify-content-center'>
            <form action="<?= $URL ?>" method="POST" class="text-center border border-light p-3">
                <?php
                foreach ($columnsNames as $name) {
                    if ($name != 'id') {
                        if ($name == 'privivki') {

                            echo "<label>" . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name]);
                            echo "<br><select name='privivki'>";
                            foreach ($privivki as $id => $privivkiName) {
                                echo "<option value='$id'>$groupprivivkiName</option>";
                            }

                            echo "</select></lable><br>";
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