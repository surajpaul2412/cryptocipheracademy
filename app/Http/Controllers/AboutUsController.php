<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutUs;
use App\AboutUsLibrary;
use App\AboutUsLibraryImages;
use App\AboutUsPromotion;
use App\AboutUsPromotionImage;
use App\AboutUsTechnology;
use App\AboutUsTechnologyImage;
use App\HomeNotification;
use App\Menu;
use App\DesktopMenuSection;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUs = AboutUs::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $aboutUsLibrary = AboutUsLibrary::all();
        $aboutUsLibraryImage = AboutUsLibraryImages::all();
        $aboutUsPromotion = AboutUsPromotion::all();
        $aboutUsPromotionImage = AboutUsPromotionImage::all();
        $aboutUsTechnology = AboutUsTechnology::all();
        $aboutUsTechnologyImage = AboutUsTechnologyImage::all();
        $homeNotification = HomeNotification::all();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.about_us', compact('aboutUs','aboutUsLibrary','aboutUsLibraryImage','aboutUsPromotion','aboutUsPromotionImage','aboutUsTechnology','aboutUsTechnologyImage','homeNotification','menus','desktopMenu'));
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
