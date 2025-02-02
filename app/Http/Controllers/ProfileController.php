<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Applicant;
use App\Models\Company;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show profile page
    public function index()
    {
        $user = Auth::user();
        $profile = $this->getProfile($user);
        
        // Return role-specific view
        return $user->role === 2 
            ? view('applicant.profile.index', compact('user', 'profile'))
            : view('company.profile.index', compact('user', 'profile'));
    }

    // Show edit form
    public function edit()
    {
        $user = Auth::user();
        $profile = $this->getProfile($user);
        
        // Return role-specific edit view
        return $user->role === 2
            ? view('applicant.profile.edit', compact('user', 'profile'))
            : view('company.profile.edit', compact('user', 'profile'));
    }

    // Update profile information
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|max:255|unique:users,email,{$user->id}",
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update(array_filter([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => !empty($validatedData['password']) ? Hash::make($validatedData['password']) : null,
        ]));

        if ($user->role == 2) {
            $this->updateApplicant($request, $user);
        } elseif ($user->role == 3) {
            $this->updateCompany($request, $user);
        }

        // Redirect to role-specific profile page
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    // Show delete confirmation page
    public function confirmDelete()
    {
        $user = Auth::user();
        return $user->role === 2
            ? view('applicant.profile.delete')
            : view('company.profile.delete');
    }

    // Delete profile (keep this the same as it's working)
    public function destroy()
    {
        $user = Auth::user();
        
        if ($user->role == 2) {
            Applicant::where('user_id', $user->id)->delete();
        } elseif ($user->role == 3) {
            Company::where('user_id', $user->id)->delete();
        }
        
        $user->delete();
        Auth::logout();

        return redirect('/')->with('success', 'Your account has been deleted.');
    }

    // --- Resume Update Methods (for Applicants) ---

    // Show form to update/upload resume
    public function editResume()
    {
        $user = Auth::user();
        if ($user->role != 2) {
            return redirect()->route('profile.index')->with('error', 'Unauthorized access.');
        }
        
        // Retrieve applicant profile data
        $profile = Applicant::where('user_id', $user->id)->first();
        return view('applicant.profile.resume_edit', compact('user', 'profile'));
    }

    // Process resume update/upload
    public function updateResume(Request $request)
    {
        $user = Auth::user();
        if ($user->role != 2) {
            return redirect()->route('profile.index')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB max
        ]);

        // Update or create applicant profile
        $applicant = Applicant::updateOrCreate(['user_id' => $user->id], []);
        if ($request->hasFile('resume')) {
            $applicant->resume = $request->file('resume')->store('resumes', 'public');
            $applicant->save();
        }

        return redirect()->route('profile.index')->with('success', 'Resume updated successfully.');
    }

    // --- Logo Update Methods (for Companies) ---

    // Show form to update/upload logo
    public function editLogo()
    {
        $user = Auth::user();
        if ($user->role != 3) {
            return redirect()->route('profile.index')->with('error', 'Unauthorized access.');
        }
        
        // Retrieve company profile data
        $profile = Company::where('user_id', $user->id)->first();
        return view('company.profile.logo_edit', compact('user', 'profile'));
    }

    // Process logo update/upload
    public function updateLogo(Request $request)
    {
        $user = Auth::user();
        if ($user->role != 3) {
            return redirect()->route('profile.index')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'logo' => 'required|file|mimes:jpg,jpeg,png|max:5120', // 5MB max
        ]);

        // Update or create company profile
        $company = Company::updateOrCreate(['user_id' => $user->id], []);
        if ($request->hasFile('logo')) {
            $company->logo = $request->file('logo')->store('logos', 'public');
            $company->save();
        }

        return redirect()->route('profile.index')->with('success', 'Logo updated successfully.');
    }

    // --- Helper Methods ---

    private function getProfile($user)
    {
        return match ($user->role) {
            2 => Applicant::where('user_id', $user->id)->first(),
            3 => Company::where('user_id', $user->id)->first(),
            default => null,
        };
    }

    private function updateApplicant(Request $request, User $user)
    {
        $data = $request->validate([
            'phone' => 'required|string|max:10',
            'education' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'skills' => 'required|string|max:255',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $applicant = Applicant::updateOrCreate(['user_id' => $user->id], $data);

        if ($request->hasFile('resume')) {
            $applicant->resume = $request->file('resume')->store('resumes', 'public');
            $applicant->save();
        }
    }

    private function updateCompany(Request $request, User $user)
    {
        $data = $request->validate([
            'com_name' => 'required|string|max:255',
            'com_email' => 'required|email|max:255',
            'com_phone' => 'required|string|max:20',
            'com_website' => 'nullable|url|max:255',
            'com_description' => 'required|string',
            'com_address' => 'required|string|max:255',
            'logo' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
        ]);

        $company = Company::updateOrCreate(['user_id' => $user->id], $data);

        if ($request->hasFile('logo')) {
            $company->logo = $request->file('logo')->store('logos', 'public');
            $company->save();
        }
    }
}
