<?php

namespace App\Expense\Infrastructure\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExpenseController extends Controller
{
    /**
     * Display a listing of expenses.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('expenses.index', []);
    }
}
