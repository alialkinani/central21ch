<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Notifications\verifyEmail;
use App\Poem;
use App\Activity;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email',
    ];

    public function verified()
    {
        return $this->token ===null;
    }

    public function sendVerifycationEmail()
    {

        $this->notify(new verifyEmail($this));
        
    
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
        
    public function poems()
        {
        return $this->hasMany(Poem::class)->latest();
        }

        public function lastReply()
        {
            return $this->hasOne(Reply::class)->latest();
        
        }

        public function activity(){
            return $this->hasMany(Activity::class);
        }
        public function read($poem)
        {
            cache()->forever($this->visitedPoemCacheKey($poem),\Carbon\Carbon::now());

        }

        public function visitedPoemCacheKey($poem){

            return sprintf("users.%s.visits.%s",$this->id,$poem->id);

        }


}
