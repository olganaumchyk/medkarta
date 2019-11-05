<?php
// namespace App\Controller;

// class KartaController extends AbstractTableController
// {
//     protected $tableName = 'karta';
//     protected $viewPatternsPath = 'templates/table/';
//     protected $pageSize = 2;
// }

namespace App\Controller;

use App\Model\KartaModel;
use TexLab\MyDB\DB;
use App\Core\Conf;
use TexLab\MyDB\DbEntity;

class KartaController extends AbstractTableController
{
    protected $tableName = 'karta';
    protected $viewPatternsPath = 'templates/table/';
    protected $pageSize = 3;
    
    public function __construct()
    {
        parent::__construct();
        $this->table = new KartaModel($this->tableName, DB::Link(Conf::MYSQL));
    }

    public function actionShowEditForm()
    {
        $tableKartaGroup = new DbEntity('karta', DB::Link(Conf::MYSQL));
        $tablePrivivki = new DbEntity('privivki', DB::Link(Conf::MYSQL));
        $tablePatients = new DbEntity('patients', DB::Link(Conf::MYSQL));

        $this->view->setPatternsPath('templates/table/');

        $this->render("ShowAddEditForm", [
            'columnsNames' => $this->table->getColumnsNames(),
            'editValues' => $this->table->get(['id' => $_GET['id']])[0],
            'URL' => '?t=' . $this->shortClassName() . '&a=Edit&id=' . $_GET['id'],
            'karta' => $tableKartaGroup->getColumn('description'),
            'patients_id'=>$tablePatients->getColumn('fio'),
            'privivki_id'=>$tablePrivivki->getColumn('name'),
            'tableHeaders' => $this->table->getColumnsComments()
        ]);
    }



    // public function actionShowAddForm()
    // {
    //     $tableKartaGroup = new DbEntity('karta', DB::Link(Conf::MYSQL));
    //     $tablePrivivki = new DbEntity('privivki', DB::Link(Conf::MYSQL));
    //     $tablePatients = new DbEntity('patients', DB::Link(Conf::MYSQL));

    //     $this->view->setPatternsPath('templates/table/');
        
    //     $this->render("ShowAddEditForm", [
    //         'columnsNames' => $this->table->getColumnsNames(),
    //         'URL' => '?t=' . $this->shortClassName() . '&a=Add',
    //         'karta' => $tableKartaGroup->getColumn('description'),
    //         `karta`.`patients_id`=>$tablePatients->getColumn('fio'),
    //         `karta`.`privivki_id`=>$tablePrivivki->getColumn('name'),
    //         'tableHeaders' => $this->table->getColumnsComments()
    //     ]);
    // }


}