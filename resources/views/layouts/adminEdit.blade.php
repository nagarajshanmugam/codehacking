{!!Form::model($user,['method'=>'PATCH', 'action'=>['AdminController@update',$user->id], 'files'=>true]) !!}

<h1>Edit User</h1>
<div class="col-sm-3">

<img  class="img-responsive img-circle" src="{{$user->photo ? $user->photo->file : "/images/noUser.png"}}" height="50" alt="images" />


</div>
<div class="col-sm-9">
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
{!!Form::select('role_id',$roles,null,['class'=>'form-control']) !!}

</div><br/>

<div class="form-group">
{!!Form::label('is_active', 'Is Active :') !!}
{!!Form::select('is_active',array('1'=>'Active', '0'=>'Not Active'),null,['class'=>'form-control']) !!}

</div><br/>

<div class="form-group">
{!!Form::label('photo_id', 'User Image :') !!}
{!!Form::file('photo_id',null,['class'=>'form-control']) !!}

</div><br/>


<div class="form-group">
{!!Form::label('password', 'Password :') !!}
{!!Form::password('password',['class'=>'form-control']) !!}

</div><br/>

</div>

<div class="form-group">
{!!Form::submit('Create User') !!}
</div>

@include('includes.form_error')

{!!Form::close() !!}