<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KegiatanKeasramaanM;
use App\Models\SantriM;

class Santri extends BaseController
{

  private $santriM;
  private $kegiatanKeasramaanM;

  public function __construct()
  {
    $this->santriM = new SantriM();
    $this->kegiatanKeasramaanM = new KegiatanKeasramaanM();
  }

  public function index()
  {
    $jumlahKegiatan = $this->kegiatanKeasramaanM
      ->select('*')
      ->join('nilai_keasramaan', 'nilai_keasramaan.id_kegiatan_keasramaan = kegiatan_keasramaan.id_kegiatan_keasramaan')
      ->join('santri', 'nilai_keasramaan.nis = santri.nis')
      ->where('santri.nis', session()->get('santri')['nis'])
      ->countAllResults();

    return view(
      'santri/dashboard',
      [
        'profilApp' => $this->profilApp,
        'jumlah_kegiatan' => $jumlahKegiatan
      ]
    );
  }

  public function keasramaan()
  {
    $kegiatanKeasramaan = $this->kegiatanKeasramaanM
      ->select('kegiatan_keasramaan.nama_kegiatan_keasramaan, ustadz.nama_ustadz, nilai_keasramaan.*, santri.nama_santri, santri.nis')
      ->join('nilai_keasramaan', 'nilai_keasramaan.id_kegiatan_keasramaan = kegiatan_keasramaan.id_kegiatan_keasramaan')
      ->join('santri', 'nilai_keasramaan.nis = santri.nis')
      ->join('ustadz', 'kegiatan_keasramaan.kd_ustadz = ustadz.kd_ustadz')
      ->where('santri.nis', session()->get('santri')['nis'])
      ->find();

    return view(
      'santri/keasramaan',
      [
        'profilApp' => $this->profilApp,
        'kegiatan_keasramaan' => $kegiatanKeasramaan,
      ]
    );
  }

  public function pengguna()
  {

    return view(
      'santri/pengguna',
      [
        'profilApp' => $this->profilApp,
        'santri' => $this->santriM->find(session()->get('santri')['nis']),
      ]
    );
  }

  public function edit_pengguna()
  {

    $post = $this->request->getVar();
    $dataLama = $this->santriM->find(session()->get('santri')['nis']);

    switch ($post['edit']) {
      case 'profil':

        $ruleProfil = [
          'nama_santri' => [
            'label' => 'Nama Santri',
            'rules' => 'required|min_length[1]|max_length[100]',
            'errors' => [
              'required' => '{field} Harus diisi',
              'min_length' => '{field} Minimal 1 Karakter',
              'max_length' => '{field} Maksimal 100 Karakter',
            ],
          ],
          'jk' => [
            'label' => 'Jenis Kelamin',
            'rules' => 'required|min_length[1]|max_length[100]',
            'errors' => [
              'required' => '{field} Harus diisi',
              'min_length' => '{field} Minimal 1 Karakter',
              'max_length' => '{field} Maksimal 100 Karakter',
            ],
          ],
          'alamat_lengkap' => [
            'label' => 'Alamat Lengkap',
            'rules' => 'required|min_length[1]|max_length[100]',
            'errors' => [
              'required' => '{field} Harus diisi',
              'min_length' => '{field} Minimal 1 Karakter',
              'max_length' => '{field} Maksimal 100 Karakter',
            ],
          ],
          'wali' => [
            'label' => 'Nama Wali',
            'rules' => 'required|min_length[1]|max_length[100]',
            'errors' => [
              'required' => '{field} Harus diisi',
              'min_length' => '{field} Minimal 1 Karakter',
              'max_length' => '{field} Maksimal 100 Karakter',
            ],
          ],
          'no_telp_wali' => [
            'label' => 'No Telp',
            'rules' => 'required|min_length[4]|max_length[15]|numeric',
            'errors' => [
              'required' => '{field} Harus diisi',
              'min_length' => '{field} Minimal 4 Karakter',
              'max_length' => '{field} Maksimal 15 Karakter',
              'numeric' => '{field} Harus angka'
            ],
          ],
          'tempat_lahir' => [
            'label' => 'Tempat Lahir',
            'rules' => 'required|min_length[1]|max_length[100]',
            'errors' => [
              'required' => '{field} Harus diisi',
              'min_length' => '{field} Minimal 1 Karakter',
              'max_length' => '{field} Maksimal 100 Karakter',
            ],
          ],
          'tgl_lahir' => [
            'label' => 'Tanggal Lahir',
            'rules' => 'required|min_length[1]|max_length[100]',
            'errors' => [
              'required' => '{field} Harus diisi',
              'min_length' => '{field} Minimal 1 Karakter',
              'max_length' => '{field} Maksimal 100 Karakter',
            ],
          ],
        ];

        if (!$this->validate($ruleProfil)) {
          $type = 'danger';
          $msg = 'Gagal update profil!.';
        } else {
          $data = [
            'nis' => session()->get('santri')['nis'],
            'nama_santri' => $post['nama_santri'],
            'jk' => $post['jk'],
            'alamat_lengkap' => $post['alamat_lengkap'],
            'wali' => $post['wali'],
            'no_telp_wali' => $post['no_telp_wali'],
            'tempat_lahir' => $post['tempat_lahir'],
            'tgl_lahir' => $post['tgl_lahir'],
          ];


          if ($this->santriM->save($data)) {

            $userSantri['santri'] = [
              'nis' => session()->get('santri')['nis'],
              'nama' => $post['nama_santri'],
              'isLoggedIn' => TRUE
            ];

            session()->set($userSantri);

            $type = 'success';
            $msg = 'Berhasil update profil!.';
          } else {

            $type = 'danger';
            $msg = 'Gagal update!.';
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
              'nis' => session()->get('santri')['nis'],
              'password' => password_hash($post['new_password'], PASSWORD_DEFAULT),
            ];
            $this->santriM->save($data);
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

  public function login()
  {
    if ($this->request->is('post')) {
      $post = $this->request->getVar();

      $santriCheck = $this->santriM->where(
        [
          'nis' => $post['nis'],
          'status' => 'Aktif'
        ]
      )->first();

      if ($santriCheck) {
        $passVerif = password_verify($post['password'], $santriCheck['password']);

        if ($passVerif) {
          $userSantri['santri'] = [
            'nis' => $santriCheck['nis'],
            'nama' => $santriCheck['nama_santri'],
            'isLoggedIn' => TRUE
          ];

          session()->set($userSantri);
          return redirect()->to(base_url() . 'santri/dashboard');
        } else {
          $msg = 'Username/Password tidak cocok';
        }
      } else {
        $msg = 'Username tidak ditemukan';
      }
      return redirect()->back()->with('msg', myAlert('danger', $msg));
    }

    return view(
      'santri/login',
      [
        'profilApp' => $this->profilApp,
      ]
    );
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to(base_url());
  }
}
