<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RefCity;
use App\Models\RefEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    public function getAll(Request $request)
    {

        $filters = $request->query('filter');
        $sort = $request->query('sort');

        $start = $request->query('start');
        $limit = $request->query('limit');

        $edu_filter='';
        $city_filter='';

        $filters=json_decode($filters, true);
        $sort=json_decode($sort, true);

        if ($filters!==null) {
            for ($i=0; $i<count($filters); $i++) {
                if ($filters[$i]['field']==='education') $edu_filter = explode(',', $filters[$i]['value']);
                if ($filters[$i]['field']==='city') $city_filter = explode(',', $filters[$i]['value']);
            }
        }

        $query = User::query();
        $users = collect($query->get()->toArray());
        $total=count($users);

        $query = User::query()
            ->select('users.id as id',
                'users.name as person_name',
                'ref_education.name as education')
            ->join('ref_education', function ($join) {
                $join->on('users.education_id', '=', 'ref_education.id');
            })
            ->with(['city' => function ($query) {
                $query->select('ref_cities.name');
            }])
            ->whereHas('city', function($query) use ($city_filter) {
                if ($city_filter!='') $query->whereIn('users_to_cities.ref_city_id', $city_filter);
            })
            ->where(function($query) use ($edu_filter) {
                if ($edu_filter!='') $query->whereIn('users.education_id', $edu_filter);
            })
            ->orderBy('person_name',$sort[0]['direction'])
            ->offset($start)->limit($limit);

        $users = collect($query->get()->toArray());

        return response()->json(Array(
            "total"=>$total,
            "data"=>$users));
    }

}
