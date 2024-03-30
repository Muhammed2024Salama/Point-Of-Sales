<?php

namespace Pos\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pos\Categories\Models\Category;
use Spatie\Translatable\HasTranslations;


class Product extends Model
{
    use HasFactory;

    use HasFactory;

    use HasTranslations;

    /**
     * @var string[]
     */
    public $translatable = ['name'];
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'price',
        'category_id',
        'notes',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
