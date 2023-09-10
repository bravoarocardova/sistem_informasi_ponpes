<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataKelasM;
use App\Models\KegiatanKeasramaanM;
use App\Models\KelasM;
use App\Models\MapelM;
use App\Models\MengajarM;
use App\Models\NilaiKeasramaanM;
use App\Models\NilaiM;
use App\Models\SantriM;
use App\Models\UstadzM;

class Ustadz extends BaseController
{

  private $ustadzM;
  private $santriM;
  private $kegiatanKeasramaanM;
  private $nilaiKeasramaanM;
  private $mengajarM;
  private $kelasM;
  private $mapelM;
  private $kelasSiswaM;
  private $nilaiM;

  public function __construct()
  {
    $this->ustadzM = new UstadzM();
    $this->santriM = new SantriM();
    $this->kegiatanKeasramaanM = new KegiatanKeasramaanM();
    $this->nilaiKeasramaanM = new NilaiKeasramaanM();
    $this->mengajarM = new MengajarM();
    $this->kelasM = new KelasM();
    $this->mapelM = new MapelM();
    $this->kelasSiswaM = new DataKelasM();
    $this->nilaiM = new NilaiM();
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

  private function ruleNilai()
  {

    $rule =  [
      'nilai' => [
        'label' => 'Nilai',
        'rules' => 'required|min_length[1]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
        ],
      ],
    ];

    return $rule;
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

  public function mengajar()
  {
    $mengajar = $this->mengajarM
      ->select('distinct(mengajar.id_kelas), kelas.nama_kelas, kelas.wali_kelas, tahun_ajaran.tahun_ajaran, tahun_ajaran.semester')
      ->join('kelas', 'kelas.id_kelas = mengajar.id_kelas')
      ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = kelas.id_tahun_ajaran')
      ->where('kd_ustadz', session()->get('ustadz')['kd_ustadz'])
      ->find();

    return view(
      'ustadz/mengajar',
      [
        'profilApp' => $this->profilApp,
        'mengajar' => $mengajar,
      ]
    );
  }

  public function mapel_mengajar($id_kelas)
  {
    $mapel_mengajar = $this->mengajarM
      ->join('kelas', 'kelas.id_kelas = mengajar.id_kelas')
      ->join('mapel', 'mapel.kd_mapel = mengajar.kd_mapel')
      ->where(
        [
          'kd_ustadz' => session()->get('ustadz')['kd_ustadz'],
          'mengajar.id_kelas' => $id_kelas
        ]
      )
      ->find();

    $kelas = $this->kelasM
      ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = kelas.id_tahun_ajaran')
      ->find($id_kelas);

    return view(
      'ustadz/mapel_mengajar',
      [
        'profilApp' => $this->profilApp,
        'mapel_mengajar' => $mapel_mengajar,
        'kelas' => $kelas
      ]
    );
  }

  public function daftar_siswa_diajar($id_kelas, $kd_mapel)
  {

    $mapel = $this->mapelM->find($kd_mapel);

    $kelas = $this->kelasM
      ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = kelas.id_tahun_ajaran')
      ->find($id_kelas);

    $siswa = $this->kelasSiswaM
      ->select('data_kelas.*, mengajar.*, santri.*, mapel.*, nilai.id_nilai, nilai.nilai, nilai.created_at as dibuat, nilai.updated_at as diedit')
      ->join('mengajar', 'mengajar.id_kelas = data_kelas.id_kelas')
      ->join('mapel', 'mapel.kd_mapel = mengajar.kd_mapel')
      ->join('nilai', 'nilai.id_data_kelas = data_kelas.id_data_kelas AND nilai.kd_mapel = mengajar.kd_mapel', 'left')
      ->join('santri', 'data_kelas.nis = santri.nis')
      ->where(
        [
          'data_kelas.id_kelas' => $id_kelas,
          'mengajar.kd_mapel'  => $kd_mapel
        ]
      )
      ->find();

    return view(
      'ustadz/daftar_siswa',
      [
        'profilApp' => $this->profilApp,
        'kelas' => $kelas,
        'siswa' => $siswa,
        'mapel' => $mapel
      ]
    );
  }

  public function update_nilai_siswa_diajar($id_kelas, $kd_mapel)
  {
    if (!$this->validate($this->ruleNilai())) {
      return redirect()->back()->withInput();
    } else {
      $post = $this->request->getPost();

      $data = [
        'id_data_kelas' => $post['id_data_kelas'],
        'nilai' => $post['nilai'],
        'kd_mapel' => $kd_mapel,
      ];
      if ($post['id_nilai'] != null) {
        $data['id_nilai'] = $post['id_nilai'];
      }

      $simpan = $this->nilaiM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil ubah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal ubah data.';
      }
      return redirect()->to(base_url() . '/ustadz/nilai/' . $id_kelas . '/mapel/' . $kd_mapel)->with('msg', myAlert($type, $msg));
    }
  }

  public function kelas_saya()
  {
    $kelas_saya = $this->kelasM
      ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = kelas.id_tahun_ajaran')
      ->where('wali_kelas', session()->get('ustadz')['kd_ustadz'])
      ->find();

    return view(
      'ustadz/kelas_saya',
      [
        'profilApp' => $this->profilApp,
        'kelas_saya' => $kelas_saya,
      ]
    );
  }

  public function kelas_detail($id_kelas)
  {

    $kelas = $this->kelasM
      ->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = kelas.id_tahun_ajaran')
      ->find($id_kelas);

    $kelas_siswa = $this->kelasSiswaM
      ->join('santri', 'data_kelas.nis = santri.nis')
      ->where('id_kelas', $id_kelas)
      ->find();

    return view(
      'ustadz/data_kelas_siswa',
      [
        'profilApp' => $this->profilApp,
        'kelas_siswa' => $kelas_siswa,
        'kelas' => $kelas
      ]
    );
  }

  public function siswa_detail($id_data_kelas)
  {
    $datakelas = $this->kelasSiswaM->find($id_data_kelas);
    $kelas = $this->kelasM->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = kelas.id_tahun_ajaran')->find($datakelas['id_kelas']);
    $siswa = $this->santriM->find($datakelas['nis']);
    $data = $this->kelasSiswaM
      ->select('data_kelas.*, mengajar.*, santri.*, mapel.*, nilai.nilai, nilai.created_at as dibuat, nilai.updated_at as diedit')
      ->join('mengajar', 'mengajar.id_kelas = data_kelas.id_kelas')
      ->join('mapel', 'mapel.kd_mapel = mengajar.kd_mapel')
      ->join('santri', 'santri.nis = data_kelas.nis')
      ->join('nilai', 'nilai.id_data_kelas = data_kelas.id_data_kelas AND nilai.kd_mapel = mengajar.kd_mapel', 'left')
      ->where([
        'data_kelas.id_kelas' => $datakelas['id_kelas'],
        'data_kelas.nis' => $datakelas['nis'],
      ])
      ->findAll();

    return view('ustadz/siswa_detail', [
      'kelas' => $kelas,
      'profilApp' => $this->profilApp,
      'siswa' => $siswa,
      'nilai' => $data
    ]);
  }
}
