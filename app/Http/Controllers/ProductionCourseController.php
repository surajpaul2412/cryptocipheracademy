<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductionCourse;
use App\ProductionCourseLogic;
use App\ProductionCoursePro;
use App\ProductionCourseQuick;
use App\HomeNotification;
use App\Menu;
use App\DesktopMenuSection;

class ProductionCourseController extends Controller
{
    public function index()
    {
        $productionCourse = ProductionCourse::all();
        $quick = ProductionCourseQuick::all();
        $logic = ProductionCourseLogic::all();
        $pro = ProductionCoursePro::all();
        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.logic', compact('productionCourse','quick','logic','pro','homeNotification','menus','desktopMenu'));
    }
}
