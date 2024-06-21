<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community\CommunityGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\PointService;


class CommunityGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $pointService;

    public function __construct(PointService $pointService)
    {
        $this->pointService = $pointService;
        $this->middleware('auth');
    }
    public function index()
    {
        //
        // $groups = CommunityGroup::with('user')->latest()->get();
        $groups = CommunityGroup::withCount('community_group_members')->get();
        return view('community.group', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('community.group-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_private' => 'boolean',
            'group_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $group = new CommunityGroup();
        $group->user_id = Auth::id();
        $group->name = $request->name;
        $group->description = $request->description;
        $group->is_private = $request->is_private;

        if ($request->hasFile('group_banner')) {
            $path = $request->file('group_banner')->store('banners', 'public');
            $group->group_banner = $path;
        }

        $group->save();

        // Add the creator as a member and admin of the group
        $group->community_group_members()->attach(Auth::id(), ['is_admin' => true]);

        $user = Auth::user();
        $this->pointService->awardPoints($user, 10, 'Created Group');

        $notification = array(
            'message' => 'Group created successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // public function join($groupId)
    // {
    //     $group = CommunityGroup::find($groupId);
    //     $group->members()->attach(Auth::id());

    //     return redirect()->back();
    // }

    public function join($groupId)
    {
        $group = CommunityGroup::findOrFail($groupId);

        // Check if user is already a member
        if (!$group->group_members->contains(Auth::id())) {
            $group->group_members()->attach(Auth::id());
        }

        return redirect()->back()->with('success', 'You have successfully joined the group.');
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
