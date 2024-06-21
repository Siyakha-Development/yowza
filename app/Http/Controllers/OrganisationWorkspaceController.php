<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganisationWorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all workspaces from the database
        $workspaces = Organization::all();

        // Pass the workspaces data to the view for display
        return view('workspace.index', compact('workspaces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('workspace.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'smme_business_name' => 'required|string|max:255',
            'smme_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate file upload
            'smme_description_of_business' => 'required|string',
            'smme_industry' => 'nullable|string|max:255',
            'smme_business_registration_number' => 'nullable|string|max:255',
            'smme_company_size' => 'nullable|string|max:255',
            'smme_company_address' => 'nullable|string|max:255',
            'smme_company_email' => 'nullable|email|max:255',
            'smme_landline_number' => 'nullable|string|max:255',
            'smme_business_classification' => 'nullable|string|max:255',
            'smme_established_in_year' => 'nullable|digits:4',
            'smme_do_you_have_a_b_bbee_certificate' => 'nullable|string|max:255',
            'smme_b_bbee_level' => 'nullable|string|max:255',
            'smme_black_woman_ownership' => 'nullable|string|max:255',
            'smme_growth_in_profit' => 'nullable|string|max:255',
            'smme_growth_in_jobs' => 'nullable|string|max:255',
            'smme_growth_in_economic_participation' => 'nullable|string|max:255',
        ]);

        // Process and store the uploaded logo
        $logoPath = null;
        if ($request->hasFile('smme_logo')) {
            $logoPath = $request->file('smme_logo')->store('company_logos', 'public');
        }

        // Create a new organization
        $organization = Organization::create([
            'smme_business_name' => $request->smme_business_name,
            'smme_logo' => $logoPath,
            'smme_description_of_business' => $request->smme_description_of_business,
            'smme_industry' => $request->smme_industry,
            'smme_business_registration_number' => $request->smme_business_registration_number,
            'smme_company_size' => $request->smme_company_size,
            'smme_company_address' => $request->smme_company_address,
            'smme_company_email' => $request->smme_company_email,
            'smme_landline_number' => $request->smme_landline_number,
            'smme_business_classification' => $request->smme_business_classification,
            'smme_established_in_year' => $request->smme_established_in_year,
            'smme_do_you_have_a_b_bbee_certificate' => $request->smme_do_you_have_a_b_bbee_certificate,
            'smme_b_bbee_level' => $request->smme_b_bbee_level,
            'smme_black_woman_ownership' => $request->smme_black_woman_ownership,
            'smme_growth_in_profit' => $request->smme_growth_in_profit,
            'smme_growth_in_jobs' => $request->smme_growth_in_jobs,
            'smme_growth_in_economic_participation' => $request->smme_growth_in_economic_participation,
        ]);

        // Optionally, you can perform additional actions here,
        // such as associating the organization with the currently authenticated user.

        return redirect()->route('workspace.show', $organization->id)
            ->with('success', 'Organization created successfully');
    }


    public function join(Request $request, Organization $workspace)
    {
        // Check if the user is already a member of the workspace
        if ($workspace->users()->where('id', Auth::id())->exists()) {
            return redirect()->back()->with('error', 'You are already a member of this workspace.');
        }

        // Add the current user to the workspace
        $workspace->users()->attach(Auth::id());

        return redirect()->route('workspace.index')->with('success', 'You have successfully joined the workspace.');
    }

    public function invite(Request $request, $workspaceId)
    {
        $workspace = Organization::findOrFail($workspaceId);

        // Validate the request data
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Check if the user is already a member of the workspace
        if ($workspace->users()->where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'This user is already a member of the workspace.');
        }

        // Add the user to the workspace
        $user = User::where('email', $request->email)->first();
        $workspace->users()->attach($user->id);

        return redirect()->route('workspaces.show', $workspace->id)->with('success', 'User invited to the workspace successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
