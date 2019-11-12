<?php

namespace App\Model;

use TexLab\MyDB\DbEntity;

class PrivivkiModel extends DbEntity
{

    public function getPage(?int $page = null): array
    {
        $this
        ->reset()
        ->setSelect("`privivki`.`id`, `privivki`.`name`, `privivki`.`vaccine`,`privivki`.`date`")
        ->setFrom("`privivki`")
        ->setOrderBy("`privivki`.`id`");
        return parent::getPage($page);
    }


}