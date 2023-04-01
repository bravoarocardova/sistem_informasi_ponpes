<?php

namespace App\Models;

use CodeIgniter\Model;

class UstadzM extends Model
{
  protected $table      = 'ustadz';
  protected $primaryKey = 'kd_ustadz';

  protected $useAutoIncrement = false;

  protected $returnType     = 'array';

  protected $allowedFields = ['kd_ustadz',  'nama_ustadz',  'jk',  'status',  'alamat',  'tgl_lahir',  'no_telp',  'created_at',  'updated_at'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
