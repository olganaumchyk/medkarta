<div>
    <div class='container'>
        <div class='row justify-content-center'>
            <form action="<?= $URL ?>" method="POST" class="text-center border border-light p-3">
                <?php
                foreach ($columnsNames as $name) {
                    if ($name != 'id') {
                        if ($name == 'date') {
                            echo "<label>"
                                . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name])
                                . "<input class='form-control mb-4' type='date' name='"
                                . $name . "' value='"
                                . ($editValues[$name] ?? '') . "'></label><br>";
                        }
                        if ($name == 'patients_id') {

                            echo "<label>" . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name]);
                            echo "<br><select name='patients_id' multiple size='10'>";
                            foreach ($patients as $id => $patientsName) {
                                echo "<option value='$id'>$patientsName</option>";
                            }

                            echo "</select></lable><br>";
                        }

                        if ($name == 'privivki_id') {

                            echo "<label>" . (empty($tableHeaders[$name]) ? $name : $tableHeaders[$name]);
                            echo "<br><select name='privivki_id'>";
                            foreach ($privivki as $id => $privivkiName) {
                                echo "<option value='$id'>$privivkiName</option>";
                            }

                            echo "</select></lable><br>";
                        } 
                    }
                }
                ?>
                <input class="btn btn-info my-4" type="submit" value="OK">
            </form>
        </div>
    </div>
</div>