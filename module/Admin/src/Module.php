<?php

namespace Admin;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\AdapterInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    const VERSION = '3.0.2';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig(){
        return [
            'factories' => [
                Model\AlbumTable::class => function($sm){
                    $tableGateway = $sm->get(Model\AlbumTableGateway::class);
                    return new Model\AlbumTable($tableGateway);
                },
                Model\AlbumTableGateway::class => function($sm){
                    $dbAdapter = $sm->get(AdapterInterface::class);
                    $resultSetPropotype = new ResultSet();
                    $resultSetPropotype->setArrayObjectPrototype(new Model\Album);
                    return new TableGateway('albums',$dbAdapter, null, $resultSetPropotype);
                }
            ]
        ];
    }

    public function getControllerConfig(){
        return [
            'factories' => [
                Controller\AlbumController::class => function($container) {
                    return new Controller\AlbumController($container->get(Model\AlbumTable::class));
                }
            ]
        ];
    }
}