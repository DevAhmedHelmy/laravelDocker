node('master') {
    try {
        stage('build') {
            git url:'git@github.com:DevAhmedHelmy/laravelDocker'
            // Checkout the app at the given commit sha from the webhook
            sh "./develop up -d"

            // Install dependencies, create a new .env file and generate a new key, just for testing
            sh "./devevlop composer install"
            sh "cp .env.example .env"
            sh "./develop art key:generate"

            // Run any static asset building, if needed
            // sh "npm install && gulp --production"
        }
        stage('test') {
            // Run any testing suites
            sh "APP_ENV=testing ./develop test"
        }

        stage('deploy') {
            // If we had ansible installed on the server, setup to run an ansible playbook
            // sh "ansible-playbook -i ./ansible/hosts ./ansible/deploy.yml"
            sh "echo 'WE ARE DEPLOYING'"
        }
    } catch(error) {
        throw error
    } finally {
        // Any cleanup operations needed, whether we hit an error or not
        sh './develop down'
    }
}

