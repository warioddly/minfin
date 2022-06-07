<?php

namespace App\Http\Controllers\Admin\ProfileController;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Notes;
use App\Models\User;
use App\Services\UserService;

class ProfileController extends Controller
{
    public function Index(){
        $user = User::find(auth()->id());

        $roles = $user->getRoleNames();
        $notes = Notes::where('user_id', $user->id)->latest()->get();

        return view('admin.vendor.profile', compact('user', 'roles', 'notes'));
    }

    public function Update(UserUpdateRequest $request, UserService $userService, $id){

        $user = User::find($id);
        $data = $userService->validateData($request);
        $user->update($data);

        return redirect()->back()->with('status', __('User updated successfully'));
    }
}
