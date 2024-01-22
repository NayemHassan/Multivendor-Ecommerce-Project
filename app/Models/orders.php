<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function division(){
        return $this->belongsTo(ShipDivision::class,'division_id','id');
    }//End Method
    public function district(){
        return $this->belongsTo(ShipDistricts::class,'district_id','id');
    }//End Method
    public function state(){
        return $this->belongsTo(ShipState::class,'state_id','id');
    }//End Method

}
