<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator, Image, Hash, Auth, Mail, Str, Config;
use App\Models\Maintenances;
use App\Models\Equipment;

class MaintenancesController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
        $this->middleware('user.status');
        $this->middleware('user.permissions');
        $this->middleware('isadmin');
    }

    public function getMaintenanceHome($filter){
    	switch ($filter) {
            case 'all':
                $maintenances = Maintenances::all();
                break;
            case '1':
                  $maintenances = Maintenances::where('Fecha_Efectiva', '!=', null)->get();
                break;
            case '0':
                  $maintenances = Maintenances::where('Fecha_Efectiva', null)->get();
                break;
        }

    	$data = [
    		'maintenances' => $maintenances
    	];

    	return view('admin.maintenances.home', $data);
    }



}