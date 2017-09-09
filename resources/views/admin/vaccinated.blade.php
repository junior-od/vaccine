@extends('layouts.app')

@section('content')
<div class="container pt">
	<div class="row mt">
		<div class="text-center">
			<h3>VACCINATED CHILDREN</h3>
			<hr>
		</div>
	</div>
	<div class="clearfix" style="margin-bottom:30px;">
		<a href="{{ route('register.child.view') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Register Child </a>
	</div>
	<div class="row mt centered">
		<table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="border:solid 1px #d3e0e9;border-bottom: solid 1px #d3e0e9; background-color: white;">
			<thead>
				<tr>
					<th>Name</th>
					<th>Price (₦)</th>
					<th>Quantity</th>
					<th>Category</th>
					<th>Sub-Category</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody class="text-left">
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<a href="" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>
								<a href="" class="trigger_delete btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
							</td>
						</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
