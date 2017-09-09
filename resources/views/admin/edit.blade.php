@extends('layouts.app')

@section('content')
	<div class="container">
			<div class="row mt">
				<div class="text-center">
					<h3>Edit Child Details</h3>
					<hr>
				</div>
			</div>
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	              <div class="panel-heading">xx</div>
	                <div class="panel-body">

                    {!! Form::open(['method' => 'POST', 'url' => ('admin/update/'. $child->id)]) !!}

    									@include ('admin.partials.form')

    								{!! Form::close() !!}

            	</div>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection
