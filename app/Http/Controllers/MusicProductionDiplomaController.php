<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MusicProductionDiploma;
use App\MusicProductionDiplomaLogic;
use App\ProductionCoursePro;
use App\MusicProductionDiplomaQuick;

use App\MusicProductionDiplomaLogicAbleton;
use App\MusicProductionDiplomaModule;
use App\MusicProductionDiplomaOverview;
use App\MusicProductionDiplomaSound;

use App\HomeNotification;
use App\Menu;
use App\DesktopMenuSection;

class MusicProductionDiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicProductionDiploma = MusicProductionDiploma::all();
        $quick = MusicProductionDiplomaQuick::all();
        $logic = MusicProductionDiplomaLogic::all();

        // New models
        $logicAbleton = MusicProductionDiplomaLogicAbleton::all();
        $modules = MusicProductionDiplomaModule::all();
        $overview = MusicProductionDiplomaOverview::all();
        $sound = MusicProductionDiplomaSound::all();

        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();

        return view('frontend.music-production-diploma-course', compact(
            'musicProductionDiploma',
            'quick',
            'logic',
            'logicAbleton',
            'modules',
            'overview',
            'sound',
            'homeNotification',
            'menus',
            'desktopMenu'
        ));
    }
}
