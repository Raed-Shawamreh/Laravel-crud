<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::all();
        $count_user11=$user->count();
       return view('users.index',['my_users'=>User::all(), 'count_user'=>$count_user11]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=>'required|string|max:100',
            'email'=>'required|email|unique:users',
            'country'=>'string|max:20',
            'password' => [
            'required',
            'min:8',
            'regex:/[A-Z]/', // must contain at least one uppercase letter
            'regex:/[@$!%*?&#]/' // must contain a special character
             ],      
        ];
        $messages=[
            'name.required'=>'the name is required ya 7ob',
            'name.string'=>'Name must be string',
            'name.max'=>'Name must be less than 100 characters',
            'email.required'=>'Email is required',
            'email.email'=>'Email must be valid',
            'email.unique'=>'Email must be unique',
            'country.string'=>'Country must be string',
            'country.max'=>'Country must be less than 20 characters',
            'password.required' => 'Password is required',
            'password.string' => 'Password must be a string',
            'password.min' => 'Password must be at least 8 characters ya teezi',
            'password.regex' => 'Password must contain at least one uppercase letter and one special character',
    ];
        $request->validate($rules,$messages);
  
        $usetaler=User::create([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'country'=>$request->input('country'),
        'password'=>bcrypt($request->input('password'))]);
        return redirect()->route('users.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
       
     return view('users.show', ['userShow' =>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        

        return view('users.edit',['userEdit'=>User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules=[
            'name'=>'required|string|max:100',
            'country'=>'string|max:20',      
        ];
        $messages=[
            'name.required'=>'the name is required ya 7ob',
            'name.string'=>'Name must be string',
            'name.max'=>'Name must be less than 100 characters',
            'country.string'=>'Country must be string',
            'country.max'=>'Country must be less than 20 characters',
    ];
        $request->validate($rules,$messages);


        $input=$request->all();
        $input['name']=strip_tags($input['name']);
        $input['country']=strip_tags($input['country']);

        $user=user::FindOrFail($id);
        if(!$user)
        {
           return redirect()->route('users.index')->withErrors('the user not found');
        }
        $user->name=$input['name'];
        $user->country=$input['country'];
        $user->save();
        return redirect()->route("users.index")->with('success','Edit Successful' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=user::find($id);
        $user->delete();
       
        return redirect()->route("users.index")->with('success','Deleted Successful' );

    }
}
