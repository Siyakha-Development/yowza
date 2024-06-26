<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Community\CommunityComment;
use App\Models\Community\CommunityGroup;
use App\Models\Community\CommunityGroupPost;
use App\Models\Community\CommunityLike;
use App\Models\Community\CommunityPost;
use App\Models\Community\CommunityStories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];




    public function isAdmin()
    {
        return $this->roles()->where('role_id', 1)->exists();
    }





    public function organizations()
    {
        return $this->belongsToMany(Organization::class);
    }

    public function smmeWorkspaces()
    {
        return $this->belongsToMany(SMMEWorkspace::class, 's_m_m_e_workspace_user')->withPivot('role');
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }


    public function getRouteKeyName()
    {
        return 'id'; // Use the appropriate key for route model binding
    }

    public function profileImage()
    {
        return $this->hasOne(UserProfileImage::class);
    }




    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }


    public function downloadHistories(): HasMany
    {
        return $this->hasMany(DownloadHistory::class, 'user_id');
    }

    public function rsvps()
    {
        return $this->hasMany(RSVP::class);
    }

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    /**
     * Get the posts for the user.
     */
    public function community_posts()
    {
        return $this->hasMany(CommunityPost::class);
    }

    /**
     * Get the comments for the user.
     */
    public function comments()
    {
        return $this->hasMany(CommunityComment::class);
    }

    /**
     * Get the likes for the user.
     */
    public function likes()
    {
        return $this->hasMany(CommunityLike::class);
    }

    /**
     * Get the groups the user has created.
     */
    public function createdGroups()
    {
        return $this->hasMany(CommunityGroup::class);
    }

    /**
     * Get the groups the user is a member of.
     */
    // public function community_groups()
    // {
    //     return $this->belongsToMany(CommunityGroup::class, 'community_group_members')
    //                 ->withPivot('is_admin')
    //                 ->withTimestamps();
    // }

    public function communityGroups()
    {
        return $this->belongsToMany(CommunityGroup::class, 'community_group_members', 'user_id', 'community_group_id')
            ->withTimestamps();
    }

    /**
     * Get the group posts for the user.
     */
    public function groupPosts()
    {
        return $this->hasMany(CommunityGroupPost::class);
    }

    public function communityStories()
    {
        return $this->hasMany(CommunityStories::class);
    }
}
