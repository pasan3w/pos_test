<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckInstallation
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
        // Check if the app is installed (e.g., config('app.installed') or env variable)
        if (file_exists(storage_path('installed'))) {
            // If installed, redirect to the home page (or 403)
            return redirect('/')->with('message', 'Application is already installed.');
        }

        // Continue to the installer if not installed
        return $next($request);
    }
}
