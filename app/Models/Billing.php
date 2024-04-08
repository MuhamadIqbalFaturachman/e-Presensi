<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $table = 'billings';

    protected $fillable = [
        'id',
        'loan',
        'installments',
        'due_date'
    ];
}
