<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminM;
use App\Models\SantriM;
use App\Models\UstadzM;

class AdminC extends BaseController
{
  public function __construct()
  {
  }

  public function dashboard()
  {
    $santri = new SantriM();
    $ustadz = new UstadzM();
    $admin = new AdminM();
    $data = [
      'jumlah_santri' => $santri->countAllResults(),
      'jumlah_ustadz' => $ustadz->countAllResults(),
      'jumlah_pendaftar' => 0,
      'jumlah_admin' => $admin->countAllResults(),
    ];
    return view('admin/dashboard', $data);
  }
}
