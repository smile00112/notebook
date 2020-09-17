<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    protected $table = 'blog_category';
    // Mass assigned
    protected $fillable = ['title', 'slug', 'description', 'content', 'parent_id', 'published', 'created_by', 'modified_by'];
    // Mutators
    public function setSlugAttribute($value) {
      $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function children(){ //Поиск вложенных категорий
        //Примеры выборки по отношениям в БД
        //  $this->hasOne('APP\Phone', 'friend_id', 'id'//если поле отличается от вида (friend_id));
        //  $this->belongsTo('APP\Phone', 'id', 'friend_id')
        //  $this->hasMany(...)
        //return $this->hasMany('App\BlogCategory');
        return $this->hasMany(self::class, 'parent_id');
        
    }
}
