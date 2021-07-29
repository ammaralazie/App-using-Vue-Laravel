<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
class GlobalMiddlware
{
    public function handle($request, Closure $next, $gared=null)
    {
        if($gared != null){
            auth()->shouldUse($gared);

            //this step for update to header
            $token=$request->headers('auth-token');
            $request->headers->set('auth-token',(string) $token,true);
            $request->headers->set('Authorization','Bearar'.$token,true);

            //this step to check this token is auth or no
           try{
            $user=JWTAuth::parseToken()->authenticate();
           }catch(\Exception $e ){
                return response()->json([
                    'state'=>'error',
                    'msg'=>'your token is not valid'
                ]);
           }
        }//end of if
        return $next($request);
    }//end of handle function
}
