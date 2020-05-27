<h1>Members List</h1>

<table width="50%" border="1" style="border-collapse:collapse">
<thead>
<th>UserName</th>
<th>UserImages</th>
<th>Role</th>
<th>Email</th>
<th>IsActive</th>
</thead>
<tbody>
@if(count($users))
@foreach($users as $user)
<tr>
<td><a href="{{route('admin.edit', $user->id)}}">{{$user->name}}</a></td>
<td align="center"><img height="50" src="{{$user->photo ? $user->photo->file : '/images/noUser.png'}}" alt="" /></td>
<td>{{$user->role->name}}</td>
<!--<td>{{!empty($user->role) ? $user->role->name:'No Role'}}</td> -->
<td>{{$user->email}}</td>
<td>{{$user->is_active}}</td>
</tr>
@endforeach
@endif
</tbody>
</table>