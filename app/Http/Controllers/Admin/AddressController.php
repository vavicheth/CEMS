<?php

namespace App\Http\Controllers\Admin;

use App\Commune;
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
        $source=Village::where('code','1020103')->with('commune','district','province')->first();
//        $source=DB::table('villages')->where('code','1020103')->first();
        $data=$source->commune;
        return $source;

        $patients=Patient::withTrashed()->get();
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

    public function filters(Request $request)
    {
        $data= [];
        if($request->has('q')){
            $search = $request->q;
            if(request('type') == 'village') {
                $data = Village::where('name_kh', 'LIKE', "%$search%")->orWhere('name', 'LIKE', "%$search%")->get();
            }elseif (request('type') == 'commune') {
                $data = Commune::where('name_kh', 'LIKE', "%$search%")->orWhere('name', 'LIKE', "%$search%")->get();
            }elseif (request('type') == 'district') {
                $data = District::where('name_kh', 'LIKE', "%$search%")->orWhere('name', 'LIKE', "%$search%")->get();
            }elseif (request('type') == 'province') {
                $data =Province::where('name_kh','LIKE',"%$search%")->orWhere('name','LIKE',"%$search%")->get();
            }else{
                $data= [];
            }
        }
        return response()->json($data);
    }

    public function fetch(Request $request)
    {
//        $select = $request->get('select');
//        $value = $request->get('value');
//        $dependent = $request->get('dependent');
//        $data = District::where($select, $value)
//            ->groupBy('code')
//            ->get();
//        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
//        foreach($data as $row)
//        {
//            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
//        }
//        echo $output;

    }

    public function get_data(Request $request)
    {
        $code = $request->get('code');
        $name = $request->get('name');

        //get data from table by table name
        if ($name=='commune') {
            $data = Commune::where('code', $code)->with('district','province')->first();
        }elseif ($name=='district') {
            $data = District::where('code', $code)->with('province')->first();
        }elseif ($name=='province'){
            $data = Province::where('code', $code)->first();
        }else{
            $data=Village::where('code',$code)->with('commune','district','province')->first();
        }

        //get data destination
//        if ($type=='commune') {
//            $data=$source->commune;
//        }elseif ($type=='district') {
//            $data=$source->district;
//        }elseif ($type=='province'){
//            $data=$source->province;
//        }else{
//            $data=$source->villages;
//        }

        return response($data);
    }




}
