<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class DateModel extends DbEntity
{

    public function search(string $date = ''): array
    {

        return $this->runSQL("SELECT date,`privivki`.`name` AS`privivki_id`,vaccine, `patients`.`fio` AS`patients_id`,birth_date,adres
        FROM `karta`,`privivki`,`patients`
        WHERE `karta`.`patients_id` = `patients`.`id` AND `karta`.`privivki_id` =`privivki`.`id`AND `karta`.`date` LIKE '%$date%'");
       
    }

    

}