<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exam;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam = Exam::all();
        return view('admin.exam.index', compact('exam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exam.create');
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
            'module'=>'required|min:3|max:255',
            'structure'=> 'nullable||min:3|max:255',
            'marks'=> 'nullable||min:3|max:255',
            'credits'=> 'nullable||min:3|max:255'
        ]);
        $exam = new Exam([
            'module' => $request->get('module'),
            'structure'=> $request->get('structure'),
            'marks'=> $request->get('marks'),
            'credits'=> $request->get('credits'),
        ]);
        $exam->save();
        return redirect('/admin/exam')->with('success', 'Exam structure has been added.');
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
        $exam = Exam::find($id);
        return view('admin.exam.edit', compact('exam'));
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
        'module'=>'required|min:3|max:255',
        'structure'=> 'nullable||min:3|max:255',
        'marks'=> 'nullable||min:3|max:255',
        'credits'=> 'nullable||min:3|max:255'
      ]);

      $exam = Exam::find($id);
      $exam->module = $request->get('module');
      $exam->structure = $request->get('structure');
      $exam->marks = $request->get('marks');
      $exam->credits = $request->get('credits');
      $exam->save();

      return redirect('/admin/exam')->with('success', 'Exam structure has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exam = Exam::find($id);
        $exam->delete();
        return redirect('/admin/exam')->with('success', 'Exam structure has been deleted successfully');
    }
}
