@extends('layouts.app')

@section('content')
<div class="container pt">
	<div class="row mt">
		<div class="text-center">
			<h3>ADMIN USERS</h3>
			<hr>
		</div>
	</div>

	<div class="row mt centered">
		<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="border:solid 1px #d3e0e9;border-bottom: solid 1px #d3e0e9; background-color: white;">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Shift Time</th>
					<th>Wages ($/HR)</th>
					<th>Register Count</th>
					<th>Telephone</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody class="text-left">
				@forelse($users as $vac)
						<tr>
							<td>{{ $vac->first_name }}</td>
							<td>{{ $vac->last_name }}</td>
							<td>{{ $vac->email }}</td>
							<td>{{ user_working_hours($vac->id) }}</td>
							<td>{{ func_user_wage($vac->id) }}</td>
							<td> {{ func_user_reg_count($vac->id) }}
							<td>{{ $vac->telephone }}</td>
							<td id="status">@if($vac->active == true) ACTIVE @else INACTIVE @endif</td>
							<td>
								<a href="{{ route('super.edit.user', ['id' => $vac->id] ) }}" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
								
								@if($vac->active == true)
								<a href="" class="btn btn-danger btn-xs toggle_user" id="{{ $vac->id }}" data-toogle="tooltip" data-placement="top" title="DeActivate"><i class="" ></i>Deactivate</a>
								@else
								<a href="" class="btn btn-success btn-xs toggle_user" id="{{ $vac->id }}" data-toogle="tooltip" data-placement="top" title="Activate"><i class="" ></i>Activate</a>
							    @endif
							</td>
						</tr>
				@empty

				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('scripts')
{{ Html::script('js/toogle_status.js') }}
@endsection

