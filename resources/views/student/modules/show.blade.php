@extends('layouts.backend.app')

@section('content')
<style>
  .cross{
    position: absolute;
    right: 3px;
    top: -10px;
    background: transparent;
    border: none;
  }
  .edit{
    position: absolute;
    right: 15px;
    bottom: 0px;
  }
  .btn:not(.btn-link):not(.btn-circle) span{
    display: none;
  }
</style>
<style>
.top {
  padding-bottom: 56.25%;
  height: 0;
  overflow: hidden;
  position: relative;
}
iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  cursor: none;
}
.wrapper {
  position: relative;
  padding-bottom: 200%;
  transform: translateY(-35.95%);
}
</style>

<div class="row clearfix pt-4">
  <div class="col-lg-12 mb-4 col-md-12 col-sm-12 col-xs-12" align="left">
    <h4 class="text-dark">{{$video->title}}</h4>
    <h6 class="text-dark">{{$video->description}}</h6>
    <h6 class="text-dark">Module: {{$video->module->name}}</h6>
  </div>
  <div class="col-lg-12 mb-4 col-md-12 col-sm-12 col-xs-12" align="center">
    <video width="100%" height="auto" controls controlsList="nodownload" src="{{asset('storage/videos')}}/{{$video->video_url}}">
    Your browser does not support the video tag.
    </video>
  </div>
</div>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
$(document).bind("contextmenu",function(e){
  return false;
});
/* To Disable Inspect Element */
$(document).bind("contextmenu",function(e) {
 e.preventDefault();
});
$(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});
// disables right click with ctrl
document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'F'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
}
</script>
@endsection
