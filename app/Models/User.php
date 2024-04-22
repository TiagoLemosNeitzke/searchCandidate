<?php declare(strict_types=1);

namespace App\Models;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

final class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
  
    public function candidates(): HasMany
    {
        return $this->hasMany(Candidate::class);
    }

    public function permissions():BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo(string $permission):void
    {
        /** @var Permission $p */
        $p = Permission::query()->firstOrCreate(compact('permission'));

        $this->permissions()->attach($p);
    }

    public function hasPermissionTo(string $permission):bool
    {
        return $this->permissions()->where('permission',$permission)->exists();

    }
    public function hasAnyPermission():bool
    {
        return $this->permissions()->exists();
    }

    public function getAllPermissions(): Collection
    {
        return $this->permissions;
    }

    public function revokeAllPermissions()
    {
        $this->permissions()->detach();
    }
}
