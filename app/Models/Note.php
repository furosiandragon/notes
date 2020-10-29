<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * A note belongs to a single user
     * 
     * @return App\Models\User
     */
    public function user(): BelongsTo
    {
        return $this->BelongsTo('App\Models\User');
    }
}
