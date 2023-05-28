<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IsLoggedInSantriFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // Do something here
    if (empty(session()->get('santri')['isLoggedIn'])) {
      return redirect()->to(base_url() . 'login');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}
