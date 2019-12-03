<?php

namespace App\Controller;

use App\Model\PrintModel;
use TexLab\MyDB\DB;
use App\Core\Conf;
use TexLab\MyDB\DbEntity;

class PrintController extends AbstractTableController
{
    protected $tableName = '';
    protected $viewPatternsPath = 'templates/print/';
    protected $pageSize = 10;

    public function __construct()
    {
        parent::__construct();
        $this->table = new PrintModel($this->tableName, DB::Link(Conf::MYSQL));
    }

    public function actionSearchForm()
    {
        // print_r($this->table->search());
        $this->render("searchform", [
            "URL" => '?t=' . $this->shortClassName() . '&a=Search',
        ]);
    }

    public function actionSearch()
    {

        // print_r($_POST);
        $table = new PrintModel($this->tableName, DB::Link(Conf::MYSQL));
        $tablePatients = new DbEntity('patients', DB::Link(Conf::MYSQL));
        $tablePrivivki = new DbEntity('privivki', DB::Link(Conf::MYSQL));
        $tableKarta = new DbEntity('karta', DB::Link(Conf::MYSQL));

        // print_r($this->table->search($_POST['fio']));

        $this->render("search", [
            'table' => $table->search($_POST['fio']),
            
            "URL" => '?t=' . $this->shortClassName() . '&a=Search',
            'patients' => $tablePatients->getColumn('fio','birth_date','adres'),
            'privivki' => $tablePrivivki->getColumn('name','vaccine'),
            'karta' => $tableKarta->getColumn('date'),
            'tableHeaders' => ['пациент','дата рождения','адрес','дата вакцинации','прививка',' описание вакцины']
        ]);
    }
}
