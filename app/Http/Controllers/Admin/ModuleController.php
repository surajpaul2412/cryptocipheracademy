<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Module;
use App\User;
use DB;
use Carbon\carbon;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::latest()->get();
        return view('admin.modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.create');
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
            'name'=> 'required|min:3|max:255',
        ]);

        $modules = new Module();
        $modules->name = $request->name;
        $modules->save();
        return redirect('/admin/modules')->with('success', 'Module name has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = Module::findOrFail($id);
        return view('admin.modules.show', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modules = Module::findOrFail($id);
        return view('admin.modules.edit', compact('modules'));
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
        $request->validate([
            'name'=> 'required|min:3|max:255',
        ]);

        $form_data = array(
            'name' => $request->name
        );

        Module::whereId($id)->update($form_data);
        return redirect('/admin/modules')->with('success', 'Module name has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showStudents($id)
    {
        $students = DB::table('user_module')->where('module_id', $id)->get();
        $users = User::where('role_id', 4)->get();
        return view('admin.modules.showStudents', compact('students','users','id'));
    }

    public function usermodule(Request $request, $id)
    {
        DB::table('user_module')->where('module_id', $id)->delete();

        $students = $request->get('userId');

        if (isset($students)) {
            foreach ($students as $key => $student) {
                DB::table('user_module')->insertGetId(
                    ['user_id' => $student, 'module_id' => $id, 'created_at' => carbon::now(), 'updated_at' => carbon::now()]
                );
            }
        }       

        return back()->with('success','Student access updated.');
    }
}
