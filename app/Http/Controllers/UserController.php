<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('adminResources', User::class);
        $users = User::all();

        return response()->json($users);

    }

    /**
     * @param RegisterRequest $request
     * 
     * @return [type]
     */
    public function store(RegisterRequest $request)
    {
        $this->authorize('adminResources', User::class);

        try 
        {
            $request->validated();

            $password = Hash::make($request->password);
            $userData = array(
                'email' => $request->email,
                'password' => $password,
                'name' => $request->name,
                'last_name' => $request->last_name
            );
            if ($request->role_id) 
            {
                $userData['role_id'] = $request->role_id;
            }

            User::create($userData);
        } 
        catch (\Throwable $th) 
        {
            abort(400, $th->getMessage());
        }

        return response()->json(['message'=> 'User created successfully'], 201);
    }

    public function show(int $id)
    {
        $this->authorize('adminResources', User::class);

        try 
        {   
            $user = User::where('id', $id)->first();
            // $user->makeVisible('password');
        } 
        catch (\Throwable $th) 
        {
            abort(400, $th->getMessage());
        }
    
        return $user ? response()->json($user) : response()->json(['message'=>'User with id = '.$id.' not found'], 400);
    }

    public function adminUpdate(int $id, RegisterRequest $request)
    {
        $this->authorize('adminResources', User::class);

        try 
        {
            $request->validated();

            $password = Hash::make($request->password);
            $userData = array(
                'email' => $request->email,
                'password' => $password,
                'name' => $request->name,
                'last_name' => $request->last_name
            );
            if ($request->role_id) 
            {
                $userData['role_id'] = $request->role_id;
            }

            User::where('id', $id)->update($userData);
        } 
        catch (\Throwable $th) 
        {
            abort(400, $th->getMessage());
        }
    }
}
