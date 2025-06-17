<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

use App\Models\User;

class Pet extends Model
{
    protected $guarded = [];

    public function owner():BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    public function treatments():HasMany
    {
        return $this->hasMany(Treatment::class);
    }

    public function users():HasManyThrough
    {
        return $this->hasManyThrough(User::class, Treatment::class);
    }

    public function isVisible(User $user): bool
    {
        if($this->treatments()->count() == 0)
        {
            return true;
        }

        return $this->treatments()->where('user_id', $user->id)->exists();
    }


// Metodo para ver si un user es dueño del pet... 
    /* public function isOwnedBy(User $user): bool
    {
        return $this->treatments()->where('user_id', $user->id)->exists();
    } */
}
