<?php

namespace App\Models;

use CodeIgniter\Model;

class SlideshowM extends Model
{
  protected $table      = 'slideshow';
  protected $primaryKey = 'id_slideshow';

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';

  protected $allowedFields = ['slideshow',  'judul',  'caption', 'align'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
