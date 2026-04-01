<?php

namespace App\Http\Controllers;

use App\DesktopMenuSection;
use App\FastForwardCourse;
use App\HomeNotification;
use App\Menu;
use Illuminate\Http\Request;

class FastForwardCourseController extends Controller
{
    public function show($slug)
    {
        $fastForwardCourse = FastForwardCourse::where('slug', $slug)
            ->where('is_active', true)
            ->with([
                'sections' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('sort_order')
                        ->with([
                            'points' => function ($pointQuery) {
                                $pointQuery->where('is_active', true)
                                    ->orderBy('sort_order');
                            }
                        ]);
                }
            ])
            ->firstOrFail();

        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', 'asc')->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', 'asc')->get();

        return view('frontend.fastForwardCourseShow', compact(
            'fastForwardCourse',
            'homeNotification',
            'menus',
            'desktopMenu'
        ));
    }
}
