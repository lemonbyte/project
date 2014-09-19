# == Class: apache_vhosts
#
# Adds and enables virtual hosts.
#
class apache_vhosts {

  #Checks of the dir is created
  file { '/var/www':
    ensure => directory;
  }

  #Adds a vhost file
  apache_vhosts::vhost { ['static-site']: }

}