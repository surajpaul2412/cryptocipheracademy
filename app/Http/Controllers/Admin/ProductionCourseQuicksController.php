<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductionCourseQuick;

class ProductionCourseQuicksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productionCourseQuick = ProductionCourseQuick::all();
        return view('admin.productionCourseQuick.index', compact('productionCourseQuick'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productionCourseQuick.create');
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
        'content'=> 'required|min:3',
        ]);
        $productionCourseQuick = new ProductionCourseQuick([
        'content' => $request->get('content'),
        ]);
        $productionCourseQuick->save();
        return redirect('/admin/productionCourseQuick')->with('success', 'Music Production course has been added');
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
        $productionCourseQuick = ProductionCourseQuick::findOrFail($id);
        return view('admin.productionCourseQuick.edit', compact('productionCourseQuick'));
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
            'content'=> 'required|min:3',
        ]);

        $form_data = array(
            'content' => $request->content
        );
        ProductionCourseQuick::whereId($id)->update($form_data);
        return redirect('/admin/productionCourseQuick')->with('success', 'Course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productionCourseQuick = ProductionCourseQuick::find($id);
        $productionCourseQuick->delete();
        return redirect('/admin/productionCourseQuick')->with('success', 'Course has been deleted successfully');
    }
}
