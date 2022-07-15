<?php


namespace App\Http\Controllers\Botman;

use App\Models\Botman;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class QuickReplyConversation extends Conversation
{
    public $botman;
    /**
     * Start the conversation.
     *
     * @return mixed
     */

    public function __construct($botman)
    {
        $this->botman = $botman;
    }

    public function run(){
        $this->botman->reply(Question::create('Выберите пункт')->addButtons($this->getFirstMessages()));
        $this->botman->listen();
    }

    public function getFirstMessages(){
        $messages = Botman::where('parent_message_id', null)->get();
        return $this->createBtns($messages);
    }

    public function createBtns($messages){
        $btns = [];
        foreach ($messages as $message){
            $btns[] = Button::create($message->message)->value($message->id);
        }
        return $btns;
    }
}
