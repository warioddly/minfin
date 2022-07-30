<?php


namespace App\Http\Controllers\Botman;

use App\Models\Botman;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class QuickReplyConversation extends Conversation
{
    public $botman;
    public $selectedText;
    public $selectedValue;
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

        $question = Question::create('Выберите пункты')->addButtons($this->getMessages(null));

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $id = $answer->getValue() ?? $answer->getText();
                $this->runQuickQuestions($id);
            }
        });
    }

    public function runQuickQuestions($id){
        $data = $this->getMessages($id);

        if(in_array('empty', $data)){
            $this->ask('<strong>Oops! Здесь пока ничего нет, начните разговор снова.</strong>', [
                [
                    'pattern' => 'yes|yep|да|ооба|оа|ова|Ова|Ооба|Да устраивает|',
                    'callback' => function () {
                        $this->say(__('Yes questions'));
                    }
                ],
                [
                    'pattern' => 'nah|no|nope|нет|неа|жок',
                    'callback' => function () {
                        $this->say(__('No questions'));
                    }
                ]
            ]);
        }
        else if(in_array('hasAnswer', $data)){
            $this->ask($data[0][0]['message'] . '<br /><br /><strong>Вы нашли ответ на свой вопрос?</strong>', [
                [
                    'pattern' => 'yes|yep|да|ооба|оа|ова|Ова|Ооба|Да устраивает|',
                    'callback' => function () {
                        $this->say(__('Yes questions'));
                    }
                ],
                [
                    'pattern' => 'nah|no|nope|нет|неа|жок',
                    'callback' => function () {
                        $this->say(__('No questions'));
                    }
                ]
            ]);
        }
        else{
            $question = Question::create('Выберите пункты')->addButtons($this->getMessages($id));

            $this->ask($question, function (Answer $answer) {
                if ($answer->isInteractiveMessageReply()) {
                    $id = $answer->getValue() ?? $answer->getText();
                    $this->runQuickQuestions($id);
                }
            });
        }
    }

    public function getMessages($id){
        $messages = Botman::where('parent_message_id', $id)->get();
        $currentMessage = Botman::whereId($id)->first();

        if(count($messages) == 0){
            return ['empty'];
        }

        if($currentMessage != [] && $id != ''){
            if($currentMessage->is_answer == 1){
                return [$messages, 'hasAnswer'];
            }
        }

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
