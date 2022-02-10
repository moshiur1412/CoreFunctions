<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()
    {

		\Log::info('CrudController::index called');

        return view('cruds.index');
    }

    public function create()
    {
    	
    	\Log::info('CrudController:crate called');

    	return view('cruds.form');

    }


    public function store()
    {
    	\Log::info('CrudController:store called');


    	request()->validate([
    		'image' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed'
        ]);

    	return (request()->all());
    }
}
