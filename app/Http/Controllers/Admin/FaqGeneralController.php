<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FaqGeneral;

class FaqGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqGeneral = FaqGeneral::all();
        return view('admin.faqGeneral.index', compact('faqGeneral'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqGeneral.create');
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

        $faqGeneral = new FaqGeneral();
        $faqGeneral->heading = $request->heading;
        $faqGeneral->content = $request->content;
        $faqGeneral->save();
        return redirect('/admin/faqGeneral')->with('success', 'General FAQ has been added.');
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
        $faqGeneral = FaqGeneral::findOrFail($id);
        return view('admin.faqGeneral.edit', compact('faqGeneral'));
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

        FaqGeneral::whereId($id)->update($form_data);
        return redirect('/admin/faqGeneral')->with('success', 'faqGeneral has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqGeneral = FaqGeneral::findOrFail($id);
        $faqGeneral->delete();
        return redirect('/admin/faqGeneral')->with('success', 'faqGeneral has been deleted successfully.');
    }
}
