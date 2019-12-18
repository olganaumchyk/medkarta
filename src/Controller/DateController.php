<?php

namespace App\Controller;

use App\Model\DateModel;
use TexLab\MyDB\DB;
use App\Core\Conf;
use TexLab\MyDB\DbEntity;

class DateController extends AbstractTableController
{
    protected $tableName = '';
    protected $viewPatternsPath = 'templates/date/';
    protected $pageSize = 15;

    public function __construct()
    {
        parent::__construct();
        $this->table = new DateModel($this->tableName, DB::Link(Conf::MYSQL));
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

       
        $table = new DateModel($this->tableName, DB::Link(Conf::MYSQL));
        $tablePatients = new DbEntity('patients', DB::Link(Conf::MYSQL));
        $tablePrivivki = new DbEntity('privivki', DB::Link(Conf::MYSQL));
        $tableKarta = new DbEntity('karta', DB::Link(Conf::MYSQL));

       

        $this->render("search", [
            'table' => $table->search($_POST['date']),
            
            "URL" => '?t=' . $this->shortClassName() . '&a=Search',
            'patients' => $tablePatients->getColumn('fio','birth_date','adres'),
            'privivki' => $tablePrivivki->getColumn('name','vaccine'),
            'karta' => $tableKarta->getColumn('date'),
            'tableHeaders' => ['дата вакцинации','прививка',' описание вакцины','пациент','дата рождения','адрес']
        ]);
    }

}
