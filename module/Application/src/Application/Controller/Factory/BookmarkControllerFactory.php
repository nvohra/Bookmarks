<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 30/01/2015
 * Time: 20:11
 */

namespace Application\Controller\Factory;


use Application\Controller\BookmarkController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BookmarkControllerFactory implements FactoryInterface{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();

        $bookmarkDao = $sm->get('BookmarkDao');
        $tagDao = $sm->get('TagDao');
        $form = $sm->get('BookmarkForm');
        return new BookmarkController($bookmarkDao,$tagDao,$form);
    }
}