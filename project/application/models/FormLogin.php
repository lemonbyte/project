<?php

class Application_Model_FormLogin extends Zend_Form
{
    public function __construct($options = null)
    {

        parent::__construct($options);
        $this->setName('login');
        $this->setMethod('post');
        $this->setAction('/login/login');

        $email = new Zend_Form_Element_Text('email');
        $email->setAttrib('size', 35)
            ->removeDecorator('label')
            ->removeDecorator('htmlTag')
            ->removeDecorator('errors');
        $email->setRequired(true);
        $email->addValidator('emailAddress');
        $email->addErrorMessage('Please enter a valid email adress');
        $email->removeDecorator('Error');

        $pswd = new Zend_Form_Element_Password('pswd');
        $pswd->setAttrib('size', 35)
            ->removeDecorator('label')
            ->removeDecorator('htmlTag')
            ->removeDecorator('errors');
        $pswd->setRequired(true);
        $pswd->addValidator('StringLength', false, array(4,15));
        $pswd->addErrorMessage('Please choose a password between 4-15 characters');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Login');
        $submit->removeDecorator('DtDdWrapper');

        $this->setDecorators( array( array('ViewScript',
            array('viewScript' => '_form_login.phtml'))));

        $this->addElements(array($email, $pswd, $submit));
    }
}
