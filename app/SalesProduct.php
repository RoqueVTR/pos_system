<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesProduct extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'sales_products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sales_id', 'product_detail_id', 'quantity',
    ];

    /**
     * Get the product's associated sale
     */
    public function sale() {
        return $this->belongsTo('App\Sales', 'sales_id');
    }

    /**
     * Get the details for a product.
     */
    public function productDetail() {
        return $this->belongsTo('App\ProductDetail', 'product_detail_id');
    }
}
