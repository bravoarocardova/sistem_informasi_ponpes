<?php

namespace App\Controllers;

use App\Models\GaleryM;
use App\Models\KegiatanM;
use App\Models\PendaftaranM;
use App\Models\PengumumanM;
use App\Models\SlideshowM;

class Home extends BaseController
{

  private $slideshowM;
  private $galeryM;
  private $pengumumanM;
  private $pendaftaranM;

  public function __construct()
  {
    $this->slideshowM = new SlideshowM();
    $this->galeryM = new GaleryM();
    $this->pengumumanM = new PengumumanM();
    $this->pendaftaranM = new PendaftaranM();
  }

  public function index()
  {
    return view('home/home_v', [
      'profilApp' => $this->profilApp,
      'slideshow' => $this->slideshowM->findAll(),
      'galery' => $this->galeryM->orderBy('id_galery', 'DESC')->findAll(6),
      'pengumuman' => $this->pengumumanM->orderBy('id_pengumuman', 'DESC')->findAll(4),
      'pengumuman_aside' => $this->pengumumanM->orderBy('id_pengumuman', 'RANDOM')->findAll(5),

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
      'pengumuman' => $this->pengumumanM->orderBy('id_pengumuman', 'DESC')->findAll()

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
        'rules' => 'required|min_length[4]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 4 Karakter',
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

        $id_pendaftaran = createInvoice('PDS-', $this->pendaftaranM, 'id_pendaftaran');
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
        ];
        d($data);
        $simpan = $this->pendaftaranM->save($data);
        if ($simpan) {
          $photo->move('img/pendaftaran/', $newPhoto);
          $type = 'success';
          $msg = 'Berhasil tambah data.';
        } else {
          $type = 'danger';
          $msg = 'Gagal tambah data.';
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
