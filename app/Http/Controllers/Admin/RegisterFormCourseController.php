<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RegisterFormCourse;
use Illuminate\Http\Request;

class RegisterFormCourseController extends Controller
{
    public function index()
    {
        $registerFormCourses = RegisterFormCourse::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.registerFormCourse.index', compact('registerFormCourses'));
    }

    public function create()
    {
        return view('admin.registerFormCourse.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = (bool) $request->input('is_active', 0);

        RegisterFormCourse::create($validated);

        return redirect()->route('admin.registerFormCourse.index')
            ->with('success', 'Register form course has been added.');
    }

    public function edit($id)
    {
        $registerFormCourse = RegisterFormCourse::findOrFail($id);

        return view('admin.registerFormCourse.edit', compact('registerFormCourse'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = (bool) $request->input('is_active', 0);

        $registerFormCourse = RegisterFormCourse::findOrFail($id);
        $registerFormCourse->update($validated);

        return redirect()->route('admin.registerFormCourse.index')
            ->with('success', 'Register form course has been updated.');
    }

    public function destroy($id)
    {
        $registerFormCourse = RegisterFormCourse::findOrFail($id);
        $registerFormCourse->delete();

        return redirect()->route('admin.registerFormCourse.index')
            ->with('success', 'Register form course has been deleted successfully.');
    }
}
