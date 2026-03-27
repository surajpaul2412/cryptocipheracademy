<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MusicProductionOnline;
use App\MusicProductionOnlineSound;
use App\MusicProductionOnlineSoftware;
use App\MusicProductionOnlineHardware;
use App\MusicProductionOnlineModule;
use App\MusicProductionOnlineOverview;
use App\MusicProductionOnlineLogicAbleton;
use App\HomeNotification;
use App\Menu;
use App\DesktopMenuSection;

class MusicProductionOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicProductionOnline = MusicProductionOnline::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $musicProductionOnlineSound = MusicProductionOnlineSound::all();
        $musicProductionOnlineModule = MusicProductionOnlineModule::all();
        $musicProductionOnlineOverview = MusicProductionOnlineOverview::all();
        $homeNotification = HomeNotification::all();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.music-production-online', compact('musicProductionOnline','musicProductionOnlineSound','musicProductionOnlineModule','musicProductionOnlineOverview','homeNotification','menus','desktopMenu'));
    }
}
