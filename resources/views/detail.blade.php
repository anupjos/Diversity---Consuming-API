@extends('layout')
@section('content')
	<div class="top-right links">
        <a href="/">Go Back</a>
        <a href="/result/{{ $name }}">Finish</a>
    </div>
	<h1><b>Details of {{ $name }}</b></h1>

	<div class="row justify-content-center">
		<div class="col-lg-6 mt-5">
            <img class="cover-image img-responsive" src="\images\{{ $name }}.jpg">
            <p class="text-justify text-dark mt-3">
               	{{$description}}
            </p>
        </div>
	</div>
@endsection