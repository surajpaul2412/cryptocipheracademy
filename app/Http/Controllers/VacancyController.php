<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use App\HomeNotification;
use App\Menu;
use App\DesktopMenuSection;

class VacancyController extends Controller
{
    public function index()
    {
        $jobs = Vacancy::latest()->get();
        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.jobs', compact('jobs','homeNotification','menus','desktopMenu'));
    }
}
