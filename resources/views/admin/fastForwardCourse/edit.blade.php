@extends('layouts.backend.app')

@section('content')
<style>
  .card-body{
    padding: 40px;
  }
  .form-control{
    border-bottom: 1px solid #888 !important;
  }
  .heading{
    color: #333;
    padding-top: 0;
    text-align: center;
  }
  .ff-section-item,
  .ff-point-item{
    background: #fafafa;
  }
</style>
<div class="card uper">
  <div class="card-header">
    <h3 class="heading">Edit Fast Forward Course</h3>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
    <form method="post" action="{{ route('admin.fastForwardCourse.update', $fastForwardCourse->id) }}" enctype="multipart/form-data">
      @method('PATCH')
      @csrf
      @include('admin.fastForwardCourse._form', ['buttonText' => 'Update Fast Forward Course'])
    </form>
  </div>
</div>
<script>
  $('#summernote').summernote({
    placeholder: 'Edit detail page content',
    tabsize: 2,
    height: 220,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video']],
      ['view', ['fullscreen', 'codeview', 'help']]
    ]
  });

  (function () {
    const sectionsContainer = document.getElementById('js-ff-sections');
    const addSectionButton = document.getElementById('js-add-ff-section');
    const sectionTemplate = document.getElementById('ff-section-template');
    const pointTemplate = document.getElementById('ff-point-template');

    if (!sectionsContainer || !addSectionButton || !sectionTemplate || !pointTemplate) {
      return;
    }

    function getNextSectionIndex() {
      const currentValue = parseInt(sectionsContainer.dataset.nextSectionIndex || '0', 10);
      sectionsContainer.dataset.nextSectionIndex = currentValue + 1;

      return currentValue;
    }

    function getNextPointIndex(sectionElement) {
      const pointsContainer = sectionElement.querySelector('.js-ff-points');
      const currentValue = parseInt(pointsContainer.dataset.nextPointIndex || '0', 10);
      pointsContainer.dataset.nextPointIndex = currentValue + 1;

      return currentValue;
    }

    function refreshSectionLabels() {
      sectionsContainer.querySelectorAll('.ff-section-item').forEach(function (sectionElement, sectionNumber) {
        const title = sectionElement.querySelector('.js-ff-section-title');
        if (title) {
          title.textContent = 'Section ' + (sectionNumber + 1);
        }

        refreshPointLabels(sectionElement);
      });
    }

    function refreshPointLabels(sectionElement) {
      sectionElement.querySelectorAll('.ff-point-item').forEach(function (pointElement, pointNumber) {
        const title = pointElement.querySelector('.js-ff-point-title');
        if (title) {
          title.textContent = 'Point ' + (pointNumber + 1);
        }
      });
    }

    function initializeCounters() {
      const sectionIndexes = Array.from(sectionsContainer.querySelectorAll('.ff-section-item'))
        .map(function (sectionElement) {
          return parseInt(sectionElement.dataset.sectionIndex || '0', 10);
        });

      sectionsContainer.dataset.nextSectionIndex = sectionIndexes.length
        ? Math.max.apply(null, sectionIndexes) + 1
        : 0;

      sectionsContainer.querySelectorAll('.ff-section-item').forEach(function (sectionElement) {
        const pointsContainer = sectionElement.querySelector('.js-ff-points');
        const pointIndexes = Array.from(sectionElement.querySelectorAll('.ff-point-item'))
          .map(function (pointElement) {
            return parseInt(pointElement.dataset.pointIndex || '0', 10);
          });

        pointsContainer.dataset.nextPointIndex = pointIndexes.length
          ? Math.max.apply(null, pointIndexes) + 1
          : 0;
      });

      refreshSectionLabels();
    }

    function createSection() {
      const sectionIndex = getNextSectionIndex();
      let markup = sectionTemplate.innerHTML
        .replaceAll('__SECTION_INDEX__', sectionIndex)
        .replaceAll('__SECTION_NUMBER__', sectionsContainer.querySelectorAll('.ff-section-item').length + 1);

      sectionsContainer.insertAdjacentHTML('beforeend', markup);
      refreshSectionLabels();
    }

    function createPoint(sectionElement) {
      const sectionIndex = sectionElement.dataset.sectionIndex;
      const pointsContainer = sectionElement.querySelector('.js-ff-points');
      const pointIndex = getNextPointIndex(sectionElement);

      let markup = pointTemplate.innerHTML
        .replaceAll('__SECTION_INDEX__', sectionIndex)
        .replaceAll('__POINT_INDEX__', pointIndex)
        .replaceAll('__POINT_NUMBER__', sectionElement.querySelectorAll('.ff-point-item').length + 1);

      pointsContainer.insertAdjacentHTML('beforeend', markup);
      refreshPointLabels(sectionElement);
    }

    addSectionButton.addEventListener('click', function () {
      createSection();
    });

    sectionsContainer.addEventListener('click', function (event) {
      if (event.target.classList.contains('js-remove-ff-section')) {
        event.target.closest('.ff-section-item').remove();
        refreshSectionLabels();
      }

      if (event.target.classList.contains('js-add-ff-point')) {
        createPoint(event.target.closest('.ff-section-item'));
      }

      if (event.target.classList.contains('js-remove-ff-point')) {
        const sectionElement = event.target.closest('.ff-section-item');
        event.target.closest('.ff-point-item').remove();
        refreshPointLabels(sectionElement);
      }
    });

    initializeCounters();
  })();
</script>
@endsection
