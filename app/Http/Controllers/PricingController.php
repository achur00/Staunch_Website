<?php

namespace App\Http\Controllers;

use App\Models\Paymentplan;
use App\Models\Pricing;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentplans = Paymentplan::pluck('name', 'id')->all();
        $services = Service::pluck('name', 'id')->all();
        $pricings = Pricing::with(['paymentplan', 'user', 'service'])->get();
        return view('admin.pricing.index', compact('paymentplans', 'services', 'pricings'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymentplans = Paymentplan::pluck('name', 'id')->all();
        $services = Service::pluck('name', 'id')->all();
        $pricings = Pricing::with(['paymentplan', 'user', 'service'])->get();
        return view('admin.pricing.index', compact('paymentplans', 'services', 'pricings'));
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
            'amount' => 'required|numeric|min:100',
            'service_id' => 'required|numeric',
            'paymentplan_id' => 'required|numeric'
        ]);

        try {
            $user = Auth::user();
            $user->pricings()->create([
                'amount' => $request->amount,
                'service_id' =>$request->service_id,
                'paymentplan_id' => $request->paymentplan_id,

            ]);

            return back()->with('status', 'Price created successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function show(Pricing $pricing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function edit(Pricing $pricing)
    {
        $paymentplans = Paymentplan::pluck('name', 'id')->all();
        $services = Service::pluck('name', 'id')->all();
        return view('admin.pricing.edit', compact('pricing', 'paymentplans', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pricing $pricing)
    {
        $request->validate([
            'amount' => 'required|numeric|min:100',
            'service_id' => 'required|numeric',
            'paymentplan_id' => 'required|numeric'
        ]);

        try {
            $user = Auth::user();
            $pricing->update([
                'amount' => $request->amount,
                'service_id' =>$request->service_id,
                'paymentplan_id' => $request->paymentplan_id,
                'user_id' => $user->id,
            ]);
            return back()->with('status', 'Price updated successfully');

        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pricing  $pricing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pricing $pricing)
    {
        //
    }


    // get all pricing with service id supplied
    public function getPricing(Request $request)
    {
        try {
            $pricings = Pricing::where('service_id', $request->id)->with(['paymentplan'])->get();

            if($pricings)
                return response()->json($pricings, 200);
            else
                return response()->json(['error_message'=> "No record found!" ], 404);
        } catch (\Throwable $th) {
            return response($th->getMessage(), 404);
        }
       
    } 
}
