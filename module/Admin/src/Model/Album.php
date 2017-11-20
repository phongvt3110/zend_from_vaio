<?php
/**
 * Created by PhpStorm.
 * User: pvt
 * Date: 11/11/17
 * Time: 11:34 PM
 */

namespace Admin\Model;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;


class Album implements InputFilterAwareInterface
{
    public $id;
    public $title;
    public $artist;
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->artist = (!empty($data['artist'])) ? $data['artist'] : null;
        $this->title  = (!empty($data['title'])) ? $data['title'] : null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        // TODO: Implement setInputFilter() method.
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        // TODO: Implement getInputFilter() method.
        if(!$this->inputFilter){
            $inputFilter = new InputFilter();

            $inputFilter->add([
                'name' => 'id',
                'required' => true,
                'filters'  => [
                    ['name' => 'Int']
                ]
            ]);

            $inputFilter->add([
                'name' => 'artist',
                'required' => true,
                'filters'  => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim']
                ],
                'validators' => [
                    ['name' => 'StringLength',
                      'options' => [
                          'encoding' => 'UTF-8',
                          'min' => 1,
                          'max' => 100
                        ]
                    ]
                ]
            ]);

            $inputFilter->add([
                'name' => 'title',
                'required' => true,
                'filters'  => [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim']
                ],
                'validators' => [
                    ['name' => 'StringLength',
                      'options' => [
                          'encoding' => 'UTF-8',
                          'min' => 1,
                          'max' => 100
                      ]
                    ]
                ]
            ]);
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }
}