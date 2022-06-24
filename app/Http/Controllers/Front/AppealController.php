<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppealOfCitizensRequest;
use App\Models\AppealOfCitizens;
use App\Models\Category;
use App\Services\DocumentService;
use Carbon\Carbon;

class AppealController extends Controller
{
    public function Index(){
        $appealofcitizens = AppealOfCitizens::where('is_published', true)->latest()->get();
        return view('front.appealofcitizens.appealofcitizens', compact('appealofcitizens'));
    }

    public function AskAQuestions(){
        $categories = Category::where('publisher', false)->get();
        return view('front.appealofcitizens.askaquestions', compact('categories'));
    }

    public function AppealQuestion( AppealOfCitizensRequest $request, DocumentService $documentService){
        $data = $request->all();

        if($request->hasFile('files')) {
            $files = $data['files'];
        }

        unset($data['files']);

        $id = AppealOfCitizens::create($data)->id;

        if($request->hasFile('files')) {
            $documentService->validateData($files, $id, 'appealofcitizens');
        }

        return redirect()->route('appeal-of-citizens')->with(['status' => __('Your request has been received and will be reviewed as soon as possible. The answer will be sent to the email address.')]);
    }

    public function AppealSearch(){

        $search = request()->get('search');
        $date = request()->get('dates');

        $startDate = Carbon::parse(substr("$date", 0, 10))->format('Y-m-d');
        $endDate = Carbon::parse(substr("$date", 13))->format('Y-m-d');

        $appealofcitizens = AppealOfCitizens::whereBetween('created_at', [$startDate, $endDate])
            ->where('content', 'LIKE', "%{$search}%")
            ->get();

        return view('front.appealofcitizens.appealofcitizens', compact('appealofcitizens'));
    }
}
