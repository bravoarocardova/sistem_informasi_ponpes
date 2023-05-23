<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanKeasramaanM extends Model
{
  protected $table      = 'kegiatan_keasramaan';
  protected $primaryKey = 'id_kegiatan_keasramaan';

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';

  protected $allowedFields = ['nama_kegiatan_keasramaan', 'kd_ustadz'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
