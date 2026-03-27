<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Downloads;
use App\DownloadForm;
use App\HomeNotification;
use App\Menu;
use App\DesktopMenuSection;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Mail;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $downloads = Downloads::orderBy('sort_by','asc')->get();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $homeNotification = HomeNotification::all();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.download', compact('downloads','homeNotification','menus','desktopMenu'));
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
            'name'=> 'required|min:3',
            'email'=> 'required|email',
            'phone'=> 'nullable|min:10'
        ]);

        $data = $request->all();
        $data['download_id'] = $request->id;
        DownloadForm::create($data);


        $download = Downloads::findOrFail($request->id);
        $download_url = URL::to('/');
        $data['download_path'] = $download_url.'/storage/downloads/'.$download->path;

        // mail download link
        Mail::send('emails.download', $data, function($message) use ($data) {
         $message->to($data['email'], 'Crypto Cipher Academy | Download Link')->subject
            ('Crypto Cipher Academy | Download Request');
         $message->from('academy@cryptocipher.in','Crypto Cipher Academy | Download Link');
        });

        $menus = Menu::orderBy('sort_by', "asc")->get();
        $homeNotification = HomeNotification::all();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.showDownload', compact('download','homeNotification','menus','desktopMenu'))->with('success','Download link sent successfully ! Please check your email');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $download = Downloads::findOrFail($id);
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $homeNotification = HomeNotification::all();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.showDownload', compact('download','homeNotification','menus','desktopMenu'));
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
