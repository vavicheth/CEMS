<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Province;
use App\Village;
use Illuminate\Http\Request;

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
//        if ($request->ajax()) {
//            $villages = Village::get()->pluck('name_kh', 'code')->prepend('Select village', '');
//            $villages = Village::select('code','name_kh')->get();
//            return response()->json($villages);

//        }


        $villages = Village::where('name_kh', 'LIKE', '%'.$request->input('term', '').'%')
            ->get(['code', 'name_kh as text']);
        return ['results' => $villages];

    }

    public function districts($id)
    {
//        $province = Province::whereCode($request->province_id)->get();
//        $districts = $province->districts()->select('code','name_kh')->get();
        $districts=District::where('province_code',$id)->select('code','name_kh')->get();
        return response()->json($districts);
    }


}
