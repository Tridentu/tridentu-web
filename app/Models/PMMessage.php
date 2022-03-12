<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cmgmyr\Messenger\Models\Message;
use Spatie\Tags\HasTags;

class PMMessage extends Message
{
    use HasFactory;
    use HasTags;
}
