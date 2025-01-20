<?php

namespace App\Http\Controllers;

use App\Models\Operario;
use Illuminate\Http\Request;
use App\Models\Maquina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CampusController extends Controller{

    public function show(){

        return view('Campus.listCampus');
    }

    public function create(){
        return view('Campus.createCampus');

    }


}
