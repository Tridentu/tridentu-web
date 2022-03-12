<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Stancl\VirtualColumn\VirtualColumn;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;

class TenantApp extends BaseTenant implements TenantWithDatabase
{
    use HasFactory;
    use HasDatabase;
    
    public $dataEncodingStatus = 'decoded';


    public static function getCustomColumns(): array
    {
        return [
            'id',
            'title',
            'application',
        ];
    }

    use Searchable;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
  
        $array["data"] = null;

        return $array;
    }
}
