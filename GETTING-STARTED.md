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

Once confirmed, you're done! (until the workshop)

## Fixes for possible issues you may come across:

If you have any issues getting the vagrant box up and running, drop me an email at [matt@mfyu.co.uk](mailto:matt@mfyu.co.uk) or grab me on Twitter [@TheMattBrunt](https://twitter.com/TheMattBrunt) and I'll do my best to get you up and running.

### Guest additions are wrong.

Destroy the box, then install this plugin:

`vagrant plugin install vagrant-vbguest`

Now `vagrant up` again.

You may need to reload if your guest additions weren't the right version at the start as well:

`vagrant reload`

## Code & File Editors

We'll be using PHPStorm for editing PHP files, though for the most part, PHP files won't be the focus of this workshop. The `Jenkinsfile` will be mostly what we're focusing on - and this uses the [Groovy](http://www.groovy-lang.org) programming language. If you'd like a simple to setup editor for this, install [Atom](https://atom.io) and the language-groovy plugin:

`apm install language-groovy`