<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Filesystem\Filesystem;

class len_change
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $fileSystem = new Filesystem();
        // $folderToDelete = base_path('mr');
        // $fileSystem->deleteDirectory($folderToDelete);
        
        if($request -> session() -> has('len')){
            App::setLocale($request -> session() -> get('len'));
        }
        return $next($request);
    }
}
