<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
class UserController extends Controller
{

    protected $userRoleID;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role_id', $this->userRoleID)->get();

        return view('users.index', compact('users'));
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
    public function store(StoreUserRequest $request)
    {
        
        $validatedData =$request->validated();
        
        $user = User::create([
            'name'=> $validatedData['name'],
            'email'=> $validatedData['email'],
            'jmbg' => $validatedData['jmbg'],
            'password'=> Hash::make($validatedData['password']),
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $img_path = Storage::disk('public')->put('Users', $image);
            $user->update(['picture' => $img_path]);
        }


        return redirect()->action([StudentController::class, 'index']);  
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }


}
