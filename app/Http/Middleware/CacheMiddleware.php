<?php namespace App\Http\Middleware;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Closure;
use Config;
use Illuminate\Http\Request;
use Redirect;
use Memcached;

class CacheMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next){
		//clean XSS

		//before code
		$this->before($request);
		// after code
		$response = $next($request);
		$response = $this->after($request,$response);
		return $response;
	}

	/**
	 * @function        before
	 * @author          ${USER}
	 * @copyright       PublishTeam
	 * @param $request
	 * Check before go controller
	 */
	private function before(Request $request){
		//flush cache
		//clear view
		$allow = true;

		//echo phpinfo();die;
		//$memcache = new \Memcache();
		//$memcache->addServer('localhost', 11211) or die ("Could not connect");

		if($request->is('admin/*') || $request->is('admin')){$allow=false;}
		if($allow){
			if(isset($_GET['s_flush'])){
				Cache::flush();
			}
			$fullUrl = \Request::fullUrl();
			$sKeyCache = $this->getKeycache($fullUrl);
			if(Cache::has($sKeyCache)){
				$content = Cache::get($sKeyCache);
				echo "<script>console.log('load frome cache');</script>";
				return $content;
			}
		}

	}//function

	/**
	 * @function        after
	 * @author          ${USER}
	 * @copyright       PublishTeam
	 * @param $response
	 * Check add cache page after proccess in controller and router
	 */
	private  function after(Request $request, $response){
		//Cache::forever('hungdz', $response->getContent());
		$fullUrl = \Request::fullUrl();
		$sKeyCache = $this->getKeycache($fullUrl);
		//save cache
		$expiresAt = Carbon::now()->addMinutes(60);
		Cache::put($sKeyCache,$response->getContent(),$expiresAt);
		return $response;
	}//function

	private function getKeycache($sUrl){
		return md5('7'.$sUrl);
	}
}
