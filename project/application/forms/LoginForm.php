<?php
/**
 * Created by PhpStorm.
 * User: R.Dolewa
 * Date: 20-9-2014
 * Time: 14:32
 */

class Form_LoginForm extends Zend_Form{

    public function __contruct($options =null){
        parent::__construct($options);

        $this->setName('login');

        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('User name:')
                 ->setRequired();

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('password:')
            ->setRequired();

        $login = new Zend_Form_Element_Submit('login');
        $login->setLabel('Login');

        $this->addElements(array($username,$password,$login));
        $this>setMethod('post');

    }

}