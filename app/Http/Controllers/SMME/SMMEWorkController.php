<?php

namespace App\Http\Controllers\SMME;

use App\Http\Controllers\Controller;
use App\Mail\UserRequestedToJoinWorkspace;
use App\Models\Course;
use App\Models\SMME\FinancialData;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\SMMEWorkspace;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Mail;
use App\Rules\AcceptedTerms;
use App\Mail\WorkspaceInvitation;
use App\Services\PointService;




class SMMEWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $pointService;

    public function __construct(PointService $pointService)
    {
        $this->pointService = $pointService;
    }
    public function index(): View
    {
        $workspaces = SMMEWorkspace::paginate(3);
        $workspaceId = $workspaces->isEmpty() ? null : $workspaces->first()->id;

        $purchased_courses = [];
        if (auth()->check()) {
            $purchased_courses = Course::whereHas('students', function ($query) {
                $query->where('users.id', auth()->id());
            })
                ->with('lessons')
                ->orderBy('id', 'desc')
                ->get();
        }
        $user = Auth::user();
        $courses = Course::paginate(10);
        $financialData = FinancialData::where('user_id', $user->id)
            ->with('workspace')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('smme.index', compact('workspaces', 'courses', 'financialData', 'workspaceId'));
    }

    public function all_workspace()
    {
        // Retrieve all workspaces from the database
        $workspaces = SMMEWorkspace::withCount('users')->paginate(10);



        // Pass the workspaces data to the view for display
        return view('smme.smmeworkspace', compact('workspaces'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('smme.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // Define validation rules for the SMMEWorkspace fields
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'smme_business_name' => 'required|string|max:255',
    //         'smme_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'smme_description_of_business' => 'required|string',
    //         'smme_industry' => 'nullable|string|max:255',
    //         'smme_business_registration_number' => 'nullable|string|max:255',
    //         'smme_company_size' => 'nullable|string|max:255',
    //         'smme_company_address' => 'nullable|string',
    //         'smme_company_email' => 'nullable|string|email|max:255',
    //         'smme_landline_number' => 'nullable|string|max:255',
    //         'smme_business_classification' => 'nullable|string|max:255',
    //         'smme_established_in_year' => 'nullable|string|max:255',
    //         'smme_do_you_have_a_b_bbee_certificate' => 'nullable|string|max:255',
    //         'smme_b_bbee_level' => 'nullable|string|max:255',
    //         'smme_black_woman_ownership' => 'nullable|string|max:255',
    //         'smme_growth_in_profit' => 'nullable|string|max:255',
    //         'smme_growth_in_jobs' => 'nullable|string|max:255',
    //         'smme_growth_in_economic_participation' => 'nullable|string|max:255',
    //     ]);

    //     // Store the uploaded file in the specified directory
    //     if ($request->hasFile('smme_logo')) {
    //         $validatedData['smme_logo'] = $request->file('smme_logo')->store('smme_workspace/logo', 'public');
    //     }

    //     // Create a new SMMEWorkspace instance with the validated data
    //     $workspace = SMMEWorkspace::create($validatedData);

    //     // Assign the role of 'leader' to the authenticated user
    //     if (Auth::check()) {
    //         $workspace->assignRoleToUser(Auth::user()->id, 'leader');
    //     }

    //     // Redirect to the index page with a success message
    //     return redirect()->route('smme.index', ['prefix' => 'admin'])
    //         ->with('success', 'SMMEWorkspace created successfully');
    // }

    // public function store(Request $request)
    // {
    //     // Validate the request data
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'smme_business_name' => 'required|string|max:255',
    //         'smme_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'smme_description_of_business' => 'required|string',
    //         'smme_industry' => 'nullable|string|max:255',
    //         'smme_business_registration_number' => 'nullable|string|max:255',
    //         'smme_company_size' => 'nullable|string|max:255',
    //         'smme_company_address' => 'nullable|string',
    //         'smme_company_email' => 'nullable|string|email|max:255',
    //         'smme_landline_number' => 'nullable|string|max:255',
    //         'smme_business_classification' => 'nullable|string|max:255',
    //         'smme_established_in_year' => 'nullable|string|max:255',
    //         'smme_do_you_have_a_b_bbee_certificate' => 'nullable|string|max:255',
    //         'smme_b_bbee_level' => 'nullable|string|max:255',
    //         'smme_black_woman_ownership' => 'nullable|string|max:255',
    //         'smme_growth_in_profit' => 'nullable|string|max:255',
    //         'smme_growth_in_jobs' => 'nullable|string|max:255',
    //         'smme_growth_in_economic_participation' => 'nullable|string|max:255',
    //     ]);

    //     // Handle file upload
    //     if ($request->hasFile('smme_logo')) {
    //         $file = $request->file('smme_logo');
    //         $path = $file->store('smme_logos', 'public');
    //         $validatedData['smme_logo'] = $path;
    //     }

    //     // Create a new SMMEWorkspace instance and save it
    //     $smmeWorkspace = SMMEWorkspace::create($validatedData);

    //     // Get the authenticated user
    //     $user = Auth::user();

    //     // Associate the user with the workspace as a team leader
    //     $smmeWorkspace->users()->attach($user->id, ['role' => 'team_leader']);

    //     $this->pointService->awardPoints($user, 10, 'created_smme_workspace');

    //     // Return a response
    //     return response()->json(['message' => 'SMMEWorkspace created successfully', 'data' => $smmeWorkspace], 201);
    // }

    public function store_data(Request $request)
    {
        $validatedData = $request->validate([
            's_m_m_e_workspace_id' => 'required|exists:s_m_m_e_workspaces,id',
            'user_id' => 'required|exists:users,id',
            'total_income' => 'required|numeric',
            'total_expenses' => 'required|numeric',
        ]);

        // Calculate net income
        $netIncome = $validatedData['total_income'] - $validatedData['total_expenses'];

        // Fetch previous month's net income (if exists)
        $previousFinancialData = FinancialData::where('s_m_m_e_workspace_id', $validatedData['s_m_m_e_workspace_id'])
            ->where('user_id', $validatedData['user_id'])
            ->latest('created_at')
            ->first();

        $prevMonNetIncome = $previousFinancialData ? $previousFinancialData->net_income : null;

        // Calculate growth in profit
        $growthInProfit = null;
        if ($prevMonNetIncome !== null && $prevMonNetIncome != 0) {
            $growthInProfit = (($netIncome - $prevMonNetIncome) / $prevMonNetIncome) * 100;
        }

        // Store the financial data
        $financialData = new FinancialData();
        $financialData->fill(array_merge($validatedData, [
            'net_income' => $netIncome,
            'prev_mon_net_income' => $prevMonNetIncome,
        ]));
        $financialData->save();

        // Update the growth in profit in SMMEWorkspace
        $workspace = SMMEWorkspace::findOrFail($validatedData['s_m_m_e_workspace_id']);
        $workspace->smme_growth_in_profit = $growthInProfit;
        $workspace->save();

        return response()->json(['message' => 'Financial data saved successfully']);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'smme_business_name' => 'required|string|max:255',
            'smme_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'smme_description_of_business' => 'required|string',
            'smme_industry' => 'nullable|string|max:255',
            'smme_business_registration_number' => 'nullable|string|max:255',
            'smme_company_size' => 'nullable|string|max:255',
            'smme_company_address' => 'nullable|string',
            'smme_company_email' => 'nullable|string|email|max:255',
            'smme_landline_number' => 'nullable|string|max:255',
            'smme_business_classification' => 'nullable|string|max:255',
            'smme_established_in_year' => 'nullable|string|max:255',
            'smme_do_you_have_a_b_bbee_certificate' => 'nullable|string|max:255',
            'smme_b_bbee_level' => 'nullable|string|max:255',
            'smme_black_woman_ownership' => 'nullable|string|max:255',
            'smme_growth_in_profit' => 'nullable|string|max:255',
            'smme_growth_in_jobs' => 'nullable|string|max:255',
            'smme_growth_in_economic_participation' => 'nullable|string|max:255',
        ]);

        // Handle file upload
        if ($request->hasFile('smme_logo')) {
            $file = $request->file('smme_logo');
            $path = $file->store('smme_logos', 'public');
            $validatedData['smme_logo'] = $path;
        }

        // Create a new SMMEWorkspace instance and save it
        $smmeWorkspace = SMMEWorkspace::create($validatedData);

        // Get the authenticated user
        $user = Auth::user();

        // Associate the user with the workspace as a team leader
        $smmeWorkspace->users()->attach($user->id, ['role' => 'team_leader']);

        // Award points to the user
        $this->pointService->awardPoints($user, 10, 'created_smme_workspace');

        // Return a response
        return response()->json(['message' => 'SMMEWorkspace created successfully', 'data' => $smmeWorkspace], 201);
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
    public function edit(SMMEWorkspace $workspace)
    {
        return view('smme.edit', compact('workspace'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SMMEWorkspace $workspace)
    {
        // Define validation rules for the SMMEWorkspace fields
        $validatedData = $request->validate([
            // Your validation rules here...
            'name' => 'required|string|max:255',
            'smme_business_name' => 'required|string|max:255',
            'smme_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'smme_description_of_business' => 'required|string',
            'smme_industry' => 'nullable|string|max:255',
            'smme_business_registration_number' => 'nullable|string|max:255',
            'smme_company_size' => 'nullable|string|max:255',
            'smme_company_address' => 'nullable|string',
            'smme_company_email' => 'nullable|string|email|max:255',
            'smme_landline_number' => 'nullable|string|max:255',
            'smme_business_classification' => 'nullable|string|max:255',
            'smme_established_in_year' => 'nullable|string|max:255',
            'smme_do_you_have_a_b_bbee_certificate' => 'nullable|string|max:255',
            'smme_b_bbee_level' => 'nullable|string|max:255',
            'smme_black_woman_ownership' => 'nullable|string|max:255',
            'smme_growth_in_profit' => 'nullable|string|max:255',
            'smme_growth_in_jobs' => 'nullable|string|max:255',
            'smme_growth_in_economic_participation' => 'nullable|string|max:255',
        ]);

        // Handle file upload for smme_logo field if a new file is provided
        if ($request->hasFile('smme_logo')) {
            // Delete the old logo file if it exists
            if ($workspace->smme_logo) {
                Storage::disk('public')->delete($workspace->smme_logo);
            }
            // Store the new uploaded file in the specified directory
            $validatedData['smme_logo'] = $request->file('smme_logo')->store('smme_workspace/logo', 'public');
        }

        // Update the SMMEWorkspace instance with the validated data
        $workspace->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('smme.index', ['prefix' => 'admin'])
            ->with('success', 'SMMEWorkspace updated successfully');
    }

    // public function join($id)
    // {
    //     // Find the SMMEWorkspace by its ID
    //     $workspace = SMMEWorkspace::findOrFail($id);

    //     // Logic to allow the user to join the workspace
    //     // For example, you might want to associate the user with the workspace

    //     // Return a response indicating successful join
    //     return redirect()->route('smme.index')->with('success', 'Joined workspace successfully');
    // }

    // public function join($prefix, Request $request, SMMEWorkspace $workspace)
    // {
    //     $notification = array(
    //         'message' => 'You are already a member of this workspace.',
    //         'alert-type' => 'error'
    //     );
    //     if ($workspace->users()->where('id', auth()->id())->exists()) {
    //         return redirect()->back()->with($notification);
    //     }

    //     // Validate request data (accepting terms)
    //     $request->validate([
    //         'accept_terms' => ['required', new AcceptedTerms],
    //     ]);

    //     // Logic to join the workspace
    //     auth()->user()->workspaces()->attach($workspace);

    //     // Notify workspace owner via email
    //     $ownerEmail = $workspace->owner->email; // Replace with actual owner retrieval logic
    //     $userName = auth()->user()->name;

    //     Mail::to($ownerEmail)->send(new UserRequestedToJoinWorkspace($userName));

    //     // Optionally, you can add a success message or redirect the user
    //     return redirect()->back()->with([
    //         'notification' => [
    //             'message' => 'You have successfully requested to join the workspace.',
    //             'alert-type' => 'success'
    //         ]
    //     ]);
    // }

    public function join($prefix, Request $request, SMMEWorkspace $workspace)
    {
        $notification = [
            'message' => 'You are already a member of this workspace.',
            'alert-type' => 'error'
        ];

        if ($workspace->users()->where('id', auth()->id())->exists()) {
            return redirect()->back()->with($notification);
        }

        // Validate request data (accepting terms)
        $request->validate([
            'accept_terms' => ['required', 'in:yes,no'],
        ]);

        if ($request->input('accept_terms') === 'no') {
            return redirect()->back()->with([
                'notification' => [
                    'message' => 'You must accept the terms to join the workspace.',
                    'alert-type' => 'error'
                ]
            ]);
        }

        // Logic to join the workspace
        auth()->user()->smmeWorkspaces()->attach($workspace->id);

        // Notify workspace owner via email
        $owner = $workspace->owner(); // Retrieve the owner
        if ($owner) {
            $ownerEmail = $owner->email;
            $userName = auth()->user()->name;

            Mail::to($ownerEmail)->send(new UserRequestedToJoinWorkspace($userName));
        } else {
            return redirect()->back()->with([
                'notification' => [
                    'message' => 'Workspace owner not found.',
                    'alert-type' => 'error'
                ]
            ]);
        }

        Mail::to($ownerEmail)->send(new UserRequestedToJoinWorkspace($userName));

        // Optionally, you can add a success message or redirect the user
        return redirect()->back()->with([
            'notification' => [
                'message' => 'You have successfully requested to join the workspace.',
                'alert-type' => 'success'
            ]
        ]);
    }

    public function acceptInvitation(Request $request, SMMEWorkspace $workspace)
    {
        // Logic to handle acceptance of invitation
        // For example, attach the authenticated user to the workspace
        auth()->user()->smmeWorkspaces()->attach($workspace->id);

        // Redirect or return a response
        return redirect()->route('smme.index')->with([
            'notification' => [
                'message' => 'You have successfully accepted the invitation and joined the workspace.',
                'alert-type' => 'success'
            ]
        ]);
    }


    public function invite(Request $request)
    {
        // Validate form data
        $request->validate([
            'workspace_id' => 'required|exists:s_m_m_e_workspaces,id',
            'emails' => 'required|string',
        ]);

        // Retrieve workspace
        $workspace = SMMEWorkspace::findOrFail($request->workspace_id);

        // Extract emails from textarea
        $emails = explode(',', $request->emails);

        // Send invitations
        foreach ($emails as $email) {
            $email = trim($email);

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($email)->send(new WorkspaceInvitation($workspace));
            }
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Invitations sent successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
