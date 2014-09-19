# Bootstrap Manifest file Site.pp
# Starts the puppet modules
include

  apache
, php
, apache_vhosts
, xdebug
, mysql

#Config for XDebug PHPStorm
xdebug::config { 'default':

    remote_host => '10.10.10.91',
    remote_port => '9000',
    #remote_autostart => '1',
    default_enable => '1',
    remote_enable => '1',
    remote_handler => 'dbgp',
    remote_connect_back => '1',

}