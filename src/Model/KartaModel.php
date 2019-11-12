<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class KartaModel extends DbEntity
{

    public function getPage(?int $page = null): array
    {
        $this
        ->reset()
        ->setSelect("`karta`.`id`, `karta`.`date`,`patients`.`fio` AS`patients_id`, `privivki`.`name` AS`privivki_id`")
        ->setFrom("`patients`, `privivki`,`karta`")
        ->setWhere("`karta`.`patients_id` = `patients`.`id` AND `karta`.`privivki_id` =`privivki`.`id` ")
        ->setOrderBy("`karta`.`id`");
        // echo $this->getSQL();
        return parent::getPage($page);
    }


}