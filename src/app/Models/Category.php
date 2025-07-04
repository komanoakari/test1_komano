<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = array('id');
    public static $rules = array(
        'contact_id' => 'required',
        'content' => 'required',
    );

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
