# -*- mode: ruby -*-
# vi: set ft=ruby :
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/bionic64"
  config.vm.provision :shell, path: "bootstrap.sh"
  config.vm.network "forwarded_port", guest: 80, host: 8765
  config.vm.provider "virtualbox" do |vb|
    vb.memory = "2048"
    vb.customize ['modifyvm', :id, '--cableconnected1', 'on']
  end  
end
