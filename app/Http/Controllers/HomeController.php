<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Connection;

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
        // Fetch users who are not connected to the currently authenticated user
    $userId = auth()->id();
    $connectedUserIds = Connection::where('user_id', $userId)->orWhere('connected_user_id', $userId)->pluck('id');
    $suggestions = User::whereNotIn('id', $connectedUserIds)->take(10)->get(); // Get the first 10 suggestions

        return view('home', ['suggestions' => $suggestions]);
    }
}
