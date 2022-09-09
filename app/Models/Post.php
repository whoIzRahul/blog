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

    public function Category(){
        return $this->BelongsTo(Category::class);
    }

}
