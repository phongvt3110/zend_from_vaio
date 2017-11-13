<?php
/**
 * Created by PhpStorm.
 * User: pvt
 * Date: 11/11/17
 * Time: 11:39 PM
 */

namespace Admin\Model;

use Zend\Db\Exception\RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class AlbumTable
{
    protected $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll(){
        return $this->tableGateway->select();
    }

    public function getAlbum($id){
        $rowSet = $this->tableGateway->select(['id' => $id]);
        $row = $rowSet->current();
        if(!$row){
            throw new RuntimeException('Could not find row %d',$id);
        }
        return $row;
    }

    public function saveAlbum(Album $album){
        $data = [
            'artist' => $album->artist,
            'title'  => $album->title
        ];
        $id = $album->id;
        if($id == 0 || !isset($id)){
            $this->tableGateway->insert($data);
        } else {
            if($this->getAlbum($id)){
                $this->tableGateway->update($data,['id' => $id]);
            } else {
                throw new RuntimeException(sprintf('Album %d is does not exist',$id));
            }
        }
    }

    public function deleteAlbum($id){
        $this->tableGateway->delete(['id' => $id]);
    }
}