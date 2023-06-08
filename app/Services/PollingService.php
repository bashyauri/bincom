<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class pollingService.
 */
class PollingService
{
    public function index() :Collection
    {
        return DB::table('polling_unit')->get();
    }
    public function show($id) : Collection
    {
        return DB::table('announced_pu_results')
        ->where('polling_unit_uniqueid', $id)->get();
    }
    public function selectAllLgas() : Collection
    {
        return DB::table('lga')->where(['state_id' => 25])->get();
    }
    public function lgaScores($data) : Collection
    {
        $units = [];
        $polling_units = DB::table('polling_unit')->where(['lga_id'=> $data['lga']])->get();
        foreach ($polling_units as $unit){
            array_push($units,$unit->uniqueid);
        }
        // Add all the Scores of each party
        return  DB::table('announced_pu_results')
        ->select('party_abbreviation',DB::raw('sum(party_score) as scores '))
        ->orWhereIn('polling_unit_uniqueid', $units)

        ->groupBy('party_abbreviation')
        ->get();
    }
}
