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
        // $tableKarta = new DbEntity('karta', DB::Link(Conf::MYSQL));
        // $tablePatients = new DbEntity('patients', DB::Link(Conf::MYSQL));
        // $tablePrivivki = new DbEntity('privivki', DB::Link(Conf::MYSQL));
        // $this->view->setPatternsPath('templates/print/');

        $this->render("show", [
            // 'columnsNames' => $this->table->getColumnsNames(),
            // 'URL' => '?t=' . $this->shortClassName() . '&a=Add',
            // 'karta' => $tableKarta->getColumn('description'),
            // 'patients' => $tablePatients->getColumn('description'),
            // 'privivki' => $tablePrivivki->getColumn('description'),
            // 'tableHeaders' => $this->table->getColumnsComments()
        ]);
    }


    
}
