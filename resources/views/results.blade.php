@extends('layout')
@section('content')
	<div class="top-right links">
        <a href="/">Start Over</a>
    </div>
	<h1><b>Results</b></h1>

    <div class="results text-left mt-5">
        <h3>Results</h3>
    	<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4">
            <div class="col mt-4 text-center">
                <div class="card border-dark" style="width: 18rem; height: 12rem;">
                    <div class="card-body">
                        <h5 class="card-title">Your Results</h5>
                        <p class="text-left">
                            <span class="font-weight-bold">Full Name:</span> {{ strtoupper($result['fullname']) }}
                            <br>
                            <span class="font-weight-bold">Ethnicity:</span> {{ strtoupper($result['ethnicity']) }}
                            <br>
                            <span class="font-weight-bold">Ethnicity Probability:</span> {{ strtoupper($result['ethnicity probability']) }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col mt-4 text-center">
                <div class="card border-dark" style="width: 18rem; height: 12rem;">
                    <div class="card-body">
                        <h5 class="card-title">Share Result</h5>
                        <a href="/pdf/{{ $name }}" class="btn btn-default"><i class="fas fa-download fa-3x"></i></a>
                    </div>
                </div>
            </div>
    	</div>
    </div>

    <div class="otherAssets text-left mt-5">
        <h3>Other Assets</h3>
        <div class="row">
            @foreach(File::glob(public_path('files').'/*') as $path)
                <div class="col-sm-12 col-md-6 col-lg-2 mb-5">
                    <div class="card border-0" style="width: 7rem; height: 8rem;">
                        <div class="card-body text-center">
                            <a href="{{ str_replace(public_path(), '', $path) }}" target="_blank" class="btn btn-default">
                                <i class="fas fa-file-alt fa-4x"></i>
                            </a>
                            @php 
                                $parts = explode('/', $path);
                                $fileName = end($parts); 
                            @endphp
                            <p class="text-dark mt-1">{{ $fileName }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection