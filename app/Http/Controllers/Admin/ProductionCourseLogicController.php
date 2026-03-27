<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductionCourseLogic;

class ProductionCourseLogicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productionCourseLogic = ProductionCourseLogic::all();
        return view('admin.productionCourseLogic.index', compact('productionCourseLogic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productionCourseLogic.create');
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
        $productionCourseLogic = new ProductionCourseLogic([
        'content' => $request->get('content'),
        ]);
        $productionCourseLogic->save();
        return redirect('/admin/productionCourseLogic')->with('success', 'Logic X Pro has been added');
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
        $productionCourseLogic = ProductionCourseLogic::findOrFail($id);
        return view('admin.productionCourseLogic.edit', compact('productionCourseLogic'));
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
        ProductionCourseLogic::whereId($id)->update($form_data);
        return redirect('/admin/productionCourseLogic')->with('success', 'Course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productionCourseLogic = ProductionCourseLogic::find($id);
        $productionCourseLogic->delete();
        return redirect('/admin/productionCourseLogic')->with('success', 'Course has been deleted successfully');
    }
}
