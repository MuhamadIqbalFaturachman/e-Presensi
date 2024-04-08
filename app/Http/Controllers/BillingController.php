<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Billing;

class BillingController extends Controller
{
    public function index(Request $request)
    {
        $bills = Billing::whereDate('due_date', '<', now())->get();
        return view('billing.index', compact('bills'));
    }
}