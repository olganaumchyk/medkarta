<?php

namespace App\Controller;
use App\Model\PrivModel;
use TexLab\MyDB\DB;
use App\Core\Conf;
use TexLab\MyDB\DbEntity;

class PrivController extends AbstractTableController
{
    protected $tableName = '';
    protected $viewPatternsPath = 'templates/priv/';
    protected $pageSize = 15;

    public function __construct()
    {
        parent::__construct();
        $this->table = new PrivModel($this->tableName, DB::Link(Conf::MYSQL));
    }

    public function actionSearchForm()
    {
        
        $this->render("searchform", [
            "URL" => '?t=' . $this->shortClassName() . '&a=Search',
        ]);
    }
    public function actionSearchPriv()
    {

       
        $table = new PrivModel($this->tableName, DB::Link(Conf::MYSQL));
        $tablePatients = new DbEntity('patients', DB::Link(Conf::MYSQL));
        $tablePrivivki = new DbEntity('privivki', DB::Link(Conf::MYSQL));
        $tableKarta = new DbEntity('karta', DB::Link(Conf::MYSQL));

        $this->render("search", [
            'table' => $table->search($_POST['name']),
            
            "URL" => '?t=' . $this->shortClassName() . '&a=Search',
            'patients' => $tablePatients->getColumn('fio','birth_date','adres'),
            'privivki' => $tablePrivivki->getColumn('name','vaccine'),
            'karta' => $tableKarta->getColumn('date'),
            'tableHeaders' => ['прививка','пациент','дата рождения','адрес','дата вакцинации',' описание вакцины']
        ]);
    }
}