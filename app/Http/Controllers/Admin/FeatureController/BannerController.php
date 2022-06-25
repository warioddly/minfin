<?php

namespace App\Http\Controllers\Admin\FeatureController;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function Update(BannerRequest $request){
        $data = $request->all();

        if($request->hasFile('first_image')) {
            $data['first_image_path'] = $this->putImage($data['first_image']);
        }

        if($request->hasFile('second_image')) {
            $data['second_image_path'] = $this->putImage($data['second_image']);
        }

        unset($data['_token']);
        unset($data['_method']);
        unset($data['first_image']);
        unset($data['second_image']);

        $banner = Banner::first();

        $banner->update($data);

        return redirect()->back()->with(['status' => 'Successfully updated']);
    }

    public function putImage($image){
        $name = "баннер_" . md5(Carbon::now() . "_" . $image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
        $filepath = Storage::disk('public')->putFileAs('/files/shares/Разные/', $image, $name);
        return '/storage/' . $filepath;
    }
}
