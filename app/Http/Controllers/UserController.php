<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Settings\ServiceController as OS;

use Illuminate\Http\Request;
//use App\Models\Useer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $users = User::all()->sortBy('id');
        foreach ($users as $user){
        if ($user->id != '1'){
        $user['first_name'] = $user->first_name;
        $user['last_name']= $user->last_name;
        $user['birthday' ]= $user->birthday;     
        $user['address']= $user->address;
        $user['param_city']  = $user->param_city;
        $user['type_user'] = $user ->type_user ;
        $user['email'] =   $user -> email;  
        $user['image'] =   $user -> image;  
        $user['password'] = $user ->password ;
        $user['param_rol']= $user ->param_rol ;
        $user ['gender'] =$user ->gender ;
        $user['param_state']=$user ->param_state ;
        $data[] = $user; 
        } 
        
          
        }
        return OS::frontendResponse('200','success', $data, null); ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user=new User; 
        $user->first_name = $request->first_name ;
        $user->last_name= $request ->last_name ;
        $user->birthday= $request-> birthday  ;
        $user->address= $request-> address  ;
        $user->param_city = $request-> param_city   ;
        $user->type_user= $request-> type_user  ;
        $user->email= $request-> email   ;
        $user->password= $request-> password   ;
        $user->param_rol = $request-> param_rol     ;
        $user ->gender = $request->gender ;
        $user->param_state= $request-> param_state   ;
        $user-> save ();    // save
        $data=[
          'message' => 'User created successfully',
          'User' => $user,
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
            'res'=> true,
            'user'=>$user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
     //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->first_name = $request -> first_name ;
        $user->last_name= $request ->last_name ;
        $user->birthday= $request-> birthday  ;
        $user->address= $request-> address  ;
        $user->param_city = $request-> param_city   ;
        $user->param_rol = $request-> param_rol     ;
        $user->param_state= $request-> param_state   ;
        $user->type_user= $request-> type_user  ;
        $user->email= $request-> email   ;
        $user->gender= $request-> gender   ;
        $user->password= $request-> password   ;
        $user-> save ();    // save
        $data=[
          'message' => 'User updated successfully',
          'User' => $user,
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
      $user->delete();
        $data = [
            'message' => 'User deleted successfully',
            'User' => $user
        ];
        return response()->json($data);
    }
}
