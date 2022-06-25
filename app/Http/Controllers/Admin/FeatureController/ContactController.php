<?php

namespace App\Http\Controllers\Admin\FeatureController;

use App\Http\Controllers\Controller;
use App\Http\Requests\MinFinContactRequest;
use App\Http\Requests\SocialMediaRequest;
use App\Models\Banner;
use App\Models\MinFinContact;
use App\Models\SocialWebSites;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function StoreSocial(SocialMediaRequest $request){
        $data = $request->all();
        SocialWebSites::create($data);

        return redirect()->back()->with(['status' => 'Successfully added']);
    }

    public function UpdateSocial(SocialMediaRequest $request, $id){
        $data = $request->all();
        unset($data['_method']);
        unset($data['_token']);
        SocialWebSites::whereId($id)->update($data);

        return redirect()->back()->with(['status' => 'Successfully updated']);
    }

    public function UpdateContacts(MinFinContactRequest $request){
        $data = $request->all();
        unset($data['_method']);
        unset($data['_token']);

        $banner = MinFinContact::first();

        $banner->update($data);

        return redirect()->back()->with(['status' => 'Successfully updated']);
    }
}
