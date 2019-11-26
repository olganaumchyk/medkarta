<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class PrintModel extends DbEntity
{

    public function getPage(?int $page = null): array
    {
        $this
        ->reset()
        ->setSelect("*")
        ->setFrom("`patients`, `privivki`,`karta`")
        // ->setWhere("`karta`.`patients_id` = `patients`.`id` AND `karta`.`privivki_id` =`privivki`.`id` ")
        ->setOrderBy("`karta`.`patients_id`");
        // echo $this->getSQL();
        return parent::getPage($page);
    }


}