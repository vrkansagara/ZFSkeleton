<?php
/**
 * Created by PhpStorm.
 * User: vallabh
 * Date: 9/30/15
 * Time: 10:32 AM
 */
namespace Album\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Album implements InputFilterAwareInterface
{
    public $id;
    public $artist;
    public $title;
    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->artist = (!empty($data['artist'])) ? $data['artist'] : null;
        $this->title = (!empty($data['title'])) ? $data['title'] : null;
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add(
                [
                    'name'     => 'id',
                    'required' => true,
                    'filters'  => [
                        ['name' => 'Int'],
                    ],
                ]
            );

            $inputFilter->add(
                [
                    'name'       => 'artist',
                    'required'   => true,
                    'filters'    => [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim'],
                    ],
                    'validators' => [
                        [
                            'name'    => 'StringLength',
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min'      => 1,
                                'max'      => 100,
                            ],
                        ],
                    ],
                ]
            );

            $inputFilter->add(
                [
                    'name'       => 'title',
                    'required'   => true,
                    'filters'    => [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim'],
                    ],
                    'validators' => [
                        [
                            'name'    => 'StringLength',
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min'      => 1,
                                'max'      => 100,
                            ],
                        ],
                    ],
                ]
            );

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
    // Add the following method:
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}
