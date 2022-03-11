<?php

namespace App\Http\Controllers;

use App\Models\Inspect;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $engineers = User::where('usertype', 'engineer')->get();
        return view('admin.status.view', compact('engineers'));
        
    }

    
}
