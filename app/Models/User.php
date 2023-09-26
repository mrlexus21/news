<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Services\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'status',
        'role_id',
        'password',
        'image',
        'verify_token',
        'status'
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
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters): Builder
    {
        return $filters->apply($builder);
    }

    public function scopeWithAuthorRoles($query)
    {
        $roleAdminId = Role::select('id')
            ->admin()
            ->first()
            ->id;

        return $query->where('role_id', $roleAdminId);
    }

    public function scopeWithAdminRole($query)
    {
        $roleAdminId = Role::select('id')
            ->admin()
            ->first()
            ->id;

        return $query->where('role_id', $roleAdminId);
    }

    public function scopeWithChiefEditorRole($query)
    {
        $roleEditorId = Role::select('id')
            ->chiefEditor()
            ->first()
            ->id;

        return $query->where('role_id', $roleEditorId);
    }

    /**
     * * Check of roles entry of user
     *
     * @param $roles
     * @return bool
     */
    public function hasAnyRole($roles): bool
    {
        if (!is_array($roles)) {
            $roles = [$roles];
        }

        foreach ($roles as $role) {
            if (strtolower($role) === strtolower($this->role->name)) {
                return true;
            }
        }

        return false;
    }
}
