<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\StudentDetails;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id','=',4)->latest()->get();
        return view('admin.student.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.student.create');
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
        'name'=>'required',
        'email'=> 'required|unique:users,email',
        'phone'=> 'required|unique:users,phone',
        'password'=> 'required',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->get('password'));

        $user = User::create($data);

        $studentData['student_id'] = $user->id;
        $studentDetails = StudentDetails::create($studentData);
        return redirect('/admin/student')->with('success', 'student has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $details = StudentDetails::where('student_id', $id)->first();
        return view('admin.student.show', compact('user','details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.student.edit', compact('user'));
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
        'name'=> 'required',
        'email'=> 'required',
        'phone'=> 'required',
        'password'=> 'required'
      ]);

      $user = User::find($id);
      $user->role_id = 4;
      $user->name = $request->get('name');
      $user->email = $request->get('email');
      $user->password = bcrypt($request->get('password'));
      $user->save();

      return redirect('/admin/student')->with('success', 'student has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $studentDetails = StudentDetails::where('student_id', $id);
        $studentDetails->delete();
        return redirect('/admin/student')->with('success', 'student has been deleted successfully');
    }
}
