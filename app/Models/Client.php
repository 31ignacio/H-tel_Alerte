<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $guarded = [''];

    protected $fillable = ['nom', 'pays', 'dateArriver', 'dateDepart', 'description', 'telephone','photo'];

    public function hotel()
    {
        return $this->belongsTo(hotel::class, 'hotel_id');
    }
}
