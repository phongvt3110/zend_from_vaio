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

    public function addAction(){
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function editAction(){
        $viewModel = new ViewModel();
        return $viewModel;
    }

    public function deleteAction(){
        $viewModel = new ViewModel();
        return $viewModel;
    }
}