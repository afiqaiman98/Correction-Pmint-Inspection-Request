<?php

namespace App\Http\Controllers;

use App\Models\Engineer;
use App\Models\Form;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{
    public function redirect()
    {

        if (Auth::id()) {

            if (Auth::user()->usertype == '0') {
                return view('user.home');
            } elseif (Auth::user()->usertype == 'engineer') {
                return view('engineer.home');
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {
            return view('user.home');
        }
    }
}
