<?php

namespace App\Http\Controllers\Admin;

use App\FastForwardCourse;
use App\FastForwardCourseSection;
use App\FastForwardCourseSectionPoint;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
        $validated['slug'] = $this->generateUniqueSlug(
            $request->input('slug'),
            $request->input('heading'),
            $request->input('subheading')
        );

        $fastForwardCourse = FastForwardCourse::create($validated);
        $this->syncSections($fastForwardCourse, $request->input('sections', []));

        return redirect()->route('admin.fastForwardCourse.index')
            ->with('success', 'Fast Forward course has been added.');
    }

    public function edit($id)
    {
        $fastForwardCourse = FastForwardCourse::with([
            'sections' => function ($query) {
                $query->orderBy('sort_order')
                    ->with([
                        'points' => function ($pointQuery) {
                            $pointQuery->orderBy('sort_order');
                        }
                    ]);
            }
        ])->findOrFail($id);

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
        $validated['slug'] = $this->generateUniqueSlug(
            $request->input('slug'),
            $request->input('heading'),
            $request->input('subheading'),
            $fastForwardCourse->id
        );

        $fastForwardCourse->update($validated);
        $this->syncSections($fastForwardCourse, $request->input('sections', []));

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
        $routeFastForwardCourse = $request->route('fastForwardCourse');
        $ignoreId = is_object($routeFastForwardCourse) ? $routeFastForwardCourse->id : $routeFastForwardCourse;

        $rules = [
            'heading' => 'required|string|min:2|max:255',
            'subheading' => 'nullable|string|max:255',
            'badge_text' => 'required|string|max:255',
            'event_badge_text' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'detail_content' => 'nullable|string|min:10',
            'highlight_text' => 'nullable|string|max:255',
            'time_text' => 'required|string|max:255',
            'seats_text' => 'required|string|max:255',
            'admission_text' => 'required|string|max:255',
            'fees_text' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('fast_forward_courses', 'slug')->ignore($ignoreId),
            ],
            'detail_url' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'sections' => 'nullable|array',
            'sections.*.id' => 'nullable|integer',
            'sections.*.heading' => 'nullable|string|max:255',
            'sections.*.subheading' => 'nullable|string|max:255',
            'sections.*.sort_order' => 'nullable|integer|min:0',
            'sections.*.is_active' => 'nullable',
            'sections.*.points' => 'nullable|array',
            'sections.*.points.*.id' => 'nullable|integer',
            'sections.*.points.*.point_text' => 'nullable|string',
            'sections.*.points.*.sort_order' => 'nullable|integer|min:0',
            'sections.*.points.*.is_active' => 'nullable',
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

    private function syncSections(FastForwardCourse $fastForwardCourse, array $sections): void
    {
        $keptSectionIds = [];

        foreach ($sections as $sectionIndex => $sectionData) {
            $points = $sectionData['points'] ?? [];
            $hasPointContent = collect($points)->contains(function ($point) {
                return !empty(trim($point['point_text'] ?? ''));
            });

            $hasSectionContent = !empty(trim($sectionData['heading'] ?? ''))
                || !empty(trim($sectionData['subheading'] ?? ''))
                || $hasPointContent;

            if (!$hasSectionContent) {
                continue;
            }

            $sectionPayload = [
                'heading' => $sectionData['heading'] ?? '',
                'subheading' => $sectionData['subheading'] ?? null,
                'sort_order' => $sectionData['sort_order'] ?? $sectionIndex,
                'is_active' => !empty($sectionData['is_active']),
            ];

            if (!empty($sectionData['id'])) {
                $section = $fastForwardCourse->sections()->where('id', $sectionData['id'])->first();
                if ($section) {
                    $section->update($sectionPayload);
                } else {
                    $section = $fastForwardCourse->sections()->create($sectionPayload);
                }
            } else {
                $section = $fastForwardCourse->sections()->create($sectionPayload);
            }

            $keptSectionIds[] = $section->id;
            $this->syncSectionPoints($section, $points);
        }

        if ($keptSectionIds) {
            $fastForwardCourse->sections()->whereNotIn('id', $keptSectionIds)->delete();
        } else {
            $fastForwardCourse->sections()->delete();
        }
    }

    private function syncSectionPoints(FastForwardCourseSection $section, array $points): void
    {
        $keptPointIds = [];

        foreach ($points as $pointIndex => $pointData) {
            if (empty(trim($pointData['point_text'] ?? ''))) {
                continue;
            }

            $pointPayload = [
                'point_text' => $pointData['point_text'],
                'sort_order' => $pointData['sort_order'] ?? $pointIndex,
                'is_active' => !empty($pointData['is_active']),
            ];

            if (!empty($pointData['id'])) {
                $point = $section->points()->where('id', $pointData['id'])->first();
                if ($point) {
                    $point->update($pointPayload);
                } else {
                    $point = $section->points()->create($pointPayload);
                }
            } else {
                $point = $section->points()->create($pointPayload);
            }

            $keptPointIds[] = $point->id;
        }

        if ($keptPointIds) {
            $section->points()->whereNotIn('id', $keptPointIds)->delete();
        } else {
            $section->points()->delete();
        }
    }

    private function generateUniqueSlug(?string $slug, string $heading, ?string $subheading, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($slug ?: trim($heading . ' ' . $subheading));

        if ($baseSlug === '') {
            $baseSlug = 'fast-forward-course';
        }

        $uniqueSlug = $baseSlug;
        $counter = 1;

        while (
            FastForwardCourse::where('slug', $uniqueSlug)
                ->when($ignoreId, function ($query) use ($ignoreId) {
                    $query->where('id', '!=', $ignoreId);
                })
                ->exists()
        ) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $uniqueSlug;
    }
}
