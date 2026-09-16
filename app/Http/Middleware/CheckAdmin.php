<?php
namespace App\Http\Middleware;
use Closure;
class CheckAdmin {
    public function handle($request, Closure $next){
        return $next($request);
    }
}