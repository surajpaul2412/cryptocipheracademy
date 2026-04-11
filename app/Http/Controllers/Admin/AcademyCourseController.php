<?php

namespace App\Http\Controllers\Admin;

use App\AcademyCourse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AcademyCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academyCourse = AcademyCourse::all();

        return view('admin.academyCourse.index', compact('academyCourse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.academyCourse.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validateRequest($request, true);
        $validated['image'] = $this->uploadImage($request->file('image'));
        $validated['banner_image'] = $request->hasFile('banner_image')
            ? $this->uploadImage($request->file('banner_image'))
            : null;

        AcademyCourse::create($validated);

        return redirect('/admin/academyCourse')->with('success', 'Course has been added.');
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
        $academyCourse = AcademyCourse::findOrFail($id);

        return view('admin.academyCourse.edit', compact('academyCourse'));
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
        $academyCourse = AcademyCourse::findOrFail($id);
        $validated = $this->validateRequest($request, false);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadImage($request->file('image'), $academyCourse->image);
        } else {
            $validated['image'] = $academyCourse->image;
        }

        if ($request->hasFile('banner_image')) {
            $validated['banner_image'] = $this->uploadImage($request->file('banner_image'), $academyCourse->banner_image);
        } else {
            $validated['banner_image'] = $academyCourse->banner_image;
        }

        $academyCourse->update($validated);

        return redirect('/admin/academyCourse')->with('success', 'Course has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $academyCourse = AcademyCourse::findOrFail($id);
        $this->deleteImage($academyCourse->image);
        $this->deleteImage($academyCourse->banner_image);
        $academyCourse->delete();

        return redirect('/admin/academyCourse')->with('success', 'Course has been deleted successfully.');
    }

    private function validateRequest(Request $request, bool $iconRequired): array
    {
        $rules = [
            'heading' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3',
            'url' => 'nullable|string|max:255',
            'slider_heading' => 'nullable|string|max:255',
            'slider_duration' => 'nullable|string|max:255',
            'banner_image' => 'nullable|image|max:4096',
        ];

        $rules['image'] = $iconRequired
            ? 'required|image|max:2048'
            : 'nullable|image|max:2048';

        return $request->validate($rules);
    }

    private function uploadImage($image, ?string $currentImage = null): string
    {
        $directory = public_path('images/academyCourse');

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        if ($currentImage) {
            $this->deleteImage($currentImage);
        }

        $imageName = Str::random(20) . '_' . time() . '.' . $image->getClientOriginalExtension();
        $image->move($directory, $imageName);

        return $imageName;
    }

    private function deleteImage(?string $imageName): void
    {
        if (!$imageName) {
            return;
        }

        $imagePath = public_path('images/academyCourse/' . $imageName);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
}
