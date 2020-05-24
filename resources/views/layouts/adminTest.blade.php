{!!Form::open(['method'=>'POST', 'action'=>'AdminController@store', 'files'=>true]) !!}

<div class="form-group">
{!!Form::label('name', 'User Name :') !!}
{!!Form::text('name',null,['class'=>'form-control']) !!}

</div><br/>

<div class="form-group">
{!!Form::label('email', 'Email :') !!}
{!!Form::email('email',null,['class'=>'form-control']) !!}

</div><br/>

<div class="form-group">
{!!Form::label('role_id', 'Role :') !!}
{!!Form::select('role_id',[''=>'Choose the Role']+$roles,null,['class'=>'form-control']) !!}

</div><br/>

<div class="form-group">
{!!Form::label('is_active', 'Is Active :') !!}
{!!Form::select('is_active',array('1'=>'Active', '0'=>'Not Active'),0,['class'=>'form-control']) !!}

</div><br/>
<div class="form-group">

{!!Form::label('file', 'User Image :') !!}
{!!Form::file('file',null,['class'=>'form-control']) !!}

</div><br/>

<div class="form-group">
{!!Form::label('password', 'Password :') !!}
{!!Form::password('password',['class'=>'form-control']) !!}

</div><br/>


<div class="form-group">
{!!Form::submit('Create User') !!}
</div>

@if(count($errors))
<div class="alert alert-danger">
<ui>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ui>
</div>
@endif

{!!Form::close() !!}