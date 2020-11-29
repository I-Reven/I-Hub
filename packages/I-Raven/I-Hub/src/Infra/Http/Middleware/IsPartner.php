<?php

namespace IRaven\IHub\Infra\Http\Middleware;

use Closure;

/**
 * Class IsPartner
 * @package IRaven\IHub\Infra\Http\Middleware
 */
class IsPartner
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
