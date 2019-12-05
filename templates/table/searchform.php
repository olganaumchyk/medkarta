<div class="o">
    <form action="<?= $URL ?>" method="POST">
        <input type="text" name="fio" placeholder="введите имя пациента"></br>
        <input type="submit" value="поиск">

    </form>
или
    <form action="<?= $URLi ?>" method="POST">
        <input type="text" name="name" placeholder="введите название вакцины"></br>
        <input type="submit" value="поиск">

    </form>
или
    <form action="<?= $URL ?>" method="POST">
        <input type="date" name="date" placeholder="введите дату вакцинации"></br>
        <input type="submit" value="поиск">

    </form>


</div>