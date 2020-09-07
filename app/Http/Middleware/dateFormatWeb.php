<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Carbon;

class dateFormatWeb
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // статья https://laravel.demiart.ru/middleware-as-a-service-provider/
        Carbon::setToStringFormat('d/m/Y'); //преобразование даты
        return $next($request);
    }
}
