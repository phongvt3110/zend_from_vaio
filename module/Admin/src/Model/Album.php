<?php
/**
 * Created by PhpStorm.
 * User: pvt
 * Date: 11/11/17
 * Time: 11:34 PM
 */

namespace Admin\Model;


class Album
{
    public $id;
    public $title;
    public $artist;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->artist = (!empty($data['artist'])) ? $data['artist'] : null;
        $this->title  = (!empty($data['title'])) ? $data['title'] : null;
    }
}