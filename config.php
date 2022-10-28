<?php
/*
 *@autor: José Luis
 *@Teste Facil Consulta
 *@Config
*/

date_default_timezone_set("America/Sao_Paulo");
session_start();

//Constantes de Sistema
define('BASE_URL', 'http://localhost/teste_facil_consulta/');
define('ASSETS_DIR', 'assets/');
define('CONTROLLERS_DIR', 'app/controllers/');
define('LIBRARY_DIR', 'app/libraries/');
define('MODELS_DIR', 'app/models/');
define('VIEWS_DIR', 'app/views/');
define('SYSTEM_DIR', 'system/');
define('EXT', '.php');

//Constantes de Configuração
define('DEFAULT_CONTROLLER', 'medico');

//Constantes de Configuração do Banco de Dados
define("DB_HOST", "localhost");
define("DB_NAME", "teste_fc");
define("DB_USER", "root");
define("DB_PASS", "84220122");

//Constante de configuração do limite de registros por página
define('PER_PAGE', 5);