<?php

namespace App\Services;

use Dacastro4\LaravelGmail\Facade\LaravelGmail;

class EmailService
{
    public function getPage($page){
        return LaravelGmail::message()->preload()->in($box = strtolower($page) ?? 'inbox')->all();
    }

    public function messageAction($messageId, $action){
        $message = LaravelGmail::message()->get($messageId);

        switch ($action){
            case 'toTrash': $message->sendToTrash(); break;
            case 'removeFromTrash': $message->removeFromTrash(); break;
            case 'removeStar': $message->removeStar(); break;
            case 'addStar': $message->addStar(); break;
            case 'markAsRead': $message->markAsRead(); break;
            case 'markAsUnread': $message->markAsUnread(); break;
        }
    }
}
