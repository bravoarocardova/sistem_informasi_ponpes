<?php

namespace App\Controllers;

use App\Models\AdminM;
use App\Models\GaleryM;
use App\Models\KegiatanM;
use App\Models\PendaftaranM;
use App\Models\PengumumanM;
use App\Models\SantriM;
use App\Models\SlideshowM;
use App\Models\UstadzM;

class Home extends BaseController
{

  private $slideshowM;
  private $galeryM;
  private $pengumumanM;
  private $pendaftaranM;
  private $santriM;
  private $ustadzM;
  private $adminM;

  public function __construct()
  {
    $this->adminM = new AdminM();
    $this->santriM = new SantriM();
    $this->ustadzM = new UstadzM();
    $this->slideshowM = new SlideshowM();
    $this->galeryM = new GaleryM();
    $this->pengumumanM = new PengumumanM();
    $this->pendaftaranM = new PendaftaranM();
  }

  public function index()
  {
    $santriM = new SantriM();

    return view('home/home_v', [
      'profilApp' => $this->profilApp,
      'slideshow' => $this->slideshowM->findAll(),
      'galery' => $this->galeryM->orderBy('id_galery', 'DESC')->findAll(6),
      'pengumuman' => $this->pengumumanM->orderBy('id_pengumuman', 'DESC')->findAll(4),
      'pengumuman_aside' => $this->pengumumanM->orderBy('id_pengumuman', 'RANDOM')->findAll(5),
      'santri' => $santriM->select('jenjang_sekolah, count(*) as jumlah')->groupBy('jenjang_sekolah')->find(),
    ]);
  }

  public function galery()
  {
    return view('home/galery_v', [
      'profilApp' => $this->profilApp,
      'galery' => $this->galeryM->orderBy('id_galery', 'DESC')->findAll()
    ]);
  }

  public function pengumuman()
  {
    return view('home/pengumuman_v', [
      'profilApp' => $this->profilApp,
      'pengumuman' => $this->pengumumanM->orderBy('id_pengumuman', 'DESC')->findAll(),
      'kategori' => ''
    ]);
  }

  public function pengumuman_berita()
  {
    return view('home/pengumuman_v', [
      'profilApp' => $this->profilApp,
      'pengumuman' => $this->pengumumanM->where('kategori', 'berita')->orderBy('id_pengumuman', 'DESC')->findAll(),
      'kategori' => 'Berita'
    ]);
  }

  public function pengumuman_kelulusan()
  {
    return view('home/pengumuman_v', [
      'profilApp' => $this->profilApp,
      'pengumuman' => $this->pengumumanM->where('kategori', 'kelulusan')->orderBy('id_pengumuman', 'DESC')->findAll(),
      'kategori' => 'Kelulusan'
    ]);
  }

  public function detail_pengumuman($id_pengumuman)
  {
    return view('home/detail_pengumuman_v', [
      'profilApp' => $this->profilApp,
      'pengumuman' => $this->pengumumanM->find($id_pengumuman),
      'pengumuman_aside' => $this->pengumumanM->orderBy('id_pengumuman', 'RANDOM')->findAll(5),
    ]);
  }

  public function sejarah()
  {
    return view('home/profil/sejarah_v', [
      'profilApp' => $this->profilApp,

    ]);
  }

  public function visi_misi()
  {
    return view('home/profil/visi_misi_v', [
      'profilApp' => $this->profilApp,

    ]);
  }

  public function struktur_organisasi()
  {
    return view('home/profil/struktur_organisasi_v', [
      'profilApp' => $this->profilApp,

    ]);
  }

  public function peraturan_pondok()
  {
    return view('home/profil/peraturan_pondok_v', [
      'profilApp' => $this->profilApp,

    ]);
  }

  public function kegiatan()
  {
    $kegiatanM = new KegiatanM();
    return view('home/kegiatan_v', [
      'profilApp' => $this->profilApp,
      'kegiatan' => $kegiatanM->findAll(),
      'pengumuman_aside' => $this->pengumumanM->orderBy('id_pengumuman', 'RANDOM')->findAll(5),
    ]);
  }

