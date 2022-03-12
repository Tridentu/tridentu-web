<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;
use Laravel\Scout\Searchable;

class Role extends LaratrustRole
{
    public $guarded = [];

    use Searchable;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
  
        return $array;
    }
}
