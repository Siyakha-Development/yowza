<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use App\Models\Community\CommunityGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\PointService;
use Illuminate\Support\Facades\Log;


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
        $groups = CommunityGroup::withCount('members')->get();
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
        try {
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

            // if ($request->hasFile('group_banner')) {
            //     $image = $request->file('group_banner');
            //     $imageName = time() . '_' . $image->getClientOriginalName();
            //     $path = $image->storeAs('public/banners', $imageName);
            //     $group->group_banner = 'storage/banners/' . $imageName; // Adjust as per your storage setup
            // }

            // if ($request->hasFile('group_banner')) {
            //     $image = $request->file('group_banner');
            //     $imageName = time() . '_' . $image->getClientOriginalName();
            //     // Store the file directly in the public directory
            //     $image->storeAs('public', $imageName);
        
            //     // Save the path to the image in the database
            //     $group->group_banner = $imageName; // This assumes your model's attribute is 'group_banner'
            // }

            if ($request->hasFile('group_banner')) {
                $imagePath = $request->file('group_banner')->store('group_banners', 'public');
                $group->group_banner = $imagePath;
            }

            $group->save();

            // Add the creator as a member and admin of the group
            $group->members()->attach(Auth::id(), ['is_admin' => true]);

            $user = Auth::user();
            $this->pointService->awardPoints($user, 10, 'Created Group');

            $notification = [
                'message' => 'Group created successfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error storing group: ' . $e->getMessage());

            $notification = [
                'message' => 'Failed to create group. Please try again later.',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'is_private' => 'boolean',
    //         'group_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     ]);

    //     $group = new CommunityGroup();
    //     $group->user_id = Auth::id();
    //     $group->name = $request->name;
    //     $group->description = $request->description;
    //     $group->is_private = $request->is_private;

    //     if ($request->hasFile('group_banner')) {
    //         $image = $request->file('group_banner');
    //         $imageName = time() . '_' . $image->getClientOriginalName();
    //         $path = $image->storeAs('public/banners', $imageName);
    //         $group->group_banner = 'storage/banners/' . $imageName; // Adjust as per your storage setup
    //     }

    //     $group->save();

    //     // Add the creator as a member and admin of the group
    //     $group->members()->attach(Auth::id(), ['is_admin' => true]);

    //     $user = Auth::user();
    //     $this->pointService->awardPoints($user, 10, 'Created Group');

    //     $notification = array(
    //         'message' => 'Group created successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);
    // }

    // public function join($groupId)
    // {
    //     $group = CommunityGroup::find($groupId);
    //     $group->members()->attach(Auth::id());

    //     return redirect()->back();
    // }

    public function join($prefix, $groupId)
    {
        $group = CommunityGroup::findOrFail($groupId);

        // Check if user is already a member
        if (!$group->members->contains(Auth::id())) {
            $group->members()->syncWithoutDetaching([Auth::id()]);
            return redirect()->back()->with('success', 'You have successfully joined the group.');
        }

        return redirect()->back()->with('message', 'You are already a member of this group.');
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
