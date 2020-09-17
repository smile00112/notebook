<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogCategory extends Model
{
    protected $table = 'blog_category';
    // Mass assigned
    protected $fillable = ['title', 'h1', 'menu_title', 'slug', 'description', 'content', 'parent_id', 'published', 'main_menu'];
    // Mutators
    public function setSlugAttribute($value) {
      $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }
    public function setH1Attribute($value) {
      //if(!$value)
        $this->attributes['h1'] = '111111_'.$value;
    }
    public function setMenuTitleAttribute($value) {
     // if(!$value)
        $this->attributes['menu_title'] = 222222;
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
