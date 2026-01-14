<?php

### APP ###
define('APP_NAME_TITLE', "Framework nexus");
define('APP_NAME', "Nexus");
define('APP_ENV', 'prod');
define('APP_DEBUG', true);
define('APP_PORT', 4542);

### BANCO DE DADOS ###
define('DB_CONNECTION', 'mysql');
define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_DATABASE', 'nexus');
define('DB_USERNAME', "root");
define('DB_PASSWORD', '');

### API EXTERNAS ###
define('GOOGLE_API_KEY', 'coloque_sua_key_aqui');
define('CNPJ_API_URL', 'https://api.exemplo.com/cnpj');
define('CNPJ_API_TOKEN', 'coloque_seu_token_aqui');

### CONFIG EMAIL ###
define('MAIL_DRIVER', 'smtp');
define('MAIL_HOST', 'smtp.dominio.com');
define('MAIL_PORT', '123');
define('MAIL_USERNAME', 'contato@dominio.com');
define('MAIL_PASSWORD', 'senha123');
define('MAIL_ENCRYPTION', 'ssl');
define('MAIL_FROM_ADDRESS', 'contato@dominio.com');
define('MAIL_FROM_NAME', "nexus");

### OUTROS ###
define('TIMEZONE', 'America/Argentina/La_Rioja');
