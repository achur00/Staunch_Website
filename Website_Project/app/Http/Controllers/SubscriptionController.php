<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use App\Models\Service;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::with(['pricing', 'creator', 'user', 'service'])->get();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = User::where('role_id', 2)->get();
        $services = Service::pluck('name', 'id')->all();

        return view('admin.subscriptions.create', compact('clients', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'paid' => 'numeric',
            'user_id' => 'required|numeric',
            'service_id' => 'required|numeric',
            'pricing_id' => 'required|numeric',
            'start' => 'required|date',
            'due' => 'required|date',
        ]);

        try {
            $user = Auth::user();
            // get original amunt
            $amount = Pricing::findOrFail($request->pricing_id)->amount;

            // test the date
            if (Carbon::parse($request->due)->lte(Carbon::parse($request->start))) {
                return back()->with('error', 'Due date cannot less than or equal to start date');
            }
            if ($request->paid > $amount) {
                return back()->with('error', 'You cannot pay higher than service price!');
            }
            //  generate payment reference
            $ref = (random_int(100, 900) . Str::random(2) . rand(100, 900) . Str::random(2)) . date("d-m-Y-his");

            if ($request->paid == $amount) {
                $status = "paid";
            } else if ($request->paid < $amount && $request->paid > 0) {
                $status = "in-progress";
            } else {
                $status = "pending";
            }

            $user->subcreator()->create([
                'paid' => $request->paid,
                'service_id' => $request->service_id,
                'pricing_id' => $request->pricing_id,
                'user_id' => $request->user_id,
                'start' => $request->start,
                'due' => $request->due,
                'status' => $status,
                'payment_ref' => $ref,

            ]);

            return back()->with('status', 'Subscription created successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        $clients = User::where('role_id', 2)->get();
        $services = Service::pluck('name', 'id')->all();
        return view('admin.subscriptions.edit', compact('subscription', 'clients', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'paid' => 'numeric',
            'user_id' => 'required|numeric',
            'service_id' => 'required|numeric',
            'pricing_id' => 'required|numeric',
            'start' => 'required|date',
            'due' => 'required|date',
        ]);

        try {
            $user = Auth::user();
            // get original amunt
            $amount = Pricing::findOrFail($request->pricing_id)->amount;

            // test the date
            if (Carbon::parse($request->due)->lte(Carbon::parse($request->start))) {
                return back()->with('error', 'Due date cannot less than or equal to start date');
            }
            if ($request->paid > $amount) {
                return back()->with('error', 'You cannot pay higher than service price!');
            }

            if ($request->paid == $amount) {
                $status = "paid";
            } else if ($request->paid < $amount && $request->paid > 0) {
                $status = "in-progress";
            } else {
                $status = "pending";
            }

            $user->subcreator()->update([
                'paid' => $request->paid,
                'service_id' => $request->service_id,
                'pricing_id' => $request->pricing_id,
                'user_id' => $request->user_id,
                'start' => $request->start,
                'due' => $request->due,
                'status' => $status,
            ]);

            return back()->with('status', 'Subscription updated successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }


    /*multipleInvoice*/
    public function  multipleInvoice(Request  $request)
    {

        if ($request->invoice_id == null) {
            return back();
        }
        $ids = array();
        foreach ($request->invoice_id as $id) {
            array_push($ids, (int)$id);
        }
        $subscriptions = Subscription::whereIn('id', $ids)->with(['pricing', 'creator', 'user', 'service'])->get();
        return view('invoice.printmutiple')->with('subscriptions', $subscriptions);
    }
}
