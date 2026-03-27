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
</style>
@if($modules->count())
<div class="row">
  @foreach($modules as $index => $row)
  <div class="col-md-3 col-12" align="center">
      <a href="{{ route('admin.modules.show', $row->id) }}">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAulBMVEX///9SlOIdNE9Id7Hk5OTMzMxahLnSz8tUmOjQ0NBjmuBMkuKLsOPq5+QbMUo6b67FzNhamONWgbiAnsY6X44wVoNylME5aJ42YZRRfbRHdrEZLUQ+ZphCd7ZLhMkmU4jm7PSgt9XD0OPw8/hpjr48Y5PX2dxFZpJQbpdGfsBOjdhzot2wwtuVr9CMqMx4msXT3eu9zOFskcDN1NynuM9Db6W8xdFVeadfk9YsTniOr9pDjuN5pNvDyM342ICNAAAEOUlEQVR4nO3dgVbaSBTGcTQQolnAYihMEKtV2UXFdtWw1er7v9ZOAqIB2kPuTJk793z/B8D5eZNAchKo1RBCCCGEEEIIIYQQQgghhBBCCCEBnd0efzbp2/Sra8Jvu7gLVNcwFTI2noUqtFBw7hryqy4uuzaAYahuXVN+0Z2VCeYFZ64tGzsLbAHD7rFrzMZurY1QD9E1ZmPfir1QqcAoNX+V7641m7rMV5amZsAgSANtVCzfMbQwMPYVKabCsGuFp0sVT+GlpQkWRJbC0BpQE8ULOyyF1nZDXXp//Mea/ntBFBq+EZaFxqcovzt76RI/2tsV2vt8tCF1TxqjR8Kwey9dGKqpdGEYELZTv4SUs2ybwj+ZKv57lFNQX4T6w6WiHWu8EebGMLwULdR1pQtTJV0YpHaEadph0YZrK3aEHXX3eMSgxzvVWROG5sK0c15vteoM0qs4XyVaEKbqgQVvXutIpZaFacoJqIkP5Z3RXNh5ZAXUxMeOVWGqmAF1pe3UWDiashO2piMrwuykaDBzDVpvNpivLTMRZsmiLw+uPes9fHlbXUYUpsFVshSOXXvWGy+FyRVR+A7kLkyuSMKTxB9h0qcIE5+ECUGYlYUtdpWF/1UX/l1s39nktOgvhs1XNsmK48U/NOFoL4r2imKGzVemVzgiC68XPO5F10ShL8CCSBFOvAFq4oQi9AioiQThxPWiKxV3qwt/uF50peIf1YWfXC+6WofShTGEELIPQgj5ByGE/IMQQv5BCCH/IIRw6yJivgij606f1Mj44vNuhFF/OGyTGrYzQ+JOhNHJcJ/c0JC4E+Fpmw7c329fsxdGfSOh4RB3IuyZzXAAoUhhtPXO6akwGj1tO1g/hdFo2BMt1MC2aKEG7osWRiP9cpKF+QRFC4sJShbOJyhYuJigXOHbBMUK34FChR+AMoUfgSKFy4OMVGFpghKF5QkKFK5MUJ5wdYLyhKsTlCbsT9YvKMsSPm24Yi5L2M+kz3AQ9YXvh/pYukaUJtxbI4oTrhHlCVeJAoUrRInCMlGksESUKfxIFCr8QJQqfCeKFS6JcoVvRMHCBVGycE4ULSyIsoU5UbgwJwoXaqLw+2nyLxLY9q/7Ktw+CK0IB+LvL91wzbqK8NQEuKP7vHsm93mbbaS7ehqhR7xVv90eJka+3T1vMRn0ngj1BsbfhbOrZ2aoj8x488yMwyCEkH8QQsg/CCHkH4QQ8g9CCPkHIYT8owhvYterrlJ8U1347Jfwubpw9tP1qqv086i6sPni0RDjl2Z14cHrJ2+I8eHrAUHYmPlCjA9nDZKw+fqy/AUCvuklvrw2aMJGozl7vjlk3s101tRLHVcX1ht5TQ8qFlqvLqw1vIoArI1dL7pKhI20Nt8TPYlwnMm78IZIBNa82VBpm+ii+viAeWPKURQhhBBCCCGEEEIIIYQQQshR/wM1DYGVB4kllAAAAABJRU5ErkJggg==">
      </a>
      <div style="text-transform: capitalize;" class="text-dark font-weight-bold pt-3">{{$row->name}}</div>
      <a href="{{ route('admin.modules.show', $row->id) }}" class="text-dark">{{$row->videos->count()}} video(s)</a>
      <div>
        <a href="{{ route('admin.modules.edit',$row->id)}}" class="font-weight-bold">
          <!-- <i class="material-icons">edit</i> -->
          Rename
        </a>
      </div>
  </div>
  @endforeach
</div>
@else
<h3 class="bold text-dark" align="center">Enter some modules</h3>
@endif

<div align="right" style="position: fixed;bottom: 30px;right: 30px;">
  <a href="{{ route('admin.modules.create')}}">
    <button class="btn px-5 pt-3" style="background: #1d1b27;color:#fff;">Add new Module
      <img class="pl-3" src="{{ asset('assets/backend/images/right-arrow.png') }}">
    </button>
  </a>
</div>
@endsection