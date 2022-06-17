<?php

namespace App\Http\Controllers\Admin\EmailController;

use App\Http\Controllers\Controller;
use App\Services\EmailService;
use Carbon\Carbon;
use Dacastro4\LaravelGmail\Facade\LaravelGmail;
use Dacastro4\LaravelGmail\Services\Message\Mail;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class EmailController extends Controller
{
    public function Index(EmailService $service, $pageName){
        $messages = $service->getPage($pageName);

        $amountOfAllMessage = count($messages);

        $messages = $this->paginate($messages, $perPage=13, $page=null, $options=['path' => route('email', 'inbox')]);

        return view('admin.email.index', compact('messages', 'amountOfAllMessage', 'pageName'));
    }

    public function Show($messageId){
        $attachments = [];
        $message = LaravelGmail::message()->get($messageId);

        if(in_array('UNREAD', $message->getLabels())){
            $message->markAsRead();
        }

        if(count($message->getAttachments()) != 0){
            foreach ($message->getAttachments() as $key => $item){
                $filename = $item->getFileName();
                $name = md5(Carbon::now() . "_" . $filename) . '.' . pathinfo($filename)['extension'];
                $item->saveAttachmentTo('public/files/shares/Документы/', $filename = $name, $disk = 'local');

                $attachments[$key] = [
                    'filename' => $item->getFileName(),
                    'size' => $item->getSize(),
                    'filepath' => url('storage/files/shares/Документы') . '/' . $name,
                    'ext' => pathinfo($filename)['extension'],
                ];
            }
        }

        return view('admin.email.show', compact('message', 'attachments'));
    }

    public function Actions(EmailService $service, $messageId, $action){
        $service->messageAction($messageId, $action);
        return redirect()->back()->with('status', __('Successfully'));
    }

    public function SendMessage(){
        $data = request()->all();

        try{
            $mail = new Mail;
            $mail->to($data['to'], $name = '' );
            $mail->from(LaravelGmail::user(), $name = __('Ministry of Finance of the Kyrgyz Republic') );
            $mail->subject($data['subject']);
            $mail->message($data['message']);
            $mail->send();
            return redirect()->back()->with('status', __('Successfully sent'));
        }
        catch (\Exception $exception){
            return redirect()->back()->with('error', __('Something went wrong!'));
        }

    }

    public function paginate($items, $perPage = 13, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

}
