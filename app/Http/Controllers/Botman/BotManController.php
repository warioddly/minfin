<?php

namespace App\Http\Controllers\Botman;

use App\Http\Controllers\Controller;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
        $botman->typesAndWaits(1);
        $botman->startConversation(new QuickReplyConversation($botman));
    }
}

