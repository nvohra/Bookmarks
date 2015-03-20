<?php
/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 10/03/2015
 * Time: 16:23
 */

namespace User\Controller;

use User\Form\LoginForm;
use Zend\Authentication\AuthenticationService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter;
use Zend\View\Model\ViewModel;
use User\Service\AuthenticationStorageService;

class LoginController extends AbstractActionController
{
    /**
     * @var AuthenticationService
     */
    private $authenticationService;

    /**
     * @var null|\Zend\Authentication\Adapter\AdapterInterface
     */
    private $adapter;

    /**
     * @var \Zend\Authentication\Storage\StorageInterface
     */
    private $storage;

    /**
     * @var LoginForm
     */
    private $form;

    function __construct(AuthenticationService $authenticationService, LoginForm $form)
    {
        $this->authenticationService = $authenticationService;
        $this->adapter               = $authenticationService->getAdapter();
        $this->storage               = $authenticationService->getStorage();
        $this->form                  = $form;
    }

    public function loginAction()
    {
        //$acl = $this->serviceLocator->get('User\Service\Acl');

        if ($this->identity()) {
            return $this->redirect()->toRoute('user\user\index');
        }

        $this->layout()->title = 'Login';

        $this->form->get('submit')->setValue('Sign in');
        $this->form->setAttribute('action', $this->url()->fromRoute('user\login\doLogin'));

        return [
            'form'     => $this->form,
            'messages' => $this->flashMessenger()->getMessages(),
        ];
    }

    public function doLoginAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->form->setData($request->getPost());
            $messages = '';

            if ($this->form->isValid()) {
                $data = $this->form->getData();

                $this->adapter
                    ->setIdentity($data['email'])
                    ->setCredential($data['password'])
                ;

                $result = $this->authenticationService->authenticate();

                if ($result->isValid()) {
                    if ($data['rememberme'] == 1) {
                        $this->storage->setRememberMe(1);
                    }

                    $user = $this->adapter->getResultRowObject();
                    //$user = $result->getIdentitiy();

                    $this->storage->write($user);

                    return $this->redirect()->toRoute('user\user\index');
                }

                $messages = $result->getMessages();
            }

            $this->form->prepare();

            $this->layout()->title = 'Login - Error - Review your data';

            $view = new ViewModel([
                'form'      => $this->form,
                'messages'  => $messages,
            ]);
            $view->setTemplate('user/login/login.phtml');

            return $view;
        }

        // trying to access 'user\login\doLogin' directly
        $this->flashMessenger()->addMessage('You must use this form');

        return $this->redirect()->toRoute('user\login\login');
    }

    public function logoutAction()
    {
        $this->storage->forgetMe();
        $this->authenticationService->clearIdentity();
        $this->flashMessenger()->clearCurrentMessages();
        $this->flashMessenger()->addMessage('Logged Out');

        return $this->redirect()->toRoute('user\login\login');
    }

    public function forbiddenAction()
    {
        /*$view = new ViewModel([
            'form'      => $this->form,
            'messages'  => $messages,
        ]);
        $view->setTemplate('user/user/forbidden.phtml');

        return $view;*/
        return $this->redirect()->toRoute('user\login\login');
    }
}