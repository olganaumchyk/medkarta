<?php

namespace App\Controller;

use App\Model\PatientsModel;
use TexLab\MyDB\DB;
use App\Core\Conf;
use TexLab\MyDB\DbEntity;

class PatientsController extends AbstractTableController
{
    protected $tableName = 'patients';
    protected $viewPatternsPath = 'templates/table/';
    protected $pageSize = 3;
    
    public function __construct()
    {
        parent::__construct();
        $this->table = new PatientsModel($this->tableName, DB::Link(Conf::MYSQL));
    }

    public function actionShowEditForm()
    {
        $tablePatients = new DbEntity('patients', DB::Link(Conf::MYSQL));

        $this->view->setPatternsPath('templates/patients/');

        $this->render("ShowAddEditForm", [
            'columnsNames' => $this->table->getColumnsNames(),
            'editValues' => $this->table->get(['id' => $_GET['id']])[0],
            'URL' => '?t=' . $this->shortClassName() . '&a=Edit&id=' . $_GET['id'],
            'patients' => $tablePatients->getColumn('description'),
            'tableHeaders' => $this->table->getColumnsComments()
        ]);
    }



    public function actionShowAddForm()
    {
        $tablePatients = new DbEntity('patients', DB::Link(Conf::MYSQL));

        $this->view->setPatternsPath('templates/patients/');
        
        $this->render("ShowAddEditForm", [
            'columnsNames' => $this->table->getColumnsNames(),
            'URL' => '?t=' . $this->shortClassName() . '&a=Add',
            'patients' => $tablePatients->getColumn('description'),
            'tableHeaders' => $this->table->getColumnsComments()
        ]);
    }


}