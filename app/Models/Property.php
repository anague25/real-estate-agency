<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
'title',
'description',
'surface',
'rooms',
'bedrooms',
'floor',
'price',
'city',
'address',
'postal_code',
'sold',
    ];


    public function getSlug():string{
        return Str::slug($this->title);
    }


    public function option() : BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }
   
}
