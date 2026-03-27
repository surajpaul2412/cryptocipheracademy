<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\HomeNotification;
use App\Menu;
use App\DesktopMenuSection;
use App\Mail\QueryMail;
use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.contact', compact('homeNotification','menus','desktopMenu'));
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
        $this->validate($request, [
            'name'=> 'required|string|min:3|max:255',
            'phone'=> 'required|digits_between:8,10',
            'email'=> 'required|email',
            'message'=> 'nullable|string',
        ]);

        $details = $request->all();
        Contact::create($details);

        $data = $details;
        $data['content'] = $details['message'];

        Mail::send('emails.query', $data, function($message) {
         $message->to('academy@cryptocipher.in', 'Crypto Cipher Academy | Query')->subject
            ('A new query has been raised on your website');
         $message->from('academy@cryptocipher.in','Crypto Cipher Academy | Query');
        });

        return view('frontend.contact')->with('success', 'Thanks '.$request->name.' ! Your Query has been raised.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
