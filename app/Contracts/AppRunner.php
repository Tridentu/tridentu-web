<?php

namespace App\Contracts;


use App\Models\TenantApp;

interface AppRunner {


    public function getPathToApplication(TenantApp $app): string;

    
}


?>