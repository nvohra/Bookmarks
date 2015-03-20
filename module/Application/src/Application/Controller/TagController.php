<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 30/01/2015
 * Time: 20:07
 */

namespace Application\Controller;

use Application\Form\TagForm;
use Application\Model\TagDao;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TagController extends AbstractActionController
{
    /**
     * @var TagDao
     */
    private $model;

    /**
     * @var TagForm
     */
    private $form;

    /**
     * @param TagDao $model
     */
    function __construct(TagDao $model, TagForm $form)
    {
        $this->model = $model;
        $this->form = $form;
    }

    public function indexAction()
    {
        $this->layout()->title = 'List Tags';
        $tags = $this->model->findAll();

        $tags->setCurrentPageNumber($this->params()->fromRoute('page'));
        $tags->setItemCountPerPage(2);

        return ['tags' => $tags];
    }

    public function viewAction()
    {
        $this->layout()->title = 'Tag Details';

        $id = $this->params()->fromRoute('id');
        $tag = $this->model->getById($id);

        return ['tag' => $tag];
    }

    public function createAction()
    {
        $this->layout()->title = 'Create Tag';

        $this->form->get('submit')->setValue('Create New Tag');
        $this->form->setAttribute('action', $this->url()->fromRoute('application\tag\doCreate'));

        return ['form' => $this->form, 'isUpdate' => false];
    }

    public function doCreateAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->form->setData($request->getPost());

            if ($this->form->isValid()) {
                $formData = $this->form->getData();

                $data['name']   = $formData['name'];

                $this->model->save($data);

                return $this->redirect()->toRoute('application\tag\index');
            }

            $this->form->prepare();

            $this->layout()->title = 'Create Tag - Error - Review your data';

            //we reuse the create view
            $view = new ViewModel(['form' => $this->form, 'isUpdate' => false]);
            $view->setTemplate('application/tag/create.phtml');

            return $view;
        }

        return $this->redirect()->toRoute('application\tag\create');
    }

    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id');
        $this->model->delete($id);


        $this->redirect()->toRoute('application\tag\index');
    }

    public function updateAction()
    {
        $this->layout()->title = 'Update Tag';

        $id = $this->params()->fromRoute('id');
        $tag = $this->model->getById($id);

        $this->form->setAttribute('action', $this->url()->fromRoute('application\tag\doUpdate'));

        $this->form->bind($tag);
        $this->form->get('submit')->setAttribute('value', 'Edit Tag');

        //we reuse the create view
        $view = new ViewModel(['form' => $this->form, 'isUpdate' => true]);
        $view->setTemplate('application/tag/create.phtml');

        return $view;
    }

    public function doUpdateAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->form->setData($request->getPost());

            if ($this->form->isValid()) {
                $formData = $this->form->getData();

                $data['id']         = $formData['id'];
                $data['name']   = $formData['name'];

                $this->model->update($data);

                return $this->redirect()->toRoute('application\tag\index');
            }

            $this->form->prepare();

            $this->layout()->title = 'Update Tag - Error - Review your data';

            //we reuse the create view
            $view = new ViewModel(['form' => $this->form, 'isUpdate' => true]);
            $view->setTemplate('application/tag/create.phtml');

            return $view;
        }

        $this->redirect()-toRoute('application\tag\index');
    }
}