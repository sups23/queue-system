<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class App extends Model
{
    use CrudTrait, HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'apps';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function doc()
    {
        return User::find($this->doctor_id);
    }

    public static function getExpectedTime($date, $doctor_id) {
        $max = \App\Models\App::where('date', $date)->where('doctor_id', $doctor_id)->max('expected_time');
        $doc_t = \App\Models\DoctorTime::where('user_id', $doctor_id)->first();
        if ($max) {
            $next_ts = strtotime($date . ' ' . $max) + config('app.time_frame')*60;
            $end_ts = strtotime($date . ' ' . ($doc_t->end ?? '20:00:00'));
            if ($next_ts > $end_ts) {
                return null;
            } else {
                return date('H:i:s', $next_ts);
            }
        } else {
            return ($doc_t->start ?? '07:00:00');
        }
    }

    public static function loadAppointments() {
        $doc_depts = \App\Models\User::role('Doctor')->select('id','dept_id')->get();

        foreach ($doc_depts as $doc_dept) {
            
            \App\Models\App::factory(60)->create(
                [
                    'dept_id' => $doc_dept->dept_id,
                    'doctor_id' =>$doc_dept->id,
                    'expected_time' => \App\Models\App::getExpectedTime(now()->toDateString(), $doc_dept->id),
                ]
            );
        }
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function dept()
    {
        return $this->belongsTo(Dept::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    public function slotFull($crud = false)
    {
        $doc_id = backpack_user()->doctor_id;
        return '<a class="btn btn-xs btn-primary" href="/admin/slot-full?doc='. urlencode($doc_id) .'"' . 'data-toggle="tooltip" title="View appointments of department."><i class="la la-battery-full"></i> Slot Full</a>';
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
