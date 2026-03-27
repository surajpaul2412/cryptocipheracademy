<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::orderBy('sort_by', 'asc')->get();
        return view('admin.team.index', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
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
            'sort_by'=> 'nullable|numeric|between:0,99.99',
            'name'=> 'required|min:3|max:255',
            'content'=> 'required|min:3',
            'designation'=> 'required|min:3|max:255',
        ]);

        $image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/team'), $image_name);
        }

        $team = new Team();
        $team->name = $request->name;
        $team->sort_by = $request->sort_by;
        $team->content = $request->content;
        $team->designation = $request->designation;
        $team->image = $image_name;
        $team->save();
        return redirect('/admin/team')->with('success', 'Team member has been added.');
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
        $team = Team::findOrFail($id);
        return view('admin.team.edit', compact('team'));
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
                'sort_by'=> 'nullable|numeric|between:0,99.99',
                'name'=> 'required|min:3|max:255',
                'designation'=> 'required|min:3|max:255',
                'content'=> 'required|min:3',
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/team'), $image_name);
        } else{
            $request->validate([
                'name'=> 'required|min:3|max:255',
                'sort_by'=> 'nullable|numeric|between:0,99.99',
                'designation'=> 'required|min:3|max:255',
                'content'=> 'required|min:3',
            ]);
        }

        $form_data = array(
            'name' => $request->name,
            'sort_by'=> $request->sort_by,
            'name' => $request->designation,
            'content' => $request->content,
            'image' => $image_name
        );

        Team::whereId($id)->update($form_data);
        return redirect('/admin/team')->with('success', 'Team member has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect('/admin/team')->with('success', 'Team member has been deleted successfully.');
    }
}
