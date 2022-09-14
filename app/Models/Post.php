<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    // ALloes the fillable properties to be mass assgined values
    // protected $fillable = ['title','excerpt','body'];

    // Allows everything except the guarded property to be mass assigned
    protected $guarded = ['id'];
    protected $with = ['category','author'];

    public function scopeFilter($query, array $filters){
        // Normal way without using query builder
        // if(null != request('search')){
        //     $query->where("title","like","%".request('search')."%")
        //     ->orWhere("body","like","%".request('search')."%");
        // }

        // $filters['search'] ?? false (Null check)

        // Search using query builder
        $query->when($filters['search'] ?? false, function($query, $search){
            $query->where("title","like","%".$search."%")
            ->orWhere("body","like","%".$search."%");
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            // $query->whereExists(fn($query) => $query->from('categories')->whereColumn('categories.id','posts.category_id')->where('categories.slug',$category));
            // Or

            $query->whereHas('category',fn($query)=> $query->where('slug',$category));
        });

        $query->when(request('author') ?? false,function($query, $author){
            $query->whereHas('author',fn($query)=> $query->where('username',$author));
        });
    }
    public function category(){
        return $this->BelongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

}
