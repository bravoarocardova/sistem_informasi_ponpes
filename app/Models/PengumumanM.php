<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanM extends Model
{
  protected $table      = 'pengumuman';
  protected $primaryKey = 'id_pengumuman';

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';

  protected $allowedFields = ['judul',  'isi',  'gambar',  'penulis'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
