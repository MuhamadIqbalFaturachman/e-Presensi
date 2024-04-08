<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $table = 'salarys';

    protected $fillable = [
        'id_salary',
        'employee_name',
        'basic_salary',
        'transportation',
        'consumption',
        'family_allowance',
        'positional_allowance'
    ];
}