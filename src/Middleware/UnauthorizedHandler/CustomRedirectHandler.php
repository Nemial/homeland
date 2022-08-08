<?php

declare(strict_types=1);

namespace App\Middleware\UnauthorizedHandler;

use Authorization\Exception\Exception;
use Authorization\Middleware\UnauthorizedHandler\RedirectHandler;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * CustomRedirectHandler middleware
 */
class CustomRedirectHandler extends RedirectHandler
{
    public function handle(
        Exception $exception,
        ServerRequestInterface $request,
        array $options = []
    ): ResponseInterface {
        $response = parent::handle($exception, $request, $options);
        $request->getFlash()->error('У вас нет прав для доступа к этой странице');
        return $response;
    }
}
