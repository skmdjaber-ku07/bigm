<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'language',
        'division',
        'district',
        'upazila',
        'address_details',
        'photo',
        'cv',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'name',
        'email',
        'division_name',
        'district_name',
        'upazila_name',
        'insert_date',
        'action',
    ];

    /**
     * Get applicant's name
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->user->name;
    }

    /**
     * Get applicant's email
     *
     * @return string
     */
    public function getEmailAttribute()
    {
        return $this->user->email;
    }

    /**
     * Get applicant's language array
     *
     * @return array
     */
    public function getLangArrayAttribute()
    {
        return json_decode($this->language);
    }

    /**
     * Get applicant's division name
     *
     * @return string
     */
    public function getDivisionNameAttribute()
    {
        return $this->getGeo('division')->name;
    }

    /**
     * Get applicant's division id
     *
     * @return integer
     */
    public function getDivisionIdAttribute()
    {
        return $this->getGeo('division')->id;
    }

    /**
     * Get applicant's district name
     *
     * @return string
     */
    public function getDistrictNameAttribute()
    {
        return $this->getGeo('district')->name;
    }

   /**
    * Get applicant's district id
    *
    * @return integer
    */
   public function getDistrictIdAttribute()
   {
       return $this->getGeo('district')->id;
   }


   /**
    * Get applicant's Upazila name
    *
    * @return string
    */
   public function getUpazilaNameAttribute()
   {
       return $this->getGeo('upazila')->name;
   }

   /**
    * Get applicant's Upazila id
    *
    * @return integer
    */
   public function getUpazilaIdAttribute()
   {
       return $this->getGeo('upazila')->id;
   }

   /**
    * Get applicant geo object.
    *
    * @param string $attribute
    *
    * @return Object
    */
   public function getGeo($attribute)
   {
       return json_decode($this->$attribute);
   }

   /**
    * Get applicant's insert at formatted date
    *
    * @return string
    */
   public function getInsertDateAttribute()
   {
       return $this->created_at->format('Y-m-d');
   }

   /**
    * Get applicant's action html
    *
    * @return string
    */
   public function getActionAttribute()
   {
       return "<a class='btn btn-warning btn-sm'
                  href='" . route('admin.applicants.edit', $this->id) . "'>
                  Edit
               </a>";
   }

   /**
    * Get to know applicant's has trainings or not
    *
    * @return boolean
    */
   public function getIsTrainedAttribute()
   {
       return $this->trainings->count() ? true : false;
   }

    /**
     * An inverse one-to-one relationship with User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A one-to-many relationship with Training.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trainings()
    {
        return $this->hasMany(Training::class);
    }

    /**
     * A many-to-many relationship with Exam.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function exams()
    {
        return $this->belongsToMany(Exam::class)->withPivot('institute_type', 'institute_id', 'result');
    }
}
