<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\StudioEquipmentHardware;
use App\StudioEquipmentSoftware;
use App\StudioEquipmentHardwareImage;
use App\StudioEquipmentSoftwareImage;
use App\HomeNotification;
use App\Menu;
use App\DesktopMenuSection;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        $studioEquipmentHardware = StudioEquipmentHardware::all();
        $studioEquipmentHardwareImage = StudioEquipmentHardwareImage::all();
        $studioEquipmentSoftware = StudioEquipmentSoftware::all();
        $studioEquipmentSoftwareImage = StudioEquipmentSoftwareImage::all();
        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.gallery', compact('gallery','studioEquipmentHardware','studioEquipmentSoftware','studioEquipmentHardwareImage','studioEquipmentSoftwareImage','homeNotification','menus','desktopMenu'));
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
