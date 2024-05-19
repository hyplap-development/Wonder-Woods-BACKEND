<?php
namespace App\Http\Middleware;

use Closure;

class Cors
{

	public function handle($request, Closure $next)
	{
		//header("Access-Control-Allow-Origin: *");
		$headers=[
			'Access-Control-Allow-Methods' =>'POST, GET, OPTIONS, PUT, DELETE,*',
			'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-token, Origin, x-xsrf-token, Authorization,*',
            		'Access-Control-Allow-Origin' =>'*',
		];
		
		$respose = $next($request);

		// previos headers uncomment if app not working
		// foreach ($headers as $key => $value) {
		// 	$respose->header($key,$value);
		// 	# code...
		// }

		// change if 
		foreach ($headers as $key => $value) {
            $respose->headers->set($key, $value);
        }

        if ($request->isMethod('OPTIONS')) {
            $respose->setStatusCode(200);
        }
		
		return $respose;
	}
}