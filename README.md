<h1 align="center">ditto</h1>

<h4 align="center">🌍 A social network just like every other social network</h4>

<img width="1157" alt="image_one" src="https://cloud.githubusercontent.com/assets/7552626/24883278/23d42266-1e3c-11e7-815a-2f6da3d6254a.png">

## Features
- Blogs
- Circles
- Messaging between circles
- Albums
- Comments
- Album privacy settings
- Interest tags
- Search

## Installation

We recommend that you use Docker to setup ditto.  Instructions for custom builds can be found in the [wiki](http://github.com/FemiAw/ditto/wiki/Apache-Settings).

1. Install docker (http://www.docker.com/community-edition)
2. Build the docker image: `docker build --no-cache=true -t dittoimage .`
3. Create a docker container: `docker run --name ditto -i -v /var/lib/mysql -t -p 8080:80 dittoimage /bin/bash`. This should take you inside the docker container.
4. Change the password for the mysql root user: 
	a.	Log in to MySQL: `mysql`
	b.	`SET PASSWORD FOR root = newPassword`
	c.	Exit MySQL: `exit`
	d.	Change the ditto configuration file: `cd /home/ditto/resources/`
		Edit line 3 of the config.ini file with your new password.
5. Quit the initial docker session: `exit`


## Usage
1. Start an existing container to get persistent database data (docker start -i ditto)
2. Head to `localhost:8080`
3. When finished, quit the docker session from within the bash terminal: `exit`

## Troubleshooting
If you encounter any problems, please checkout the [troubleshooting wiki page](https://github.com/FemiAw/ditto/wiki/Troubleshooting).  If that doesn't help, then please file an issue [here](https://github.com/FemiAw/ditto/issues/new)

## Contribute
ditto comes with a MIT licence, so can be used and distributed freely.  We would welcome any contributions to the project.
