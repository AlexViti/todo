<?php

namespace App\Http\Controllers;

use App\TodoList;
use Illuminate\Http\Request;

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
        return view('home');
    }

    public function todoLists(Request $request)
    {
        $todoLists = TodoList::with(['todos'])->where('user_id', $request->user()->id)->get();
        return response()->json($todoLists);
    }
}
