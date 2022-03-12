<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Venturecraft\Revisionable\RevisionableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\Tags\HasTags;

class CruddableModel extends Model
{
    use HasFactory;
    use RevisionableTrait;
    use HasTags;
    use SoftDeletes;

    protected $historyLimit = 512;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true;
}
