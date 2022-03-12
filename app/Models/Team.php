<?php

namespace App\Models;

use Laratrust\Models\LaratrustTeam;
use Laravel\Scout\Searchable;

class Team extends LaratrustTeam
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
