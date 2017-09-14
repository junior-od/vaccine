@extends('layouts.app')

@section('content')
<div class="container pt">
	<div class="row mt">
		<div class="text-center">
			<h3>REGISTERED CHILDREN</h3>
			<hr>
		</div>
	</div>
	@if (get_user_role() == 'Admin')
	<div class="clearfix" style="margin-bottom:30px;">
		<a href="{{ route('register.child.view') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Register Child </a>
	</div>
	@endif

	<div class="row mt centered">
		<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="border:solid 1px #d3e0e9;border-bottom: solid 1px #d3e0e9; background-color: white;">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Guardian First Name</th>
					<th>Guardian Last Name</th>
					<th>Child Age</th>
					<th>Gender</th>
					<th>Contact Phone</th>
					<th>Address</th>
					<th>Vaccine Name</th>
					<th>Vaccine Given</th>
					<th>Register Date</th>
					<th>Reported By</th>
					@if (get_user_role() == 'Admin')
					<th>Action</th>
					@endif
				</tr>
			</thead>
			<tbody class="text-left">
				@forelse($registered as $vac)
						<tr>
							<td>{{ $vac->child_first_name }}</td>
							<td>{{ $vac->child_last_name }}</td>
							<td>{{ $vac->guardian_first_name }}</td>
							<td>{{ $vac->guardian_last_name }}</td>
							<td>{{ $vac->child_age }}</td>
							<td>{{ $vac->sex }}</td>
							<td>{{ $vac->contact_phone }}</td>
							<td>{{ $vac->address }}</td>
							<td>{{ $vac->vaccine_name }}</td>
							<td>@if($vac->vaccine_given == true) Yes @else No @endif</td>
							<td> {{ date('d M Y' , strtotime($vac->created_at)) }}
							<td>{{ func_username($vac->reported_by) }}</td>
							@if (get_user_role() == 'Admin')
							<td>
								<a href="{{ route('edit.child.view', ['id' => $vac->id]) }}" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
							</td>
							@endif
						</tr>
				@empty

				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection
