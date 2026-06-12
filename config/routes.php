<?php

declare(strict_types=1);

use Slim\App;

return static function (App $app): void {
    $app->get('/hello[/{id}]', \App\Http\HelloAction::class);
};
