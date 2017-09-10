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
    			  <span class="info-box-text">Active Workers</span>
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
    			<span class="info-box-icon"><i class="fa fa-male"></i></span>

    			<div class="info-box-content">
    			  <span class="info-box-text">Registered Male</span>
    			  <span class="info-box-number">{{count($male)}}</span>

    			  <div class="progress">
    				<div class="progress-bar" style="width: {{func_perc_gender(count($female))}}%"></div>
    			  </div>
    				  <span class="progress-description">
    					 60,000
    				  </span>
    			</div>
    			</div>
    		</div>
    		<div class="col-md-3 col-sm-6 col-xs-12">
    			<div class="info-box bg-red">
    			<span class="info-box-icon"><i class="fa fa-female"></i></span>

    			<div class="info-box-content">
    			  <span class="info-box-text">Registered Female</span>
    			  <span class="info-box-number"> {{count($female)}} </span>

    			  <div class="progress">
    					<div class="progress-bar" style="width: {{func_perc_gender(count($female))}}%"></div>
    			  </div>
    			  <span class="progress-description">
    				 60,000
    			  </span>
    			</div>
    			</div>
    		</div>
    	</div>

    	<div class="row">
    		<div class="col-md-6">
    			<div class="box box-success">
    				<div class="box-header with-border">
    					<h3 class="box-title">Performance By Gender Analysis</h3>
    				</div>
    				<div class="box-body">
    					<div class="chart">
    						<!-- <canvas id="barChart" style="height:250px"></canvas> -->
    						<div style="width:100%;">
                  {!! $performanceByGender->render() !!}
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>

    		<div class="col-md-6">
    			<div class="box box-danger">
    				<div class="box-header with-border">
    					<h3 class="box-title">
            				Performance By Daily Target
    					</h3>
              <div class="box-body">
                <div class="chart">
                  <!-- <canvas id="barChart" style="height:250px"></canvas> -->
                  <div style="width:100%;">
                    {!! $performanceByDailyTarget->render() !!}
                  </div>
                </div>
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
            			<h3 class="box-title">Performance By Total Registration</h3>
        			</div>
          		<div class="box-body">
      					<div class="chart">
      						<!-- <canvas id="lineChart" style="height:250px"></canvas> -->
      						<div style="width:100%;">
                    {!! $performanceByTotalReg->render() !!}
      						</div>
      					</div>
         		 	</div>
        		</div>
    		</div>

    		<div class="col-md-6">
    			<div class="box box-primary">
    				<div class="box-header with-border">
    					<h3 class="box-title">Performance For Last Three Days
    					</h3>
    				</div>

    				<div class="box-body">
    					<div class="chart">
    						<!-- <canvas id="areaChart" style="height:250px"></canvas> -->
    						<div style="width:100%;">
                  {!! $performanceForLastThreeDays->render() !!}
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
