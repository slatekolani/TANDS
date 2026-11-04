<?php

namespace App\Http\Controllers\Concerns;

use Closure;
use Symfony\Component\HttpFoundation\Response;

trait RunsAfterResponse
{
    /**
     * Deliver $response to the browser first, then run $work (e.g. sending
     * emails through a slow SMTP server) in the same PHP process.
     *
     * The explicit Content-Length lets the browser treat the response as
     * complete even on servers without fastcgi_finish_request() (php artisan
     * serve, mod_php); on PHP-FPM/LiteSpeed hosting Laravel already closes
     * the connection before terminate() runs.
     */
    protected function respondThen(Response $response, Closure $work): Response
    {
        $response->headers->set('Content-Length', (string) strlen((string) $response->getContent()));

        app()->terminating(function () use ($work) {
            ignore_user_abort(true);
            @set_time_limit(300);
            $work();
        });

        return $response;
    }
}
