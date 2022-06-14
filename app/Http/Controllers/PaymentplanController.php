<?php

namespace App\Http\Controllers;

use App\Models\Paymentplan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PaymentplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentplans = Paymentplan::all();
        return view('admin.paymentplan.index', compact('paymentplans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymentplans = Paymentplan::all();
        return view('admin.paymentplan.index', compact('paymentplans'));
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
            'name' => 'required|string|min:5|max:100'
        ]);

        try {
            $user = Auth::user();
            $user->paymentplans()->create([
                'name' => $request->name,
            ]);

            return back()->with('status', 'Plan created successfully');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paymentplan  $paymentplan
     * @return \Illuminate\Http\Response
     */
    public function show(Paymentplan $paymentplan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paymentplan  $paymentplan
     * @return \Illuminate\Http\Response
     */
    public function edit(Paymentplan $paymentplan)
    {
        return view('admin.paymentplan.edit', compact('paymentplan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paymentplan  $paymentplan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paymentplan $paymentplan)
    {
        Validator::make(
            $request->all(),
            [
                'name' => 'required|string',
            ],
            [
                'name.required' => 'Plan Name is required',
            ]
        )->validate();
        try {
            $user = Auth::user();
            $paymentplan->update([
                'name' => $request->name,
                'user_id' => $user->id,
            ]);

            return back()->with('status', 'Plan updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'something went wrong! ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paymentplan  $paymentplan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paymentplan $paymentplan)
    {
        //
    }
}
