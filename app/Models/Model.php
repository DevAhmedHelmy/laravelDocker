<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;
class Model extends Eloquent
{
    protected $guarded = [];

	public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->name);
        });
    }
    public function getLocalizedRouteKey($locale)
	{
	    return $this->slug->where('local','=', $local)->first();
	}

	 
	public function resolveRouteBinding($slug)
	{

	    return static::whereTranslation('slug',$slug)->first() ?? abort(404);
	}
}
