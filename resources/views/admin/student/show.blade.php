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
  label{color: #000;text-transform: capitalize;}
</style>

<div class="row clearfix pt-5">    
  <div class="col-lg-12 mb-4 col-md-12 col-sm-12 col-xs-12">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br/>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="pb-3 pt-4 px-4 bg-white" style="border-radius: 5px;border: solid 0.5px #d3d2d8;">
        <form action="{{ route('register.update', $details->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <img src="{{asset('images/students/')}}/{{$details->image}}" width="150px"><br/>
            <input type="hidden" name="hidden_image" value="{{ $details->image }}">

            <label>Change Profile Image :</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <input type="hidden" name="user_id" value="{{$user->id}}">

            <div class="mt-3">
                <label class="mt-3">Student Name :</label>
                <input type="text" class="form-control" name="name" required value="{{$user->name}}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">Student Email :</label>
                <input type="email" class="form-control" name="email" required value="{{$user->email}}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">Phone Number :</label>
                <input type="number" class="form-control" name="phone" required value="{{$user->phone}}">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="bold text-success font-20 mt-5">Address :</div>
            <div>
                <label class="mt-3">Address :</label>
                <input type="text" class="form-control" name="address" required value="{{$details->address}}">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">nationality :</label>
                <input type="text" class="form-control" name="nationality" required value="{{$details->nationality}}">
                @error('nationality')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">pincode :</label>
                <input type="text" class="form-control" name="pincode" required value="{{$details->pincode}}">
                @error('pincode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">course :</label>
                <input type="text" class="form-control" name="course" required value="{{$details->course}}">
                @error('course')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">batch :</label>
                <input type="text" class="form-control" name="batch" required value="{{$details->batch}}">
                @error('batch')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="bold text-success font-20 mt-5">Personal Details :</div>
            <div>
                <label class="mt-3">Fathers Name :</label>
                <input type="text" class="form-control" name="fathers_name" value="{{$details->fathers_name}}">
                @error('fathers_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">Fathers Phone :</label>
                <input type="text" class="form-control" name="fathers_phone" value="{{$details->fathers_phone}}">
                @error('fathers_phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">Guardian Name :</label>
                <input type="text" class="form-control" name="guardian_name" value="{{$details->guardian_name}}">
                @error('guardian_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">Guardian Occupation :</label>
                <input type="text" class="form-control" name="guardian_occupation" value="{{$details->guardian_occupation}}">
                @error('guardian_occupation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="bold text-success font-20 mt-5">GST Details :</div>
            <div>
                <label class="mt-3">Gst Applicable :</label>
                <select class="form-control" name="gst" required>
                    @php
                        $selected = "";
                        if($details->gst == 1){
                            $selected = "selected";
                        }
                    @endphp
                    <option value="1" {{$selected}}>Yes</option>
                    <option value="0" {{$selected}}>No</option>
                </select>
                @error('gst')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">Trade/Business Title :</label>
                <input type="text" class="form-control" name="trade_title" value="{{$details->trade_title}}">
                @error('trade_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">Trade/Business Address :</label>
                <input type="text" class="form-control" name="trade_address" value="{{$details->trade_address}}">
                @error('trade_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">GST Number :</label>
                <input type="text" class="form-control" name="gst_number" value="{{$details->gst_number}}">
                @error('gst_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="bold text-success font-20 mt-5">Education :</div>
            <div class="form-row">
                <div class="col-md-4 col-12">
                <label class="mt-3">10th School :</label>
                <input type="text" class="form-control" name="10_school" value="<?php echo $details['10_school']; ?> ">
                @error('10_school')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">10th Year :</label>
                <input type="text" class="form-control" name="10_year" value="<?php echo $details['10_year']; ?> ">
                @error('10_year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">10th Board :</label>
                <input type="text" class="form-control" name="10_board" value="<?php echo $details['10_board']; ?> ">
                @error('10_board')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">12th School :</label>
                <input type="text" class="form-control" name="12_school" value="<?php echo $details['12_school']; ?> ">
                @error('12_school')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">12th Year :</label>
                <input type="text" class="form-control" name="12_year" value="<?php echo $details['12_year']; ?> ">
                @error('12_year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">12th Board :</label>
                <input type="text" class="form-control" name="12_board" value="<?php echo $details['12_board']; ?> ">
                @error('12_board')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">Under Graduation School :</label>
                <input type="text" class="form-control" name="ug_school" value="<?php echo $details['ug_school']; ?> ">
                @error('ug_school')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">Under Graduation Year :</label>
                <input type="text" class="form-control" name="ug_year" value="<?php echo $details['ug_year']; ?> ">
                @error('ug_year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">Under Graduation Board :</label>
                <input type="text" class="form-control" name="ug_board" value="<?php echo $details['ug_board']; ?> ">
                @error('ug_board')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">Graduation School :</label>
                <input type="text" class="form-control" name="g_school" value="<?php echo $details['g_school']; ?> ">
                @error('g_school')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">Graduation Year :</label>
                <input type="text" class="form-control" name="g_year" value="<?php echo $details['g_year']; ?> ">
                @error('g_year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">Graduation Board :</label>
                <input type="text" class="form-control" name="g_board" value="<?php echo $details['g_board']; ?> ">
                @error('g_board')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">Post Graduation School :</label>
                <input type="text" class="form-control" name="pg_school" value="<?php echo $details['pg_school']; ?> ">
                @error('pg_school')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">Post Graduation Year :</label>
                <input type="text" class="form-control" name="pg_year" value="<?php echo $details['pg_year']; ?> ">
                @error('pg_year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="col-md-4 col-12">
                <label class="mt-3">Post Graduation Board :</label>
                <input type="text" class="form-control" name="pg_board" value="<?php echo $details['pg_board']; ?> ">
                @error('pg_board')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <label class="mt-3">Stream :</label>
                <input type="text" class="form-control" name="stream" value="<?php echo $details['stream']; ?> ">
                @error('stream')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">Music Background Info :</label>
                <input type="text" class="form-control" name="music_bg_info" value="<?php echo $details['music_bg_info']; ?> ">
                @error('music_bg_info')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">Future Plans :</label>
                <input type="text" class="form-control" name="plans" value="<?php echo $details['plans']; ?> ">
                @error('plans')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="bold text-success font-20 mt-5">Payment Structure :</div>
            @if($details->fees_status == 0)
                <h6 class="text-dark">Fees Status: <span class="text-danger">Pending</span> 
                <select class="d-flex" name="fees_status">
                    <option value="{{$details->fees_status}}" selected>-- Change Status --</option>
                    <option value="1">Paid</option>
                    <option value="0">Pending</option>
                    <option value="2">Installment</option>
                </select>
                </h6>
            @elseif($details->fees_status == 1)
                <h6 class="text-dark">Fees Status: <span class="text-success">Paid</span> 
                <select class="d-flex" name="fees_status">
                    <option value="{{$details->fees_status}}" selected>-- Change Status --</option>
                    <option value="1">Paid</option>
                    <option value="0">Pending</option>
                    <option value="2">Installment</option>
                </select>
                </h6>
            @elseif($details->fees_status == 2)
                <h6 class="text-dark">Fees Status: <span class="text-info">Installment</span> 
                <select class="d-flex" name="fees_status">
                    <option value="{{$details->fees_status}}" selected>-- Change Status --</option>
                    <option value="1">Paid</option>
                    <option value="0">Pending</option>
                    <option value="2">Installment</option>
                </select>
                </h6>
            @endif
            <h6 class="text-dark mt-3">
                MOde Of Payment/ Payment related Notes(installments*):
                <textarea id="summernote" class="form-control" name="fees_mode_of_payment">{{ $details->fees_mode_of_payment }}</textarea>
            </h6>

            <h6 class="text-success bold mt-5 font-20">Proofs :</h6>
            <div>
                <label class="mt-3">ID Type :</label>
                <input type="text" class="form-control" name="id_type" value="<?php echo $details['id_type']; ?> ">
                @error('id_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label class="mt-3">ID no. :</label>
                <input type="text" class="form-control" name="id_no" value="<?php echo $details['id_no']; ?> ">
                @error('id_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <img src="{{asset('images/students/')}}/{{$details->parent_sign}}" width="30%">
                <img src="{{asset('images/students/')}}/{{$details->student_sign}}" width="30%">
                <img src="{{asset('images/students/')}}/{{$details->signature3}}" width="30%">
            </div>

            <!-- <h6 class="text-dark pt-4">
                Upload Invoice <sup class="text-danger">(Use Pdf *): </sup>
            <input type="file" name="invoice" placeholder="Upload Invoice" accept="application/pdf,application/vnd.ms-excel">
            </h6> -->
            <!-- <h6 class="text-success bold mt-5 font-20">Download Invoice :</h6>
            <table>
                <tbody>                
                @foreach($user->studentInvoices as $key => $invoice)
                <tr>
                    <td class="invoice_hidden">
                        <a class="btn btn-info align-items-center pt-3" style="border-radius: 8px;" href="{{asset('storage')}}/{{$details->invoice}}" download>Invoice {{$key+1}}</a>
                        <input type="hidden" name="invoice_hidden[]" value="{{$invoice->invoice}}">
                        <a class="btn btn-danger">delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table> -->

            <!-- <h6 class="text-success bold mt-5 font-20">Upload more invoice</h6>
            <table class="table table-bordered" id="dynamicAddRemove">  
                <tr>
                    <th>Invoice(s)</th>
                    <th>Action</th>
                </tr>
                <tr>  
                    <td><input type="file" name="moreFields[0][title]" placeholder="upload invoice" class="form-control" /></td>  
                    <td><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button></td>
                </tr>  
            </table> -->

            <script type="text/javascript">
                var i = 0;
                $("#add-btn").click(function(){
                ++i;
                $("#dynamicAddRemove").append('<tr><td><input type="file" name="moreFields['+i+'][title]" placeholder="upload invoice" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
                });
                $(document).on('click', '.remove-tr', function(){  
                $(this).parents('tr').remove();
                });  
            </script>

<!-- try -->
<!-- <div class="form-group input-group">
  <div id="items" class="form-group">
    <label class="text-dark">Upload Invoice <sup class="text-danger">(Use Pdf *): </sup></label>
      <div class="col-md-4 margin-bottom">
        <input id="textinput" class="form-control" type="file" name="invoice[]" placeholder="Upload Invoice" accept="application/pdf,application/vnd.ms-excel">
      </div>
  </div>

  <a id="add" class="btn add-more btn-primary" type="button">+ Add another referral</a>
  <a class="delete btn btn-danger">- Remove referral</a>
</div> -->

<!-- try -->

            <button class="btn btn-success mt-5" type="submit">Update status</button>
        </form>
    </div>
  </div>
</div>

<script>
  $('#summernote').summernote({
    placeholder: 'Edit Description',
    tabsize: 2,
    height: 150,
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
</script>





<!-- delete -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $(".delete").hide();
  //when the Add Field button is clicked
  $("#add").click(function(e) {
    $(".delete").fadeIn("1500");
    //Append a new row of code to the "#items" div
    $("#items").append(
      '<div class="next-referral col-4"><input id="textinput" class="form-control" type="file" name="invoice[]" placeholder="Upload Invoice" accept="application/pdf,application/vnd.ms-excel"></div>'
    );
  });
  $("body").on("click", ".delete", function(e) {
    $(".next-referral").last().remove();
  });
});
</script>
@endsection
