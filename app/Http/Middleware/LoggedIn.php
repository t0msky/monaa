<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use DB;
use Carbon\Carbon;
use View;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class LoggedIn{
  public function handle($request, Closure $next){

    if (session('user')) {
      $user = User::getUser(session('user'));
      app()->instance('userInfo', $user);
      // $request->userInfo = $user;

      $uri = $request->path();
      $uri_explode = explode('/', $uri);
      $newUri = $uri_explode[0];
      View::share('uri', $newUri);
      // die();

      return $next($request);
    } else {
      return redirect('logout');
    }

  }
}
