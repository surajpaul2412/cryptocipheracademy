<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudentsWork;

class StudentWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentsWork = StudentsWork::orderBy('sort_by', 'asc')->paginate(10);
        return view('admin.studentsWork.index', compact('studentsWork'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.studentsWork.create');
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
            'image'=> 'required|image',
            'year'=> 'required|min:3',
            'name'=> 'required|min:3|max:255',
            'speciality'=> 'required|min:3',
            'short_desc'=> 'nullable|string|min:3',
            'student_profile'=> 'nullable|string|min:3',
            'education'=> 'nullable|string|min:3',
            'interest'=> 'nullable|string|min:3',
            'work_prof'=> 'nullable|string|min:3',
            'testimonial'=> 'nullable|string|min:3',
            'status'=> 'nullable',
            'slug'=> 'nullable|string|min:3',
            'meta_title'=> 'nullable|string|min:3',
            'meta_keyword'=> 'nullable|string|min:3',
            'meta_description'=> 'nullable|string|min:3',
            'sort_by' => 'nullable'
        ]);

        $image_name = $request->image;
        $image = $request->file('image');
        if($image != ''){
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/work'), $image_name);
        }

        $studentsWork = new StudentsWork();
        $studentsWork->year = $request->year;
        $studentsWork->name = $request->name;
        $studentsWork->speciality = $request->speciality;
        $studentsWork->short_desc = $request->short_desc;
        $studentsWork->student_profile = $request->student_profile;
        $studentsWork->education = $request->education;
        $studentsWork->interest = $request->interest;
        $studentsWork->work_prof = $request->work_prof;
        $studentsWork->testimonial = $request->testimonial;
        $studentsWork->slug = $request->slug;
        $studentsWork->meta_title = $request->meta_title;
        $studentsWork->meta_keyword = $request->meta_keyword;
        $studentsWork->meta_description = $request->meta_description;
        $studentsWork->status = null;
        $studentsWork->image = $image_name;
        $studentsWork->sort_by = $sort_by;
        $studentsWork->save();
        return redirect('/admin/studentsWork')->with('success', 'Work has been added.');
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
        $studentsWork = StudentsWork::findOrFail($id);
        return view('admin.studentsWork.edit', compact('studentsWork'));
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
                'image'=> 'required|image',
                'year'=> 'required|min:3',
                'name'=> 'required|min:3|max:255',
                'speciality'=> 'required|min:3',
                'short_desc'=> 'nullable|string|min:3',
                'student_profile'=> 'nullable|string|min:3',
                'education'=> 'nullable|string|min:3',
                'interest'=> 'nullable|string|min:3',
                'work_prof'=> 'nullable|string|min:3',
                'testimonial'=> 'nullable|string|min:3',
                'slug'=> 'nullable|string|min:3',
                'meta_title'=> 'nullable|string|min:3',
                'meta_keyword'=> 'nullable|string|min:3',
                'meta_description'=> 'nullable|string|min:3',
                'sort_by' => 'nullable'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/work'), $image_name);
        }

        $form_data = array(
            'year' => $request->year,
            'name' => $request->name,
            'speciality' => $request->speciality,
            'short_desc' => $request->short_desc,
            'student_profile' => $request->student_profile,
            'education' => $request->education,
            'interest' => $request->interest,
            'work_prof' => $request->work_prof,
            'testimonial' => $request->testimonial,
            'slug' => $request->slug,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'sort_by' => $request->sort_by,
            'image' => $image_name
        );

        StudentsWork::whereId($id)->update($form_data);
        return redirect('/admin/studentsWork')->with('success', 'Work has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentsWork = StudentsWork::findOrFail($id);
        $studentsWork->delete();
        return redirect('/admin/studentsWork')->with('success', 'Work has been deleted successfully.');
    }

    // Enable
    public function enable(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|integer',
        ]);
        StudentsWork::whereId($id)->update($validatedData);

        return redirect('/admin/studentsWork')->with('success', 'Work status is successfully updated.');
    }

    // Disable
    public function disable(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'nullable',
        ]);
        StudentsWork::whereId($id)->update($validatedData);

        return redirect('/admin/studentsWork')->with('success', 'Work status is successfully updated.');
    }
}
