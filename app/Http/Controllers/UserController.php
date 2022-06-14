<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Role;
use App\Models\Subscription;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{

    // public function __construct() {
    //     $this->middleware('auth')->except('allclient');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('subscriptions', 'role')->get();
        return view('admin.users.index', compact('users'));
    }

    //CLIENTELE MAY BE MOVE TO SEPARATE MODULE LATER
    public function clients()
    {
        $users = User::where('role_id', 2)->with('subscriptions', 'role', 'photos')->get();
        return view('admin.clientele.index', compact('users'));
    }

    public function clientEdit(User $user)
    {
        return view('admin.clientele.edit', compact('user'));
    }

    public function clientUpdate(Request $request, User $user)
    {
        $request->validate([
            'company_name' => 'required|string',
            'phone' => 'required|regex:/(0)[0-9]{10}/|unique:users,phone,'.$user->id,
            'company_address' => 'required|string',
            'photo' =>  'bail|image|mimes:jpg,png,jpeg|max:5120',
        ]);

        try {
            $inputs = [
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'phone' => $request->phone,
            ];

            if ($file = $request->file('photo')) {

                $name = date('Y_m_d_his') . $file->getClientOriginalName();
                if($user->photos()->exists()){
                    //delete
                    unlink(public_path().'/images/users/'.$user->photos[0]->name);
                    $user->photos()->delete();
                }
                    //update
                    $user->photos()->create(['name' => $name]);
                    $file->move(public_path() . '/images/users', $name);
                
            }

            if($user->update($inputs))
                return back()->with('status', 'Client updated successfully');

            return back()->with('error', 'Unable to update Client!'); 
        } catch (Exception $ex) {
            return back()->with('error', 'Something went wrong! ' . $ex->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    public function subscriptions(User $user)
    {
        $subscriptions = Subscription::where('user_id', $user->id)->with(['pricing', 'creator', 'user', 'service'])->get();
        return view('admin.users.subscription', compact('subscriptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'phone' => $request->phone,
                'role_id' => $request->role,
                'password' => Hash::make($request->password),
            ]);

            return back()->with('status', 'User created successfully');
        } catch (Exception $ex) {
            return back()->with('error', 'Something went wrong! ' . $ex->getMessage());
        }
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
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'required|string',
            'role' => 'required|numeric',
            'phone' => 'required|regex:/(0)[0-9]{10}/|unique:users,phone,'.$user->id,
            'company_address' => 'required|string',
            'password' => ['nullable',Rules\Password::defaults()],
        ]);

        try {
            $inputs = [
                'name' => $request->name,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'phone' => $request->phone,
                'role_id' => $request->role,
            ];

            if ($request->password) {
                $inputs['password'] = Hash::make($request->password);
            }

            if($user->update($inputs))
                return back()->with('status', 'User updated successfully');

            return back()->with('error', 'Unable to update user!'); 
        } catch (Exception $ex) {
            return back()->with('error', 'Something went wrong! ' . $ex->getMessage());
        }
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
