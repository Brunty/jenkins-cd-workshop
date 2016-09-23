# Prerequisites

This VM will use ansible for provisioning, you don't need it installed on your host machine, the vagrant box runs a script inside itself to provision.

# Installation / provisioning

Clone this repository, then `cd` into the directory it's cloned into and run:

`vagrant up`

This will use a script inside the vagrant box to install ansible into the VM, install the required roles and the box will provision itself.

Once that's done, add the following to your `hosts` file (will vary depending on your operating system):

```
192.168.66.99 jenkins-workshop.dev www.jenkins-workshop.dev
192.168.66.99 jenkins-workshop.uat www.jenkins-workshop.uat
192.168.66.99 jenkins-workshop.prod www.jenkins-workshop.prod
```

# Accessing Jenkins

In your browser, visit [http://jenkins-workshop.dev:8080](http://jenkins-workshop.dev:8080)

Login with the following credentials:

| Username | Password |
|:---------|:---------|
| admin    | admin    |

Select "install suggested plugins" and confirm that all the plugins listed are installed (they should have been installed during provisioning)

Once confirmed, you're done with the main stuff! (until the workshop)

## Extras:

You may want to connect to the VM to view databases, you can do this using a program such as [Sequel Pro](https://www.sequelpro.com) and the following details (connecting via SSH):

| Username     | Password      |
|:-------------|:--------------|
| MySQL Host   | 127.0.0.1     |
| Username     | root          |
| Password     | password      |
| Database     | [leave blank] |
| Port         | [leave blank] |
| SSH Host     | 192.168.66.99 |
| SSH User     | vagrant       |
| SSH Password | vagrant       |
| SSH Port     | [leave blank] |

## Fixes for possible issues you may come across:

If you have any issues getting the vagrant box up and running, drop me an email at [matt@mfyu.co.uk](mailto:matt@mfyu.co.uk) or grab me on Twitter [@TheMattBrunt](https://twitter.com/TheMattBrunt) and I'll do my best to get you up and running.

### Guest additions are wrong.

Destroy the box, then install this plugin:

`vagrant plugin install vagrant-vbguest`

Now `vagrant up` again.

You may need to reload if your guest additions weren't the right version at the start as well:

`vagrant reload`

### `Command: ["hostonlyif", "create"]` on Windows 10

See this thread: https://github.com/mitchellh/vagrant/issues/6059

I've tested the vagrant box on OS X and some limited testing on Windows 10, Windows 10 had a number of issues (not related to the box, but to VirtualBox and Vagrant versions - so if you have other boxes running, this should be fine)

## Code & File Editors

We'll be using PHPStorm for editing PHP files, though for the most part, PHP files won't be the focus of this workshop. The `Jenkinsfile` will be mostly what we're focusing on - and this uses the [Groovy](http://www.groovy-lang.org) programming language. If you'd like a simple to setup editor for this, install [Atom](https://atom.io) and the language-groovy plugin:

`apm install language-groovy`
