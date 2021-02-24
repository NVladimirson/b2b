<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Jobs\CategoryHiyerarchy;

class Categories
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Cache::get('category_widget_info') == null){
          CategoryHiyerarchy::dispatch();
          info('Job CategoryHiyerarchy dispatched!');
        }
        return $next($request);
    }
}
