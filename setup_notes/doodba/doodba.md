# Doodba Setup Guide (Linux)

# NOTE:
- Don't use Ubuntu 23 if your going to use it as work space for doodba.
- Python 3 < Python 3.10.12 is a must. I encountered some errors while using python 3.11 and up.

## Initial Setup

- this step need do without python  virtual environment or conda, if it is activated you should disabled it: some commands that can deactivate:
```
conda deactivate
sourse deactivate
deactivate
```
- Download or clone  [Doodba](https://github.com/Tecnativa/doodba)   
- Setup docker [Docker](https://docs.docker.com/engine/install/ubuntu/)
- Use docker without [sudo](https://docs.docker.com/engine/install/linux-postinstall/) 
- Template [copier](https://github.com/Tecnativa/doodba-copier-template) 

## Setup with Python Venv

- First check your python version
- check if pip is installed by running pip --version
- If pip is not installed run this command: sudo apt install python3-pip
- When running python3 -m venv .venv it will create .venv folder but this one doesn't have the activate , It will say the you need to run some command to install python virtual environment. for example for me it say the I need to run the sudo apt install python3.10-venv
- After the installation, delete the  .venv  you created then cd  to doodba folder and execute the command python3 -m venv .venv 
- Activate the .venv / virtual environment by executing the source .venv/bin/activate or . .venv/bin/activate 
- Then Execute all the commands one by one below:

```
python3 -m venv .venv
source .venv/bin/activate
pip install PyYAML==6.0.2
pip install copier==9.7.1
pip install invoke
pip install pre-commit
pip install docker-compose

# duplicity dependencies
pip install setuptools_scm
pip install google-api-python-client
pip install google-auth-oauthlib
```
- non-python dependencies for duplicity

```
sudo apt install gettext
sudo apt install librsync-dev

# After the commands above install the duplicity
pip install -e git+ssh://git@github.com/baracodadailyhealthtech/duplicity.git@gdrive#egg=duplicity
```


## Use the template to generate your subproject

Once you installed everything, you can now use Copier to copy this template:

```bash
copier copy gh:Tecnativa/doodba-copier-template ~/path/to/your/subproject
```

## GET WORKSPACE

- This is for VSCode user.
- Open terminal and execute the command:  invoke write-code-workspace-file 


## Setup Doodba
- Request for Docker Hub credentials since it needed for the setup of doodba.
- When done with the credential.  Move the db from backup to doodba folder. then rename it to DB.sql 
- Move the filestore to doodba folder.
- Then execute the command below:

``` 
invoke img-pull img-build --pull git-aggregate resetdb start 
```