  private function ruleCalonSantri()
  {

    $ruleCalonSantri =  [
      'photo' => [
        'label' => 'Photo',
        'rules' => 'uploaded[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]|max_size[photo,4096]',
        'errors' => [
          'uploaded' => '{field} Harus ada yang diupload',
          'mime_in' => '{field} Harus [jpg, jpeg, png]',
          'max_size' => '{field} Maksimal 4mb'
        ]
      ],
      'nama' => [
        'label' => 'Nama Calon Santri',
        'rules' => 'required|min_length[2]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 2 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
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
        'rules' => 'required|min_length[4]|max_length[15]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 4 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'jk' => [
        'label' => 'Jenis Kelamin',
        'rules' => 'required|min_length[1]|max_length[1]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 1 Karakter',
        ],
      ],
      'asal_sekolah' => [
        'label' => 'Asal Sekolah',
        'rules' => 'required|min_length[1]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'lulus_tahun' => [
        'label' => 'Lulus Tahun',
        'rules' => 'required|numeric|min_length[4]|max_length[4]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 4 Karakter',
          'max_length' => '{field} Maksimal 4 Karakter',
          'numeric' => '{field} Harus Angka'
        ],
      ],
      'alamat' => [
        'label' => 'Alamat Lengkap',
        'rules' => 'required|min_length[1]|max_length[150]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 150 Karakter',
        ],
      ],
      'no_telp' => [
        'label' => 'No Telp',
        'rules' => 'required|numeric|min_length[4]|max_length[15]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 4 Karakter',
          'max_length' => '{field} Maksimal 15 Karakter',
          'numeric' => '{field} Harus Angka'
        ],
      ],
      'email' => [
        'label' => 'Email',
        'rules' => 'required|min_length[1]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'jenjang_sekolah' => [
        'label' => 'Jenjang Sekolah',
        'rules' => 'required|min_length[1]|max_length[5]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 5 Karakter',
        ],
      ],
    ];

    return $ruleCalonSantri;
  }

  public function pendaftaran()
  {
    if (@$this->request->getVar('key')) {
      return redirect()->to(base_url() . 'pendaftaran/' . $this->request->getVar('key'));
    }

    if ($this->request->is('post')) {

      if (!$this->validate($this->ruleCalonSantri())) {
        return redirect()->back()->withInput();
      } else {
        $post = $this->request->getVar();
        $photo = $this->request->getFile('photo');

        $newPhoto = $photo->getRandomName();

        $id_pendaftaran = createInvoice('PDS-', $this->pendaftaranM, 'id_pendaftaran', 4);
        $data = [
          'id_pendaftaran' => $id_pendaftaran,
          'photo' => $newPhoto,
          'nama' => $post['nama'],
          'jk' => $post['jk'],
          'tempat_lahir' => $post['tempat_lahir'],
          'tgl_lahir' => $post['tgl_lahir'],
          'asal_sekolah' => $post['asal_sekolah'],
          'lulus_tahun' => $post['lulus_tahun'],
          'alamat' => $post['alamat'],
          'no_telp' => $post['no_telp'],
          'email' => $post['email'],
          'jenjang_sekolah' => $post['jenjang_sekolah'],
        ];

        $simpan = $this->pendaftaranM->save($data);
        if ($simpan) {
          $photo->move('img/pendaftaran/', $newPhoto);
          $type = 'success mb-5';
          $msg = 'Pendaftaran Berhasil Silahkan cetak dokumen pendaftaran ini.';
        } else {
          $type = 'danger mb-5';
          $msg = 'Pendaftaran Gagal.';
        }
        return redirect()->to(base_url() . 'pendaftaran/' . $id_pendaftaran)->with('msg', myAlert($type, $msg));
      }
    }

    return view('home/pendaftaran_v', [
      'profilApp' => $this->profilApp,

    ]);
  }

  public function detail_pendaftaran($id_pendaftaran)
  {

    if ($this->request->is('post')) {
      if (!$this->validate(
        [
          'bukti_pembayaran' => [
            'label' => 'Bukti Pembayaran',
            'rules' => 'uploaded[bukti_pembayaran]|mime_in[bukti_pembayaran,image/jpg,image/jpeg,image/png]|max_size[bukti_pembayaran,4096]',
            'errors' => [
              'uploaded' => '{field} Harus ada yang diupload',
              'mime_in' => '{field} Harus [jpg, jpeg, png]',
              'max_size' => '{field} Maksimal 4mb'
            ]
          ],
        ]
      )) {
      } else {
        $photo = $this->request->getFile('bukti_pembayaran');

        $buktiPembayaran = $photo->getRandomName();
        $data = [
          'id_pendaftaran' => $id_pendaftaran,
          'bukti_pembayaran' => $buktiPembayaran,
        ];

        $simpan = $this->pendaftaranM->save($data);
        if ($simpan) {
          $photo->move('img/bukti/', $buktiPembayaran);
          $type = 'success mb-5';
          $msg = 'Pendaftaran Berhasil Silahkan cetak dokumen pendaftaran ini.';
        } else {
          $type = 'danger mb-5';
          $msg = 'Pendaftaran Gagal.';
        }
        return redirect()->to(base_url() . 'pendaftaran/' . $id_pendaftaran)->with('msg', myAlert($type, $msg));
      }
    } else {
      $santri_daftar = $this->pendaftaranM->find($id_pendaftaran);
      if ($santri_daftar == null) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Tidak ditemukan");
      }

      return view('home/detail_pendaftaran_v', [
        'profilApp' => $this->profilApp,
        'santri_daftar' => $santri_daftar
      ]);
    }
  }

  public function login()
  {
    if ($this->request->is('post')) {
      $post = $this->request->getVar();

      if ($post['role'] == 'santri') {
        $santriCheck = $this->santriM->where(
          [
            'nis' => $post['username'],
            'status' => 'Aktif'
          ]
        )->first();

        if ($santriCheck) {
          $passVerif = password_verify($post['password'], $santriCheck['password']);

          if ($passVerif) {
            $userSantri['santri'] = [
              'nis' => $santriCheck['nis'],
              'nama' => $santriCheck['nama_santri'],
              'jk' => $santriCheck['jk'],
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
      } else if ($post['role'] == 'ustadz') {
        $ustadzCheck = $this->ustadzM->where(
          [
            'kd_ustadz' => $post['username'],
            'status' => 'Aktif'
          ]
        )->first();

        if ($ustadzCheck) {
          $passVerif = password_verify($post['password'], $ustadzCheck['password']);

          if ($passVerif) {
            $userUstadz['ustadz'] = [
              'kd_ustadz' => $ustadzCheck['kd_ustadz'],
              'nama' => $ustadzCheck['nama_ustadz'],
              'jk' => $ustadzCheck['jk'],
              'isLoggedIn' => TRUE
            ];

            session()->set($userUstadz);
            return redirect()->to(base_url() . 'ustadz/dashboard');
          } else {
            $msg = 'Username/Password tidak cocok';
          }
        } else {
          $msg = 'Username tidak ditemukan';
        }
      } else {
        $adminCheck = $this->adminM->where(
          [
            'username' => $post['username'],
            'is_active' => 1
          ]
        )->first();
        if ($adminCheck) {
          $passVerif = password_verify($post['password'], $adminCheck['password']);
          // $passVerif = $post['password'] == $adminCheck['password'];
          if ($passVerif) {
            $userAdminSess['admin'] = [
              'id_admin' => $adminCheck['id_admin'],
              'nama' => $adminCheck['nama'],
              'foto' => $adminCheck['foto'],
              'role' => $adminCheck['role'],
              'isLoggedIn' => TRUE
            ];

            session()->set($userAdminSess);
            return redirect()->to(base_url() . 'admin/dashboard');
          } else {
            $msg = 'Username/Password tidak cocok';
          }
        } else {
          $msg = 'Username tidak ditemukan';
        }
      }
      return redirect()->back()->with('msg', myAlert('danger', $msg));
    }

    return view(
      'home/login',
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
