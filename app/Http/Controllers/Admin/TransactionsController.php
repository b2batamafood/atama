<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index()
    {
        return view(
            'admin.transactions.index',
            [
                "title" => "Transactions"
            ]
        );
    }
}
