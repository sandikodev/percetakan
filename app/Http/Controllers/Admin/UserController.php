<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
    

class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Superadmin');
    }

    
    public function index(Request $request): View
    {
        $data = User::all();

        return view('users.index',compact('data'));
    }

    

    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();

         return view('users.create',compact('roles'));

    }



    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
        ]);

    

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        
        $role = $request->role;

        $user->assignRole($role);

        return redirect()->route('users.index')

        ->with('success','User created successfully');

    }


    public function show($id): View
    {
        $user = User::find($id);

        return view('users.show',compact('user'));
    }


    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        
        return view('users.edit',compact('user','roles','userRole'));

    }

    

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
        ]);


        $input = $request->all();

        if(!empty($input['password'])){ 

            $input['password'] = Hash::make($input['password']);

        }else{

            $input = Arr::except($input,array('password'));    

        }

    

        $user = User::find($id);

        
    
        if(!empty($request->role)){
            $role = $request->role;
            if($role === 'Admin'){
                $id_role = 1;
            }elseif($role === 'Customer'){
                $id_role = 3;
            }elseif($role === 'Reseller'){
                $id_role = 4;
            }else{
                $id_role = 3;
            }

            $user->roles()->sync([$id_role]);

        }

        $user->update($input);

    
        notify()->success('Users Berhasil diubah!');
        return redirect()->route('users.index')

                        ->with('success','User updated successfully');

    }

    

    public function destroy($id): RedirectResponse
    {

        User::find($id)->delete();

        return redirect()->route('users.index')

        ->with('success','User deleted successfully');
    }


    public function ubah_status_user(Request $request, string $id): RedirectResponse
    {

        $request->validate([
            'is_active'        => 'required|max:255',
        ]);


        $user    = User::find($id);
    

        $user->update([
            'is_active'  => $request->is_active,
        ]);

        notify()->success('Status Users Berhasil diubah!');
        return redirect()->route('users.index');

    }

}