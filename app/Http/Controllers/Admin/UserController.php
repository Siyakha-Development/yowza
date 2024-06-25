<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Models\UserProfileImage;


class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);

        // Additional permissions
        $additionalPermissions = [
            'user_management_access',
            'user_management_create',
            'user_management_edit',
            'user_management_view',
            'user_management_delete',
            'user_access',
            'user_create',
            'user_edit',
            'user_view',
            'user_delete',
        ];

        $this->middleware('permission:' . implode('|', $additionalPermissions), ['only' => ['index', 'show', 'create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index(): View
    {
        if (!Gate::allows('user_access')) {
            return abort(401);
        }

        $prefix = 'admin';
        return view('admin.users.index', [
            'users' => User::latest('id')->paginate(100),
            'prefix' => $prefix
        ]);
    }

    public function create(): View
    {
        if (!Gate::allows('user_create')) {
            return abort(401);
        }
        //        $roles = Role::get()->pluck('name');
        $roles = Role::all();

        return view('admin.users.create', compact('roles'));
    }

    //    public function store(Request $request)
//    {
//        if (! Gate::allows('user_create')) {
//            return abort(401);
//        }
//        $user = User::create($request->only('name','email') + ['password' => bcrypt($request->password)]);
//        $user->role()->sync(array_filter((array)$request->input('role')));
//
//        return redirect()->route('admin.users.index');
//    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'main_interest_in_yowza' => 'required|in:Business Tool,Business Opportunities,Document Library,Funding/Sponsorship,Marketplace,Training',
            'mobile_number' => 'nullable|string|max:255',
            'landline_number' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female,prefer not to say',
            'ethnics_group' => 'nullable|in:African,White,Coloured,Indian',
            'disability' => 'nullable|string|max:255',
            'nationality' => 'nullable|in:South Africa,Lesotho,Botswana,Zambia,Zimbabwe,Mozambique',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required|array',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'main_interest_in_yowza' => $validatedData['main_interest_in_yowza'],
            'mobile_number' => $validatedData['mobile_number'],
            'landline_number' => $validatedData['landline_number'],
            'gender' => $validatedData['gender'],
            'ethnics_group' => $validatedData['ethnics_group'],
            'disability' => $validatedData['disability'],
            'nationality' => $validatedData['nationality'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),

        ]);

        $user->assignRole($validatedData['roles']);
        $notification = [
            'message' => 'User added successfully',
            'alert-type' => 'info'
        ];

        return redirect()->route('admin.users.index', ['prefix' => 'admin'])->with($notification);
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
    // Show the form for editing the specified user
    // Show the form for editing the specified user
    // Import the User model if not already imported

    public function edit($prefix, $id)
    {

        try {
            $user = User::findOrFail($id); // Find the user by ID
            $roles = Role::all(); // Fetch roles from the database
            $permissions = Permission::all(); // Fetch permissions from the database

            return view('admin.users.edit', compact('user', 'roles', 'permissions'));
        } catch (ModelNotFoundException $e) {
            // If the user is not found, redirect to a 404 page or display an error message
            return abort(404);
        }
    }




    //    public function update(Request $request,User $user)
//    {
//        if (!Gate::allows('user_edit')) {
//            return abort(401);
//        }
//        $user->update($request->only('name', 'email') + ['password' => bcrypt($request->password)]);
//        $user->role()->sync(array_filter((array)$request->input('role')));
//
//        return redirect()->route('admin.users.index');
//
//    }

    public function update($prefix, Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'main_interest_in_yowza' => 'required|in:Business Tool,Business Opportunities,Document Library,Funding/Sponsorship,Marketplace,Training',
            'mobile_number' => 'nullable|string|max:255',
            'landline_number' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female,prefer not to say',
            'ethnics_group' => 'nullable|in:African,White,Coloured,Indian',
            'disability' => 'nullable|string|max:255',
            'nationality' => 'nullable|in:South Africa,Lesotho,Botswana,Zambia,Zimbabwe,Mozambique',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'roles' => 'required|array',
        ]);

        $user->name = $validatedData['name'];
        $user->lastname = $validatedData['lastname'];
        $user->main_interest_in_yowza = $validatedData['main_interest_in_yowza'];
        $user->mobile_number = $validatedData['mobile_number'];
        $user->landline_number = $validatedData['landline_number'];
        $user->gender = $validatedData['gender'];
        $user->ethnics_group = $validatedData['ethnics_group'];
        $user->disability = $validatedData['disability'];
        $user->nationality = $validatedData['nationality'];
        $user->email = $validatedData['email'];
        $user->save();

        // Sync user roles
        $user->syncRoles($validatedData['roles']);

        return redirect()->route('admin.users.index', ['prefix' => 'admin'])->with('success', 'User updated successfully');
    }


    public function editProfile()
    {
        $user = Auth::user();

        $profileImage = UserProfileImage::where('user_id', $user->id)->first();

        return view('users.profile.edit', compact('user', 'profileImage'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'main_interest_in_yowza' => 'required|in:Business Tool,Business Opportunities,Document Library,Funding/Sponsorship,Marketplace,Training',
            'mobile_number' => 'nullable|string|max:255',
            'landline_number' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female,prefer not to say',
            'ethnics_group' => 'nullable|in:African,White,Coloured,Indian',
            'disability' => 'nullable|string|max:255',
            'nationality' => 'nullable|in:South Africa,Lesotho,Botswana,Zambia,Zimbabwe,Mozambique',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Handle the file upload if there is a profile picture in the request

        // Update the user's profile
        $user->update([
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'],
            'main_interest_in_yowza' => $validatedData['main_interest_in_yowza'],
            'mobile_number' => $validatedData['mobile_number'],
            'landline_number' => $validatedData['landline_number'],
            'gender' => $validatedData['gender'],
            'ethnics_group' => $validatedData['ethnics_group'],
            'disability' => $validatedData['disability'],
            'nationality' => $validatedData['nationality'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
        ]);

        // Prepare a notification for the user
        $notification = [
            'message' => 'User profile updated successfully',
            'alert-type' => 'info'
        ];

        // Redirect back with the notification
        return back()->with($notification);
    }


    // public function updateProfile(Request $request)
    // {
    //     $user = Auth::user();

    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'lastname' => 'required|string|max:255',
    //         'main_interest_in_yowza' => 'required|in:Business Tool,Business Opportunities,Document Library,Funding/Sponsorship,Marketplace,Training',
    //         'mobile_number' => 'nullable|string|max:255',
    //         'landline_number' => 'nullable|string|max:255',
    //         'gender' => 'nullable|in:male,female,prefer not to say',
    //         'ethnics_group' => 'nullable|in:African,White,Coloured,Indian',
    //         'disability' => 'nullable|string|max:255',
    //         'nationality' => 'nullable|in:South Africa,Lesotho,Botswana,Zambia,Zimbabwe,Mozambique',
    //         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         'password' => 'nullable|string|min:8|confirmed',
    //         'profile_picture' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     if ($request->hasFile('profile_picture')) {
    //         $file = $request->file('profile_picture');
    //         $filename = date('YmdHi') . $file->getClientOriginalName();
    //         $file->move(public_path('upload/profile_pictures'), $filename);
    //         $user->profile_picture = $filename;
    //     }


    //     $user->update([
    //         'name' => $validatedData['name'],
    //         'lastname' => $validatedData['lastname'],
    //         'main_interest_in_yowza' => $validatedData['main_interest_in_yowza'],
    //         'mobile_number' => $validatedData['mobile_number'],
    //         'landline_number' => $validatedData['landline_number'],
    //         'gender' => $validatedData['gender'],
    //         'ethnics_group' => $validatedData['ethnics_group'],
    //         'disability' => $validatedData['disability'],
    //         'nationality' => $validatedData['nationality'],
    //         'email' => $validatedData['email'],
    //         'password' => $validatedData['password'] ? bcrypt($validatedData['password']) : $user->password,
    //         'profile_picture' => $user->profile_picture,

    //     ]);

    //     $notification = [
    //         'message' => 'User added successfully',
    //         'alert-type' => 'info'
    //     ];

    //     return back()->with($notification);
    // }

    private function isImage(UploadedFile $file)
    {
        $imageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        return in_array($file->getMimeType(), $imageTypes);
    }



    public function destroy(User $user)
    {
        if (!Gate::allows('user_delete')) {
            return abort(401);
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }


}
