<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'main_interest_in_yowza' => ['nullable', 'string', 'in:Business Tool,Business Opportunities,Document Library,Funding/Sponsorship,Marketplace,Training'],
            'mobile_number' => ['nullable', 'string', 'max:255'],
            'landline_number' => ['nullable', 'string', 'max:255'],
            'gender' => ['nullable', 'string', 'in:male,female,prefer not to say'],
            'ethnics_group' => ['nullable', 'string', 'in:African,White,Coloured,Indian'],
            'disability' => ['nullable', 'string', 'max:255'],
            'nationality' => ['nullable', 'string', 'in:South Africa,Lesotho,Botswana,Zambia,Zimbabwe,Mozambique'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'create_workspace' => ['nullable', 'boolean'], // Boolean field indicating whether to create a workspace
            // 'workspace_name' => ['required_if:create_workspace,true', 'string', 'max:255'], // Required if create_workspace is true
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'main_interest_in_yowza' => $data['main_interest_in_yowza'],
            'mobile_number' => $data['mobile_number'],
            'landline_number' => $data['landline_number'],
            'gender' => $data['gender'],
            'ethnics_group' => $data['ethnics_group'],
            'disability' => $data['disability'],
            'nationality' => $data['nationality'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole($data['role']);
        event(new Registered($user));

        return $user;
    }

    public function showRegistrationForm()
    {
//        $roles = Role::all();
        $roles = Role::whereIn('name', ['Individual', 'SMME'])->get();
        return view('auth.register', compact('roles'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // Check if the user opted to create a workspace
        if ($request->has('create_workspace')) {
            return redirect()->route('createWorkspace');
        }

        return redirect($this->redirectPath());
    }
}
