<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
  /**
   * 送信されてきたリクエストの処理
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {

      return $next($request);
  }

  protected function redirectTo($request)
  {
      if (! $request->expectsJson()) {
          return route('/');
      }
  }

}
