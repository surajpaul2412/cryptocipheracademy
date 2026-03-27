<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EngineeringCourse;
use App\EngineeringCourseSound;
use App\EngineeringCourseSoftware;
use App\EngineeringCourseHardware;
use App\engineeringCourseModule;
use App\EngineeringCourseOverview;
use App\EngineeringCourseLogicAbleton;
use App\HomeNotification;
use App\Menu;
use App\DesktopMenuSection;

class EngineeringCourseController extends Controller
{
    public function index()
    {
        $engineeringCourse = EngineeringCourse::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $engineeringCourseSound = EngineeringCourseSound::all();
        $engineeringCourseSoftware = EngineeringCourseSoftware::all();
        $engineeringCourseHardware = EngineeringCourseHardware::all();
        $engineeringCourseModule = engineeringCourseModule::all();
        $engineeringCourseOverview = EngineeringCourseOverview::all();
        $engineeringCourseLogicAbleton = EngineeringCourseLogicAbleton::all();
        $homeNotification = HomeNotification::all();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.engineering-course', compact('engineeringCourse','engineeringCourseSound','engineeringCourseSoftware','engineeringCourseHardware','engineeringCourseModule','engineeringCourseOverview','engineeringCourseLogicAbleton','homeNotification','menus','desktopMenu'));
    }
}
