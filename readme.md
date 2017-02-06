<p align="center">
  <img src="http://www.panamericanworld.com/es/system/files/clickdelivery_0.png">
</p>

<p align="center">


## Requiremnents

* PHP >= 5.6.4
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension



## Installing

Once you have cloned the project on your pc you should have a folder with named backend-test
open your favorite text editor and edit the file .env using your mysql credentials
<pre>
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=backend-test
DB_USERNAME='user'
DB_PASSWORD='secret password'
</pre>

then open a terminal and type 

<pre>
  cd backend-test
</pre>

then migrate the database tables running at terminal
<pre>
php artisan migrate --seed
</pre>
finally all you need to do is run laravel server in your terminal type

<pre>
php artisan serve 
</pre>
default port is 8000  if you want to use the port 80 you should type
<pre>

php artisan serve --port=80</pre>

## External libs used
* Adminlte for serve css style a js feature
* Jquery Validator for Front validations forms
* Bootstrap
## License

The Laravel framework and this project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
