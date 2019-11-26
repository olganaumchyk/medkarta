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
        print_r($this->table->search());

        $this->render("show", [

        ]);
    }


    // public function actionShowEditForm()
    // {
    //     // $tableKarta = new DbEntity('karta', DB::Link(Conf::MYSQL));
    //     $tablePatients = new DbEntity('patients', DB::Link(Conf::MYSQL));
    //     $tablePrivivki = new DbEntity('privivki', DB::Link(Conf::MYSQL));
    //     $this->view->setPatternsPath('templates/karta/');

    //     $this->render("ShowAddEditForm", [
    //         'columnsNames' => $this->table->getColumnsNames(),
    //         'editValues' => $this->table->get(['id' => $_GET['id']])[0],
    //         'URL' => '?t=' . $this->shortClassName() . '&a=Edit&id=' . $_GET['id'],
    //         // 'karta' => $tableKarta->getColumn('description'),
    //         'patients'=>$tablePatients->getColumn('fio'),
    //         'privivki'=>$tablePrivivki->getColumn('name'),
    //         'tableHeaders' => $this->table->getColumnsComments()
    //     ]);
}
