<?php

// Altera as configurações do PHP para mostrar todos os erros, já que este é apenas um script de exemplo.
// No seu ambiente de produção, você não vai precisar alterar estas configurações.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_reporting', 'E_ALL|E_STRICT');
error_reporting(E_ALL);

header('Content-Type: text/html; charset=utf-8');

// Configura o php-sigep

// Se você não usou o composer é necessário carregar o script Boostrap.php manualmente.
// Caso você tenha usado o composer o Bootstrap PHP será carregado automáticamente pelo autoload (quando necessário).
require_once __DIR__ . '/../src/PhpSigep/Bootstrap.php';

$accessDataParaAmbienteDeHomologacao = new \PhpSigep\Model\AccessDataHomologacao();

$config = new \PhpSigep\Config();
$config->setAccessData($accessDataParaAmbienteDeHomologacao);
$config->setEnv(\PhpSigep\Config::ENV_PRODUCTION);
$config->setCacheOptions(
    array(
        'storageOptions' => array(
            'enabled' => false,
        ),
    )
);

\PhpSigep\Bootstrap::start($config);