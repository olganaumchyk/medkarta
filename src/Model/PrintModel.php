<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class PrintModel extends DbEntity
{

    public function search(string $fio = ''): array
    {
        // $this
        // ->reset()
        // ->setSelect("`patients`.`id`,`fio`,`birth_date`,`adres`,`date`,`name`,`vaccine`")
        // ->setFrom("`karta`,`privivki`,`patients`")
        // ->setWhere("`karta`.`patients_id` = `patients`.`id` AND `karta`.`privivki_id` =`privivki`.`id` AND `patients`.`id` = 4");
        // ->setOrderBy("`karta`.`patients_id`");
        return $this->runSQL('SELECT patients.id,fio,birth_date,adres,date,name,vaccine
        FROM `karta`,privivki,patients
        WHERE `karta`.`patients_id` = `patients`.`id` AND `karta`.`privivki_id` =`privivki`.`id` AND patients.id = 4');
        // return parent::getPage($page);
    }


}