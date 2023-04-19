<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\users;

class user extends Controller
{
    public function allUsers(){
        $users =
        DB::table('users')
        ->select ('id')
        ->get();
        return response()->json($users,200);
    }
    public function users($id){
        $user = DB::table('users')
            ->where('id', $id)
            ->get();
        return response()->json($user, 201);
    }
    public function delete($id){

        $user = DB::table('users')->where('id', $id)->exists();
        if ($user) {
            $deleteCustomer = DB::table('users')->where('id', $id)->delete();
            return response()->json(['successfully' => "El usuario fue eliminada" ], 201);
        } else {
            return response()->json(['error' => 'No existe ese id del usuario'], 401, []);
        }
    }
    public function create(Request $request)
    {
        $data = $request->json()->all();
        $create = new users();
        $create->usuario = $data['usuario'];
        $create->name = $data['name'];
        $create->lastname = $data['lastname'];
        $create->email = $data['email'];
        $create->phone = $data['phone'];
        $create->age = $data['age'];
        $create->used = $data['used'];
        $create->password = $data['password'];
        $create->save();
        
        return response()->json($create, 201);
    }
    public function update(Request $request, $id)
    {

        $data = $request->json()->all();
        $update = users::find($id);
        $update->usuario = $data['usuario'];
        $update->name = $data['name'];
        $update->lastname = $data['lastname'];
        $update->email = $data['email'];
        $update->phone = $data['phone'];
        $update->age = $data['age'];
        $update->used = $data['used'];
        $update->password = $data['password'];
        $update->save();
        return response()->json($update, 201);
    }
}
