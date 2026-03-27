<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pros;
use App\Menu;
use App\HomeNotification;
use App\DesktopMenuSection;

class ProController extends Controller
{
    public function index()
    {
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        $pros = Pros::orderBy('sort_by', "asc")->get();
        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        return view('frontend.crypto_celeb', compact('pros','homeNotification','menus','desktopMenu'));
    }
}
