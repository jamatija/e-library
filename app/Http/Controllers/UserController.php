<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
class UserController extends BaseController
{

    protected $userRoleID;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::where('role_id', $this->userRoleID);

        $users = $this->processIndexData($request, $query);

        //Variables for view
        $roleName = Role::find($this->userRoleID)->name;
        $resource = strtolower($roleName);
        $resourcePlural = strtolower($roleName) . 's';

        return view('users.index', compact('users', 'resource', 'resourcePlural'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roleName = Role::find($this->userRoleID)->name;
        
        $role = $this->userRoleID;
        $resource = strtolower($roleName);
        $resourcePlural = strtolower($roleName) . 's';

        return view('users.create', compact('resource', 'resourcePlural', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        
        $validatedData =$request->validated();
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $photoPath = Storage::disk('public')->put('users', $file);
            $validatedData['picture'] = $photoPath;
        }
    

        $user = new User();
        $user->role_id = $validatedData['type_of_user'];
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->jmbg = $validatedData['jmbg'];
        $user->picture = $validatedData['picture'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();  
       
        //Get class name, generate route 
        $roleName = Role::find($validatedData['type_of_user'])->name;
        $resource = strtolower($roleName) . 's';
        return redirect()->route($resource.'.index');  
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
 
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();    

        $roleName = Role::find($user->role_id)->name;
        $resource = strtolower($roleName) . 's';

        return redirect()->route($resource.'.index');    
    }



}
