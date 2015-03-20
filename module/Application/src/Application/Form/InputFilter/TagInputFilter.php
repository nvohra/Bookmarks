<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 12/03/2015
 * Time: 23:00
 */

namespace Application\Form\InputFilter;


use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class TagInputFilter implements InputFilterAwareInterface
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
            'name' => 'name',
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
                            'isEmpty' => 'name is required',
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