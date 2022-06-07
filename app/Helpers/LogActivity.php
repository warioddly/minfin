<?php


namespace App\Helpers;

use App\Models\Logs;

class LogActivity
{
    private static $expected_params = ['password', 'password_confirmation'];

    public static function addToLog()
    {
        if (!env('APP_DEBUG', true)) {
            return;
        }

        if(request()->path() == 'login' || request()->path() == 'register' || request()->path() == 'dashboard/manager'){
            $log = [];
            $log['url'] = request()->fullUrl();
            $log['method'] = request()->method();
            $log['ip'] = request()->ip();
            $log['agent'] = request()->header('user-agent');
            $log['user_id'] = auth()->check() ? auth()->user()['id'] : null;
            Logs::create($log);
        }
    }
}
