###################
How To Use
###################


1. import test.sql
2. go to folder config and check config.php, set up $config['base_url'] = ''; to $config['base_url'] = 'http://localhost:8080/Test/';
3. go to folder config and check autoload.php, set $autoload['libraries'] = array(''); to $autoload['libraries'] = array('database');
4. go to folder config and check database.php, set 'database' => 'test'
5. tes rest service with postman for GET, POST, PUT and Delete methods
6. url service : http://localhost:8080/Test/index.php/user
7. in postman set basic auth with username : admin, password : 1234
8. in postman set X-API-KEY : BEBEK123
9. using client exaample for consuming rest : https://github.com/bahtyar/REST_CI_CLIENT_auth-keys
10. completed with login client site saample : https://github.com/bahtyar/rest_ci_auth_client_site


Original Codeigniter Restfull server by chriskacerguis : https://github.com/chriskacerguis/codeigniter-restserver
