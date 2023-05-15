<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanM extends Model
{
  protected $table      = 'kegiatan';
  protected $primaryKey = 'id_kegiatan';

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';

  protected $allowedFields = ['hari_kegiatan', 'kegiatan'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
