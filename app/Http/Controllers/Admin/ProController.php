<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pros;

class ProController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pros = Pros::orderBy('sort_by', "asc")->get();
        return view('admin.pros.index', compact('pros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'=> 'required',
            'name'=> 'required|min:3|max:255',
            'brief'=> 'required|min:3',
            'description'=> 'required|min:3',
            'workings'=> 'nullable',
            'sort_by'=> 'nullable|string',
        ]);

        $image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/pros'), $image_name);
        }

        $pro = new Pros();
        $pro->name = $request->name;
        $pro->brief = $request->brief;
        $pro->description = $request->description;
        $pro->workings = $request->workings;
        $pro->sort_by = $request->sort_by;
        $pro->image = $image_name;
        $pro->save();
        return redirect('/admin/pros')->with('success', 'Pros has been added.');
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
        $pro = Pros::findOrFail($id);
        return view('admin.pros.edit', compact('pro'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $request->validate([
                'image'=> 'required',
                'name'=> 'required|min:3|max:255',
                'brief'=> 'required|min:3',
                'description'=> 'required|min:3',
                'workings'=> 'nullable',
                'sort_by'=> 'nullable|string',
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/pros'), $image_name);
        } else{
            $request->validate([
                'name'=> 'required|min:3|max:255',
                'brief'=> 'required|min:3',
                'description'=> 'required|min:3',
                'workings'=> 'nullable',
                'sort_by'=> 'nullable|string',
            ]);
        }

        $form_data = array(
            'name' => $request->name,
            'brief' => $request->brief,
            'description' => $request->description,
            'workings' => $request->workings,
            'image' => $image_name,
            'sort_by' => $request->sort_by,
        );

        Pros::whereId($id)->update($form_data);
        return redirect('/admin/pros')->with('success', 'Pro has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Pros::findOrFail($id);
        $pro->delete();
        return redirect('/admin/pros')->with('success', 'Pro has been deleted successfully.');
    }
}
