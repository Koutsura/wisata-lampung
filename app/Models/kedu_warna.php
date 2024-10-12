<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kedu_warna extends Model
{
    use HasFactory;

    protected $table = 'kedu_warna';

    protected $fillable = [
        'nama',
        'nmr_tlp',
        'tgl',
        'jml_psr',
        'jml_hr',
        'akomodasi',
        'transport',
        'service',
        'hrg_pkt',
        'ttl_tgh',
        'created_at',
        'updated_at'
    ];
}
