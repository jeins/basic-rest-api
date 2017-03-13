<?php

namespace App\Middleware;

class MediaType {

    /**
     * @param \Slim\Http\Request $request
     * @param \Slim\Http\Response $response
     * @param callable $next
     * @return \Slim\Http\Response
     */
    public function __invoke($request, $response, $next)
    {
        $mediaType = $request->getMediaType();

        if($mediaType !== 'application/json'){
            try{
                return $response
                    ->withJson([
                    'error' => 'Unexpected Media Type',
                    'success' => false
                ], 415);
            } catch (\RuntimeException $e){

            }
        }

        return $next($request, $response);
    }
}