<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function sub_cat(){
     return $this->belongsTo(Categories::class, 'subcat_id', 'id');
    }
}
