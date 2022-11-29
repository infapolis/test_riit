<?php

namespace App\Http\Controllers;

use App\Models\RefEducation;
use App\Models\RefCity;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RefController extends Controller
{

    public function getEdu(Request $request)
    {

        $result = RefEducation::query()
            ->select('ref_education.id as id',
                'ref_education.name as text')
            ->get();

        return response()->json(Array(
            "education_levels"=>$result
        ));

    }

    public function updateUserEdu(Request $request)
    {

        $user_id = $request->query('user_id');
        $edu_value = $request->query('edu_value');
        $user_id=str_replace('Person-', '', $user_id);

        $query = RefEducation::query()
            ->select('ref_education.id')
            ->where('ref_education.name', $edu_value);

        $result = collect($query->get()->toArray());
        $edu_id = $result[0]['id'];

        DB::table('users')
            ->where('id', $user_id)
            ->update(['education_id' => $edu_id]);

        return response()->json(Array(
            "res"=>'Уровень образования изменен.'
        ));

    }

    public function getCities(Request $request)
    {

        $result = RefCity::query()
            ->select('ref_cities.id as id',
                'ref_cities.name as text')
            ->get();

        return response()->json(Array(
            "ref_cities"=>$result
        ));

    }

}
