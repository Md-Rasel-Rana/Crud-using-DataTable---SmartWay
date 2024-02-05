<?php
namespace App\Http\Controllers;

use App\Models\Demo;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function UserForm(){
        return view('component.Form');
    }
    public function UserSubmitForm(Request $request ){
        //dd($request->all());
    return  Demo::create([
        "FirstName"=>$request->input('FirstName'),
        "LastName"=>$request->input('LastName'),
        "Email"=>$request->input('Email'),
        "Password"=>$request->input('Password'),
      ]);
    }
   
    public function UserData(){
        return Demo::all();
    }
    public function UserDelete($id){
        $element = Demo::findOrFail($id);
        $element->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }

    public function getUser($id) {
       return $user = Demo::findOrFail($id);
       
    }
    
    public function updateUser(Request $request, $id) {
        $user = Demo::findOrFail($id);
        $user->update($request->all());
        return response()->json(['message' => 'User updated successfully']);
    }
    





}
