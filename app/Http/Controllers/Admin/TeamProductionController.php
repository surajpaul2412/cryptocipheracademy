<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TeamProduction;

class TeamProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamProduction = TeamProduction::all();
        return view('admin.teamProduction.index', compact('teamProduction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teamProduction.create');
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
            'heading'=> 'required|min:3|max:255',
            'content'=> 'required|min:3',
        ]);

        $image_heading = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_heading = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/team'), $image_heading);
        }

        $team = new TeamProduction();
        $team->heading = $request->heading;
        $team->content = $request->content;
        $team->image = $image_heading;
        $team->save();
        return redirect('/admin/teamProduction')->with('success', 'Team Production has been added.');
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
        $teamProduction = TeamProduction::findOrFail($id);
        return view('admin.teamProduction.edit', compact('teamProduction'));
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
        $image_heading = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $request->validate([
                'image'=> 'required',
                'heading'=> 'required|min:3|max:255',
                'content'=> 'required|min:3',
            ]);
            $image_heading = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/team'), $image_heading);
        } else{
            $request->validate([
                'heading'=> 'required|min:3|max:255',
                'content'=> 'required|min:3',
            ]);
        }

        $form_data = array(
            'heading' => $request->heading,
            'content' => $request->content,
            'image' => $image_heading
        );

        TeamProduction::whereId($id)->update($form_data);
        return redirect('/admin/teamProduction')->with('success', 'Team Production has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teamProduction = TeamProduction::findOrFail($id);
        $teamProduction->delete();
        return redirect('/admin/teamProduction')->with('success', 'Team Production has been deleted successfully.');
    }
}
