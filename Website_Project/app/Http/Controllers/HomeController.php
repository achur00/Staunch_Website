<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Carbon\Carbon;
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
        $due_subscriptions = [];
        $subs = Subscription::with(['user','creator','service','pricing'])->get();

        foreach ($subs as $sub) {
           if( $sub->due->diffInHours($sub->start) <= 0){

               $due_subscriptions[] = $sub;
           }
        }
        return view('dashboard', compact('due_subscriptions'));
    }
}
