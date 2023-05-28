<?php

namespace App\Models;

use CodeIgniter\Model;

class SantriM extends Model
{
  protected $table      = 'santri';
  protected $primaryKey = 'nis';

  protected $useAutoIncrement = false;

  protected $returnType     = 'array';

  protected $allowedFields = ['nis',  'nama_santri',  'jk',  'tgl_masuk',  'alamat_lengkap',  'status',  'no_telp_wali',  'wali',  'tempat_lahir',  'tgl_lahir', 'jenjang_sekolah', 'password'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
