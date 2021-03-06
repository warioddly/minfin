<?php

namespace App\Http\Controllers\Admin\SettingController;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlocksInMainPage;
use App\Http\Requests\CarouselRequest;
use App\Models\Banner;
use App\Models\CarouselItem;
use App\Models\Chart;
use App\Models\MinFinContact;
use App\Models\Page;
use App\Models\SocialWebSites;
use App\Services\CarouselService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $carouselItems = CarouselItem::latest()->get();
        $banner = Banner::first();
        $socialMedia = SocialWebSites::all();
        $contactData = MinFinContact::first();
        $pages = Page::latest()->get();
        $chartData = Chart::all();

        return view('admin.settings.index', compact('carouselItems', 'pages', 'banner', 'socialMedia', 'contactData', 'chartData'));
    }

    public function ChangeBlocks(BlocksInMainPage $request){

        Page::where('visible_on_main_page', 1)->update(['visible_on_main_page' => 0]);
        Page::whereIn('id', $request->all()['pages'])->update(['visible_on_main_page' => 1]);

        return redirect()->back()->with('status', __('Successfully added'));
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
