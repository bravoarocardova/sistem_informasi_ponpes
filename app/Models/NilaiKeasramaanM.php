<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiKeasramaanM extends Model
{
  protected $table      = 'nilai_keasramaan';
  protected $primaryKey = 'id_nilai_keasramaan';

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';

  protected $allowedFields = ['id_kegiatan_keasramaan',  'nis',  'nilai', 'keterangan'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
