<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 30/01/2015
 * Time: 20:07
 */

namespace Application\Controller;

use Application\Form\BookmarkForm;
use Application\Model\BookmarkDao;
use Application\Model\TagDao;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BookmarkController extends AbstractActionController
{
    /**
     * @var BookmarkDao
     */
    private $bookmarkDao;
    /**
     * @var TagDao
     */
    private $tagDao;

    /**
     * @var BookmarkForm
     */
    private $form;
    function __construct(BookmarkDao $bookmarkDao, TagDao $tagDao, BookmarkForm $form)
    {
        $this->bookmarkDao = $bookmarkDao;
        $this->tagDao = $tagDao;
        $this->form = $form;
    }

    public function indexAction()
    {
        $this->layout()->title = 'List Bookmark';
        $bookmarks = $this->bookmarkDao->findAll();
        $pages = $this->bookmarkDao->findAll();

        foreach($bookmarks as $b) {
            $tags = $this->tagDao->getTagsByBookmarkId($b->getId());
            $b->tags = $tags;
            $bookmarksArray[] = $b;
        }

        $pages->setCurrentPageNumber($this->params()->fromRoute('page'));
        $pages->setItemCountPerPage(2);

        return ['bookmarks' => $bookmarksArray,'pages' => $pages];
    }

    public function viewAction()
    {
        $this->layout()->title = 'Bookmark Details';

        $id = $this->params()->fromRoute('id');
        $bookmark = $this->bookmarkDao->getById($id);

        return ['bookmark' => $bookmark];
    }

    public function createAction()
    {
        $this->layout()->title = 'Create Bookmark';

        $this->form->get('submit')->setValue('Create New Bookmark');
        $this->form->setAttribute('action', $this->url()->fromRoute('application\bookmark\doCreate'));

        return ['form' => $this->form, 'isUpdate' => false];
    }

    public function doCreateAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->form->setData($request->getPost());

            if ($this->form->isValid()) {
                $formData = $this->form->getData();

                $data['url']   = $formData['url'];
                $data['title']      = $formData['title'];
                $data['description']   = $formData['description'];
                $data['date']       = date('Y-m-d H:i:s');
                $data['votes']       = $formData['votes'];
                $data['idUser']     = $formData['idUser'];

                $this->bookmarkDao->save($data);

                return $this->redirect()->toRoute('application\bookmark\index');
            }

            $this->form->prepare();

            $this->layout()->title = 'Create Bookmark - Error - Review your data';

            //we reuse the create view
            $view = new ViewModel(['form' => $this->form, 'isUpdate' => false]);
            $view->setTemplate('application/bookmark/create.phtml');

            return $view;
        }

        return $this->redirect()->toRoute('application\bookmark\create');
    }

    public function deleteAction()
    {
        $id = $this->params()->fromRoute('id');
        $this->bookmarkDao->delete($id);


        $this->redirect()->toRoute('application\bookmark\index');
    }

    public function updateAction()
    {
        $this->layout()->title = 'Update Bookmark';

        $id = $this->params()->fromRoute('id');
        $bookmark = $this->bookmarkDao->getById($id);

        $this->form->setAttribute('action', $this->url()->fromRoute('application\bookmark\doUpdate'));
        $this->form->bind($bookmark);
        $this->form->get('submit')->setAttribute('value', 'Edit Bookmark');

        //we reuse the create view
        $view = new ViewModel(['form' => $this->form, 'isUpdate' => true]);
        $view->setTemplate('application/bookmark/create.phtml');

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
                $data['url']   = $formData['url'];
                $data['title']      = $formData['title'];
                $data['description']   = $formData['description'];
                $data['date']       = $formData['date']; //date('Y-m-d H:i:s');
                $data['votes']       = $formData['votes'];
                $data['idUser']     = $formData['idUser'];

                $this->bookmarkDao->update($data);

                return $this->redirect()->toRoute('application\bookmark\index');
            }

            $this->form->prepare();

            $this->layout()->title = 'Update Bookmark - Error - Review your data';

            //we reuse the create view
            $view = new ViewModel(['form' => $this->form, 'isUpdate' => true]);
            $view->setTemplate('application/bookmark/create.phtml');

            return $view;
        }

        $this->redirect()-toRoute('application\bookmark\index');
    }
}