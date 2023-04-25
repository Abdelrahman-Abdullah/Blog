<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['category' , 'author' , 'comments'];
    // Every Time We Get Posts We Will Get Category and Author Of This Post According to its Relation

    /* If You Want To change What the Wild Card That The Model Search According it Just
       Override It Here
    */

//    public function getRouteKeyName()
//    {
//        return "Column Name ";
//    }

    public function scopeFilter($query , array $filters)
    {
        // ================ Search Filter =======================
        // when() -> Will execute The Callback Function if the condition true
        $query->when($filters['search'] ?? false , function ($query , $search) {
            // You should always group **orWhere** calls in order to avoid unexpected behavior when global scopes are applied.
            $query->where(fn($query) =>
               $query->where('title' , 'like', '%'.$search.'%')
                   ->orWhere('body' , 'like' ,'%'.$search.'%')
            );
        });


        // ================ Category Filter =======================
        $query->when($filters['category'] ?? false , function ($query , $category) {
            // ============ One Way =============
           /*
            *  $query
                ->whereExists(fn($query)=>
                    $query->from('categories')
                        ->whereColumn('categories.id','posts.category_id')
                        ->where('categories.slug',$category)
                );
            */

            //============= Another Way ==========
            $query
                    ->whereHas('category',fn($query)=>
                    $query->where('slug',$category)
                );
        });


        // ================ Authors Filter =======================
        $query->when($filters['author'] ?? false , function ($query , $author) {
            $query
                ->whereHas('author' , fn($query) =>
                    $query->where('username' , $author)
                );
        });

    }
    // ************ End Scope Filter *******************************

    public function category(): BelongsTo
    {
        // Return an Instance - Property -  Form    BelongsTo Class Where Category_id in Posts Like Id In Category Table
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        // Return an Instance - Property -  Form BelongsTo Class Where user_id in Posts Like Id In User Table
        return $this->belongsTo(User::class , 'user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

}
