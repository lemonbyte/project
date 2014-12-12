# == Class: mysql
#
# Installs MySQL server, sets config file, and loads database for dynamic site.
#
class mysql {

   package { ['mysql-server']:
      ensure => present;
   }

   package { ['mysql-client']:
      ensure => present;
   }

  service { 'mysql':
    ensure  => running,
    require => Package['mysql-server'];
  }

  exec { 'set-mysql-password':
    unless  => 'mysqladmin -uroot -proot status',
    command => "mysqladmin -uroot password root",
    path    => ['/bin', '/usr/bin'],
    require => Service['mysql'];
  }

   exec { 'load-sql':
   command => 'mysql -u root -proot < /vagrant/Sql/database.sql',
   path    => ['/bin', '/usr/bin'],
   require => Exec['set-mysql-password'];
  }

}