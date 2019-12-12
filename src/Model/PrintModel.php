<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class PrintModel extends DbEntity
{

    public function search(string $fio = ''): array
    {

        return $this->runSQL("SELECT `patients`.`fio` AS`patients_id`,birth_date,adres,date,name,vaccine
        FROM `karta`,`privivki`,`patients`
        WHERE `karta`.`patients_id` = `patients`.`id` AND `karta`.`privivki_id` =`privivki`.`id`AND `patients`.`fio` LIKE '%$fio%'");
       
    }

    
}