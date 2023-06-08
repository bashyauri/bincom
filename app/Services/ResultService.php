<?php

namespace App\Services;

use Carbon\Carbon;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class ResultService.
 */
class ResultService
{
    public function index() : Collection
    {
     return   DB::table('polling_unit')
        ->whereNotExists(function ($query) {
            $query->select(DB::raw('*'))
                  ->from('announced_pu_results')
                  ->whereColumn('polling_unit.uniqueid', 'announced_pu_results.polling_unit_uniqueid');
        })
        ->get();
    }
    public function store($request) : Void
    {
        $data = $request->validated();


        for ($i=0; $i < count($request->partyname); $i++) {
            DB::table('announced_pu_results')->insert([
              'polling_unit_uniqueid'=>$data['polling_unit_uniqueid'][$i],
              'party_abbreviation' => $data['partyname'][$i],
              'party_score' => $data['score'][$i],
              'date_entered' => Carbon::now(), // Using the carbon helper
              'user_ip_address'=> $request->ip(),
              'entered_by_user'=>gethostbyaddr($_SERVER['REMOTE_ADDR']) // i used my computer name
            ]);
        }
    }
    public function show() : Collection
    {
       return DB::table('party')->get();
    }
}
