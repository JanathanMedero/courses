<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ModeratorsController extends Controller
{
    public function index()
    {
    	$users = User::all();

        return view('moderators.index');
    }
}
