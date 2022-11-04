<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    use CrudTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'gender',
        'dept_id',
        'doctor_id',
        'address'
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

    public function doctor()
    {
        return User::find($this->doctor_id);
    }

    public function dept()
    {
        return Dept::find($this->dept_id);
    }

    public function appointments()
    {
        return $this->hasMany(App::class);
    }

    public function viewAppointment($crud = false)
    {
        return '<a class="btn btn-sm btn-link" href="/admin/appointment?doc='. urlencode($this->id) .'"' . 'data-toggle="tooltip" title="View appointments of department."><i class="la la-search"></i> View appointment</a>';
    }
}
