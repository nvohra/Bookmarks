<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 12/03/2015
 * Time: 23:05
 */

namespace Application\Form\Factory;


use Application\Form\InputFilter\TagInputFilter;
use Application\Form\TagForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TagFormFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new TagForm();
        $filter = new TagInputFilter();
        $form->setInputFilter($filter->getInputFilter());

        return $form;
    }
}