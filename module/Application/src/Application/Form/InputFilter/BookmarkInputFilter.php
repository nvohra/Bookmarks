<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 13/03/2015
 * Time: 16:04
 */

namespace Application\Form\InputFilter;


use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class BookmarkInputFilter implements InputFilterAwareInterface
{
    private $inputFilter;

    function __construct()
    {
        $inputFilter = new InputFilter();

        $inputFilter->add(array(
            'name' => 'id',
            'continue_if_empty' => 'true',
        ));

        $inputFilter->add(array(
            'name' => 'date',
            'continue_if_empty' => 'true',
        ));

        /*$inputFilter->add(array(
            'name' => 'url',
            'required' => 'true',
            'filters' => array(
                array('name' => 'Alnum'),
                array('name' => 'StringTrim'), //clean blank spaces
                array('name' => 'StripTags'), //clean malicious code
                array('name' => 'StringToLower'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'Url is required',
                        ),
                    ),
                ),
            ),
        ));*/

        $inputFilter->add(array(
            'name' => 'title',
            'required' => true,
            'filters' => array(
                array('name' => 'Alnum'),
                array('name' => 'StringTrim'), //clean blank spaces
                array('name' => 'StripTags'), //clean malicious code
                array('name' => 'StringToLower'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'Url is required',
                        ),
                    ),
                ),
            ),
        ));

        $inputFilter->add(array(
            'name' => 'description',
            'required' => 'true',
            'filters' => array(
                array('name' => 'Alnum'),
                array('name' => 'StringTrim'), //clean blank spaces
                array('name' => 'StripTags'), //clean malicious code
                array('name' => 'StringToLower'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'Description is required',
                        ),
                    ),
                ),
            ),
        ));

        $inputFilter->add(array(
            'name' => 'votes',
            'required' => true,
            'filters' => array(
                array('name' => 'Digits'), // only numbers
                array('name' => 'StringTrim'), //clean blank spaces
                array('name' => 'StripTags'), //clean malicious code
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'Votes are required',
                        ),
                    ),
                ),
            ),
        ));

        $inputFilter->add(array(
            'name' => 'idUser',
            'required' => true,
            'filters' => array(
                array('name' => 'Digits'), // only numbers
                array('name' => 'StringTrim'), //clean blank spaces
                array('name' => 'StripTags'), //clean malicious code
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'IdUser is required',
                        ),
                    ),
                ),
            ),
        ));

        $this->inputFilter = $inputFilter;
    }

    /**
     * Set input filter
     *
     * @param  InputFilterInterface $inputFilter
     * @return InputFilterAwareInterface
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception('Not used');
    }

    /**
     * Retrieve input filter
     *
     * @return InputFilterInterface
     */
    public function getInputFilter()
    {
        return $this->inputFilter;
    }
}