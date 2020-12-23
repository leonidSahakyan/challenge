<?php

namespace App\Http\Middleware;

use App\Models\OauthAccessToken;
use Carbon\Carbon;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class ApiToken extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, $next)
    {
        if (! $request->expectsJson()) {
            return response()->json(['code'=>400,'message'=>'Bad request'], 400);
        }
        
        if(!$request->has('token') || !$token = OauthAccessToken::where('id', $request->get('token'))->first()){
            return response()->json(['code'=>401,'message'=>'unauthorized'], 401);
        }

        if(Carbon::parse($token->expires_at)->lt(Carbon::now())) {
            return response()->json(['code'=>401,'message'=>'Token is expired'], 401);
        }

        return $next($request);
    }
}
