<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ProfilC extends BaseController
{
  public function __construct()
  {
  }

  public function index()
  {
    return view('admin/dashboard');
  }
}
