<div class="row">
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
        {!! Form::label('first_name', 'First Name', ['class' => 'control-label']) !!}
        {!! Form::text('first_name', isset($user) ? $user->first_name: null, ['class' => 'form-control']) !!}
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
  </div>

  <div class="col-md-6">
      <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
          {!! Form::label('last_name', 'Last Name', ['class' => 'control-label']) !!}
          {!! Form::text('last_name', isset($user) ? $user->last_name: null, ['class' => 'form-control']) !!}
          {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
        {!! Form::email('email', isset($user) ? $user->email: null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
          {!! Form::label('telephone', 'Telephone', ['class' => 'control-label']) !!}
          {!! Form::text('telephone', isset($user) ? $user->telephone: null, ['class' => 'form-control']) !!}
          {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('wages') ? 'has-error' : ''}}">
            {!! Form::label('wages', 'Wage ($/HR)', ['class' => 'control-label']) !!}
            {!! Form::number('wages', isset($shift) ? $shift->wage_per_hour: null, ['class' => 'form-control']) !!}
            {!! $errors->first('wages', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('shift_from') ? 'has-error' : ''}}">
          {!! Form::label('shift_from', 'Shift From', ['class' => 'control-label']) !!}
          {!! Form::text('shift_from', isset($shift) ? $shift->from: null, ['class' => 'form-control']) !!}
          {!! $errors->first('shift_from', '<p class="help-block">:message</p>') !!}
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('shift_to') ? 'has-error' : ''}}">
          {!! Form::label('shift_to', 'Shift To', ['class' => 'control-label']) !!}
          {!! Form::text('shift_to', isset($shift) ? $shift->to: null, ['class' => 'form-control']) !!}
          {!! $errors->first('shift_to', '<p class="help-block">:message</p>') !!}
      </div>
  </div>
</div>

<div class="form-group">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Save', ['class' => 'btn btn-success']) !!}
</div>
