<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;
use App\Models\Team;

class SearchController extends Controller
{
    public function searchUsers(Request $request){
        $searchTerm = $request->get("query");
        return view("dash", [ "resultType" => "user", "results" => User::search($searchTerm)->paginate(15)]);
        

    }

    public function searchGroups(Request $request){
        $searchTerm = $request->get("query");
        return view("dash", [ "resultType" => "group", "results" => Team::search($searchTerm)->paginate(15)]);
        

    }

    public function searchRoles(Request $request){
        $searchTerm = $request->get("query");
        return view("dash", [ "resultType" => "role", "results" => Role::search($searchTerm)->paginate(15)]);
        

    }
}
