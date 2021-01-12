<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use App\Person;

class UserController extends Controller
{
    use HasRoles;
    
    public function index()
    {
        $users = User::orderBy('name')->where('status','<','2')->get();

        return view('users.index', compact("users"));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'role' => 'required',
            'email' => 'string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->is_admin = 'TRUE';
        $user->password = Hash::make($request->password);
        $user->save();

        $user->syncRoles($request->role);

        session()->flash("alert-success", "User created successfully!");
        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'name1' => 'required|string|max:100',
            'role1' => 'required',
        ]);


        $user = User::findOrFail($request->UserID);
        $user->name = $request->name1;
        $user->mobile = $request->mobile1;
        $user->save();

        $user->syncRoles($request->role1);

        session()->flash("alert-success", "User updated successfully!");
        return back();
    }


    public function deActivate(Request $request)
    {
      
        if ($request->status == 1) {
            $user = new User;
            $user = User::findOrFail($request->userid);
            $user->status = 0;
            $user->save();

            session()->flash("alert-success", "User de-activated successfully!");
            return redirect()->route('users.index');
        }
        if ($request->status == 0) {
            $user = new User;
            $user = User::findOrFail($request->userid);
            $user->status = 1;
            $user->save();

            session()->flash("alert-success", "User activated successfully!");
            return redirect()->route('users.index');

        }

    }

    public function changePasswordForm()
    {
        return view('users.change_password');
    }
    
    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->current_password, Auth::user()->password))) {
            //The passwords matches
            session()->flash("alert-danger", "Your current password does not matches with the password you provided. Please try again.");
            return redirect()->back();
        }
 
        if(strcmp($request->current_password, $request->new_password) == 0){
            //Current password and new password are same
            session()->flash("alert-danger", "New Password cannot be same as your current password. Please choose a different password.");
            return redirect()->back();
        }
 
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();
        
        session()->flash("alert-success","Password changed successfully !");
        return redirect()->back();
       
    }


    public function getRoleID(Request $request)
    {
        $data = DB::table('se_roles')
            ->select('id')
            ->where('name', $request->role)
            ->get();

        return $data[0]->id;
    }

    public function search(Request $request){
        if ($request->status == '0'){
            $users = User::all();
        }
        if ($request->status == '1'){
            $users = User::where('status',1)->get();
        }
        if ($request->status == '2'){
            $users = User::where('status',0)->get();
        }

        $request->flash();

        return view('users.index', compact("users"));

    }


    public function pending_users()
    {
        $users = User::orderBy('name')->where('status','2')->get();

        return view('users.pending', compact("users"));
    }

    public function approve(Request $request)
    {
        $user = new User;
        $user = User::findOrFail($request->userid);

        //save person profile
        $person = new Person;
        $person->name = $user->name;
        $person->email = $user->email;
        $person->mobile_phone = $user->mobile;
        $person->status = 1;
        $person->position_id = 1;
        $person->created_by = Auth::user()->id;
        $person->updated_by = Auth::user()->id;
        $person->save();


        $user->status = 1;
        $user->person_id = $person->id;
        $user->save();

        session()->flash("alert-success", "User Approved successfully!");
        return redirect()->route('users.pending');

    }

}
