Basic Slim RESTful + Token Auth
===========
Base structure to creating RESTful Webservice API using Slim Framework. Support Token Authentification.


## Routing Create Token
Creating a new Token for user, need username and password to validate.

### 1. Disable UnprotectedURI
...\resapi\Setup.php
```php
// add middleware
$this->add(new MiddlewareMediatype());
$this->add(new MiddlewareAuthenticator(true));
```

### 2. Request Token
URI:  
```
POST /create-api-token
```

Headers: 
```
Content-MD5: md5($stringContent.$clientSecret) 
```

Body: 
```json
{"username":"lemke","password":"Powlqd.-!123"}
```


### 3. Response Body
```json
{
  "0": 201,
  "message": "key telah berhasil dibuat",
  "username": "lemke",
  "api key": "5fe1d328-09a9-5fef-a38a-7f3144a9b71a"
}
```

## Auth By Request
Header:
```
Content-Type : application/json
WWW-Authorization : base64(username/password)
API-Token : Token
```
