<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FaqCareer;

class FaqCareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqCareer = FaqCareer::all();
        return view('admin.faqCareer.index', compact('faqCareer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqCareer.create');
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
            'heading'=> 'required|min:3|max:255',
            'content'=> 'required|min:3',
        ]);

        $faqCareer = new FaqCareer();
        $faqCareer->heading = $request->heading;
        $faqCareer->content = $request->content;
        $faqCareer->save();
        return redirect('/admin/faqCareer')->with('success', 'Career FAQ has been added.');
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
        $faqCareer = FaqCareer::findOrFail($id);
        return view('admin.faqCareer.edit', compact('faqCareer'));
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
        $this->validate($request, [
            'heading'=> 'required|min:3|max:255',
            'content'=> 'required|min:3',
        ]);

        $form_data = array(
            'heading' => $request->heading,
            'content' => $request->content,
        );

        FaqCareer::whereId($id)->update($form_data);
        return redirect('/admin/faqCareer')->with('success', 'faqCareer has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqCareer = FaqCareer::findOrFail($id);
        $faqCareer->delete();
        return redirect('/admin/faqCareer')->with('success', 'faqCareer has been deleted successfully.');
    }
}
