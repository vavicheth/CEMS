<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Patient;
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
}
