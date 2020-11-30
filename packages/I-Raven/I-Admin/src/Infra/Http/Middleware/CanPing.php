<?php

namespace IRaven\IAdmin\Infra\Http\Middleware;

use Closure;

/**
 * Class CanPing
 * @package IRaven\IAdmin\Infra\Http\Middleware
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
