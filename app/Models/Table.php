<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_number',
        'qr_code_key',
        'status',
        'capacity',
        'shape',
        'x_pos',
        'y_pos'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}