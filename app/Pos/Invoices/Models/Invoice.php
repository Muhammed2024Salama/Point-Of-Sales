<?php

namespace Pos\Invoices\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pos\Categories\Models\Category;
use Pos\Products\Models\Product;

class Invoice extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $guarded=[];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
