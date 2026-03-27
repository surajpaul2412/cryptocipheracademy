<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\engineeringCourseModule;

class EngineeringCourseModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engineeringCourseModule = engineeringCourseModule::all();
        return view('admin.engineeringCourseModule.index', compact('engineeringCourseModule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.engineeringCourseModule.create');
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
        'icon'=> 'required|image',
        'image'=> 'required|image',
        'heading'=> 'required|string|min:3|max:255',
        'content'=> 'required|string|min:3'
        ]);

        // short_image1
        $icon_name = $request->icon;
        $icon = $request->file('icon');
        if($icon != ''){
            $icon_name = rand() . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('images/module'), $icon_name);
        }
        // long image
        $image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/module'), $image_name);
        }

        $engineeringCourseModule = new engineeringCourseModule([
        'icon' => $icon_name,
        'image' => $image_name,
        'heading' => $request->get('heading'),
        'content' => $request->get('content'),
        ]);
        $engineeringCourseModule->save();
        return redirect('/admin/engineeringCourseModule')->with('success', 'Module has been added');
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
        $engineeringCourseModule = engineeringCourseModule::findOrFail($id);
        return view('admin.engineeringCourseModule.edit', compact('engineeringCourseModule'));
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
        $icon_name = $request->hidden_icon;
        $image_name = $request->hidden_image;

        $icon = $request->file('icon');
        $image = $request->file('image');

        if($icon != ''){
            $request->validate([
                'icon'=> 'required|image',
                'heading'=> 'required|string|min:3|max:255',
                'content'=> 'required|string|min:3',
            ]);
            $icon_name = rand() . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('images/module'), $icon_name);
        }

        if($image != ''){
            $request->validate([
                'image'=> 'required|image',
                'heading'=> 'required|string|min:3|max:255',
                'content'=> 'required|string|min:3',
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/module'), $image_name);
        }

        $form_data = array(
            'icon' => $icon_name,
            'image' => $image_name,
            'heading' => $request->heading,
            'content' => $request->content,
        );
        engineeringCourseModule::whereId($id)->update($form_data);
        return redirect('/admin/engineeringCourseModule')->with('success', 'Module has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $engineeringCourseModule = engineeringCourseModule::find($id);
        $engineeringCourseModule->delete();
        return redirect('/admin/engineeringCourseModule')->with('success', 'Module has been deleted successfully');
    }
}
