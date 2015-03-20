<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 13/03/2015
 * Time: 16:02
 */

namespace Application\Form\Factory;


use Application\Form\InputFilter\BookmarkInputFilter;
use Application\Form\BookmarkForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BookmarkFormFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new BookmarkForm();
        $filter = new BookmarkInputFilter();
        $form->setInputFilter($filter->getInputFilter());

        return $form;
    }
}