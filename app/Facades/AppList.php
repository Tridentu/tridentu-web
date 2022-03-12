<?php
namespace App\Facades;


use App\Models\TenantApp;
use Illuminate\Support\Facades\Facade;

class AppList extends Facade {

    protected static function getFacadeAccessor() { return 'applist'; }


    public static function getApps() { return TenantApp::all(); }

}

?>