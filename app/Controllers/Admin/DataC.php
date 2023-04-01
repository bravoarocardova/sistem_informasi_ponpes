<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SantriM;
use App\Models\UstadzM;

class DataC extends BaseController
{

  private $santriM;
  private $ustadzM;

  public function __construct()
  {
    $this->santriM = new SantriM();
    $this->ustadzM = new UstadzM();
  }

  public function data_santri()
  {
    return view('admin/data/santri/data_santri_v');
  }

  public function data_ustadz()
  {
    return view('admin/data/ustadz/data_ustadz_v');
  }
}
