<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RealEstateEntity extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'real_estate_entity';

    protected $fillable = [
        'name',
        'real_state_type',
        'street',
        'external_number',
        'Internal_number',
        'neighborhood',
        'city',
        'country',
        'rooms',
        'bathrooms',
        'comments'
    ];
}
