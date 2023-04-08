<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleryM extends Model
{
  protected $table      = 'galery';
  protected $primaryKey = 'id_galery';

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';

  protected $allowedFields = ['file', 'caption',  'tipe'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
