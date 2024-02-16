<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class authentification
{ 
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $guards = empty($guards) ? [null] : $guards;
       
        foreach ($guards as $guard){
            if (Auth::guard($guard)->check()){
                return redirect(PageController::Index);
                
            }
            // else{
           
            //     return redirect('/Login_up')->with('message', 'Vous devez vous connecter pour accéder à cette page.');
            // }
        }
        return $next($request);   
    }

    protected function performAuthenticatedAction()
    {
        return redirect('/index');
    }
}
