<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
 

class Answer extends Model
{
    use HasFactory;
    protected $fillable=['answer','application_id'];
    public function application(): BelongsTo{return $this->belongsTo(application::class);}

}
