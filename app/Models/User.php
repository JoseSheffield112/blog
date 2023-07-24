<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
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
        'password' => 'hashed', // to check the value of a hash : Illuminate\Support\Facades\Hash::check('string-you-have', {the-hash});
    ];

    // Eloquent mutator to hash password

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    // eloquent accessor to upper case names
    public function getNameAttribute($name){
        return ucwords($name);
    }

    /**
     * Eloquent function to get posts
     * @return HasMany
     */
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
