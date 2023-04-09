<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilM extends Model
{
  protected $table      = 'profil';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = false;

  protected $returnType     = 'array';

  protected $allowedFields = ['logo', 'nama_aplikasi',  'nama_pondok',  'alamat_pondok',  'telepon_pondok',  'email_pondok',  'lokasi_pondok',  'sejarah',  'visi',  'misi', 'struktur_pondok', 'tentang_pondok',  'peraturan_pondok'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  public function get()
  {
    return $this->find(1);
  }
}
