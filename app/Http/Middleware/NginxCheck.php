<?php

namespace App\Http\Middleware;

use App\Blacklist;
use Closure;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NginxCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //获取访问信息
        $ip = $request->getClientIp();
        $blacklistmodel = new Blacklist();
        if($blacklistmodel->where('ip',$ip)->get()->toArray()){
            return response('Permission Denied', 403);
        }

        $query = $request->getQueryString();
        if($this->filter($query)){
            //ip加入黑名单
            $blacklistmodel->ip = $ip;
            $blacklistmodel->create_at = time();
            $blacklistmodel->save();
            return response('Permission Denied', 403);
        }
        return $next($request);
    }

    private function filter($query){
        $key_words = ['thinkphp','admin','TP','tp','public'];
        return Str::contains($query,$key_words);
    }
}
