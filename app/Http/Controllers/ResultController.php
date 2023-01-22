<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_polling_units = DB::table('polling_unit')

        ->whereNotExists(function ($query) {
            $query->select(DB::raw('*'))
                  ->from('announced_pu_results')
                  ->whereColumn('polling_unit.uniqueid', 'announced_pu_results.polling_unit_uniqueid');

        })
        ->get();


       return view('results.index',['all_polling_units' => $all_polling_units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $scores = $request->all();
        //The party abbreviation labour cant be inserted

        for ($i=0; $i < count($request->partyname); $i++) {
          DB::table('announced_pu_results')->insert([
            'polling_unit_uniqueid'=>$scores['polling_unit_uniqueid'][$i],
            'party_abbreviation' => $scores['partyname'][$i],
            'party_score' => $scores['score'][$i],
            'date_entered' => Carbon::now(), // Using the carbon helper

          ]);
        }
        redirect()->back()->with('success','Great');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parties = DB::table('party')->get();
        return view('results.show',['id' => $id, 'parties' => $parties]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}