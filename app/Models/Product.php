<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_trade',
        'title',
        'category_id',
        'name',
        'description',
        'ram',
        'storage',
        'video_url',
        'status',
        'price',
        'address',
        'public_status',
        'guarantee',
        'sold',
        'is_block',
        'view',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productWishLists()
    {
        return $this->hasMany(ProductWishList::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('comment_parent_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function productMobile() {
        return $this->hasOne(ProductMobile::class);
    }

    public function productLaptop() {
        return $this->hasOne(ProductLaptop::class);
    }

    public function productPc() {
        return $this->hasOne(ProductPc::class);
    }

    public function matching() {
        
    }

    public static function filterProduct($request) {
        $products = Product::query();

        $pipeline = app(Pipeline::class)
            ->send($products)
            ->through([
                \App\QueryFilters\Sort::class,
                \App\QueryFilters\Search::class,
                \App\QueryFilters\Address::class,
                \App\QueryFilters\Category::class,
                \App\QueryFilters\Card::class,
                \App\QueryFilters\Status::class,
                \App\QueryFilters\Video::class,
                \App\QueryFilters\Storage::class,
                \App\QueryFilters\StorageType::class,
                \App\QueryFilters\Ram::class,
                \App\QueryFilters\Price::class,
                \App\QueryFilters\Guarantee::class,
                \App\QueryFilters\Display::class,
                \App\QueryFilters\Brand::class,
                \App\QueryFilters\CreateAt::class
            ])
            ->thenReturn();
        return $pipeline->paginate(config('constants.paginate_search_product'));
    }
}
