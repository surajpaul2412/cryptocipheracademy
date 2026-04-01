@php
    $fastForwardCourse = $fastForwardCourse ?? null;
    $sectionsInput = old('sections');

    if ($sectionsInput === null) {
        $sectionsInput = $fastForwardCourse
            ? $fastForwardCourse->sections->map(function ($section) {
                return [
                    'id' => $section->id,
                    'heading' => $section->heading,
                    'subheading' => $section->subheading,
                    'sort_order' => $section->sort_order,
                    'is_active' => $section->is_active,
                    'points' => $section->points->map(function ($point) {
                        return [
                            'id' => $point->id,
                            'point_text' => $point->point_text,
                            'sort_order' => $point->sort_order,
                            'is_active' => $point->is_active,
                        ];
                    })->values()->all(),
                ];
            })->values()->all()
            : [];
    }
@endphp

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark" for="heading">Heading :</label>
            <input type="text" class="form-control" name="heading" value="{{ old('heading', optional($fastForwardCourse)->heading) }}"/>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark" for="subheading">Sub heading :</label>
            <input type="text" class="form-control" name="subheading" value="{{ old('subheading', optional($fastForwardCourse)->subheading) }}"/>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark" for="badge_text">Badge text :</label>
            <input type="text" class="form-control" name="badge_text" value="{{ old('badge_text', optional($fastForwardCourse)->badge_text) }}"/>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="text-dark" for="event_badge_text">Event badge :</label>
            <input type="text" class="form-control" name="event_badge_text" value="{{ old('event_badge_text', optional($fastForwardCourse)->event_badge_text) }}"/>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="text-dark" for="sort_order">Sort order :</label>
            <input type="number" min="0" class="form-control" name="sort_order" value="{{ old('sort_order', optional($fastForwardCourse)->sort_order ?? 0) }}"/>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="text-dark" for="slug">Slug :</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug', optional($fastForwardCourse)->slug) }}"/>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group pt-4">
            <input type="hidden" name="is_active" value="0">
            <div class="form-check mt-2">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', optional($fastForwardCourse)->is_active ?? true) ? 'checked' : '' }}>
                <label class="form-check-label text-dark" for="is_active">Active</label>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="text-dark" for="description">Description :</label>
    <textarea class="form-control" name="description" rows="4">{{ old('description', optional($fastForwardCourse)->description) }}</textarea>
</div>

<div class="form-group">
    <label class="text-dark" for="detail_content">Detail page content (optional fallback) :</label>
    <textarea id="summernote" class="form-control" name="detail_content">{{ old('detail_content', optional($fastForwardCourse)->detail_content) }}</textarea>
</div>

<div class="form-group">
    <label class="text-dark" for="highlight_text">Highlight text :</label>
    <input type="text" class="form-control" name="highlight_text" value="{{ old('highlight_text', optional($fastForwardCourse)->highlight_text) }}"/>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark" for="time_text">Time row :</label>
            <input type="text" class="form-control" name="time_text" value="{{ old('time_text', optional($fastForwardCourse)->time_text) }}"/>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark" for="seats_text">Seats row :</label>
            <input type="text" class="form-control" name="seats_text" value="{{ old('seats_text', optional($fastForwardCourse)->seats_text) }}"/>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark" for="admission_text">Admission row :</label>
            <input type="text" class="form-control" name="admission_text" value="{{ old('admission_text', optional($fastForwardCourse)->admission_text) }}"/>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark" for="fees_text">Fees row :</label>
            <input type="text" class="form-control" name="fees_text" value="{{ old('fees_text', optional($fastForwardCourse)->fees_text) }}"/>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark" for="contact_phone">Admissions phone :</label>
            <input type="text" class="form-control" name="contact_phone" value="{{ old('contact_phone', optional($fastForwardCourse)->contact_phone) }}"/>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="text-dark" for="website">Website :</label>
            <input type="text" class="form-control" name="website" value="{{ old('website', optional($fastForwardCourse)->website) }}"/>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="text-dark" for="image">Card image :</label>
    <input type="file" class="form-control" name="image"/>
    @if($fastForwardCourse && $fastForwardCourse->image)
        <div class="pt-3">
            <img src="{{ URL('/') }}/images/fastForwardCourse/{{ $fastForwardCourse->image }}" width="100px" alt="{{ $fastForwardCourse->heading }}">
        </div>
    @endif
</div>

