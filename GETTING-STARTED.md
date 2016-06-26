# Prerequisites

You'll need Vagrant (> v1.5) and ansible installed (tested with Ansible  v2.1.1.0)

# Installation / provisioning

## On OS X / Linux With Ansible:

Run:

`ansible-galaxy install -r ansible/requirements.yml --ignore-errors --force`

`vagrant up`

## On Windows

Run:

`vagrant up`

This will use a script inside the vagrant box to install ansible, install the required roles and the box will provision itself.

# Accessing Jenkins

In your browser, visit [http://192.168.66.99:8080](http://192.168.66.99:8080)

Login with the following credentials:

| Username | Password |
|:---------|:---------|
| admin    | admin    |

Select "install suggested plugins" and confirm that all the plugins are installed (they should have been installed during provisioning)

Once confirmed, you'll be ready to login and you're done! (until the workshop)

## Fixes for possible issues:

### Guest additions are wrong.

Destroy the box, then install this plugin:

`vagrant plugin install vagrant-vbguest`

Now `vagrant up` again.

You may need to reload if your guest additions weren't the right version at the start as well:

`vagrant reload`

## Editors

We'll be using PHPStorm for editing PHP files, though for the most part, PHP files won't be the focus of this workshop. The `Jenkinsfile` will be mostly what we're focusing on - and this uses the [Groovy](http://www.groovy-lang.org) programming language. If you'd like a simple to setup editor for this, install [Atom](https://atom.io) and the language-groovy plugin:

`apm install language-groovy`