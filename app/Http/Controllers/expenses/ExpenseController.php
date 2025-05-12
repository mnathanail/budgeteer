<?php

namespace App\Http\Controllers\expenses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExpenseController extends Controller
{
    public function index(Request $request): View
    {
        return view('expenses.index', []);
    }
}
