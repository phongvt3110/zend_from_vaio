<?php

namespace Admin;

use Admin\Model\Album;
use Admin\Model\AlbumTable;
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
                    $tableGateway = $sm->get(Model\AlbumTable::class);
                    $table = new AlbumTable($tableGateway);
                    return $table;
                },
                Model\AlbumTableGateway::class => function($sm){
                    $dbAdapter = $sm->get(AdapterInterface::class);
                    $resultSetPropotype = new ResultSet();
                    $resultSetPropotype->setArrayObjectPrototype(new Album());
                    return new TableGateway('albums',$dbAdapter, null, $resultSetPropotype);
                }
            ]
        ];
    }

    public function getControllerConfig(){
        return [
            'controllers' => [
                'factories' => [
                    Controller\AlbumController::class => function($container) {
                        return new Controller\AlbumController($container->get(Model\AlbumTable::class));
                    }
                ]
            ]
        ];
    }
}