<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Province;
use App\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{


    public function move_address()
    {
        $patients=Patient::withTrashed()->get();
//        dd($patients->get());
        foreach ($patients as $patient)
        {
            if ($patient->hasaddress()->count() == 0)
            {
                $patient->hasaddress()->create([
                    'address'=>$patient->address,
                ]);
            }
        }


    }


    public function villages(Request $request)
    {

        $villages = Village::where('name_kh', 'LIKE', '%'.$request->input('name_kh').'%')
            ->paginate(10);
        return $villages;

    }

    public function districts(Request $request)
    {
        $data= [];

        if($request->has('q')){
            $search = $request->q;
            $data =District::where('name_kh','LIKE',"%$search%")->orWhere('name','LIKE',"%$search%")->with('province')->get();
//            $districts =District::where('name_kh','LIKE',"%$search%")->orWhere('name','LIKE',"%$search%")->with('province')->get();
        }
        return response()->json($data);
    }

    public function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = District::where($select, $value)
            ->groupBy('code')
            ->get();
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;

    }

    public function get_data(Request $request)
    {
        $table = $request->get('table');
        $value = $request->get('value');
        $con_id = $request->get('con_id');
        $data = DB::table('communes')
//            ->select("code","name_kh")
            ->where('district_code', '102')
//            ->pluck('name', 'id');
            ->get(['code','name_kh']);


//        return response($data);
        $output = '<option value="">Select '.ucfirst('Testing').'</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->code.'">'.$row->name_kh.'</option>';
        }
        echo $output;
    }




}
