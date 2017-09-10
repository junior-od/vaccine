<div class="row">
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('child_first_name') ? 'has-error' : ''}}">
        {!! Form::label('child_first_name', 'Child First Name', ['class' => 'control-label']) !!}
        {!! Form::text('child_first_name', isset($child) ? $child->child_first_name: null, ['class' => 'form-control']) !!}
        {!! $errors->first('child_first_name', '<p class="help-block">:message</p>') !!}
    </div>
  </div>

  <div class="col-md-6">
      <div class="form-group {{ $errors->has('child_last_name') ? 'has-error' : ''}}">
          {!! Form::label('child_last_name', 'Child Last Name', ['class' => 'control-label']) !!}
          {!! Form::text('child_last_name', isset($child) ? $child->child_last_name: null, ['class' => 'form-control']) !!}
          {!! $errors->first('child_last_name', '<p class="help-block">:message</p>') !!}
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group {{ $errors->has('guardian_first_name') ? 'has-error' : ''}}">
        {!! Form::label('guardian_first_name', 'Guardian First Name', ['class' => 'control-label']) !!}
        {!! Form::text('guardian_first_name', isset($child) ? $child->guardian_first_name: null, ['class' => 'form-control']) !!}
        {!! $errors->first('guardian_first_name', '<p class="help-block">:message</p>') !!}
    </div>
  </div>

  <div class="col-md-6">
      <div class="form-group {{ $errors->has('guardian_last_name') ? 'has-error' : ''}}">
          {!! Form::label('guardian_last_name', 'Guardian Last Name', ['class' => 'control-label']) !!}
          {!! Form::text('guardian_last_name', isset($child) ? $child->guardian_last_name: null, ['class' => 'form-control']) !!}
          {!! $errors->first('guardian_last_name', '<p class="help-block">:message</p>') !!}
      </div>
    </div>
</div>

<div class="row">
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('vaccine_name') ? 'has-error' : ''}}">
          {!! Form::label('vaccine_name', 'Vaccine Name', ['class' => 'control-label']) !!}
          {!! Form::text('vaccine_name', isset($child) ? $child->vaccine_name: null, ['class' => 'form-control']) !!}
          {!! $errors->first('vaccine_name', '<p class="help-block">:message</p>') !!}
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('child_age') ? 'has-error' : ''}}">
          {!! Form::label('child_age', 'Age', ['class' => 'control-label']) !!}
          {!! Form::text('child_age', isset($child) ? $child->child_age: null, ['class' => 'form-control']) !!}
          {!! $errors->first('child_age', '<p class="help-block">:message</p>') !!}
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('contact_phone') ? 'has-error' : ''}}">
          {!! Form::label('contact_phone', 'Contact Phone', ['class' => 'control-label']) !!}
          {!! Form::text('contact_phone', isset($child) ? $child->contact_phone: null, ['class' => 'form-control']) !!}
          {!! $errors->first('contact_phone', '<p class="help-block">:message</p>') !!}
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
          {!! Form::label('sex', 'Sex', ['class' => 'control-label']) !!}
          {!! Form::select('sex', ['male' => 'male', 'female' => 'female'], isset($child) ? $child->sex: null, ['class' => 'form-control']) !!}
          {!! $errors->first('sex', '<p class="help-block">:message</p>') !!}
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('vaccine_given') ? 'has-error' : ''}}">
          {!! Form::label('vaccine_given', 'Vaccine Given', ['class' => 'control-label']) !!}
          {!! Form::select('vaccine_given', [1 => 'Yes', 0 => 'No'], isset($child) ? $child->vaccine_given: null, ['class' => 'form-control']) !!}
          {!! $errors->first('vaccine_given', '<p class="help-block">:message</p>') !!}
      </div>
  </div>
  <div class="col-md-6">
      <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
          {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
          {!! Form::text('address', isset($child) ? $child->address: null, ['class' => 'form-control']) !!}
          {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
      </div>
  </div>
</div>

<div class="form-group">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Update', ['class' => 'btn btn-success']) !!}
</div>
