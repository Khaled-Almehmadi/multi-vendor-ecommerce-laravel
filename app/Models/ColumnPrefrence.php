<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColumnPrefrence extends Model
{
    protected $fillable = ['admin_id','table_name','column_order'];
}
