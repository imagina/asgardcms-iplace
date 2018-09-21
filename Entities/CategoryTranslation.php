<?php

namespace Modules\Iplaces\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','description','slug'];
    protected $table = 'iplaces__category_translations';
}
