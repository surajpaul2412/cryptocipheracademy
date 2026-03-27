<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HomeNotification;

class HomeNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeNotification = HomeNotification::all();
        return view('admin.homeNotification.index', compact('homeNotification'));
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
        //
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
        $homeNotification = HomeNotification::findOrFail($id);
        return view('admin.homeNotification.edit', compact('homeNotification'));
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
        $request->validate([
            'seat'=> 'nullable',
            'date'=> 'nullable',
            'batch'=> 'nullable',
            'notify_text'=> 'nullable',
            'register_date1'=> 'nullable',
            'register_date2'=> 'nullable',
            'register_date3'=> 'nullable',
        ]);

        $form_data = array(
            'seat' => $request->seat,
            'date' => $request->date,
            'batch' => $request->batch,
            'notify_text' => $request->notify_text,
            'register_date1' => $request->register_date1,
            'register_date2' => $request->register_date2,
            'register_date3' => $request->register_date3,
        );
        HomeNotification::whereId($id)->update($form_data);
        return redirect('/admin/homeNotification')->with('success', 'Notifications has been updated.');
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
