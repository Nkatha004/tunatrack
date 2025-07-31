<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\OnboardingWelcome;
use Filament\Notifications\Notification;
use App\Utils\AppUtils;

class User extends Authenticatable implements Auditable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, SoftDeletes, \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'company_id',
        'created_by',
        'created_at',
        'updated_at',
        'updated_by',
        'deleted_by',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $password = Str::random(10);
            $user->password = Hash::make($password);
            $user->created_by = auth()->id();

            // Check if logged-in user is not admin, then assign their company
            if (!AppUtils::isAdmin()) {
                $user->company_id = auth()->user()->company_id;
            }

            if($user->email) {
                // Send welcome email
                Mail::to($user->email)->send(new OnboardingWelcome($user->name)); 

                Notification::make()
                    ->title('Welcome to TunaTrack')
                    ->body('Welcome email sent to '.$user->email)
                    ->success()
                    ->send();
            }
            // else {
            //     // TODO: Send SMS with the password, after SMS service is set up
            // }

        });
        static::updated(function ($user) {
            $user->updated_by = auth()->id();
            $user->saveQuietly();
        });

        static::deleting(function ($user) {
            $user->vehicle()->update(['driver_id' => null]);
            
            $user->deleted_by = auth()->id();
            $user->deleted_at = now();
            $user->save();
        });
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class,'deleted_by');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'driver_id');
    }
    
}
