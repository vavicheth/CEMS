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

        $villages = Village::where('name_kh', 'LIKE', '%'.$request->input('name_kh').'%')
            ->paginate(10);
        return $villages;

    }

    public function districts($id)
    {
//        $province = Province::whereCode($request->province_id)->get();
//        $districts = $province->districts()->select('code','name_kh')->get();
        $districts=District::where('province_code',$id)->select('code','name_kh')->get();
        return response()->json($districts);
    }


}
