# == Class: apache
#
# Installs packages for Apache and sets config files.
#
class apache {

  #Adds Apache2
  package { ['apache2', 'apache2-mpm-prefork']:
    ensure => present;
  }

  #Checks or Apache2 is installed
  service { 'apache2':
    ensure  => running,
    require => Package['apache2'];
  }

  #Adds mod_rewrite module
  exec { "a2enmod rewrite":
    path    => "/usr/bin:/usr/sbin:/bin",
    alias   => 'enable-mod-rewrite',
    creates => '/etc/apache2/mods-enabled/rewrite.load',
    notify  => Service['apache2'],
    require    => Package['apache2'],
  }

}