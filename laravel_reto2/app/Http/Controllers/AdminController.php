<?php


namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Operario;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('listMaquina');
    }


    public function create()
    {
        return view('create');
    }
}
