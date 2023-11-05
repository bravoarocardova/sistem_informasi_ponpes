<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranM extends Model
{
  protected $table      = 'pendaftaran';
  protected $primaryKey = 'id_pendaftaran';

  protected $useAutoIncrement = false;

  protected $returnType     = 'array';

  protected $allowedFields = ['nama', 'photo', 'jk',  'no_telp', 'email', 'tempat_lahir', 'tgl_lahir', 'alamat', 'asal_sekolah', 'lulus_tahun',  'status', 'jenjang_sekolah', 'id_admin', 'bukti_pembayaran', 'tgl_tes', 'nilai_tes'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
