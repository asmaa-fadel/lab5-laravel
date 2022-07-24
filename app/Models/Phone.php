<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Phone extends Model
{
    protected $table='userphone';

    use HasFactory;
    use SoftDeletes;

    protected $fillable=['phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
 

}
?>