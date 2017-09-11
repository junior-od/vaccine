@extends('layouts.app')

@section('content')
<div class="row col-md-10 col-md-offset-1">
  <div class="row">
      <div class="text-center">
				<h3>API CALLS</h3>
				<hr>
			</div>
      <div class="col-md-12">
          <div class="box box-primary">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Call Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> # </td>
                            <td> Completion Status </td>
                            <td>
                                <a class="api_call" name="register_status" title="Make API Call">
                                    <button class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Make API Call
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td> # </td>
                            <td> Registered Male </td>
                            <td>
                                <a class="api_call" name='registered_male' title="Make API Call">
                                    <button class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Make API Call
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td> # </td>
                            <td> Registered Female </td>
                            <td>
                                <a class="api_call" name='registered_female' title="Make API Call">
                                    <button class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Make API Call
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td> # </td>
                            <td> Registered Today </td>
                            <td>
                                <a class="api_call" name='total_registrations_today' title="Make API Call">
                                    <button class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Make API Call
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td> # </td>
                            <td> Vaccine Given </td>
                            <td>
                                <a class="api_call" name='vaccinated_children' title="Make API Call">
                                    <button class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Make API Call
                                    </button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
          </div>
      </div>
  </div>
</div>
<div id="api_response">

</div>
@endsection

@section('scripts')
{{ Html::script( 'js/api_call.js' )}}
@endsection
