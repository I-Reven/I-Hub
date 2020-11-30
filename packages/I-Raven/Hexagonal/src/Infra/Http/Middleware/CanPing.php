<?php

namespace IRaven\Hexagonal\Infra\Http\Middleware;

use Closure;

/**
 * Class CanPing
 * @package IRaven\Hexagonal\Infra\Http\Middleware
 */
class CanPing
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
