<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\NewsTag;
use App\Menu;
use App\HomeNotification;
use App\DesktopMenuSection;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(18);
        $newsTags = NewsTag::select('tag')
            ->groupBy('tag')
            ->get();
        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.newsroom', compact('news','homeNotification','menus','desktopMenu','newsTags'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();
        if(empty($news)){
            return redirect('404');
        }
        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.inner_newsroom', compact('news','homeNotification','menus','desktopMenu'));
    }

    public function search(Request $req)
    {
        $this->validate($req, [
            'search' => 'required|string|min:2|max:100'
        ]);

        $search = $req->search;
        $news = News::where('title', 'LIKE', '%' . $search . '%')
                ->orWhereHas('newstags', function ($q) use ($search) {
                    return $q->where('tag', 'LIKE', '%' . $search . '%');
                })->paginate(21);


        $newsTags = NewsTag::select('tag')
            ->groupBy('tag')
            ->get();
        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.newsroomSearch', compact('news','homeNotification','menus','desktopMenu','newsTags'))->with('success', 'Your search result for ' . $search . ' is :');
    }

    public function searchBy($tag)
    {
        $search = $tag;
        $news = News::where('title', 'LIKE', '%' . $search . '%')
                ->orWhereHas('newstags', function ($q) use ($search) {
                    return $q->where('tag', 'LIKE', '%' . $search . '%');
                })->paginate(21);

        $newsTags = NewsTag::select('tag')->groupBy('tag')->get();
        $homeNotification = HomeNotification::all();
        $menus = Menu::orderBy('sort_by', "asc")->get();
        $desktopMenu = DesktopMenuSection::orderBy('sort_by', "asc")->get();
        return view('frontend.newsroomSearch', compact('news','homeNotification','menus','desktopMenu','newsTags'))->with('success', 'Your search result for ' . $search . ' is :');
    }
}
