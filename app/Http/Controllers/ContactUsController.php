<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Notifications\ContactUs as NotificationsContactUs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = ContactUs::first();
        return view('admin.contact.contact', compact('contact'));
    }


    public function sendMessage(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'subject' => 'nullable|string',
            'email' => 'required|string|email|max:255',
            'content' => 'required|string|min:5',
        ]);
        // dd($request);
        try {
            $data = (object)$request->all();
            // send notification
            // $cu = new ContactUs();
            $contact = ContactUs::first();
           $contact->notify(new NotificationsContactUs($data));

            return redirect()->back()->with('status', 'Message Sent Successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email|max:255',
            'note' => 'required|string|min:20',
            'footer_note' => 'required|string|min:10',
            'facebook_url' => 'url|string',
            'twitter_url' => 'url|string',
            'instagram_url' => 'url|string',
            'youtube_url' => 'url|string',
            'linkedin_url' => 'url|string',
            'website_url' => 'url|string',
        ]);
        // dd($request);
        try {
            $old_contact = ContactUs::find($request->contact);
            if (ContactUs::updateOrCreate(['id' => ($old_contact->id ?? 0)], $request->all()))
                Session::flash('status', 'Contact details Uploaded Successfully');
            else
                Session::flash('error', 'Unable to upload contact info.');

            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back()->with('error', 'something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
