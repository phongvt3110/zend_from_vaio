<?php
/**
 * Created by PhpStorm.
 * User: phongvt
 * Date: 10/30/17
 * Time: 4:44 PM
 */

namespace Frontend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ProductController extends AbstractActionController
{
    public function indexAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }
    public function addAction()
    {
        $viewModel = new ViewModel();
        $data = [
            'mobile' => 'Samsung',
            'tab'    => 'IPad'
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
        //echo 'print viewModel variables:'. $viewModel->getVariable('data') . '  viewModel';
        $this->layout('layout/frontendlayout');
        return $viewModel;
    }
    public function findAction()
    {
        $viewModel = new ViewModel();
        $this->layout('layout/frontendlayout');
        return $viewModel;
    }
    public function deleteAction()
    {
        $viewModel = new ViewModel();
        $this->layout('layout/frontendlayout');
        return $viewModel;
    }
    public function detailsAction()
    {
        $viewModel = new ViewModel();
        $this->layout('layout/frontendlayout');
        return $viewModel;
    }
}