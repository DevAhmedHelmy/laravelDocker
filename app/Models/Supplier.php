<?php
namespace App\Models;
use App\Models\Company;
 
class Supplier extends Model
{
    protected $casts = [
        'phone' => 'array'
    ];


    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->name);
        });
    }
    public function getRouteKeyName()
    {
        return $this->slug;
    }

    public function resolveRouteBinding($slug)
    {

        return static::where('slug',$slug)->first() ?? abort(404);
    }

    public function company()
    {
        return $this->beLongsTo(Company::class, 'company_id');
    }
}
