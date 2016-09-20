#!/usr/bin/env groovy
stage("Setup Project") {
    node {
       // clean out all files within this workspace
       deleteDir()

       // Check out our repository
       git url: "/vagrant", branch: "master"

       // Composer install
       sh "composer install --prefer-dist --optimize-autoloader"

       // Create zip file of working directory and archive as an artifact
       // zip archive: true, zipFile: gitCommit() + ".zip"

       // Stash our whole project files for later use
       stash "project_files"
    }
}

stage("Tests [Unit]") {

    parallel (
       /*
        because we're working in parallel here, we won't necessarily have the files we need for each parallel node
        we'll unstash them in each node to make sure we have the files we require
       */
       phpunit: {
          node {
             unstash "project_files"
             sh "bin/phpunit"
          }
       },
       phpspec: {
          node {
             unstash "project_files"
             sh "bin/phpspec run"
          }
       },
       behat_domain: {
          node {
             unstash "project_files"
             sh "bin/behat"
          }
       }
    )
}

stage("Tests [Integration / Functional / Acceptance]") {
    node {
       unstash "project_files"
       sh "bin/behat"
       sh "bin/behat"
       sh "bin/behat"
   }
}

stage("Deploying to UAT") {
    node {
        def gitCommit = gitCommit()
        sh "ansible-playbook ansible/deploy-uat.yml -i ansible/inventories/uat -e 'release_version=$gitCommit'"
    }
}

stage("Approval [UAT]") {
    // Make sure that you don't ask for input, or use a timeout within a node, it can tie up that node for the duration.
    timeout(time: 7, unit: 'DAYS') {
      input message: 'Does http://jenkins-workshop.uat look okay?'
    }
}

stage("Deploy to production") {
    timeout(time: 7, unit: 'DAYS') {
        def gitCommit = gitCommit()
        def userInput = input(
         id: 'userInput', message: 'Let\'s deploy?', parameters: [
         [$class: 'TextParameterDefinition', defaultValue: "${gitCommit}", description: 'Release version?', name: 'release_version'],
         [$class: 'TextParameterDefinition', defaultValue: "production", description: 'Release environment?', name: 'release_environment'],
        ])
    }
    node {
        def gitCommit = gitCommit()
        sh "ansible-playbook ansible/deploy-prod.yml -i ansible/inventories/prod -e 'release_version=$gitCommit'"
    }
}

/*
def to = emailextrecipients([
        [$class: 'CulpritsRecipientProvider'],
        [$class: 'DevelopersRecipientProvider'],
        [$class: 'RequesterRecipientProvider']
])
if(to != null && !to.isEmpty()) {
    mail to: to, subject: "Vagrant Test has finished with ${currentBuild.result}",
            body: "See ${env.BUILD_URL}"
}
*/

// Helper function to get the commit hash of the latest commit within git
def gitCommit() {
    sh(returnStdout: true, script: 'git rev-parse HEAD').trim()
}
