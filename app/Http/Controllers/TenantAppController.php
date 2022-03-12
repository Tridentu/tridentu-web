<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\TenantApp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TenantAppController extends Controller
{
    public function create(Request $request){
        return view('tenantapp.create');
    }

    public function createFinalize(Request $request){

        $validated = $request->validate([
            'title' => 'required|max:255',
            'id' => 'required|unique:tenants|max:255',
            'application' => 'required',
            'password' => 'required|max:255',

        ]);

        $id = $request->input("id") ?? Str::slug($this->title);

        $app = new TenantApp();
        $app->id = $id;
        $app->setInternal('title', $request->input('title'));
        $app->setInternal('application', $request->input('application'));
        $app->setInternal('db_name', 't_' . $id);
        $app->setInternal('db_username', $id);
        $app->setInternal('db_password', $request->input('password'));

        if(Auth::user()->apps()->save($app))
            return redirect(to_route('welcome'));
        else
            throw new HttpNotFoundException;
        
    }
}
