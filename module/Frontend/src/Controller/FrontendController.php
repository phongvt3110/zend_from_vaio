<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Frontend\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class FrontendController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    public function homeAction(){
        return new ViewModel();
    }
    public function productsAction(){
        $viewModel = new ViewModel();
        $data = 'Samsung';
        $viewModel->setVariables(['data' => isset($data)?$data:null]);
        return $viewModel;
    }
}
