@extends('layouts.backend.app')

@section('content')

@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div><br/>
@endif
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<style>
  th{
    font-size: 13px !important;
    font-weight: bold !important;
    color: #6bb51e;
  }
  td{
    font-size: 13px !important;
  }
  button{
    border: none;
    background: transparent;
  }
  .border-rad-5{
  	border-radius: 28px;
  }
</style>


<h4 class="text-success">Module Accessed By : </h4>
<div class="row">
	@foreach($users as $user)
	<div class="d-flex">		
			<?php
				$studentArray = DB::table('user_module')->where('user_id',$user->id)->where('module_id', $id)->get();
				foreach ($studentArray as $key => $student) {
					echo "<div class='text-white bg-grey mx-3 my-2 py-2 px-4 border-rad-5'>".
					$user->name." ( ".$user->email." )"
					."</div>";
				}
			?>		
	</div>
	@endforeach
</div>

<h4 class="text-success mt-5">Give Accessed to more students : </h4>
<form action="{{ route('admin.modules.usermodule', $id) }}" method="post">
	@csrf
	@method('POST')
	<select class="form-control show-tick" id="my_select" name="userId[]" multiple>
		<option value="0" disabled>-- Select multiple students --</option>
		@foreach($users as $user)		
		<?php
			$studentArray = DB::table('user_module')->where('user_id',$user->id)->where('module_id', $id)->get();
			$selected = '';
				foreach ($studentArray as $key => $student) {				
					if($user->id == $student->user_id)
					{ $selected = 'selected="selected"';}
				}
		?>
		<option value="{{$user->id}}" {{$selected}}>{{$user->name}}--{{$user->id}}</option>
		@endforeach
	</select>

	<button class="btn btn-info mt-3" type="submit">submit</button>
</form>
@endsection