<?php

namespace Milhouse1337\Cogul;

use Closure;

class CogulMiddleware
{

    public function handle($request, Closure $next)
    {

        $whitelist = config('cogul.whitelist');
        $valid_token = config('cogul.token');

        // Check for whitelist.
        if (in_array($request->ip(), $whitelist)) {
            return $next($request);
        }

        // Check if token in cookie is valid.
        $cookie = $request->cookie(config('cogul.cookie'));
        if ($cookie && $cookie == $valid_token) {
            return $next($request);
        }

        return response('Forbidden.', 403);
    }
}
