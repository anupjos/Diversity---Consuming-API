@extends('layout')
@section('content')

	<div class="text-center mt-5">
		<h3>Diversity</h3>
		<p>Determine the gender and ethnicity of a person given their full name. Here's some of the most famous celebrities of all time.</p>
	</div>
	<div class="row">
		<div class="col-md-4 mt-5">
            <a href="/detail/Leonardo">
                <img class="main-image img-responsive rounded-circle" src="\images\Leonardo.jpg">
                <h5 class="text-center text-dark">Leonardo DiCaprio</h5>
            </a>
        </div>
		<div class="col-md-4 mt-5">
			<a href="/detail/Beyonce">
           		<img class="main-image img-responsive rounded-circle" src="\images\Beyonce.jpg">
                <h5 class="text-center text-dark">Beyoncé</h5>
           	</a>
		</div>
		<div class="col-md-4 mt-5">
			<a href="/detail/Tom">
        		<img class="main-image img-responsive rounded-circle" src="\images\Tom.jpg">
                <h5 class="text-center text-dark">Tom Hanks</h5>
        	</a>
		</div>
	</div>
@endsection