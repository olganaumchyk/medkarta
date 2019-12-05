<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class PrivModel extends DbEntity
{

    public function searchpriv(string $name = ''): array
    {

        return $this->runSQL("SELECT `privivki`.`name` AS`privivki_id`, `patients`.`fio` AS`patients_id`,birth_date,adres,date,vaccine
        FROM `karta`,`privivki`,`patients`
        WHERE `karta`.`patients_id` = `patients`.`id` AND `karta`.`privivki_id` =`privivki`.`id`AND `privivki`.`name` LIKE '%$name%'");
       
    }

    

}