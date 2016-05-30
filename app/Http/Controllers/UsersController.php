<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	public function index()
	{
		return User::all();
	}
}

