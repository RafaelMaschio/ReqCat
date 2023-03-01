<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('index');
    }

    public function home(Request $request)
    {
        $projects = Project::where('motivado_por', 'like', '%' . $request->search . '%')->get();
        return view('home', [
            'projects' => Auth::user()->projects
        ]);
    }
}