<div class="card mt-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Detail Sections</h4>
        <button type="button" class="btn btn-dark btn-sm" id="js-add-ff-section">Add Section</button>
    </div>
    <div class="card-body pt-3" id="js-ff-sections">
        @foreach($sectionsInput as $sectionIndex => $section)
            <div class="ff-section-item border rounded p-3 mb-4" data-section-index="{{ $sectionIndex }}">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0 text-dark js-ff-section-title">Section {{ $loop->iteration }}</h5>
                    <button type="button" class="btn btn-sm btn-outline-danger js-remove-ff-section">Remove Section</button>
                </div>
                <input type="hidden" name="sections[{{ $sectionIndex }}][id]" value="{{ $section['id'] ?? '' }}">
                <div class="form-group">
                    <label class="text-dark">Long heading :</label>
                    <input type="text" class="form-control" name="sections[{{ $sectionIndex }}][heading]" value="{{ $section['heading'] ?? '' }}">
                </div>
                <div class="form-group">
                    <label class="text-dark">Short heading / sub-heading :</label>
                    <input type="text" class="form-control" name="sections[{{ $sectionIndex }}][subheading]" value="{{ $section['subheading'] ?? '' }}">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-dark">Sort order :</label>
                            <input type="number" min="0" class="form-control" name="sections[{{ $sectionIndex }}][sort_order]" value="{{ $section['sort_order'] ?? $sectionIndex }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group pt-4">
                            <div class="form-check mt-2">
                                <input type="checkbox" class="form-check-input" id="section_active_{{ $sectionIndex }}" name="sections[{{ $sectionIndex }}][is_active]" value="1" {{ !empty($section['is_active']) ? 'checked' : '' }}>
                                <label class="form-check-label text-dark" for="section_active_{{ $sectionIndex }}">Active</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Points</h6>
                        <button type="button" class="btn btn-sm btn-outline-dark js-add-ff-point">Add Point</button>
                    </div>
                    <div class="card-body pt-3 js-ff-points">
                        @foreach(($section['points'] ?? []) as $pointIndex => $point)
                            <div class="ff-point-item border rounded p-3 mb-3" data-point-index="{{ $pointIndex }}">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="text-dark bold js-ff-point-title">Point {{ $loop->iteration }}</div>
                                    <button type="button" class="btn btn-sm btn-outline-danger js-remove-ff-point">Remove Point</button>
                                </div>
                                <input type="hidden" name="sections[{{ $sectionIndex }}][points][{{ $pointIndex }}][id]" value="{{ $point['id'] ?? '' }}">
                                <div class="form-group">
                                    <label class="text-dark">Point text :</label>
                                    <textarea class="form-control" name="sections[{{ $sectionIndex }}][points][{{ $pointIndex }}][point_text]" rows="4">{{ $point['point_text'] ?? '' }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark">Sort order :</label>
                                            <input type="number" min="0" class="form-control" name="sections[{{ $sectionIndex }}][points][{{ $pointIndex }}][sort_order]" value="{{ $point['sort_order'] ?? $pointIndex }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group pt-4">
                                            <div class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input" id="point_active_{{ $sectionIndex }}_{{ $pointIndex }}" name="sections[{{ $sectionIndex }}][points][{{ $pointIndex }}][is_active]" value="1" {{ !empty($point['is_active']) ? 'checked' : '' }}>
                                                <label class="form-check-label text-dark" for="point_active_{{ $sectionIndex }}_{{ $pointIndex }}">Active</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script type="text/template" id="ff-section-template">
    <div class="ff-section-item border rounded p-3 mb-4" data-section-index="__SECTION_INDEX__">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0 text-dark">Section __SECTION_NUMBER__</h5>
            <button type="button" class="btn btn-sm btn-outline-danger js-remove-ff-section">Remove Section</button>
        </div>
        <input type="hidden" name="sections[__SECTION_INDEX__][id]" value="">
        <div class="form-group">
            <label class="text-dark">Long heading :</label>
            <input type="text" class="form-control" name="sections[__SECTION_INDEX__][heading]" value="">
        </div>
        <div class="form-group">
            <label class="text-dark">Short heading / sub-heading :</label>
            <input type="text" class="form-control" name="sections[__SECTION_INDEX__][subheading]" value="">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-dark">Sort order :</label>
                    <input type="number" min="0" class="form-control" name="sections[__SECTION_INDEX__][sort_order]" value="0">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group pt-4">
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="section_active___SECTION_INDEX__" name="sections[__SECTION_INDEX__][is_active]" value="1" checked>
                        <label class="form-check-label text-dark" for="section_active___SECTION_INDEX__">Active</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Points</h6>
                <button type="button" class="btn btn-sm btn-outline-dark js-add-ff-point">Add Point</button>
            </div>
            <div class="card-body pt-3 js-ff-points"></div>
        </div>
    </div>
</script>

<script type="text/template" id="ff-point-template">
    <div class="ff-point-item border rounded p-3 mb-3" data-point-index="__POINT_INDEX__">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="text-dark bold">Point __POINT_NUMBER__</div>
            <button type="button" class="btn btn-sm btn-outline-danger js-remove-ff-point">Remove Point</button>
        </div>
        <input type="hidden" name="sections[__SECTION_INDEX__][points][__POINT_INDEX__][id]" value="">
        <div class="form-group">
            <label class="text-dark">Point text :</label>
            <textarea class="form-control" name="sections[__SECTION_INDEX__][points][__POINT_INDEX__][point_text]" rows="4"></textarea>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="text-dark">Sort order :</label>
                    <input type="number" min="0" class="form-control" name="sections[__SECTION_INDEX__][points][__POINT_INDEX__][sort_order]" value="0">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group pt-4">
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="point_active___SECTION_INDEX_____POINT_INDEX__" name="sections[__SECTION_INDEX__][points][__POINT_INDEX__][is_active]" value="1" checked>
                        <label class="form-check-label text-dark" for="point_active___SECTION_INDEX_____POINT_INDEX__">Active</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
