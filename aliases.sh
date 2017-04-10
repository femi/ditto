alias db="sudo docker build -t mysite ."
alias dr="sudo docker run --name ditto -i -v /var/lib/mysql -t -p 8080:80 mysite /bin/bash"
alias ds="sudo docker start -i ditto"
