<?php

namespace App\Models;


use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Concerns\OwnedByApp;

class ExportableModel extends CruddableModel
{
    use HasFactory;
    use BelongsToTenant;
}
