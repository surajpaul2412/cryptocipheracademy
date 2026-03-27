<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Downloads;
use App\DownloadForm;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $downloads = Downloads::orderBy('sort_by', 'asc')->get();
        return view('admin.download.index', compact('downloads'));
    }

    public function list()
    {
        $downloads = DownloadForm::orderBy('created_at', 'asc')->get();
        return view('admin.downloaderList.index', compact('downloads'));
    }

    public function delete($id)
    {
        $download = DownloadForm::findOrFail($id);
        $download->delete();
        return redirect('/admin/downloaderList')->with('success', 'record has been deleted successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.download.create');
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
            'sort_by'=> 'nullable|numeric|between:0,99.99',
            'content'=> 'nullable|min:3',
            'file'=> 'nullable|min:3',
            'path'=> 'nullable|min:3',
        ]);

        $download = new Downloads();
        $download->name = $request->name;
        $download->sort_by = $request->sort_by;
        $download->content = $request->content;
        $download->file = $request->file;
        $download->path = $request->path;
        $download->save();
        return redirect('/admin/download')->with('success', 'Downloas has been added.');
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
        $download = Downloads::findOrFail($id);
        return view('admin.download.edit', compact('download'));
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
            'sort_by'=> 'nullable|numeric|between:0,99.99',
            'content'=> 'nullable|min:3',
            'file'=> 'nullable|min:3',
            'path'=> 'nullable|min:3',
        ]);
        
        $form_data = array(
            'name' => $request->name,
            'content' => $request->content,
            'file' => $request->file,
            'path' => $request->path,
            'sort_by'=> $request->sort_by
        );

        Downloads::whereId($id)->update($form_data);
        return redirect('/admin/download')->with('success', 'Download has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $download = Downloads::findOrFail($id);
        $download->delete();
        return redirect('/admin/download')->with('success', 'Download has been deleted successfully.');
    }
}
