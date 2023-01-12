<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        $admin = Auth::user();
        $role = $admin['role'];

        if ($role == "Toko Admin") {
            return  UserResource::collection($user);
        }
        return new UserResource($admin);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        //dd($request['password']);
        $auth = Auth::user()->role;

        if ($auth == "Toko Admin") {
            $request['password'] = Hash::make($request['password']);
            $user = User::create($request->all());

            return new UserResource($user);
        } else {
            return response()->json(["message" => "Your Not Super Admin"]);
        }
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'role' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $auth = Auth::user()->role;

        if ($auth == "Toko Admin") {
            $user = User::findOrFail($id);
            $data['password'] = Hash::make($data['password']);
            //dd($user);
            $user->update($data);

            return new UserResource($user);
        }

        return response()->json(["message" => "Your Not Super Admin"]);
    }

    public function destroy($id)
    {
        $auth = Auth::user()->role;

        if ($auth == "Toko Admin") {
            $user = User::findOrFail($id);
            $user->delete();

            $data = new UserResource($user);

            return response()->json([
                "message" => "Successfull Deleted Account",
                "username" => $data['username']
            ]);
        }
    }
}
