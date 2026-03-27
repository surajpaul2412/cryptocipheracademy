<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductionCoursePro;

class ProductionCourseProController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productionCoursePro = ProductionCoursePro::all();
        return view('admin.productionCoursePro.index', compact('productionCoursePro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productionCoursePro.create');
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
        $productionCoursePro = new ProductionCoursePro([
        'content' => $request->get('content'),
        ]);
        $productionCoursePro->save();
        return redirect('/admin/productionCoursePro')->with('success', 'Logic X Pro has been added');
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
        $productionCoursePro = ProductionCoursePro::findOrFail($id);
        return view('admin.productionCoursePro.edit', compact('productionCoursePro'));
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
        ProductionCoursePro::whereId($id)->update($form_data);
        return redirect('/admin/productionCoursePro')->with('success', 'Course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productionCoursePro = ProductionCoursePro::find($id);
        $productionCoursePro->delete();
        return redirect('/admin/productionCoursePro')->with('success', 'Course has been deleted successfully');
    }
}
