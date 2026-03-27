<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VideoGallery;
use App\Menu;
use App\HomeNotification;
use App\DesktopMenuSection;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $gallery = VideoGallery::orderBy('sort_by','ASC')->get();
        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.video_gallery', compact('gallery','homeNotification','menus','desktopMenu'));
    }
}
