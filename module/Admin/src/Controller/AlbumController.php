<?php
/**
 * Created by PhpStorm.
 * User: pvt
 * Date: 11/12/17
 * Time: 7:48 AM
 */

namespace Admin\Controller;

use Admin\Model\Album;
use Admin\Model\AlbumTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Forms\Album\AlbumForm;

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
        $this->layout('layout/adminlayout');
        return $viewModel;
    }

    public function addAction(){
        $viewModel = new ViewModel();
        $this->layout('layout/adminlayout');
        $form = new AlbumForm();
        $form->get('submit')->setValue('Add new album');
        $request = $this->getRequest();
        if($request->isPost()){
            $album = new Album();
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());
            if($form->isValid()){
                $album->exchangeArray($form->getData());
                $this->table->saveAlbum($album);
                return $this->redirect()->toRoute('album_home');
            }
        }
        $viewModel->setVariables(['form' => $form]);
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