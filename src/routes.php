<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    $this->logger->info("Slim-Skeleton '/' route");
    return $response->withJson($request->getAttributes())->withStatus(200);
});
