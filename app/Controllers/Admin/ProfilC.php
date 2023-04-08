<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminM;
use App\Models\ProfilM;

class ProfilC extends BaseController
{

  private $profilM;
  private $adminM;

  public function __construct()
  {
    $this->profilM = new ProfilM();
    $this->adminM = new AdminM();
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
        'rules' => 'required|min_length[1]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
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
          if ($dataLama != null && $dataLama['logo'] != null) {
            unlink(FCPATH . '/img/icon/' . $dataLama['logo']);
          }
        }

        $simpan = $this->profilM->save($data);
        if ($simpan) {

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

  public function pengguna()
  {
    if ($this->request->is('put')) {
      $post = $this->request->getVar();

      if (empty($post['id_admin'])) {
        $id_admin = session()->get('admin')['id_admin'];
      } else {
        $id_admin = $post['id_admin'];
      }
      $dataLama = $this->adminM->find($id_admin);

      switch ($post['edit']) {
        case 'profil':
          if ($dataLama['username'] != $post['username']) {
            $roleUsername = 'required|min_length[4]|max_length[100]|is_unique[admin.username]';
          } else {
            $roleUsername = 'required|min_length[4]|max_length[100]';
          }

          $ruleFoto = 'mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,4096]';
          $foto = $this->request->getFile('foto');
          if ($foto->isValid()) {
            $ruleFoto = 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,4096]';
          }

          $ruleProfil = [
            'username' => [
              'label' => 'Username',
              'rules' => $roleUsername,
              'errors' => [
                'required' => '{field} Harus diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'max_length' => '{field} Maksimal 100 Karakter',
                'is_unique' => '{field} Sudah Dipakai'
              ],
            ],
            'nama' => [
              'label' => 'Nama',
              'rules' => 'required|min_length[4]|max_length[100]',
              'errors' => [
                'required' => '{field} Harus diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'max_length' => '{field} Maksimal 100 Karakter',
              ],
            ],
            'email' => [
              'label' => 'Email',
              'rules' => 'required|min_length[4]|max_length[100]|valid_email',
              'errors' => [
                'required' => '{field} Harus diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'max_length' => '{field} Maksimal 100 Karakter',
                'valid_email' => '{field} tidak valid'
              ],
            ],
            'no_telp' => [
              'label' => 'No Telp',
              'rules' => 'required|min_length[4]|max_length[15]|numeric',
              'errors' => [
                'required' => '{field} Harus diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'max_length' => '{field} Maksimal 15 Karakter',
                'numeric' => '{field} Harus angka'
              ],
            ],
            'foto' => [
              'label' => 'Foto',
              'rules' => $ruleFoto,
              'errors' => [
                'uploaded' => '{field} Harus ada yang diupload',
                'mime_in' => '{field} Harus [jpg, jpeg, png]',
                'max_size' => '{field} Maksimal 4mb'
              ],
            ],
          ];

          if (!$this->validate($ruleProfil)) {
            $type = 'danger';
            $msg = 'Gagal update profil!.';
          } else {
            $data = [
              'id_admin' => $id_admin,
              'username' => $post['username'],
              'nama' => $post['nama'],
              'email' => $post['email'],
              'no_telp' => $post['no_telp'],
              'role' => $post['role'] ?? $dataLama['role'],
              'is_active' => $post['status'] ?? $dataLama['is_active']
            ];

            if ($foto->isValid()) {
              $newFoto = $foto->getRandomName();
              $data['foto'] = $newFoto;
              $foto->move('img/profil/', $newFoto);

              if ($dataLama['foto'] != 'default.jpg') {
                unlink(FCPATH . '/img/profil/' . $dataLama['foto']);
              }
            }

            $this->adminM->save($data);
            $type = 'success';
            $msg = 'Berhasil update profil!.';
            if (session()->get('admin')['id_admin'] == $id_admin) {
              $newSession['admin'] = [
                'id_admin' => session()->get('admin')['id_admin'],
                'nama' => $data['nama'],
                'foto' => $data['foto'] ?? $dataLama['foto'],
                'role' => $dataLama['role'],
                'isLoggedIn' => TRUE
              ];
              session()->set($newSession);
            }
          }
          break;
        case 'password':
          $rulePassword = [
            'new_password' => [
              'label' => 'Password',
              'rules' => 'required|min_length[4]|max_length[100]',
              'errors' => [
                'required' => '{field} Harus diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'max_length' => '{field} Maksimal 100 Karakter',
              ],
            ],
            'password_verify' => [
              'label' => 'Password Verify',
              'rules' => 'required|min_length[4]|max_length[100]|matches[new_password]',
              'errors' => [
                'required' => '{field} Harus diisi',
                'min_length' => '{field} Minimal 4 Karakter',
                'max_length' => '{field} Maksimal 100 Karakter',
                'matches' => '{field} tidak cocok'
              ],
            ],
          ];

          if (!$this->validate($rulePassword)) {
            $type = 'danger';
            $msg = 'Gagal update password!.';
          } else {
            if (!password_verify($post['old_password'], $dataLama['password'])) {
              session()->setFlashdata('_ci_validation_errors', [
                'old_password' => 'Password Tidak cocok'
              ]);
              $type = 'danger';
              $msg = 'Gagal update password!.';
            } else {
              $data = [
                'id_admin' => $id_admin,
                'password' => password_hash($post['new_password'], PASSWORD_DEFAULT),
              ];
              $this->adminM->save($data);
              $type = 'success';
              $msg = 'Berhasil update password!.';
            }
          }
          break;
        default:
          $type = 'danger';
          $msg = 'Gagal update!.';
      }
      return redirect()->back()->withInput()->with('msg', myAlert($type, $msg));
    }
    return view(
      'admin/profil/pengguna',
      [
        'admin' => $this->adminM->find(session()->get('admin')['id_admin']),
      ]
    );
  }
}
