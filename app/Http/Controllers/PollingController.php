<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all_polling_units = DB::table('polling_unit')->get();
       return view('polls.index',['all_polling_units' => $all_polling_units]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $polling_units_results = DB::table('announced_pu_results')
        ->where('polling_unit_uniqueid', $id)->get();
        return view('polls.show',['polling_units_results' => $polling_units_results]);
    }

    public function selectLGA()
    {
    $lgas = DB::table('lga')->where('state_id', '=', 25)->get();


     return view('polls/show-lga',['lgas' => $lgas]);

    }
    public function lgaScores(Request $request)
    {
        $units = [];
        // Get all the polling units in that LGA and insert the uniqueid in an array
        $polling_units = DB::table('polling_unit')->where('lga_id','=',$request->lga)->get();
        foreach ($polling_units as $unit){
            array_push($units,$unit->uniqueid);
        }
        // Add all the Scores of each party
        $party_scores = DB::table('announced_pu_results')
        ->select('party_abbreviation',DB::raw('sum(party_score) as scores '))
        ->orWhereIn('polling_unit_uniqueid', $units)

        ->groupBy('party_abbreviation')
        ->get();
        return view('polls/show-scores',['party_scores'=>$party_scores]);

    }



}
