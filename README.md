Geometry Calculator using Symfony
This app calculates area of a triangle and diameter of a circle.

SETUP
If you don't have symfony binary installed, run this installer and follow instructions to create binary:

wget https://get.symfony.com/cli/installer -O - | bash
Run following command inside terminal, in your local server root directory to download repository:

gh repo clone jabbar18/geometry_calculator

After repository is downloaded, get into project dir:

cd geometry_calculator
and write following command:

symfony server:start
You should get output like this:

[OK] Web server listening
     The Web server is using PHP CLI 8.0.3
     http://127.0.0.1:8000

Copy link to your browser and follow links to desired calculator.

To run unit tests use this command from project root:

php ./vendor/bin/phpunit -v
