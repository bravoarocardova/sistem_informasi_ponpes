<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KegiatanKeasramaanM;
use App\Models\NilaiKeasramaanM;
use App\Models\SantriM;
use App\Models\UstadzM;

class Ustadz extends BaseController
{

  private $ustadzM;
  private $santriM;
  private $kegiatanKeasramaanM;
  private $nilaiKeasramaanM;

  public function __construct()
  {
    $this->ustadzM = new UstadzM();
    $this->santriM = new SantriM();
    $this->kegiatanKeasramaanM = new KegiatanKeasramaanM();
    $this->nilaiKeasramaanM = new NilaiKeasramaanM();
  }

  private function ruleKegiatanKeasramaan($is_unique = true)
  {

    $ruleKegiatanKeasramaan =  [
      'kegiatan_keasramaan' => [
        'label' => 'Kegiatan Keasramaan',
        'rules' => ($is_unique) ? 'required|min_length[4]|max_length[100]|is_unique[kegiatan_keasramaan.nama_kegiatan_keasramaan]' : 'required|min_length[4]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 4 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
          'is_unique' => '{field} Sudah Ada'
        ],
      ],
    ];

    return $ruleKegiatanKeasramaan;
  }

  private function ruleNilaiKeasramaan($is_unique = true)
  {

    $ruleNilaiKeasramaan =  [
      'nis' => [
        'label' => 'NIS',
        'rules' => ($is_unique) ? 'required|min_length[4]|max_length[100]' : 'required|min_length[1]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
          'is_unique' => '{field} Sudah Ada'
        ],
      ],
      'nilai' => [
        'label' => 'Nilai',
        'rules' => 'required|min_length[1]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
        ],
      ],
    ];

    return $ruleNilaiKeasramaan;
  }

  private function ruleNilaiKeasramaan2()
  {

    $ruleNilaiKeasramaan2 =  [
      'nilai' => [
        'label' => 'Nilai',
        'rules' => 'required|min_length[1]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
        ],
      ],
    ];

    return $ruleNilaiKeasramaan2;
  }

  public function index()
  {
    $jumlahKegiatan = $this->kegiatanKeasramaanM
      ->select('*')
      ->where('kd_ustadz', session()->get('ustadz')['kd_ustadz'])
      ->countAllResults();

    $jumlahDinilai = $this->kegiatanKeasramaanM
      ->select('*')
      ->join('nilai_keasramaan', 'kegiatan_keasramaan.id_kegiatan_keasramaan = nilai_keasramaan.id_kegiatan_keasramaan')
      ->where('kd_ustadz', session()->get('ustadz')['kd_ustadz'])
      ->countAllResults();

    return view(
      'ustadz/dashboard',
      [
        'profilApp' => $this->profilApp,
        'jumlah_kegiatan' => $jumlahKegiatan,
        'jumlah_dinilai' => $jumlahDinilai,
      ]
    );
  }

  public function keasramaan()
  {
    $kegiatanKeasramaan = $this->kegiatanKeasramaanM
      ->where('kd_ustadz', session()->get('ustadz')['kd_ustadz'])
      ->find();

    return view(
      'ustadz/keasramaan',
      [
        'profilApp' => $this->profilApp,
        'kegiatan_keasramaan' => $kegiatanKeasramaan,
      ]
    );
  }

  public function tambah_keasramaan()
  {
    return view('ustadz/tambah_keasramaan_form', [
      'profilApp' => $this->profilApp,
    ]);
  }

  public function proses_tambah_keasramaan()
  {
    if (!$this->validate($this->ruleKegiatanKeasramaan())) {
      return redirect()->back()->withInput();
    } else {
      $post = $this->request->getPost();

      $data = [
        'nama_kegiatan_keasramaan' => $post['kegiatan_keasramaan'],
        'kd_ustadz' => session('ustadz')['kd_ustadz'],
      ];

      $simpan = $this->kegiatanKeasramaanM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'ustadz/keasramaan')->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_keasramaan($id_kegiatan_keasramaan)
  {
    return view('ustadz/edit_keasramaan_form', [
      'kegiatan_keasramaan' => $this->kegiatanKeasramaanM->find($id_kegiatan_keasramaan),
      'profilApp' => $this->profilApp,
      'ustadz' => $this->ustadzM->findAll(),
    ]);
  }

  public function proses_edit_keasramaan($id_kegiatan_keasramaan)
  {
    $dataLama = $this->kegiatanKeasramaanM->find($id_kegiatan_keasramaan);

    $post = $this->request->getPost();

    $is_unique = true;
    if ($dataLama['nama_kegiatan_keasramaan'] == $post['kegiatan_keasramaan']) {
      $is_unique = false;
    }

    if (!$this->validate($this->ruleKegiatanKeasramaan($is_unique))) {
      return redirect()->back()->withInput();
    } else {
      $data = [
        'id_kegiatan_keasramaan' => $id_kegiatan_keasramaan,
        'nama_kegiatan_keasramaan' => $post['kegiatan_keasramaan'],
      ];

      $simpan = $this->kegiatanKeasramaanM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil ubah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal ubah data.';
      }
      return redirect()->to(base_url() . 'ustadz/keasramaan')->with('msg', myAlert($type, $msg));
    }
  }

  public function hapus_keasramaan($id_kegiatan_keasramaan)
  {
    $hapus = $this->kegiatanKeasramaanM->delete($id_kegiatan_keasramaan);
    if ($hapus) {
      $type = 'success';
      $msg = 'Berhasil dihapus.';
    } else {
      $type = 'danger';
      $msg = 'Gagal dihapus.';
    }
    return redirect()->back()->with('msg', myAlert($type, $msg));
  }

  public function pengguna()
  {

    return view(
      'ustadz/pengguna',
      [
        'profilApp' => $this->profilApp,
        'ustadz' => $this->ustadzM->find(session()->get('ustadz')['kd_ustadz']),
      ]
    );
  }

  public function edit_pengguna()
  {

    $post = $this->request->getVar();
    $dataLama = $this->ustadzM->find(session()->get('ustadz')['kd_ustadz']);

    switch ($post['edit']) {
      case 'profil':

        $ruleProfil = [
          'nama_ustadz' => [
            'label' => 'Nama Ustadz',
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
          'alamat' => [
            'label' => 'Alamat Lengkap',
            'rules' => 'required|min_length[1]|max_length[100]',
            'errors' => [
              'required' => '{field} Harus diisi',
              'min_length' => '{field} Minimal 1 Karakter',
              'max_length' => '{field} Maksimal 100 Karakter',
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
            'kd_ustadz' => session()->get('ustadz')['kd_ustadz'],
            'nama_ustadz' => $post['nama_ustadz'],
            'jk' => $post['jk'],
            'alamat' => $post['alamat'],
            'no_telp' => $post['no_telp'],
            'tgl_lahir' => $post['tgl_lahir'],
          ];


          if ($this->ustadzM->save($data)) {

            $userUstadz['ustadz'] = [
              'kd_ustadz' => session()->get('ustadz')['kd_ustadz'],
              'nama' => $post['nama_ustadz'],
              'jk' => $post['jk'],
              'isLoggedIn' => TRUE
            ];

            session()->set($userUstadz);

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
              'kd_ustadz' => session()->get('ustadz')['kd_ustadz'],
              'password' => password_hash($post['new_password'], PASSWORD_DEFAULT),
            ];
            $this->ustadzM->save($data);
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

  // detail
  public function detail_keasramaan($id_kegiatan_keasramaan)
  {
    return view('ustadz/nilai/data_nilai_keasramaan_v', [
      'profilApp' => $this->profilApp,
      'kegiatan_keasramaan' => $this->kegiatanKeasramaanM->find($id_kegiatan_keasramaan),
      'nilai_keasramaan' => $this->nilaiKeasramaanM->select('nilai_keasramaan.*, santri.nama_santri')->where('id_kegiatan_keasramaan', $id_kegiatan_keasramaan)->join('santri', 'nilai_keasramaan.nis = santri.nis')->find(),
    ]);
  }

  public function tambah_detail_keasramaan($id_kegiatan_keasramaan)
  {
    return view('ustadz/nilai/tambah_nilai_keasramaan_form', [
      'profilApp' => $this->profilApp,
      'kegiatan_keasramaan' => $this->kegiatanKeasramaanM->find($id_kegiatan_keasramaan),
      'santri' => $this->santriM->where('status', 'Aktif')->findAll(),
    ]);
  }

  public function proses_tambah_detail_keasramaan($id_kegiatan_keasramaan)
  {
    if (!$this->validate($this->ruleNilaiKeasramaan())) {
      return redirect()->back()->withInput();
    } else {
      $post = $this->request->getPost();

      $data = [
        'id_kegiatan_keasramaan' => $id_kegiatan_keasramaan,
        'nis' => $post['nis'],
        'nilai' => $post['nilai'],
        'keterangan' => $post['keterangan'],
      ];
      // dd($data);
      $simpan = $this->nilaiKeasramaanM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'ustadz/keasramaan/detail/' . $id_kegiatan_keasramaan)->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_detail_keasramaan($id_kegiatan_keasramaan, $id_nilai_keasramaan)
  {
    return view('ustadz/nilai/edit_nilai_keasramaan_form', [
      'profilApp' => $this->profilApp,
      'kegiatan_keasramaan' => $this->kegiatanKeasramaanM->find($id_kegiatan_keasramaan),
      'nilai_keasramaan' => $this->nilaiKeasramaanM->join('santri', 'santri.nis = nilai_keasramaan.nis')->find($id_nilai_keasramaan),
    ]);
  }

  public function proses_edit_detail_keasramaan($id_kegiatan_keasramaan, $id_nilai_keasramaan)
  {

    $post = $this->request->getPost();

    if (!$this->validate($this->ruleNilaiKeasramaan2())) {
      return redirect()->back()->withInput();
    } else {
      $data = [
        'id_nilai_keasramaan' => $id_nilai_keasramaan,
        'nilai' => $post['nilai'],
        'keterangan' => $post['keterangan'],
      ];

      $simpan = $this->nilaiKeasramaanM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil ubah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal ubah data.';
      }
      return redirect()->to(base_url() . 'ustadz/keasramaan/detail/' . $id_kegiatan_keasramaan)->with('msg', myAlert($type, $msg));
    }
  }

  public function hapus_detail_keasramaan($id_kegiatan_keasramaan, $id_nilai_keasramaan)
  {
    $hapus = $this->nilaiKeasramaanM->delete($id_nilai_keasramaan);
    if ($hapus) {
      $type = 'success';
      $msg = 'Berhasil dihapus.';
    } else {
      $type = 'danger';
      $msg = 'Gagal dihapus.';
    }
    return redirect()->back()->with('msg', myAlert($type, $msg));
  }
}
