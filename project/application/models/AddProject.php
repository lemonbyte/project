<?php

class Application_Model_AddProject extends Zend_Form
{

    public function __construct($options = null)
    {

        parent::__construct($options);
        $this->setName('login');
        $this->setMethod('post');
        $this->setAction('/Dashboard/createNewProject');

        $ProjectName = new Zend_Form_Element_Text('ProjectName');
        $ProjectName->setAttrib('size', 35)
            ->removeDecorator('label')
            ->removeDecorator('htmlTag');
        $ProjectName->setRequired(true);
        $ProjectName->addErrorMessage('Please add an project name');

        $Description = new Zend_Form_Element_Text('Description');
        $Description->setAttrib('size', 35)
            ->removeDecorator('label')
            ->removeDecorator('htmlTag');
        $Description->setRequired(true);
        $Description->addErrorMessage('Please add an description');


        $Categorie = new Zend_Form_Element_Radio('Categorie');
        $Categorie->setLabel('Choose an Categorie');
        $Categorie->setRequired(true);
        $Categorie->addErrorMessage('Please choose categorie');
        $Categorie->removeDecorator('label')
            ->removeDecorator('htmlTag');


        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('submit');
        $submit->removeDecorator('DtDdWrapper');

        $this->setDecorators( array( array('ViewScript',
            array('viewScript' => '_add_project.phtml'))));

        $this->addElements(array($ProjectName, $Description, $Categorie,$submit));
    }

}

