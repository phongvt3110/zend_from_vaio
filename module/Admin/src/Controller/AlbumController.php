<?php
/**
 * Created by PhpStorm.
 * User: pvt
 * Date: 11/12/17
 * Time: 7:48 AM
 */

namespace Admin\Controller;

use Admin\Model\AlbumTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController
{
    private $table;

    public function __construct(AlbumTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        $viewModel = new ViewModel();
        $data = [
            'mobile' => 'Samsung',
            'tab'    => 'IPad',
            'albums' => $this->table->fetchAll()
        ];
        $content = [
            'article' => 'news',
            'sport'   => 'football'
        ];
        $viewModel->setVariables(
            [
                'data' => isset($data)?$data:null,
                'content' => isset($content)? $content:null
            ]
        );
        return $viewModel;
    }

//    protected function getAlbumTable(){
//        if(!$this->albumTable){
//            $sm = $this->getServiceLocator();
//            $this->table->fetchAll(); //= $sm->get('Admin\Model\AlbumTable');
//        }
//        return $this->albumTable;
//    }
}