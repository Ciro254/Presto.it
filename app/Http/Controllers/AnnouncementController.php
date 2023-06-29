<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    
    
public function __construct(){

        $this->middleware('auth')->except('homepage');
    }


    public function create()
    {
        return view('announcement.create');
    }
}
