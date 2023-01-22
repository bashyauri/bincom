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
        // fetch all polling units yet to assign scores to
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
        $scores = $request->all(); // all the request inserted by the user
        //The party abbreviation labour cant be inserted

        for ($i=0; $i < count($request->partyname); $i++) {
          DB::table('announced_pu_results')->insert([
            'polling_unit_uniqueid'=>$scores['polling_unit_uniqueid'][$i],
            'party_abbreviation' => $scores['partyname'][$i],
            'party_score' => $scores['score'][$i],
            'date_entered' => Carbon::now(), // Using the carbon helper
            'user_ip_address'=> $request->ip(),
            'entered_by_user'=>gethostbyaddr($_SERVER['REMOTE_ADDR']) // i used my computer name
          ]);
        }
        return redirect()->back()->with('status','Inserted Successfully');

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


}