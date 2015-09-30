<?php
/**
 * Created by PhpStorm.
 * User: vallabh
 * Date: 9/30/15
 * Time: 10:50 AM
 */
namespace Album\Form;

use Zend\Form\Form;

class AlbumForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('album');

        $this->add(
            [
                'name' => 'id',
                'type' => 'Hidden',
            ]
        );
        $this->add(
            [
                'name'    => 'title',
                'type'    => 'Text',
                'options' => [
                    'label' => 'Title',
                ],
            ]
        );
        $this->add(
            [
                'name'    => 'artist',
                'type'    => 'Text',
                'options' => [
                    'label' => 'Artist',
                ],
            ]
        );
        $this->add(
            [
                'name'       => 'submit',
                'type'       => 'Submit',
                'attributes' => [
                    'value' => 'Go',
                    'id'    => 'submitbutton',
                ],
            ]
        );
    }
}
