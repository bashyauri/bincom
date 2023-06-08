<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultRequest;
use App\Services\ResultService;
use Exception;

use Illuminate\Contracts\View\View;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ResultController extends Controller
{
    public function __construct(protected ResultService $resultService){}

    public function index() :View
    {

        $all_polling_units = $this->resultService->index();


       return view('results.index',['all_polling_units' => $all_polling_units]);
    }


    public function store(StoreResultRequest $request)
    {
        try {
            $this->resultService->store($request);

        return redirect()->back()->with('status','Inserted Successfully');
        } catch (Exception $e) {
            Log::alert($e->getMessage());
            return redirect()->back()->withErrors(['msgError' => 'Something went wrong:']);
        }


    }


    public function show($id)
    {

            $parties = $this->resultService->show();
            return view('results.show',['id' => $id, 'parties' => $parties]);


    }


}
