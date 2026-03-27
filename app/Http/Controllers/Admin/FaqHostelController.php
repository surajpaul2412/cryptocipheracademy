<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FaqHostel;

class FaqHostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqHostel = FaqHostel::all();
        return view('admin.faqHostel.index', compact('faqHostel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqHostel.create');
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

        $faqHostel = new FaqHostel();
        $faqHostel->heading = $request->heading;
        $faqHostel->content = $request->content;
        $faqHostel->save();
        return redirect('/admin/faqHostel')->with('success', 'Hostel FAQ has been added.');
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
        $faqHostel = FaqHostel::findOrFail($id);
        return view('admin.faqHostel.edit', compact('faqHostel'));
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

        FaqHostel::whereId($id)->update($form_data);
        return redirect('/admin/faqHostel')->with('success', 'faqHostel has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqHostel = FaqHostel::findOrFail($id);
        $faqHostel->delete();
        return redirect('/admin/faqHostel')->with('success', 'faqHostel has been deleted successfully.');
    }
}
