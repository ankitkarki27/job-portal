<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Applicant;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RoleManager;

class AuthController extends Controller
{

    protected $roleManager;

    public function __construct(RoleManager $roleManager)
    {
        $this->roleManager = $roleManager;
    }

    // Show registration form for Applicant
    public function showApplicantRegisterForm()
    {
        return view('auth.register_applicant');
    }

    // Handle registration for Applicant
    public function registerApplicant(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => User::ROLE_APPLICANT,
            // 'role' => 3,
        ]);
    
        Auth::login($user);
    
        return redirect()->route('applicant.home');
    }
    

    // Show registration form for Company
    public function showCompanyRegisterForm()
    {
        return view('auth.register_company');
    }

    // Handle registration for Company
    public function registerCompany(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'company_name' => 'required|string|max:255',
            'company_address' => 'nullable|string|max:255',
            'company_phone' => 'nullable|string|max:20',
            'company_website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
           // Handle logo upload if it exists
            $logoPath = null;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public'); // Store logo in public/logos
            }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 3, // Company role is 3
        ]);

        // Create the Company
            Company::create([
                'user_id' => $user->id,
                'name' => $validated['company_name'],  // Add company name
                'address' => $validated['company_address'],  // Add company address
                'phone' => $validated['company_phone'],  // Add company phone number
                'website' => $validated['company_website'],  // Add company website
                'logo' => $logoPath,  
            ]);

        // Log the user in using the auth helper
        Auth::login($user); 

        return redirect()->route('company.home');
    }

    // Show registration form for Admin
    public function showAdminRegisterForm()
    {
        return view('auth.register_admin');
    }

    // Handle registration for Admin
    public function registerAdmin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 1, // Admin role is 1
        ]);

        // Log the user in using the auth helper
        Auth::login($user); 

        return redirect()->route('admin.home');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;

            // Redirect based on role
            switch ($role) {
                case 1:
                    return redirect()->route('admin.home');
                case 2:
                    return redirect()->route('applicant.home');
                case 3:
                    return redirect()->route('company.home');
            }
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }
}
