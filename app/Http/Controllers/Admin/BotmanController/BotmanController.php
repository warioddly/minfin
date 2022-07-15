<?php

namespace App\Http\Controllers\Admin\BotmanController;

use App\Http\Controllers\Controller;
use App\Http\Requests\BotmanRequest;
use App\Models\Botman;
use App\Services\CheckPermissionService;
use JoeDixon\Translation\Drivers\Translation;

class BotmanController extends Controller
{
    public function Index(CheckPermissionService $permissionService){
        $messages = Botman::where('parent_message_id', null)->get();
        $userCanActions = $permissionService->permissionsInBotman();

        return view('admin.botman.index', compact('messages', 'userCanActions'));
    }

    public function Store(Translation $translation, BotmanRequest $request){
        $data = $request->all();

        if(isset($data['is_answer'])){
            $data['is_answer'] = 1;
        }
        else{
            $data['is_answer'] = 0;
        }

        if($data['parent_message_id'] == 'null'){
            unset($data['parent_message_id']);
        }

        Botman::create($data);
        $translation->addGroupTranslation('ru', 'single', $data['message'], $data['message']);

        return redirect()->back()->with('status', __('Successfully added'));
    }

    public function Show(CheckPermissionService $permissionService, $id){
        $message = Botman::find($id);
        $messages = $message->getChilds()->get();
        $userCanActions = $permissionService->permissionsInBotman();

        return view('admin.botman.show', compact('message', 'messages','userCanActions'));
    }

    public function Update(BotmanRequest $request, $id){
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);

        if(isset($data['is_answer'])){
            $data['is_answer'] = 1;
        }
        else{
            $data['is_answer'] = 0;
        }

        if($data['parent_message_id'] == 'null'){
            unset($data['parent_message_id']);
        }

        Botman::whereId($id)->update($data);

        return redirect()->back()->with('status', __('Successfully updated'));
    }
}
