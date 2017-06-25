<?php
// Application middleware
$app->add(new \League\OAuth2\Server\Middleware\ResourceServerMiddleware($app->getContainer()->get('oauth2')));
