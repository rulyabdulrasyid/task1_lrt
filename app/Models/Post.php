<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with=['category'];

    // public function scopeFilter($query){
    //     if(request('search')){
    //         return $query->where('title', 'like', '%' . request('search') . '%')
    //               ->orWhere('deskripsi', 'like', '%' . request('search') . '%') ;
    //     }
    // }


    public function scopeFilter($query, array $filters)
    {
        // if(isset($filters['search']) ? $filters['search'] : false){
        //      return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //               ->orWhere('deskripsi', 'like', '%' . $filters['search'] . '%') ;
        //     }

        // TIDAK MENGGUNAKAN IF
        // PHP 7 -> NULL COALESING OPERATOR
        // BASIC WHEN VERSION 
        $query->when(($filters['search']) ?? false, function($query, $search){
            return $query->where('title','like','%'. $search . '%')
                         ->orWhere('deskripsi','like','%'. $search . '%');
        });


    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
