<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;

class SlipGajiController extends Controller
{
    public function index()
    {
        $salary = Salary::all();
        return view('slipgaji.index', compact('salary'));
    }
}
