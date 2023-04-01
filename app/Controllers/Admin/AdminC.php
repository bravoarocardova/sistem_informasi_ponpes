<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminC extends BaseController
{
  public function __construct()
  {
  }

  public function dashboard()
  {
    return view('admin/dashboard');
  }
}
