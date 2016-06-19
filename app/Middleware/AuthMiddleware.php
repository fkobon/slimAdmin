<?php

namespace App\Middleware;

/**
 * Class AuthMiddleware
 * @package App\Middleware
 */
class AuthMiddleware extends Middleware {

    /**
     * @param $request
     * @param $response
     * @param $next
     * @return mixed
     */
    public function __invoke($request, $response, $next) {
        if(!$this->container->auth->check()) {
            $this->container->flash->addMessage('error', 'Please sign in before doing that !');
            return $response->withRedirect($this->container->router->pathFor('auth.signin'));
        }

        $response = $next($request, $response);
        return $response;
    }

}