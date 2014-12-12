<?php

class DashboardController extends Zend_Controller_Action
{

    public function init()
    {
        $layout = $this->_helper->layout();
        $layout->setLayout('layoutdashboard');
        $this->view->supportEmail = Zend_Registry::get('config')->company->email->support;

        if ($this->_helper->FlashMessenger->hasMessages()) {
            $this->view->messages = $this->_helper->FlashMessenger->getMessages();
        }
    }

    public function indexAction()
    {
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){

            $identity = $auth->getIdentity();
            if (isset($identity)) {
                $this->view->id = $identity->username;
            }

            try {
                $this->view->projects = $this->projectsAction();
                $this->view->categories = $this->categoriesAction();
                $this->view->doneprojects = $this->countProjectsAction();
            } catch (Exception $e) {
                Zend_Debug::Dump($e->getMessage());
            }

        }
        else{
            $this->_helper->redirector('login', 'Login');
        }
    }

    public function projectsAction()
    {
        $projects = new Application_Model_Projects();
        $results =  $projects->showAllProjects();
        return $results;
    }

    public function categoriesAction()
    {
        $projects = new Application_Model_Categories();
        $results =  $projects->showAllCategories();
        return $results;
    }

    public function countProjectsAction()
    {
        $projects = new Application_Model_Projects();
        $results =  $projects->countProjects();
        return $results;
    }

    public function showProjectAction()
    {
        // action body
    }

    public function createNewProjectAction()
    {
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity()){

        $form = new Application_Model_AddProject();

        $categorien = array(
            1 => "Project Management",
            2 => "Programmeren",
        );

        try {
            $element = $form->getElement('Categorie')->addMultiOptions($categorien);
        } catch (Exception $e) {
            Zend_Debug::Dump($e->getMessage());
        }

        if ($this->getRequest()->isPost()) {

            if ($form->isValid($this->_request->getPost()))
            {
                $ProjectName = $form->getValue('ProjectName');
                $Description = $form->getValue('Description');
                $Categorie = $form->getValue('Categorie');

                try {
                    $Project = new Application_Model_Projects();
                    $Project->createProjects(array(
                        'ProjectName' => $ProjectName,
                        'Description' => $Description,
                        'Catagorie' => $Categorie,
                        'Active' => '1',
                        'Creationdate' => date('Y-m-d H:i:s'),
                        'Open' => '1'
                    ));
                } catch (Exception $e) {
                    Zend_Debug::Dump($e->getMessage());
                }

                $this->_helper->flashMessenger->addMessage('Project added');
                $this->_helper->redirector('index', 'Dashboard');

            }

        }

        $this->view->form = $form;

    }
    }

}









