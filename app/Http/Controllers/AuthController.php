<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Applicant;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Log;
// use Illuminate\Container\Attributes\Log;
use App\Http\Middleware\RoleManager;
// use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    protected $roleManager;

    public function __construct(RoleManager $roleManager)
    {
        $this->roleManager = $roleManager;
    }

    public function showApplicantRegisterForm()
    {
        return view('auth.register_applicant');
    }

    public function registerApplicant(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',

            'resume' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'skills' => 'required|string|max:255', 
            'education' => 'required|string|max:255', 
            'experience' => 'required|string|max:255', 
            'address' => 'required|string|max:255', 
            'phone' => 'required|string|max:10',
        ]);
    
        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }
    
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 2,
        ]);
    
        Applicant::create([
            'user_id' => $user->id,
            'resume' => $resumePath,
            'skills' => $validated['skills'],
            'education' => $validated['education'],
            'experience' => $validated['experience'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            
        ]);
    
          // Log the user in
          Auth::login($user);
    
          return redirect()->route('applicant.home')->with('success', 'applicant registered successfully!');
    }
    

    // Show registration form for Company
    public function showCompanyRegisterForm()
    {
        return view('auth.register_company');
    }

    public function registerCompany(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // company details
            'com_name' => 'required|string|max:255',  
            'com_email' => 'required|string|email|max:255|unique:companies',
            'com_phone' => 'required|string|max:10',
            'com_address' => 'nullable|string|max:255',
            'com_website' => 'nullable|url',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'com_description' => 'nullable|string',
        ]);
    
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public'); 
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 3,    
        ]);

        Company::create([
            'user_id' => $user->id,
            'com_name' => $validated['com_name'],
            'com_email' => $validated['com_email'],  
            'com_phone' => $validated['com_phone'],
            'com_address' => $validated['com_address'] ?? null,
            'com_website' => $validated['com_website'] ?? null,
            'com_description' => $validated['com_description'] ?? null,
            'logo' => $logoPath,  
        ]);
    
        // Log the user in
        Auth::login($user);
    
        return redirect()->route('company.home')->with('success', 'Company registered successfully!');
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
            'role' => 1,
        ]);

        // Log the user
        Auth::login($user); 

        return redirect()->route('admin.home');
    }

    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

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
