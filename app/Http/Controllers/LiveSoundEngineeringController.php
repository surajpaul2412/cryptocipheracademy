<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import your LiveSoundEngineering related models here
use App\LiveSoundEngineering;
use App\LiveSoundEngineeringModule;
use App\LiveSoundEngineeringOverview;
use App\LiveSoundEngineeringSound;

use App\HomeNotification;
use App\Menu;
use App\DesktopMenuSection;

class LiveSoundEngineeringController extends Controller
{
    /**
     * Display a listing of the Live Sound Engineering resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicProductionDiploma = LiveSoundEngineering::all();
        $modules = LiveSoundEngineeringModule::all();
        $overview = LiveSoundEngineeringOverview::all();
        $sound = LiveSoundEngineeringSound::all();

        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();

        return view('frontend.live-sound-engineering-course', compact(
            'musicProductionDiploma',
            'modules',
            'overview',
            'sound',
            'homeNotification',
            'menus',
            'desktopMenu'
        ));
    }
}
