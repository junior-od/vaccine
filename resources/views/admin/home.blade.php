@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row mt">
      <div class="text-center">
        <h3>Menu</h3>
        <hr>
      </div>
    </div>
</div>
<div class="page-content-wrapper" style="margin-top: 40px;">
  <div class="page-content text-center">
    <div class="row col-md-10 col-md-offset-2">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
        <div class="dashboard-stat blue-madison">
          <div class="visual">
            <i class="fa fa-users"></i>
          </div>
          <div class="details">
            <div class="number">
              {{ count($registered) }}
            </div>
            <div class="desc">
              Registered Children (By me)
            </div>
          </div>
          <a class="more" href="{{ route('registered.child.view') }}">
            Select <i class="m-icon-swapright m-icon-white"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
        <div class="dashboard-stat green-haze">
          <div class="visual">
            <i class="fa fa-plus-square"></i>
          </div>
          <div class="details">
            <div class="number">

            </div>
            <div class="desc">
              Register Child
            </div>
          </div>
          <a class="more" href="{{ route('register.child.view') }}">
            Select <i class="m-icon-swapright m-icon-white"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="clearfix">
    </div>
 </div>
</div>

@endsection
