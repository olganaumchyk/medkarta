<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class KartaModel extends DbEntity
{

    public function getPage(?int $page = null): array
    {
        $this
        ->reset()
        ->setSelect("`karta`.`id`, `karta`.`patients_id`, `karta`.`privivki_id`, `karta`.`date`")
        ->setFrom("`patients`, `privivki`")
        ->setWhere("`karta`.`patients_id` = `patients`.`id`,`karta`.`privivki_id` =`privivki`.`id` ")
        ->setOrderBy("karta`.`id`");
        return parent::getPage($page);
    }


}