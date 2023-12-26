<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\payment;
use App\Models\history;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::id();
        $secondTableData = payment::where('user_id', $userId)->get();
        $historyData = History::with('ticket_type')->where('user_id', $userId)->get();

        $user = Auth::user();
        return view('home', ['user' => $user, 'secondTableData' => $secondTableData, 'historyData' => $historyData]);
    }
}
