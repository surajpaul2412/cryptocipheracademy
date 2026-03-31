<?php

namespace App\Http\Controllers\Admin;

use App\FastForwardCourse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FastForwardCourseController extends Controller
{
    public function index()
    {
        $fastForwardCourses = FastForwardCourse::orderBy('sort_order')
            ->latest('id')
            ->get();

        return view('admin.fastForwardCourse.index', compact('fastForwardCourses'));
    }

    public function create()
    {
        return view('admin.fastForwardCourse.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request, true);
        $validated['image'] = $this->uploadImage($request->file('image'));
        $validated['is_active'] = (bool) $request->input('is_active', 0);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        FastForwardCourse::create($validated);

        return redirect()->route('admin.fastForwardCourse.index')
            ->with('success', 'Fast Forward course has been added.');
    }

    public function edit($id)
    {
        $fastForwardCourse = FastForwardCourse::findOrFail($id);

        return view('admin.fastForwardCourse.edit', compact('fastForwardCourse'));
    }

    public function update(Request $request, $id)
    {
        $fastForwardCourse = FastForwardCourse::findOrFail($id);
        $validated = $this->validateRequest($request, false);

        if ($request->hasFile('image')) {
            $validated['image'] = $this->uploadImage($request->file('image'), $fastForwardCourse->image);
        }

        $validated['is_active'] = (bool) $request->input('is_active', 0);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $fastForwardCourse->update($validated);

        return redirect()->route('admin.fastForwardCourse.index')
            ->with('success', 'Fast Forward course has been updated.');
    }

    public function destroy($id)
    {
        $fastForwardCourse = FastForwardCourse::findOrFail($id);
        $this->deleteImage($fastForwardCourse->image);
        $fastForwardCourse->delete();

        return redirect()->route('admin.fastForwardCourse.index')
            ->with('success', 'Fast Forward course has been deleted successfully.');
    }

    private function validateRequest(Request $request, bool $imageRequired): array
    {
        $rules = [
            'heading' => 'required|string|min:2|max:255',
            'subheading' => 'nullable|string|max:255',
            'badge_text' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'highlight_text' => 'nullable|string|max:255',
            'time_text' => 'required|string|max:255',
            'seats_text' => 'required|string|max:255',
            'admission_text' => 'required|string|max:255',
            'fees_text' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'detail_url' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ];

        $rules['image'] = $imageRequired
            ? 'required|image|max:2048'
            : 'nullable|image|max:2048';

        return $request->validate($rules);
    }

    private function uploadImage($image, ?string $currentImage = null): string
    {
        $directory = public_path('images/fastForwardCourse');

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

        $imagePath = public_path('images/fastForwardCourse/' . $imageName);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
}
