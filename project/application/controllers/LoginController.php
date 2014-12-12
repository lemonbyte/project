<?php

class LoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_helper->redirector('Login', 'login');
    }

    public function loginAction()
    {
        if(Zend_Auth::getInstance()->hasIdentity()){
            $this->_helper->redirector('index', 'Dashboard');
        }
        $form = new Application_Model_FormLogin();

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($this->_request->getPost()))
            {

                $authAdapter = $this->getAuthAdapter();
                $username = $form->getValue('email');
                $password = $form->getValue('pswd');

                $authAdapter->setIdentity($username)
                            ->setCredential($password);

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

                // Did the user successfully login?
                if ($result->isValid()){
                    $identity = $authAdapter->getResultRowObject();

                    $autStorage = $auth->getStorage();
                    $autStorage->write($identity);

                    $account = new Application_Model_Users();
                    $lastLogin = $account->findByEmail($form->getValue('email'));
                    $lastLogin->lastlogin = date('Y-m-d H:i:s');
                    $lastLogin->save();

                    $this->_helper->flashMessenger->addMessage('You are logged in');
                    $this->_helper->redirector('index', 'Dashboard');
                }
                else{
                    $this->view->errors = array(Login =>array('Login Failed'));
                }
            }
            else{
                $this->view->errors = $form->getErrors();
            }
        }
        $this->view->form = $form;
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_helper->redirector('index', 'index');
    }

    private function getAuthAdapter(){
        $autAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $autAdapter->setTableName('Users')
            ->setIdentityColumn('username')
            ->setCredentialColumn('password')
            ->setCredentialTreatment('MD5(?)');
        return $autAdapter;
    }


}





