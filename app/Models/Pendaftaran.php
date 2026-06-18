<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendaftaran extends Model
{
    protected $fillable = [

        'user_id',

        'tanggal_pengisian',

        'nama_perusahaan',
        'bidang_usaha',

        // kolom lama
        'nama_pic',
        'jabatan',
        'email',
        'telepon',
        'alamat',
        'tahun_cgpi',

        // kolom baru
        'nama_penanggung_jawab',
        'jabatan_penanggung_jawab',
        'divisi_penanggung_jawab',

        'nama_kontak',
        'jabatan_kontak',
        'divisi_kontak',
        'telepon_kontak',
        'email_kontak',

        'status_keikutsertaan',

        'form_pdf',
        'file_ttd',
        'bukti_pembayaran',

        'batas_upload',

        'status',

        'catatan_admin',
    ];

    protected $casts = [

        'tanggal_pengisian' => 'date',

        'batas_upload' => 'datetime',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isExpired(): bool
    {
        if (!$this->batas_upload) {
            return false;
        }

        return now()->gt($this->batas_upload);
    }
}