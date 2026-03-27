<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('admin.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'short_image1'=> 'required|image',
        'short_image2'=> 'required|image',
        'short_image3'=> 'required|image',
        'short_image4'=> 'required|image',
        ]);

        // short_image1
        $image_name1 = $request->short_image1;
        $short_image1 = $request->file('short_image1');
        if($short_image1 != ''){
            $image_name1 = rand() . '.' . $short_image1->getClientOriginalExtension();
            $short_image1->move(public_path('images/gallery'), $image_name1);
        }
        // short_image2
        $image_name2 = $request->short_image2;
        $short_image2 = $request->file('short_image2');
        if($short_image2 != ''){
            $image_name2 = rand() . '.' . $short_image2->getClientOriginalExtension();
            $short_image2->move(public_path('images/gallery'), $image_name2);
        }
        // short_image3
        $image_name3 = $request->short_image3;
        $short_image3 = $request->file('short_image3');
        if($short_image3 != ''){
            $image_name3 = rand() . '.' . $short_image3->getClientOriginalExtension();
            $short_image3->move(public_path('images/gallery'), $image_name3);
        }
        // short_image2
        $image_name4 = $request->short_image4;
        $short_image4 = $request->file('short_image4');
        if($short_image4 != ''){
            $image_name4 = rand() . '.' . $short_image4->getClientOriginalExtension();
            $short_image4->move(public_path('images/gallery'), $image_name4);
        }

        $gallery = new Gallery([
        'short_image1' => $image_name1,
        'short_image2' => $image_name2,
        'short_image3' => $image_name3,
        'short_image4' => $image_name4,
        ]);
        $gallery->save();
        return redirect('/admin/gallery')->with('success', 'Gallery Image has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name1 = $request->hidden_image1;
        $image_name2 = $request->hidden_image2;
        $image_name3 = $request->hidden_image3;
        $image_name4 = $request->hidden_image4;

        $short_image1 = $request->file('short_image1');
        $short_image2 = $request->file('short_image2');
        $short_image3 = $request->file('short_image3');
        $short_image4 = $request->file('short_image4');

        if($short_image1 != ''){
            $request->validate([
                'short_image1'=> 'required|image',
            ]);
            $image_name1 = rand() . '.' . $short_image1->getClientOriginalExtension();
            $short_image1->move(public_path('images/gallery'), $image_name1);
        }

        if($short_image2 != ''){
            $request->validate([
                'short_image2'=> 'required|image',
            ]);
            $image_name2 = rand() . '.' . $short_image2->getClientOriginalExtension();
            $short_image2->move(public_path('images/gallery'), $image_name2);
        }


        if($short_image3 != ''){
            $request->validate([
                'short_image3'=> 'required|image',
            ]);
            $image_name3 = rand() . '.' . $short_image3->getClientOriginalExtension();
            $short_image3->move(public_path('images/gallery'), $image_name3);
        }

        if($short_image4 != ''){
            $request->validate([
                'short_image4'=> 'required|image',
            ]);
            $image_name4 = rand() . '.' . $short_image4->getClientOriginalExtension();
            $short_image4->move(public_path('images/gallery'), $image_name4);
        }

        $form_data = array(
            'short_image1' => $image_name1,
            'short_image2' => $image_name2,
            'short_image3' => $image_name3,
            'short_image4' => $image_name4,
        );
        Gallery::whereId($id)->update($form_data);
        return redirect('/admin/gallery')->with('success', 'Gallery image has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return redirect('/admin/gallery')->with('success', 'Gallery image has been deleted successfully');
    }
}
