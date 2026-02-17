<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'email',
        'purpose',
        'person_to_meet',
        'department',
        'id_type',
        'id_number',
        'birth_year',
        'approval_status',
    ];

    protected $casts = [
        'visted_at' => 'datetime',
    ];

    public $timestamps = false;

}
