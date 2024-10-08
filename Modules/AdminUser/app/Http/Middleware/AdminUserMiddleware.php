<?php
namespace Modules\AdminUser\app\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()) {
            if ($request->user()->status == 1 && $request->user()->type == 'user') {
                return $next($request);
            }else{
                Auth::logout();
                return redirect()->route('login')->with('error','Tài khoản không phải tài khoản quản trị viên!!');
            }
        }
        return redirect()->route('login');
    }
}