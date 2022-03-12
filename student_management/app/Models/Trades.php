<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trades extends Model
{
    use HasFactory;

    public function DeletedBy() {
        return $this->belongsTo('App\Models\User', 'deleted_by', 'id');
    }
    public function AddedBy() {
        return $this->belongsTo('App\Models\User', 'added_by', 'id');
    }
    public function UpdateBy() {
        return $this->belongsTo('App\Models\User', 'updated_by', 'id');
    }
}
