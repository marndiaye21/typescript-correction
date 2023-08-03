<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Compte extends Model
{
    use HasFactory;
    protected $guarded = [
        
    ];
    public function client() : BelongsTo {
        return $this->belongsTo(Client::class);
        
    }

    
}
