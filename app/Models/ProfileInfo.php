<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProfileInfo extends Model
{
    use HasFactory;
    protected $primaryKey="client_id";
    protected $table = "profile_infos";
    protected $fillable = [
        'client_id',
        'system_id',
        'client_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function get_name()
    {
        $p = ProfileInfo::where('system_id', 1)->first();
        return $p?->client_name;
    }
}
