<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function _initRoutes()
    {
        $frontController = Zend_Controller_Front::getInstance();
        $router = $frontController->getRouter();

        $route = new Zend_Controller_Router_Route_Static (

            'login',
            array('controller' => 'Login', 'action' => 'login')
        );

        $router->addRoute('login', $route);
    }

    protected function _initEmail()
    {
//        $emailConfig = array(
//            'auth'=> 'login',
//            'username' => Zend_Registry::get('config')->email->username,
//            'password' => Zend_Registry::get('config')->email->password,
//            'ssl' => Zend_Registry::get('config')->email->protocol,
//            'port' => Zend_Registry::get('config')->email->port
//        );
//        $mailTransport = new Zend_Mail_Transport_Smtp(
//            Zend_Registry::get('config')->email->server, $emailConfig);
//        Zend_Mail::setDefaultTransport($mailTransport);
    }

    protected function _initConfig()
    {
        $config = new Zend_Config($this->getOptions());
        Zend_Registry::set('config', $config);
        return $config;
    }


}
