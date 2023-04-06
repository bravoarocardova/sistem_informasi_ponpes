<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfilM;

class ProfilC extends BaseController
{

  private $profilM;

  public function __construct()
  {
    $this->profilM = new ProfilM();
  }

  private function ruleAplikasi($is_valid_logo = true)
  {

    $rule =  [
      'logo' => [
        'label' => 'Logo',
        'rules' => ($is_valid_logo) ? 'uploaded[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]|max_size[logo,1024]' : 'mime_in[logo,image/jpg,image/jpeg,image/png]|max_size[logo,1024]',
        'errors' => [
          'uploaded' => '{field} Harus ada yang diupload',
          'mime_in' => '{field} Harus [jpg, jpeg, png]',
          'max_size' => '{field} Maksimal 1mb'
        ]
      ],
      'nama_aplikasi' => [
        'label' => 'Nama Aplikasi',
        'rules' => 'required|min_length[4]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 4 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'nama_pondok' => [
        'label' => 'Nama Pondok',
        'rules' => 'required|min_length[1]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'alamat_pondok' => [
        'label' => 'Alamat Pondok',
        'rules' => 'required|min_length[1]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'telepon_pondok' => [
        'label' => 'Telepon Pondok',
        'rules' => 'required|min_length[1]|max_length[15]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 15 Karakter',
        ],
      ],
      'email_pondok' => [
        'label' => 'Email Pondok',
        'rules' => 'required|min_length[1]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'lokasi_pondok' => [
        'label' => 'Lokasi Pondok',
        'rules' => 'required|min_length[1]|max_length[20]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 20 Karakter',
        ],
      ],
    ];

    return $rule;
  }

  public function aplikasi()
  {
    if ($this->request->is('POST')) {
      $dataLama = $this->profilM->find(1);

      $post = $this->request->getPost();

      $logo = $this->request->getFile('logo');


      $is_valid_logo = false;

      if ($logo->isValid()) {
        $is_valid_logo = true;
      }

      if (!$this->validate($this->ruleAplikasi($is_valid_logo))) {
        return redirect()->back()->withInput();
      } else {
        $data = [
          'id' => 1,
          'nama_aplikasi' => $post['nama_aplikasi'],
          'nama_pondok' => $post['nama_pondok'],
          'alamat_pondok' => $post['alamat_pondok'],
          'telepon_pondok' => $post['telepon_pondok'],
          'email_pondok' => $post['email_pondok'],
          'lokasi_pondok' => $post['lokasi_pondok'],
        ];
        if ($logo->isValid()) {
          $newlogo = $logo->getRandomName();
          $data['logo'] = $newlogo;
          $logo->move('img/icon/', $newlogo);
        }

        $simpan = $this->profilM->save($data);
        if ($simpan) {
          if ($dataLama != null && $dataLama['logo'] != null) {
            unlink(FCPATH . '/img/icon/' . $dataLama['logo']);
          }
          $type = 'success';
          $msg = 'Berhasil simpan data.';
        } else {
          $type = 'danger';
          $msg = 'Gagal simpan data.';
        }
        return redirect()->to(base_url() . 'admin/profil/aplikasi')->with('msg', myAlert($type, $msg));
      }
    }
    return view(
      'admin/profil/aplikasi',
      [
        'profil' => $this->profilM->find(1)
      ]
    );
  }

  public function sejarah()
  {
    if ($this->request->is('POST')) {
      $post = $this->request->getPost();

      if (!$this->validate([
        'sejarah' => [
          'label' => 'Sejarah Pondok',
          'rules' => 'required|min_length[1]',
          'errors' => [
            'required' => '{field} Harus diisi',
            'min_length' => '{field} Minimal 1 Karakter',
          ],
        ],
      ])) {
        return redirect()->back()->withInput();
      } else {
        $data = [
          'id' => 1,
          'sejarah' => $post['sejarah']
        ];

        $simpan = $this->profilM->save($data);
        if ($simpan) {

          $type = 'success';
          $msg = 'Berhasil simpan data.';
        } else {
          $type = 'danger';
          $msg = 'Gagal simpan data.';
        }
        return redirect()->to(base_url() . 'admin/profil/sejarah')->with('msg', myAlert($type, $msg));
      }
    }
    return view(
      'admin/profil/sejarah',
      [
        'profil' => $this->profilM->find(1)
      ]
    );
  }

  public function visi_misi()
  {
    if ($this->request->is('POST')) {
      $post = $this->request->getPost();

      if (!$this->validate([
        'visi' => [
          'label' => 'VISI',
          'rules' => 'required|min_length[1]',
          'errors' => [
            'required' => '{field} Harus diisi',
            'min_length' => '{field} Minimal 1 Karakter',
          ],
        ],
        'misi' => [
          'label' => 'MISI',
          'rules' => 'required|min_length[1]',
          'errors' => [
            'required' => '{field} Harus diisi',
            'min_length' => '{field} Minimal 1 Karakter',
          ],
        ],
      ])) {
        return redirect()->back()->withInput();
      } else {
        $data = [
          'id' => 1,
          'visi' => $post['visi'],
          'misi' => $post['misi'],
        ];

        $simpan = $this->profilM->save($data);
        if ($simpan) {

          $type = 'success';
          $msg = 'Berhasil simpan data.';
        } else {
          $type = 'danger';
          $msg = 'Gagal simpan data.';
        }
        return redirect()->to(base_url() . 'admin/profil/visi_misi')->with('msg', myAlert($type, $msg));
      }
    }
    return view(
      'admin/profil/visimisi',
      [
        'profil' => $this->profilM->find(1)
      ]
    );
  }

  public function struktur()
  {
    if ($this->request->is('POST')) {
      $dataLama = $this->profilM->find(1);

      $struktur_pondok = $this->request->getFile('struktur_pondok');

      if (!$this->validate([
        'struktur_pondok' => [
          'label' => 'Struktur Pondok',
          'rules' => 'uploaded[struktur_pondok]|mime_in[struktur_pondok,image/jpg,image/jpeg,image/png]|max_size[struktur_pondok,4096]',
          'errors' => [
            'uploaded' => '{field} Harus ada yang diupload',
            'mime_in' => '{field} Harus [jpg, jpeg, png]',
            'max_size' => '{field} Maksimal 4mb'
          ],
        ],
      ])) {
        return redirect()->back()->withInput();
      } else {
        $data = [
          'id' => 1,
        ];
        if ($struktur_pondok->isValid()) {
          $newstruktur_pondok = $struktur_pondok->getRandomName();
          $data['struktur_pondok'] = $newstruktur_pondok;
          $struktur_pondok->move('img/struktur/', $newstruktur_pondok);
        }

        $simpan = $this->profilM->save($data);
        if ($simpan) {
          if ($dataLama != null && $dataLama['struktur_pondok'] != null) {
            unlink(FCPATH . '/img/struktur/' . $dataLama['struktur_pondok']);
          }
          $type = 'success';
          $msg = 'Berhasil simpan data.';
        } else {
          $type = 'danger';
          $msg = 'Gagal simpan data.';
        }
        return redirect()->to(base_url() . 'admin/profil/struktur')->with('msg', myAlert($type, $msg));
      }
    }
    return view(
      'admin/profil/struktur',
      [
        'profil' => $this->profilM->find(1)
      ]
    );
  }

  public function peraturan_pondok()
  {
    if ($this->request->is('POST')) {
      $post = $this->request->getPost();

      if (!$this->validate([
        'peraturan_pondok' => [
          'label' => 'Peraturan Pondok',
          'rules' => 'required|min_length[1]',
          'errors' => [
            'required' => '{field} Harus diisi',
            'min_length' => '{field} Minimal 1 Karakter',
          ],
        ],
      ])) {
        return redirect()->back()->withInput();
      } else {
        $data = [
          'id' => 1,
          'peraturan_pondok' => $post['peraturan_pondok']
        ];

        $simpan = $this->profilM->save($data);
        if ($simpan) {

          $type = 'success';
          $msg = 'Berhasil simpan data.';
        } else {
          $type = 'danger';
          $msg = 'Gagal simpan data.';
        }
        return redirect()->to(base_url() . 'admin/profil/peraturan_pondok')->with('msg', myAlert($type, $msg));
      }
    }
    return view(
      'admin/profil/peraturan_pondok',
      [
        'profil' => $this->profilM->find(1)
      ]
    );
  }
}
