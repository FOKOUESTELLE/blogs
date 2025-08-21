<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
     use HasFactory;

     protected $with = [
          'category', 
          'tags'
     ];

     public function getRouteKeyName(): string
     {
          return 'slug';
     }

     public function scopeFilters(Builder $query, array $filters): Void
     {
          if(isset($filters['serach'])) {


            $query->where(fn (Builder $query) => $query 
                  ->where("title","LIKE","%". $filters['serach'] ."%")
                  ->orWhere('content', 'LIKE', '%'. $filters['serach'] . '%')
                  );
          }

          if(isset($filters['category'])) {

               $query->where(
                   'category_id', $filters['category']->id ?? $filters['category']
               );

          }

          if(isset($filters['tag'])) {

               $query->whereRelation(
               'tags', 'tags.id', $filters['tag']->id ?? $filters['tag']
               );
           
             
          }
     }

     public function category(): BelongsTo

     {
          return $this->belongsTo(Category::class);
     }

     public function tags():BelongsToMany
     {
          return $this->belongsToMany(Tag::class);
     }

}
