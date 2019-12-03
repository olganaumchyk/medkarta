<?php

namespace App\Controller;

use App\Model\PrivivkiModel;
use TexLab\MyDB\DB;
use App\Core\Conf;
use TexLab\MyDB\DbEntity;

class PrivivkiController extends AbstractTableController
{
    protected $tableName = 'privivki';
    protected $viewPatternsPath = 'templates/table/';
    protected $pageSize = 15;
    
    public function __construct()
    {
        parent::__construct();
        $this->table = new PrivivkiModel($this->tableName, DB::Link(Conf::MYSQL));
    }

    public function actionShowEditForm()
    {
        $tablePrivivki = new DbEntity('privivki', DB::Link(Conf::MYSQL));

        $this->view->setPatternsPath('templates/privivki/');

        $this->render("ShowAddEditForm", [
            'columnsNames' => $this->table->getColumnsNames(),
            'editValues' => $this->table->get(['id' => $_GET['id']])[0],
            'URL' => '?t=' . $this->shortClassName() . '&a=Edit&id=' . $_GET['id'],
            'privivki' => $tablePrivivki->getColumn('description'),
            'tableHeaders' => $this->table->getColumnsComments()
        ]);
    }



    public function actionShowAddForm()
    {
        $tablePrivivki = new DbEntity('privivki', DB::Link(Conf::MYSQL));

        $this->view->setPatternsPath('templates/privivki/');
        
        $this->render("ShowAddEditForm", [
            'columnsNames' => $this->table->getColumnsNames(),
            'URL' => '?t=' . $this->shortClassName() . '&a=Add',
            'privivki' => $tablePrivivki->getColumn('description'),
            'tableHeaders' => $this->table->getColumnsComments()
        ]);
    }


}