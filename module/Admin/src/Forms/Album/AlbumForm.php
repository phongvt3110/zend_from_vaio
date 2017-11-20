<?php
/**
 * Created by PhpStorm.
 * User: phongvt
 * Date: 11/20/17
 * Time: 2:29 PM
 */

namespace Admin\Forms\Album;
use Zend\Form\Form;


class AlbumForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('album');
        $this->add([
            'name' => 'id',
            'type' => 'Hidden'
        ]);

        $this->add([
            'name' => 'title',
            'type' => 'Text',
            'options' => [
                'label' => 'Title'
            ]
        ]);

        $this->add([
            'name' => 'artist',
            'type' => 'Text',
            'options' => [
                'label' => 'Artist'
            ]
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton'
            ]
        ]);
    }
}