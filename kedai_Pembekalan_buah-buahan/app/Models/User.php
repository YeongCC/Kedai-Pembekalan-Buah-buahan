<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'position',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUsers($search_keyword) {
        $user = DB::table('users');

        if($search_keyword && !empty($search_keyword)) {
            $user->where(function($q) use ($search_keyword) {
                $q->where('users.name', 'like', "%{$search_keyword}%")
                ->orWhere('users.email', 'like', "%{$search_keyword}%");
            });
        }

        return $user->latest()->paginate(PER_PAGE_LIMIT);
    }
}
