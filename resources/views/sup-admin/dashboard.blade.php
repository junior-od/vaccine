@extends('layouts.app')

@section('content')
<div class="page-content-wrapper" style="margin-top: 40px;">
  <div class="page-content text-center">
    <div class="row col-md-10 col-md-offset-1">
    	<div class="row">
    		<div class="col-md-3 col-sm-6 col-xs-12">
    			<div class="info-box bg-aqua">
    				<span class="info-box-icon"><i class="fa fa-users"></i></span>

    				<div class="info-box-content">
    				  <span class="info-box-text">Vaccinated Children</span>
    				  <span class="info-box-number"> {{count($vaccinated)}} </span>

    				  <div class="progress">
    						<div class="progress-bar" style="width: {{func_perc_vac(count($vaccinated))}}%"></div>
    				  </div>
    				  <span class="progress-description">
    					 83, 567
    				  </span>
    				</div>
    			</div>
    		</div>
    		<div class="col-md-3 col-sm-6 col-xs-12">
    			<div class="info-box bg-green">
    			<span class="info-box-icon"><i class="fa fa-user"></i></span>

    			<div class="info-box-content">
    			  <span class="info-box-text">No of Workers</span>
    			  <span class="info-box-number"> 50 </span>

    			  <div class="progress">
    					<div class="progress-bar" style="width: 100%"></div>
    			  </div>
    			  <span class="progress-description">
    				 50
    			  </span>
    			</div>
    			</div>
    		</div>
    		<div class="col-md-3 col-sm-6 col-xs-12">
    			<div class="info-box bg-yellow">
    			<span class="info-box-icon"><i class="fa fa-money"></i></span>

    			<div class="info-box-content">
    			  <span class="info-box-text">Vaccinated Male</span>
    			  <span class="info-box-number">{{count($vaccinated_male)}}</span>

    			  <div class="progress">
    				<div class="progress-bar" style="width: 70%"></div>
    			  </div>
    				  <span class="progress-description">
    					 {{count($vaccinated_male)}}
    				  </span>
    			</div>
    			</div>
    		</div>
    		<div class="col-md-3 col-sm-6 col-xs-12">
    			<div class="info-box bg-red">
    			<span class="info-box-icon"><i class="fa fa-upload"></i></span>

    			<div class="info-box-content">
    			  <span class="info-box-text">Vaccinated Female</span>
    			  <span class="info-box-number"> {{count($vaccinated_female)}} </span>

    			  <div class="progress">
    					<div class="progress-bar" style="width: 100%"></div>
    			  </div>
    			  <span class="progress-description">
    				 {{count($vaccinated_female)}}
    			  </span>
    			</div>
    			</div>
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-md-6">
    			<div class="box box-success">
    				<div class="box-header with-border">
    					<h3 class="box-title">Payment Gateway Performance Analysis</h3>
    				</div>
    				<div class="box-body">
    					<div class="chart">
    						<!-- <canvas id="barChart" style="height:250px"></canvas> -->
    						<div style="width:100%;">
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>

    		<div class="col-md-6">
    			<div class="box box-danger">
    				<div class="box-header with-border">
    					<h3 class="box-title">
            				Volume of transactions per bank
    					</h3>
    					<div class="pull-right">
    						<form method="GET" action="" class="form-inline">
    							<select name="vtpb_range" id="vtpb_range" class="form-control">
    								<option value="">Filter by Date</option>
    								<option value="30">Last 1 month</option>
    								<option value="90">Last 3 months</option>
    								<option value="180">Last 6 monts</option>
    								<option value="460">Last 1 year</option>
    							</select>
    						</form>
    					</div>
    				</div>
    				<div class="box-body">
    					<div class="chart">
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-md-6">
    			 <div class="box box-danger">
          			<div class="box-header with-border">
            			<h3 class="box-title">Volume of Transactions Per Transaction Type</h3>

        			</div>
          			<div class="box-body">
    					<div class="chart">
    						<!-- <canvas id="lineChart" style="height:250px"></canvas> -->
    						<div style="width:100%;" id="tranxPerTranxTypeChart">
    						</div>
    						<div class="table-responsive">
    								<table class="table table-borderless table-striped">
    										<thead>
    												<tr>
    														<th></th>
    														<th>$period['two_years_ago']</th>
    														<th>$period['one_year_ago']</th>
    														<th>$period['current_year']</th>
    												</tr>
    										</thead>
    										<tbody>
    										$tranxPerTranxType_table as $item)
    												<tr>
    														<td> $item->name </td>
    														<td> to_money($item->two_years_ago) </td>
    														<td> to_money($item->one_year_ago) </td>
    														<td> to_money($item->current_year) </td>
    												</tr>

    										</tbody>
    								</table>
    						</div>
    					</div>
         		 	</div>
        		</div>
    		</div>

    		<div class="col-md-6">
    			<div class="box box-primary">
    				<div class="box-header with-border">
    					<h3 class="box-title">Volume Of Transactions Per Payment Gateway
    					</h3>
    				</div>

    				<div class="box-body">
    					<div class="chart">
    						<!-- <canvas id="areaChart" style="height:250px"></canvas> -->
    						<div style="width:100%;" id="tranxPerPaymentGatewayChart">
    						</div>
    						<div class="table-responsive">
    								<table class="table table-borderless table-striped">
    										<thead>
    												<tr>
    														<th></th>
    														<th>$period['two_years_ago']</th>
    														<th>$period['one_year_ago']</th>
    														<th>$period['current_year']</th>
    												</tr>
    										</thead>
    										<tbody>
    									($tranxPerPaymentGateway_table as $item)
    												<tr>
    														<td> $item->name </td>
    														<td> to_money($item->two_years_ago) </td>
    														<td> to_money($item->one_year_ago) </td>
    														<td> to_money($item->current_year) </td>
    												</tr>
    										</tbody>
    								</table>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
	{{ Html::script( 'js/charts_bundle.js' )}}
	{{ Html::script( 'js/chart_utils.js' )}}
	{{ Html::script( 'js/dashboard.js' )}}
@endsection
