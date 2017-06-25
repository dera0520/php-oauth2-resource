<?php
// DIC configuration
$container = $app->getContainer();

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['oauth2'] = function ($c) {
    // Init our repositories
    $accessTokenRepository = new App\OAuth2\Repositories\AccessTokenRepository(); // instance of AccessTokenRepositoryInterface

    // Path to authorization server's public key
    $publicKey = 'file:///Users/nobuhiro/Projects/php-auth2-server/public.key';
            
    // Setup the authorization server
    $server = new \League\OAuth2\Server\ResourceServer(
        $accessTokenRepository,
        $publicKey
    );
    return $server;
};
