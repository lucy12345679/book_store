pipeline {
    agent {
        node {
            label 'linux'
            customWorkspace '/tmp/jenkins-workspace'
        }
    }
    environment {
        DOCKER_IMAGE = "book_store_app"
    }
    stages {
        stage('Clone Repository') {
            steps {
                git branch: 'main', url: 'https://github.com/YakubovaMakhliyo/orchidbook.git'
            }
        }
        stage('Install Dependencies') {
            steps {
                sh 'docker --version'
                sh 'docker-compose --version'
            }
        }
        stage('Build Docker Image') {
            steps {
                sh 'docker-compose build'
            }
        }
        stage('Run Tests') {
            steps {
                sh 'docker-compose run --rm web php vendor/bin/phpunit'
            }
        }
        stage('Deploy to Server') {
            steps {
                sshagent(['server-ssh-credentials']) {
                    sh '''
                        ssh user@your-server-address "
                            cd /path/to/your/project &&
                            docker-compose down &&
                            docker-compose pull &&
                            docker-compose up -d
                        "
                    '''
                }
            }
        }
    }
    post {
        always {
            echo 'Pipeline execution completed.'
        }
        success {
            echo 'Pipeline succeeded.'
        }
        failure {
            echo 'Pipeline execution failed!'
        }
    }
}
