<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\AntiCorruption;
use App\Models\MinFinContact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AntiCorruptionController extends Controller
{
    public function Index(){
        return view('front.vendor.antiCorruption');
    }

    public function SendMessage(){

        $validator = Validator::make(request()->all(), [
           'subject' => 'required|string',
           'body' => 'required|string',
           'attachment' => 'nullable|file|max:10000',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors());
        }
        else{
            $data = request()->all();

            if(array_key_exists('attachment', $data)){
                $attachment = $data['attachment'];
                $data['file'] = $attachment->getClientOriginalName();
                $name = md5(Carbon::now() . "_" . $attachment->getClientOriginalName()) . '.' . $attachment->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('/files/shares/Документы', $attachment, $name);
                $data['attachment'] = url('/storage/files/shares/Документы/' . $name);
            }

            $data['to'] = MinFinContact::first()['email'];
            if($data['to'] == '' && $data['to'] == null){
               $data['to'] = env('MAIL_TO');
            }

            Mail::to($data['to'])->send(new AntiCorruption($data));

            return redirect()->back()->with('success', __("Your message was sent anonymously"));
        }
    }
}
