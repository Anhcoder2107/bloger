@extends('templates.default', [
    'title'=>'Home', 
    'email'=>$email, 
    'background_default'=>'background_default'
])



@section('body')
@include('templates.navbar')


<div class="readbook__app">

</div>
@endsection