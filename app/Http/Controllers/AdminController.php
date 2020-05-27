<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use App\Http\Requests\UsersEditRequest;

use App\User;
use App\Role;
use App\Photo;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		//return view('layouts.adminTest');
		
		//$role = App\Role::all();
		$users = User::all();
		//dd($users);
		return view('layouts.adminIndex', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		$roles = Role::pluck('name','id')->all();
		return view('layouts.adminTest', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
		// User::create($request->all());
		if(trim($request->password) == ''){
		
		$input = $request->except('password');
		
		}else{
		
		$input = $request->all();
		
		}
		//$input = $request->all();
		//dd($input);
		if($file = $request->file('photo_id')){
		
		//return ('photo exists');
		$name = time().$file->getClientOriginalName();
		
		$file->move('images',$name);
		
		$photo = Photo::create(['file'=>$name]);
		
		$input['photo_id'] = $photo->id;
		
		}
		
		User::create($input);
		
		return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$roles = Role::pluck('name','id')->all();
		$user = User::find($id);
		return  view('layouts.adminEdit', compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
		//return $request->all();
		
		$user = User::findOrFail($id);
		if(trim($request->password) == ''){
		
		$input = $request->except('password');
		
		}else{
		
		$input = $request->all();
		
		}
		
		if($file=$request->file('photo_id')){
		
		$name = time().$file->getClientOriginalName();
		
		$file ->move('images', $name);
		
		$photo = Photo::create(['file'=>$name]);
		
		$input['photo_id'] = $photo->id;
		}
		
		$user->update($input);
		return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
