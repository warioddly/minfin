<?php

namespace App\Http\Controllers\Admin\SettingController;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarouselRequest;
use App\Models\CarouselItem;
use App\Services\CarouselService;

class SettingController extends Controller
{
    public function index(){
        $carouselItems = CarouselItem::latest()->get();
        return view('admin.settings.index', compact('carouselItems'));
    }

    public function StoreCarousel(CarouselRequest $request, CarouselService $carouselService){
        $data = $carouselService->validateData($request);
        CarouselItem::create($data);
        return redirect()->back()->with('status', __('Successfully added'));
    }

    public function UpdateCarousel(CarouselRequest $request, CarouselService $carouselService, $id){
        $data = $carouselService->validateData($request);
        CarouselItem::whereId($id)->update($data);
        return redirect()->back()->with('status', __('Successfully updated'));
    }

}
