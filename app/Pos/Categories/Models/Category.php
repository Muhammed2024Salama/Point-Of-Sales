<?php

namespace Pos\Categories\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;


    use HasTranslations;

    /**
     * @var array
     */
    protected $guarded=[];

    /**
     * @var string[]
     */
    public $translatable = ['name'];
}
