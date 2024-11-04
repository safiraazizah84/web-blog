<?php




namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    
    public function handle(Request $request, Closure $next): Response
    {

        $usertype=$request->user()->usertype;
        if ($usertype!= 'admin')return redirect()->route('home.homepage');
            return $next($request);
          
    }

    
}
