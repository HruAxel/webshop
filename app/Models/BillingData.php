<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class BillingData extends Model
{
    use HasFactory;


    function user() {
        return $this->belongsTo(User::class);
    }

    protected $guarded = [];
}
