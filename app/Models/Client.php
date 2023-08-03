<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;
    protected $guarded = [
        
    ];
    public function scopeClientByTel(Builder $builder,string $tel){
        return $builder->where("telephone","like",$tel);
    }

}
