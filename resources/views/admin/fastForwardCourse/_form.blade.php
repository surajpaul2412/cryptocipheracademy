@php
    $fastForwardCourse = $fastForwardCourse ?? null;
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
            <label class="text-dark" for="sort_order">Sort order :</label>
            <input type="number" min="0" class="form-control" name="sort_order" value="{{ old('sort_order', optional($fastForwardCourse)->sort_order ?? 0) }}"/>
        </div>
    </div>
    <div class="col-md-3">
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
    <label class="text-dark" for="detail_url">Detail page url :</label>
    <input type="text" class="form-control" name="detail_url" value="{{ old('detail_url', optional($fastForwardCourse)->detail_url) }}"/>
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

<button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
