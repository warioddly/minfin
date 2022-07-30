<?php

namespace App\Http\Controllers\Botman;

use App\Http\Controllers\Controller;

class BotManController extends Controller
{
    public function handle()
    {
        $this->greet = false;
        $botman = app('botman');
        $botman->typesAndWaits(1);

        $botman->hears('{message}', function($botman, $message) {
            $botman->startConversation(new QuickReplyConversation($botman));
        });

        $botman->listen();
    }

    public function Chat(){
        return view('vendor.botman-web.chat');
    }
}

