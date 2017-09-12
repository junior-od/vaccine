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
					<th>Telephone</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody class="text-left">
				@forelse($users as $vac)
						<tr>
							<td>{{ $vac->first_name }}</td>
							<td>{{ $vac->last_name }}</td>
							<td>{{ $vac->email }}</td>
							<td></td>
							<td>{{ $vac->telephone }}</td>
							<td>
								<a href="" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
							</td>
						</tr>
				@empty

				@endforelse
			</tbody>
		</table>
	</div>
</div>
@endsection
