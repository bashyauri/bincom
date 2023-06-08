<?php

namespace App\Http\Controllers;

use App\Http\Requests\lgaScoresRequest;
use App\Services\PollingService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;


class PollingController extends Controller
{
    public function __construct(protected PollingService $pollingService){}
    public function index() : View
    {

            $all_polling_units = $this->pollingService->index();
            return view('polls.index',['all_polling_units' => $all_polling_units]);


    }



    public function show($id) : View
    {

            $polling_units_results = $this->pollingService->show($id);
            return view('polls.show',['polling_units_results' => $polling_units_results]);


    }

    public function selectAllLgas(): View
    {


            $lgas = $this->pollingService->selectAllLgas();
            return view('polls/show-lga',['lgas' => $lgas]);


    }
    public function lgaScores(lgaScoresRequest $request) : View
    {
        try {
            $party_scores = $this->pollingService->lgaScores($request->validated());
            return view('polls/show-scores',['party_scores'=>$party_scores]);
        } catch (Exception $e) {
            Log::alert($e->getMessage());
            return redirect()->back()->withErrors(['msgError' => 'Something went wrong:']);
        }



    }



}