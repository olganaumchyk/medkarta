<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class PatientsModel extends DbEntity
{

    public function getPage(?int $page = null): array
    {
        $this
        ->reset()
        ->setSelect("`patients`.`id`, `patients`.`fio`,  `patients`.`adres`,`patients`.`birth_date`")
        ->setFrom("`patients`")
        ->setOrderBy("`patients`.`id`");
        return parent::getPage($page);
    }


}