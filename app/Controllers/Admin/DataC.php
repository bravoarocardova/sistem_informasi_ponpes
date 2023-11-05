<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DataKelasM;
use App\Models\GaleryM;
use App\Models\KegiatanKeasramaanM;
use App\Models\KegiatanM;
use App\Models\KelasM;
use App\Models\MapelM;
use App\Models\MengajarM;
use App\Models\NilaiKeasramaanM;
use App\Models\SantriM;
use App\Models\UstadzM;
use App\Models\PengumumanM;
use App\Models\SlideshowM;
use App\Models\PendaftaranM;
use App\Models\TahunAjaranM;

class DataC extends BaseController
{

  private $santriM;
  private $ustadzM;
  private $pengumumanM;
  private $slideshowM;
  private $galeryM;
  private $pendaftaranM;
  private $kegiatanM;
  private $kegiatanKeasramaanM;
  private $nilaiKeasramaanM;
  private $mapelM;
  private $kelasM;
  private $tahunAjaranM;
  private $kelasSiswaM;
  private $mengajarM;

  public function __construct()
  {
    $this->santriM = new SantriM();
    $this->ustadzM = new UstadzM();
    $this->pengumumanM = new PengumumanM();
    $this->slideshowM = new SlideshowM();
    $this->galeryM = new GaleryM();
    $this->pendaftaranM = new PendaftaranM();
    $this->kegiatanM = new KegiatanM();
    $this->kegiatanKeasramaanM = new KegiatanKeasramaanM();
    $this->nilaiKeasramaanM = new NilaiKeasramaanM();
    $this->mapelM = new MapelM();
    $this->kelasM = new KelasM();
    $this->tahunAjaranM = new TahunAjaranM();
    $this->kelasSiswaM = new DataKelasM();
    $this->mengajarM = new MengajarM();
  }

  private function ruleSantri($is_unique = true, $pass_req = true)
  {

    $ruleSantri =  [
      'nis' => [
        'label' => 'NIS',
        'rules' => ($is_unique) ? 'required|numeric|is_unique[santri.nis]' : 'required|numeric',
        'errors' => [
          'required' => '{field} Harus diisi',
          'is_unique' => '{field} Sudah Ada',
          'numeric' => '{field} Harus Angka'
        ]
      ],
      'password' => [
        'label' => 'Password',
        'rules' => ($pass_req) ? 'required|min_length[4]|max_length[100]' : 'max_length[0]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 4 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'nama_santri' => [
        'label' => 'Nama Santri',
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
      'tgl_masuk' => [
        'label' => 'Tanggal Masuk',
        'rules' => 'required|min_length[1]|max_length[20]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 20 Karakter',
        ],
      ],
      'alamat_lengkap' => [
        'label' => 'Alamat Lengkap',
        'rules' => 'required|min_length[1]|max_length[150]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 150 Karakter',
        ],
      ],
      'no_telp_wali' => [
        'label' => 'No Telp Wali',
        'rules' => 'required|numeric|min_length[4]|max_length[15]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 4 Karakter',
          'max_length' => '{field} Maksimal 15 Karakter',
          'numeric' => '{field} Harus Angka'
        ],
      ],
      'wali' => [
        'label' => 'Wali',
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

    return $ruleSantri;
  }

  private function ruleUstadz($is_unique = true, $pass_req = true)
  {

    $ruleUstadz =  [
      'kd_ustadz' => [
        'label' => 'Kode Ustadz',
        'rules' => ($is_unique) ? 'required|is_unique[ustadz.kd_ustadz]' : 'required',
        'errors' => [
          'required' => '{field} Harus diisi',
          'is_unique' => '{field} Sudah Ada',
        ]
      ],
      'password' => [
        'label' => 'Password',
        'rules' => ($pass_req) ? 'required|min_length[4]|max_length[100]' : 'max_length[0]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 4 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'nama_ustadz' => [
        'label' => 'Nama Ustadz',
        'rules' => 'required|min_length[4]|max_length[100]',
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
      'alamat' => [
        'label' => 'Alamat',
        'rules' => 'required|min_length[1]|max_length[150]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 150 Karakter',
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
    ];

    return $ruleUstadz;
  }

  private function ruleMapel($is_unique = true)
  {

    $rules =  [
      'kd_mapel' => [
        'label' => 'Kode Mapel',
        'rules' => ($is_unique) ? 'required|is_unique[mapel.kd_mapel]' : 'required',
        'errors' => [
          'required' => '{field} Harus diisi',
          'is_unique' => '{field} Sudah Ada',
        ]
      ],
      'nama_mapel' => [
        'label' => 'Nama Mapel',
        'rules' => 'required|min_length[1]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
    ];

    return $rules;
  }

  private function ruleTahunAjaran()
  {

    $rules =  [
      'tahun_ajaran' => [
        'label' => 'Tahun Ajaran',
        'rules' => 'required|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'max_length' => '{field} Maksimal 100 Karakter',
        ]
      ],
      'semester' => [
        'label' => 'Semester',
        'rules' => 'required|min_length[1]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
    ];

    return $rules;
  }

  private function ruleKelas()
  {

    $rules =  [
      'nama_kelas' => [
        'label' => 'Nama Kelas',
        'rules' => 'required|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'max_length' => '{field} Maksimal 100 Karakter',
        ]
      ],
      'wali_kelas' => [
        'label' => 'Wali Kelas',
        'rules' => 'required|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'id_tahun_ajaran' => [
        'label' => 'Tahun Ajaran',
        'rules' => 'required|min_length[1]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
    ];

    return $rules;
  }

  private function ruleKelasMapel()
  {

    $rules =  [
      'kd_mapel' => [
        'label' => 'Mata Pelajaran',
        'rules' => 'required|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'max_length' => '{field} Maksimal 100 Karakter',
        ]
      ],
      'kd_ustadz' => [
        'label' => 'Pengajar',
        'rules' => 'required|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
    ];

    return $rules;
  }

  private function rulePengumuman($is_valid_gambar = true)
  {

    $rulePengumuman =  [
      'gambar' => [
        'label' => 'Gambar',
        'rules' => ($is_valid_gambar) ? 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,4096]' : 'mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,4096]',
        'errors' => [
          'uploaded' => '{field} Harus ada yang diupload',
          'mime_in' => '{field} Harus [jpg, jpeg, png]',
          'max_size' => '{field} Maksimal 4mb'
        ]
      ],
      'judul' => [
        'label' => 'Judul',
        'rules' => 'required|min_length[4]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 4 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'isi' => [
        'label' => 'Isi',
        'rules' => 'required|min_length[1]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
        ],
      ],
      'kategori' => [
        'label' => 'Kategori',
        'rules' => 'required|min_length[1]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
        ],
      ],
    ];

    return $rulePengumuman;
  }

  private function ruleKegiatan($is_unique = true)
  {

    $ruleKegiatan =  [
      'hari_kegiatan' => [
        'label' => 'Hari Kegiatan',
        'rules' => ($is_unique) ? 'required|min_length[4]|max_length[100]|is_unique[kegiatan.hari_kegiatan]' : 'required|min_length[4]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 4 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
          'is_unique' => '{field} Sudah Ada'
        ],
      ],
      'kegiatan' => [
        'label' => 'Kegiatan',
        'rules' => 'required|min_length[1]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
        ],
      ],
    ];

    return $ruleKegiatan;
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
      'kd_ustadz' => [
        'label' => 'kd_ustadz',
        'rules' => 'required|min_length[1]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
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

  private function ruleSlideshow($is_valid_slideshow = true)
  {

    $ruleSlideshow =  [
      'slideshow' => [
        'label' => 'Slideshow',
        'rules' => ($is_valid_slideshow) ? 'uploaded[slideshow]|mime_in[slideshow,image/jpg,image/jpeg,image/png]|max_size[slideshow,4096]' : 'mime_in[slideshow,image/jpg,image/jpeg,image/png]|max_size[slideshow,4096]',
        'errors' => [
          'uploaded' => '{field} Harus ada yang diupload',
          'mime_in' => '{field} Harus [jpg, jpeg, png]',
          'max_size' => '{field} Maksimal 4mb'
        ]
      ],
      'judul' => [
        'label' => 'Judul',
        'rules' => 'max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'caption' => [
        'label' => 'Caption',
        'rules' => 'max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'align' => [
        'label' => 'Align',
        'rules' => 'max_length[10]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 10 Karakter',
        ],
      ],
    ];

    return $ruleSlideshow;
  }

  private function ruleGalery($is_valid_file = true)
  {

    $ruleGalery =  [
      'file' => [
        'label' => 'File',
        'rules' => ($is_valid_file) ? 'uploaded[file]|mime_in[file,image/jpg,image/jpeg,image/png]|max_size[file,4096]' : 'mime_in[file,image/jpg,image/jpeg,image/png]|max_size[file,4096]',
        'errors' => [
          'uploaded' => '{field} Harus ada yang diupload',
          'mime_in' => '{field} Harus [jpg, jpeg, png]',
          'max_size' => '{field} Maksimal 4mb'
        ]
      ],
      'caption' => [
        'label' => 'Caption',
        'rules' => 'required|min_length[1]|max_length[100]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 100 Karakter',
        ],
      ],
      'tipe' => [
        'label' => 'Tipe',
        'rules' => 'required|min_length[1]|max_length[10]',
        'errors' => [
          'required' => '{field} Harus diisi',
          'min_length' => '{field} Minimal 1 Karakter',
          'max_length' => '{field} Maksimal 10 Karakter',
        ],
      ],
    ];

    return $ruleGalery;
  }

  public function data_santri()
  {
    $santri = $this->santriM->where('status', 'Aktif')->find();
    $list_tahun = $this->santriM->select('YEAR(tgl_masuk) as tahun_masuk')->distinct()->orderBy('tahun_masuk', 'DESC')->find();

    $post = $this->request->getPost();
    $filter_jk = 'ALL';
    $filter_jenjang = 'ALL';
    $filter_tahun = 'ALL';

    if ($this->request->is('post')) {

      $where['status'] = 'Aktif';

      if ($post['filter_jk'] != 'ALL') {
        $where['jk'] = $post['filter_jk'];
        $filter_jk = $post['filter_jk'];
      }

      if ($post['filter_jenjang'] != 'ALL') {
        $where['jenjang_sekolah'] = $post['filter_jenjang'];
        $filter_jenjang = $post['filter_jenjang'];
      }

      if ($post['filter_tahun'] != 'ALL') {
        $where['YEAR(tgl_masuk)'] = $post['filter_tahun'];
        $filter_tahun = $post['filter_tahun'];
      }

      $santri = $this->santriM->where($where)->find();
    }
    return view('admin/data/santri/data_santri_v', [
      'profilApp' => $this->profilApp,
      'santri' => $santri,
      'filter_jk' => $filter_jk,
      'filter_jenjang' => $filter_jenjang,
      'filter_tahun' => $filter_tahun,
      'list_tahun' => $list_tahun,
    ]);
  }

  public function tambah_santri()
  {
    return view('admin/data/santri/tambah_santri_form', [
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_tambah_santri()
  {
    if (!$this->validate($this->ruleSantri(true))) {
      return redirect()->back()->withInput();
    } else {
      $post = $this->request->getPost();

      $data = [
        'nis' => $post['nis'],
        'nama_santri' => $post['nama_santri'],
        'tempat_lahir' => $post['tempat_lahir'],
        'tgl_lahir' => $post['tgl_lahir'],
        'jk' => $post['jk'],
        'tgl_masuk' => $post['tgl_masuk'],
        'alamat_lengkap' => $post['alamat_lengkap'],
        'status' => 'Aktif',
        'no_telp_wali' => $post['no_telp_wali'],
        'wali' => $post['wali'],
        'jenjang_sekolah' => $post['jenjang_sekolah'],
        'password' => password_hash($post['password'], PASSWORD_DEFAULT),
      ];


      $simpan = $this->santriM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'admin/data/santri')->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_santri($nis)
  {
    return view('admin/data/santri/edit_santri_form', [
      'santri' => $this->santriM->find($nis),
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_edit_santri($nis)
  {
    $dataLama = $this->santriM->find($nis);
    $post = $this->request->getPost();

    $is_unique = true;
    if ($dataLama['nis'] == $post['nis']) {
      $is_unique = false;
    }

    $pass_req = false;
    if ($post['password']) {
      $pass_req = true;
    }

    if (!$this->validate($this->ruleSantri($is_unique, $pass_req))) {
      return redirect()->back()->withInput();
    } else {

      $data = [
        'nis' => $post['nis'],
        'nama_santri' => $post['nama_santri'],
        'tempat_lahir' => $post['tempat_lahir'],
        'tgl_lahir' => $post['tgl_lahir'],
        'jk' => $post['jk'],
        'tgl_masuk' => $post['tgl_masuk'],
        'alamat_lengkap' => $post['alamat_lengkap'],
        'no_telp_wali' => $post['no_telp_wali'],
        'wali' => $post['wali'],
        'jenjang_sekolah' => $post['jenjang_sekolah'],
      ];

      if ($pass_req) {
        $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
      }

      // dd($data);

      $simpan = $this->santriM->update(['nis' => $nis], $data);
      if ($simpan) {
        return redirect()->to(base_url() . 'admin/data/santri')->with('msg', myAlert('success', 'Berhasil ubah data'));
      } else {
        return redirect()->back()->withInput();
      }
    }
  }

  public function hapus_santri($nis)
  {
    $hapus = $this->santriM->delete($nis);
    if ($hapus) {
      $type = 'success';
      $msg = 'Berhasil dihapus.';
    } else {
      $type = 'danger';
      $msg = 'Gagal dihapus.';
    }
    return redirect()->back()->with('msg', myAlert($type, $msg));
  }

  public function data_santri_keluar()
  {
    return view('admin/data/santri/data_santri_keluar_v', [
      'santri' => $this->santriM->where('status', 'Aktif')->find(),
      'santri_keluar' => $this->santriM->where('status', 'Tidak Aktif')->find(),
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_keluar_santri($nis)
  {
    $data = [
      'nis' => $nis,
      'status' => 'Tidak Aktif',
    ];
    $simpan = $this->santriM->save($data);
    if ($simpan) {
      $type = 'success';
      $msg = 'Berhasil tambah data.';
    } else {
      $type = 'danger';
      $msg = 'Gagal tambah data.';
    }
    return redirect()->to(base_url() . 'admin/data/santri_keluar')->with('msg', myAlert($type, $msg));
  }

  public function proses_kembalikan_santri($nis)
  {
    $data = [
      'nis' => $nis,
      'status' => 'Aktif',
    ];
    $simpan = $this->santriM->save($data);
    if ($simpan) {
      $type = 'success';
      $msg = 'Berhasil Ubah data.';
    } else {
      $type = 'danger';
      $msg = 'Gagal Ubah data.';
    }
    return redirect()->to(base_url() . 'admin/data/santri_keluar')->with('msg', myAlert($type, $msg));
  }

  public function data_santri_alumni()
  {
    return view('admin/data/santri/data_santri_alumni_v', [
      'santri' => $this->santriM->where('status', 'Aktif')->find(),
      'santri_alumni' => $this->santriM->where('status', 'Alumni')->find(),
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_tambah_alumni_santri($nis)
  {
    $data = [
      'nis' => $nis,
      'status' => 'Alumni',
    ];
    $simpan = $this->santriM->save($data);
    if ($simpan) {
      $type = 'success';
      $msg = 'Berhasil tambah data.';
    } else {
      $type = 'danger';
      $msg = 'Gagal tambah data.';
    }
    return redirect()->to(base_url() . 'admin/data/alumni')->with('msg', myAlert($type, $msg));
  }

  public function proses_kembalikan_santri_alumni($nis)
  {
    $data = [
      'nis' => $nis,
      'status' => 'Aktif',
    ];
    $simpan = $this->santriM->save($data);
    if ($simpan) {
      $type = 'success';
      $msg = 'Berhasil Ubah data.';
    } else {
      $type = 'danger';
      $msg = 'Gagal Ubah data.';
    }
    return redirect()->to(base_url() . 'admin/data/alumni')->with('msg', myAlert($type, $msg));
  }

  public function data_ustadz()
  {
    $ustadz = $this->ustadzM->findAll();
    $post = $this->request->getPost();
    $filter_jk = 'ALL';
    if ($this->request->is('post') && $post['filter_jk'] != 'ALL') {
      $ustadz = $this->ustadzM->where('jk', $post['filter_jk'])->find();
      $filter_jk = $post['filter_jk'];
    }
    return view('admin/data/ustadz/data_ustadz_v', [
      'ustadz' => $ustadz,
      'profilApp' => $this->profilApp,
      'filter_jk' => $filter_jk
    ]);
  }

  public function tambah_ustadz()
  {
    return view('admin/data/ustadz/tambah_ustadz_form', [
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_tambah_ustadz()
  {
    if (!$this->validate($this->ruleUstadz(true))) {
      return redirect()->back()->withInput();
    } else {
      $post = $this->request->getPost();
      $data = [
        'kd_ustadz' => $post['kd_ustadz'],
        'nama_ustadz' => $post['nama_ustadz'],
        'tgl_lahir' => $post['tgl_lahir'],
        'jk' => $post['jk'],
        'alamat' => $post['alamat'],
        'status' => 'Aktif',
        'no_telp' => $post['no_telp'],
        'password' => password_hash($post['password'], PASSWORD_DEFAULT),
      ];
      $simpan = $this->ustadzM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'admin/data/ustadz')->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_ustadz($kd_ustadz)
  {
    return view('admin/data/ustadz/edit_ustadz_form', [
      'ustadz' => $this->ustadzM->find($kd_ustadz),
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_edit_ustadz($kd_ustadz)
  {
    $dataLama = $this->ustadzM->find($kd_ustadz);
    $post = $this->request->getPost();

    $pass_req = false;
    if ($post['password']) {
      $pass_req = true;
    }

    $is_unique = true;
    if ($dataLama['kd_ustadz'] == $post['kd_ustadz']) {
      $is_unique = false;
    }

    if (!$this->validate($this->ruleUstadz($is_unique, $pass_req))) {
      return redirect()->back()->withInput();
    } else {

      $data = [
        'kd_ustadz' => $post['kd_ustadz'],
        'nama_ustadz' => $post['nama_ustadz'],
        'tgl_lahir' => $post['tgl_lahir'],
        'jk' => $post['jk'],
        'alamat' => $post['alamat'],
        'status' => 'Aktif',
        'no_telp' => $post['no_telp']
      ];

      if ($pass_req) {
        $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
      }


      $simpan = $this->ustadzM->update(['kd_ustadz' => $kd_ustadz], $data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil ubah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal ubah data.';
      }
      return redirect()->to(base_url() . 'admin/data/ustadz')->with('msg', myAlert($type, $msg));
    }
  }

  public function hapus_ustadz($kd_ustadz)
  {
    $hapus = $this->ustadzM->delete($kd_ustadz);
    if ($hapus) {
      $type = 'success';
      $msg = 'Berhasil dihapus.';
    } else {
      $type = 'danger';
      $msg = 'Gagal dihapus.';
    }
    return redirect()->back()->with('msg', myAlert($type, $msg));
  }

  public function data_mapel()
  {
    $mapel = $this->mapelM->findAll();
    return view('admin/data/mapel/data_mapel_v', [
      'mapel' => $mapel,
      'profilApp' => $this->profilApp,
    ]);
  }

  public function tambah_mapel()
  {
    return view('admin/data/mapel/tambah_mapel_form', [
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_tambah_mapel()
  {
    if (!$this->validate($this->ruleMapel(true))) {
      return redirect()->back()->withInput();
    } else {
      $post = $this->request->getPost();
      $data = [
        'kd_mapel' => $post['kd_mapel'],
        'nama_mapel' => $post['nama_mapel']
      ];
      $simpan = $this->mapelM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'admin/data/mapel')->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_mapel($kd_mapel)
  {
    return view('admin/data/mapel/edit_mapel_form', [
      'mapel' => $this->mapelM->find($kd_mapel),
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_edit_mapel($kd_mapel)
  {
    $dataLama = $this->mapelM->find($kd_mapel);
    $post = $this->request->getPost();

    $is_unique = true;
    if ($dataLama['kd_mapel'] == $post['kd_mapel']) {
      $is_unique = false;
    }

    if (!$this->validate($this->ruleMapel($is_unique))) {
      return redirect()->back()->withInput();
    } else {

      $data = [
        'kd_mapel' => $post['kd_mapel'],
        'nama_mapel' => $post['nama_mapel'],
      ];


      $simpan = $this->mapelM->update(['kd_mapel' => $kd_mapel], $data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil ubah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal ubah data.';
      }
      return redirect()->to(base_url() . 'admin/data/mapel')->with('msg', myAlert($type, $msg));
    }
  }

  public function hapus_mapel($kd_mapel)
  {
    $hapus = $this->mapelM->delete($kd_mapel);
    if ($hapus) {
      $type = 'success';
      $msg = 'Berhasil dihapus.';
    } else {
      $type = 'danger';
      $msg = 'Gagal dihapus.';
    }
    return redirect()->back()->with('msg', myAlert($type, $msg));
  }

  public function data_tahun_ajaran()
  {
    $tahun_ajaran = $this->tahunAjaranM->findAll();
    return view('admin/data/tahun_ajaran/data_tahun_ajaran_v', [
      'tahun_ajaran' => $tahun_ajaran,
      'profilApp' => $this->profilApp,
    ]);
  }

  public function tambah_tahun_ajaran()
  {
    return view('admin/data/tahun_ajaran/tambah_tahun_ajaran_form', [
      'profilApp' => $this->profilApp,
    ]);
  }

  public function proses_tambah_tahun_ajaran()
  {
    if (!$this->validate($this->ruleTahunAjaran())) {
      return redirect()->back()->withInput();
    } else {
      $post = $this->request->getPost();
      $data = [
        'tahun_ajaran' => $post['tahun_ajaran'],
        'semester' => $post['semester']
      ];
      $simpan = $this->tahunAjaranM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'admin/data/tahun_ajaran')->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_tahun_ajaran($id_tahun_ajaran)
  {
    return view('admin/data/tahun_ajaran/edit_tahun_ajaran_form', [
      'tahun_ajaran' => $this->tahunAjaranM->find($id_tahun_ajaran),
      'profilApp' => $this->profilApp,
    ]);
  }

  public function proses_edit_tahun_ajaran($id_tahun_ajaran)
  {
    $post = $this->request->getPost();

    if (!$this->validate($this->ruleTahunAjaran())) {
      return redirect()->back()->withInput();
    } else {

      $data = [
        'tahun_ajaran' => $post['tahun_ajaran'],
        'semester' => $post['semester']
      ];


      $simpan = $this->tahunAjaranM->update(['id_tahun_ajaran' => $id_tahun_ajaran], $data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil ubah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal ubah data.';
      }
      return redirect()->to(base_url() . 'admin/data/tahun_ajaran')->with('msg', myAlert($type, $msg));
    }
  }

  public function hapus_tahun_ajaran($kd_tahun_ajaran)
  {
    $hapus = $this->tahunAjaranM->delete($kd_tahun_ajaran);
    if ($hapus) {
      $type = 'success';
      $msg = 'Berhasil dihapus.';
    } else {
      $type = 'danger';
      $msg = 'Gagal dihapus.';
    }
    return redirect()->back()->with('msg', myAlert($type, $msg));
  }

  public function data_kelas()
  {
    $kelas = $this->kelasM
      ->join('tahun_ajaran', 'kelas.id_tahun_ajaran = tahun_ajaran.id_tahun_ajaran')
      ->orderBy('kelas.id_tahun_ajaran', 'DESC')
      ->orderBy('nama_kelas', 'ASC')
      ->findAll();
    return view('admin/data/kelas/data_kelas_v', [
      'kelas' => $kelas,
      'profilApp' => $this->profilApp,
    ]);
  }

  public function tambah_kelas()
  {
    return view('admin/data/kelas/tambah_kelas_form', [
      'profilApp' => $this->profilApp,
      'tahun_ajaran' => $this->tahunAjaranM->orderBy('id_tahun_ajaran', 'DESC')->findAll(),
      'wali_kelas' => $this->ustadzM->findAll()
    ]);
  }

  public function proses_tambah_kelas()
  {
    if (!$this->validate($this->ruleKelas(true))) {
      return redirect()->back()->withInput();
    } else {
      $post = $this->request->getPost();
      $data = [
        'nama_kelas' => $post['nama_kelas'],
        'wali_kelas' => $post['wali_kelas'],
        'id_tahun_ajaran' => $post['id_tahun_ajaran']
      ];
      $simpan = $this->kelasM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'admin/data/kelas')->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_kelas($kd_kelas)
  {
    return view('admin/data/kelas/edit_kelas_form', [
      'kelas' => $this->kelasM->find($kd_kelas),
      'profilApp' => $this->profilApp,
      'tahun_ajaran' => $this->tahunAjaranM->orderBy('id_tahun_ajaran', 'DESC')->findAll(),
      'wali_kelas' => $this->ustadzM->findAll()
    ]);
  }

  public function proses_edit_kelas($kd_kelas)
  {
    $dataLama = $this->kelasM->find($kd_kelas);
    $post = $this->request->getPost();

    if (!$this->validate($this->ruleKelas())) {
      return redirect()->back()->withInput();
    } else {

      $data = [
        'nama_kelas' => $post['nama_kelas'],
        'wali_kelas' => $post['wali_kelas'],
        'id_tahun_ajaran' => $post['id_tahun_ajaran']
      ];


      $simpan = $this->kelasM->update(['id_kelas' => $kd_kelas], $data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil ubah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal ubah data.';
      }
      return redirect()->to(base_url() . 'admin/data/kelas')->with('msg', myAlert($type, $msg));
    }
  }

  public function hapus_kelas($kd_kelas)
  {
    $hapus = $this->kelasM->delete($kd_kelas);
    if ($hapus) {
      $type = 'success';
      $msg = 'Berhasil dihapus.';
    } else {
      $type = 'danger';
      $msg = 'Gagal dihapus.';
    }
    return redirect()->back()->with('msg', myAlert($type, $msg));
  }

  public function data_kelas_nilai($id_data_kelas)
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

    return view('admin/data/kelas_nilai/data_kelas_nilai_v', [
      'kelas' => $kelas,
      'profilApp' => $this->profilApp,
      'siswa' => $siswa,
      'nilai' => $data
    ]);
  }

  public function data_kelas_siswa($id_kelas)
  {
    $kelas_siswa = $this->kelasSiswaM
      ->join('santri', 'data_kelas.nis = santri.nis')
      ->where('id_kelas', $id_kelas)
      ->find();
    $kelas = $this->kelasM->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = kelas.id_tahun_ajaran')->find($id_kelas);

    return view('admin/data/kelas_siswa/data_kelas_siswa_v', [
      'kelas_siswa' => $kelas_siswa,
      'santri' => $this->santriM->findAll(),
      'kelas' => $kelas,
      'profilApp' => $this->profilApp,
    ]);
  }

  public function proses_tambah_kelas_siswa($id_kelas, $nis)
  {
    $data = [
      'nis' => $nis,
      'id_kelas' => $id_kelas,
    ];
    $simpan = $this->kelasSiswaM->save($data);
    if ($simpan) {
      $type = 'success';
      $msg = 'Berhasil tambah data.';
    } else {
      $type = 'danger';
      $msg = 'Gagal tambah data.';
    }
    return redirect()->to(base_url() . 'admin/data/kelas/' . $id_kelas . '/siswa')->with('msg', myAlert($type, $msg));
  }

  public function hapus_kelas_siswa($kd_kelas_siswa, $id_data_kelas)
  {
    $hapus = $this->kelasSiswaM->delete($id_data_kelas);
    if ($hapus) {
      $type = 'success';
      $msg = 'Berhasil dihapus.';
    } else {
      $type = 'danger';
      $msg = 'Gagal dihapus.';
    }
    return redirect()->back()->with('msg', myAlert($type, $msg));
  }

  public function data_kelas_mapel($id_kelas)
  {
    $kelas = $this->kelasM->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = kelas.id_tahun_ajaran')->find($id_kelas);
    $mengajar = $this->mengajarM
      ->join('ustadz', 'ustadz.kd_ustadz = mengajar.kd_ustadz')
      ->join('mapel', 'mapel.kd_mapel = mengajar.kd_mapel')
      ->where('id_kelas', $id_kelas)->find();
    return view('admin/data/kelas_mapel/data_kelas_mapel_v', [
      'kelas' => $kelas,
      'mengajar' => $mengajar,
      'profilApp' => $this->profilApp,
    ]);
  }

  public function tambah_kelas_mapel($id_kelas)
  {
    $kelas = $this->kelasM->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = kelas.id_tahun_ajaran')->find($id_kelas);
    return view('admin/data/kelas_mapel/tambah_kelas_mapel_form', [
      'kelas' => $kelas,
      'profilApp' => $this->profilApp,
      'mapel' => $this->mapelM->findAll(),
      'ustadz' => $this->ustadzM->findAll(),
    ]);
  }

  public function proses_tambah_kelas_mapel($id_kelas)
  {
    if (!$this->validate($this->ruleKelasMapel())) {
      return redirect()->back()->withInput();
    } else {
      $post = $this->request->getPost();
      $data = [
        'kd_ustadz' => $post['kd_ustadz'],
        'kd_mapel' => $post['kd_mapel'],
        'id_kelas' => $id_kelas,
      ];
      $simpan = $this->mengajarM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'admin/data/kelas/' . $id_kelas . '/mapel')->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_kelas_mapel($id_kelas, $id_mengajar)
  {
    $kelas = $this->kelasM->join('tahun_ajaran', 'tahun_ajaran.id_tahun_ajaran = kelas.id_tahun_ajaran')->find($id_kelas);
    return view('admin/data/kelas_mapel/edit_kelas_mapel_form', [
      'kelas' => $kelas,
      'profilApp' => $this->profilApp,
      'mengajar' => $this->mengajarM->find($id_mengajar),
      'mapel' => $this->mapelM->findAll(),
      'ustadz' => $this->ustadzM->findAll(),
    ]);
  }

  public function proses_edit_kelas_mapel($id_kelas, $id_mengajar)
  {
    $dataLama = $this->kelasM->find($id_kelas);
    $post = $this->request->getPost();

    if (!$this->validate($this->ruleKelasMapel())) {
      return redirect()->back()->withInput();
    } else {

      $data = [
        'kd_ustadz' => $post['kd_ustadz'],
        'kd_mapel' => $post['kd_mapel'],
        'id_kelas' => $id_kelas,
      ];


      $simpan = $this->mengajarM->update(['id_mengajar' => $id_mengajar], $data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil ubah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal ubah data.';
      }
      return redirect()->to(base_url() . 'admin/data/kelas/' . $id_kelas . '/mapel')->with('msg', myAlert($type, $msg));
    }
  }

  public function hapus_kelas_mapel($id_kelas, $id_mengajar)
  {
    $hapus = $this->mengajarM->delete($id_mengajar);
    if ($hapus) {
      $type = 'success';
      $msg = 'Berhasil dihapus.';
    } else {
      $type = 'danger';
      $msg = 'Gagal dihapus.';
    }
    return redirect()->back()->with('msg', myAlert($type, $msg));
  }


  // pengumuman
  public function data_pengumuman()
  {
    return view('admin/data/pengumuman/data_pengumuman_v', [
      'pengumuman' => $this->pengumumanM->findAll(),
      'profilApp' => $this->profilApp
    ]);
  }

  public function tambah_pengumuman()
  {
    return view('admin/data/pengumuman/tambah_pengumuman_form', [
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_tambah_pengumuman()
  {
    if (!$this->validate($this->rulePengumuman(true))) {
      return redirect()->back()->withInput();
    } else {
      $post = $this->request->getPost();

      $gambar = $this->request->getFile('gambar');
      $newGambar = $gambar->getRandomName();

      $data = [
        'judul' => $post['judul'],
        'isi' => $post['isi'],
        'gambar' => $newGambar,
        'penulis' => session()->get('admin')['nama'],
        'kategori' => $post['kategori'],
      ];

      $simpan = $this->pengumumanM->save($data);
      if ($simpan) {
        $gambar->move('img/pengumuman/', $newGambar);
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'admin/pengumuman')->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_pengumuman($id_pengumuman)
  {
    return view('admin/data/pengumuman/edit_pengumuman_form', [
      'pengumuman' => $this->pengumumanM->find($id_pengumuman),
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_edit_pengumuman($id_pengumuman)
  {
    $dataLama = $this->pengumumanM->find($id_pengumuman);

    $post = $this->request->getPost();

    $gambar = $this->request->getFile('gambar');


    $is_valid_gambar = false;

    if ($gambar->isValid()) {
      $is_valid_gambar = true;
    }

    if (!$this->validate($this->rulePengumuman($is_valid_gambar))) {
      return redirect()->back()->withInput();
    } else {
      $data = [
        'id_pengumuman' => $id_pengumuman,
        'judul' => $post['judul'],
        'isi' => $post['isi'],
        'penulis' => session()->get('admin')['nama'],
        'kategori' => $post['kategori'],
      ];
      if ($gambar->isValid()) {
        $newGambar = $gambar->getRandomName();
        $data['gambar'] = $newGambar;
        $gambar->move('img/pengumuman/', $newGambar);
        unlink(FCPATH . '/img/pengumuman/' . $dataLama['gambar']);
      }

      $simpan = $this->pengumumanM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil ubah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal ubah data.';
      }
      return redirect()->to(base_url() . 'admin/pengumuman')->with('msg', myAlert($type, $msg));
    }
  }

  public function hapus_pengumuman($id_pengumuman)
  {
    $dataPengumuman = $this->pengumumanM->find($id_pengumuman);
    $hapus = $this->pengumumanM->delete($id_pengumuman);
    unlink(FCPATH . '/img/pengumuman/' . $dataPengumuman['gambar']);
    if ($hapus) {
      $type = 'success';
      $msg = 'Berhasil dihapus.';
    } else {
      $type = 'danger';
      $msg = 'Gagal dihapus.';
    }
    return redirect()->back()->with('msg', myAlert($type, $msg));
  }

  // keasramaan
  public function data_keasramaan()
  {
    return view('admin/data/keasramaan/data_keasramaan_v', [
      'kegiatan_keasramaan' => $this->kegiatanKeasramaanM->findAll(),
      'profilApp' => $this->profilApp
    ]);
  }

  public function tambah_keasramaan()
  {
    return view('admin/data/keasramaan/tambah_keasramaan_form', [
      'profilApp' => $this->profilApp,
      'ustadz' => $this->ustadzM->findAll(),
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
        'kd_ustadz' => $post['kd_ustadz'],
      ];

      $simpan = $this->kegiatanKeasramaanM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'admin/keasramaan')->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_keasramaan($id_kegiatan_keasramaan)
  {
    return view('admin/data/keasramaan/edit_keasramaan_form', [
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
        'kd_ustadz' => $post['kd_ustadz'],
      ];

      $simpan = $this->kegiatanKeasramaanM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil ubah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal ubah data.';
      }
      return redirect()->to(base_url() . 'admin/keasramaan')->with('msg', myAlert($type, $msg));
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

  // detail
  public function detail_keasramaan($id_kegiatan_keasramaan)
  {
    return view('admin/data/keasramaan/nilai/data_nilai_keasramaan_v', [
      'kegiatan_keasramaan' => $this->kegiatanKeasramaanM->find($id_kegiatan_keasramaan),
      'nilai_keasramaan' => $this->nilaiKeasramaanM->select('nilai_keasramaan.*, santri.nama_santri')->where('id_kegiatan_keasramaan', $id_kegiatan_keasramaan)->join('santri', 'nilai_keasramaan.nis = santri.nis')->find(),
      'profilApp' => $this->profilApp
    ]);
  }

  public function tambah_detail_keasramaan()
  {
    return view('admin/data/keasramaan/nilai/tambah_nilai_keasramaan_form', [
      'profilApp' => $this->profilApp,
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
      return redirect()->to(base_url() . 'admin/keasramaan/detail/' . $id_kegiatan_keasramaan)->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_detail_keasramaan($id_kegiatan_keasramaan, $id_nilai_keasramaan)
  {
    return view('admin/data/keasramaan/nilai/edit_nilai_keasramaan_form', [
      'profilApp' => $this->profilApp,
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
      return redirect()->to(base_url() . 'admin/keasramaan/detail/' . $id_kegiatan_keasramaan)->with('msg', myAlert($type, $msg));
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

  // kegiatan
  public function data_kegiatan()
  {
    return view('admin/data/kegiatan/data_kegiatan_v', [
      'kegiatan' => $this->kegiatanM->findAll(),
      'profilApp' => $this->profilApp
    ]);
  }

  public function tambah_kegiatan()
  {
    return view('admin/data/kegiatan/tambah_kegiatan_form', [
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_tambah_kegiatan()
  {
    if (!$this->validate($this->ruleKegiatan())) {
      return redirect()->back()->withInput();
    } else {
      $post = $this->request->getPost();

      $data = [
        'hari_kegiatan' => $post['hari_kegiatan'],
        'kegiatan' => $post['kegiatan'],
      ];

      $simpan = $this->kegiatanM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'admin/kegiatan')->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_kegiatan($id_kegiatan)
  {
    return view('admin/data/kegiatan/edit_kegiatan_form', [
      'kegiatan' => $this->kegiatanM->find($id_kegiatan),
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_edit_kegiatan($id_kegiatan)
  {
    $dataLama = $this->kegiatanM->find($id_kegiatan);

    $post = $this->request->getPost();

    $is_unique = true;
    if ($dataLama['hari_kegiatan'] == $post['hari_kegiatan']) {
      $is_unique = false;
    }

    if (!$this->validate($this->ruleKegiatan($is_unique))) {
      return redirect()->back()->withInput();
    } else {
      $data = [
        'id_kegiatan' => $id_kegiatan,
        'hari_kegiatan' => $post['hari_kegiatan'],
        'kegiatan' => $post['kegiatan'],
      ];

      $simpan = $this->kegiatanM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil ubah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal ubah data.';
      }
      return redirect()->to(base_url() . 'admin/kegiatan')->with('msg', myAlert($type, $msg));
    }
  }

  public function hapus_kegiatan($id_kegiatan)
  {
    $hapus = $this->kegiatanM->delete($id_kegiatan);
    if ($hapus) {
      $type = 'success';
      $msg = 'Berhasil dihapus.';
    } else {
      $type = 'danger';
      $msg = 'Gagal dihapus.';
    }
    return redirect()->back()->with('msg', myAlert($type, $msg));
  }

  // SlideShow

  public function data_slideshow()
  {
    return view('admin/data/slideshow/data_slideshow_v', [
      'slideshow' => $this->slideshowM->findAll(),
      'profilApp' => $this->profilApp
    ]);
  }

  public function tambah_slideshow()
  {
    return view('admin/data/slideshow/tambah_slideshow_form', [
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_tambah_slideshow()
  {
    if (!$this->validate($this->ruleSlideshow(true))) {
      return redirect()->back()->withInput();
    } else {
      $post = $this->request->getPost();

      $slideshow = $this->request->getFile('slideshow');
      $newslideshow = $slideshow->getRandomName();

      $data = [
        'slideshow' => $newslideshow,
        'judul' => $post['judul'],
        'caption' => $post['caption'],
        'align' => $post['align'],
      ];

      $simpan = $this->slideshowM->save($data);
      if ($simpan) {
        $slideshow->move('img/slideshow/', $newslideshow);
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'admin/slideshow')->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_slideshow($id_slideshow)
  {
    return view('admin/data/slideshow/edit_slideshow_form', [
      'slideshow' => $this->slideshowM->find($id_slideshow),
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_edit_slideshow($id_slideshow)
  {
    $dataLama = $this->slideshowM->find($id_slideshow);

    $post = $this->request->getPost();

    $slideshow = $this->request->getFile('slideshow');


    $is_valid_slideshow = false;

    if ($slideshow->isValid()) {
      $is_valid_slideshow = true;
    }

    if (!$this->validate($this->ruleSlideshow($is_valid_slideshow))) {
      return redirect()->back()->withInput();
    } else {
      $data = [
        'id_slideshow' => $id_slideshow,
        'judul' => $post['judul'],
        'caption' => $post['caption'],
        'align' => $post['align'],
      ];

      if ($slideshow->isValid()) {
        $newGambar = $slideshow->getRandomName();
        $data['slideshow'] = $newGambar;
        $slideshow->move('img/slideshow/', $newGambar);
        unlink(FCPATH . '/img/slideshow/' . $dataLama['slideshow']);
      }

      $simpan = $this->slideshowM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'admin/slideshow')->with('msg', myAlert($type, $msg));
    }
  }

  public function hapus_slideshow($id_slideshow)
  {
    $dataSlideshow = $this->slideshowM->find($id_slideshow);
    $hapus = $this->slideshowM->delete($id_slideshow);
    unlink(FCPATH . '/img/slideshow/' . $dataSlideshow['slideshow']);
    if ($hapus) {
      $type = 'success';
      $msg = 'Berhasil dihapus.';
    } else {
      $type = 'danger';
      $msg = 'Gagal dihapus.';
    }
    return redirect()->back()->with('msg', myAlert($type, $msg));
  }

  // Galery

  public function data_galery()
  {
    return view('admin/data/galery/data_galery_v', [
      'galery' => $this->galeryM->findAll(),
      'profilApp' => $this->profilApp
    ]);
  }

  public function tambah_galery()
  {
    return view('admin/data/galery/tambah_galery_form', [
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_tambah_galery()
  {
    if (!$this->validate($this->ruleGalery(true))) {
      return redirect()->back()->withInput();
    } else {
      $post = $this->request->getPost();

      $file = $this->request->getFile('file');
      $newfile = $file->getRandomName();

      $data = [
        'file' => $newfile,
        'caption' => $post['caption'],
        'tipe' => $post['tipe'],
      ];

      $simpan = $this->galeryM->save($data);
      if ($simpan) {
        $file->move('img/galery/', $newfile);
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'admin/galery')->with('msg', myAlert($type, $msg));
    }
  }

  public function edit_galery($id_galery)
  {
    return view('admin/data/galery/edit_galery_form', [
      'galery' => $this->galeryM->find($id_galery),
      'profilApp' => $this->profilApp
    ]);
  }

  public function proses_edit_galery($id_galery)
  {
    $dataLama = $this->galeryM->find($id_galery);

    $post = $this->request->getPost();

    $file = $this->request->getFile('file');


    $is_valid_file = false;

    if ($file->isValid()) {
      $is_valid_file = true;
    }

    if (!$this->validate($this->ruleGalery($is_valid_file))) {
      return redirect()->back()->withInput();
    } else {
      $data = [
        'id_galery' => $id_galery,
        'caption' => $post['caption'],
        'tipe' => $post['tipe'],
      ];

      if ($file->isValid()) {
        $newFile = $file->getRandomName();
        $data['file'] = $newFile;
        $file->move('img/galery/', $newFile);
        unlink(FCPATH . '/img/galery/' . $dataLama['file']);
      }

      $simpan = $this->galeryM->save($data);
      if ($simpan) {
        $type = 'success';
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
      }
      return redirect()->to(base_url() . 'admin/galery')->with('msg', myAlert($type, $msg));
    }
  }

  public function hapus_galery($id_galery)
  {
    $datagalery = $this->galeryM->find($id_galery);
    $hapus = $this->galeryM->delete($id_galery);
    unlink(FCPATH . '/img/galery/' . $datagalery['file']);
    if ($hapus) {
      $type = 'success';
      $msg = 'Berhasil dihapus.';
    } else {
      $type = 'danger';
      $msg = 'Gagal dihapus.';
    }
    return redirect()->back()->with('msg', myAlert($type, $msg));
  }

  // Penerimaan

  public function data_penerimaan()
  {
    $list_tahun = $this->pendaftaranM->select('YEAR(created_at) as tahun')->distinct()->orderBy('tahun', 'DESC')->find();

    $pendaftar = $this->pendaftaranM->select('pendaftaran.*, admin.nama as nama_admin')->join('admin', 'admin.id_admin = pendaftaran.id_admin', 'left')->where('YEAR(pendaftaran.created_at)', date('Y'));

    $post = $this->request->getPost();
    $filter_status = 'ALL';
    $filter_jenjang = 'ALL';
    $filter_tahun = date('Y');

    if ($this->request->is('post')) {
      $where = [];

      if ($post['filter_status'] != 'ALL') {
        $where['status'] = ($post['filter_status'] == 'Belum Ditentukan') ? '' : $post['filter_status'];
        $filter_status = $post['filter_status'];
      }

      if ($post['filter_jenjang'] != 'ALL') {
        $where['jenjang_sekolah'] = $post['filter_jenjang'];
        $filter_jenjang = $post['filter_jenjang'];
      }

      if ($post['filter_tahun'] != 'ALL') {
        $where['YEAR(pendaftaran.created_at)'] = $post['filter_tahun'];
        $filter_tahun = $post['filter_tahun'];
      }

      $pendaftar = $pendaftar->where($where);
    }
    return view('admin/data/penerimaan/data_penerimaan_v', [
      'pendaftaran' => $pendaftar->find(),
      'profilApp' => $this->profilApp,
      'list_tahun' => $list_tahun,
      'filter_status' => $filter_status,
      'filter_jenjang' => $filter_jenjang,
      'filter_tahun' => $filter_tahun,
    ]);
  }

  public function terima_penerimaan($id_pendaftaran)
  {
    $post = $this->request->getVar();

    $tgl_tes =  $post['tgl_tes'] . ' ' . $post['jam_tes'];
    $data = [
      'id_pendaftaran' => $id_pendaftaran,
      'status' => 'Lulus Syarat',
      'tgl_tes' => $tgl_tes,
      'id_admin' => session()->get('admin')['id_admin'],
    ];

    $simpan = $this->pendaftaranM->save($data);
    if ($simpan) {
      $type = 'success';
      $msg = 'Berhasil Simpan data.';
    } else {
      $type = 'danger';
      $msg = 'Gagal Simpan data.';
    }
    return redirect()->to(base_url() . 'admin/penerimaan')->with('msg', myAlert($type, $msg));
  }

  public function terima_lulus($id_pendaftaran)
  {
    $post = $this->request->getVar();
    $data = [
      'id_pendaftaran' => $id_pendaftaran,
      'status' => 'Lulus',
      'nilai_tes' => $post['nilai_tes'],
      'id_admin' => session()->get('admin')['id_admin'],
    ];

    $simpan = $this->pendaftaranM->save($data);
    if ($simpan) {
      $type = 'success';
      $msg = 'Berhasil Simpan data.';
    } else {
      $type = 'danger';
      $msg = 'Gagal Simpan data.';
    }
    return redirect()->to(base_url() . 'admin/penerimaan')->with('msg', myAlert($type, $msg));
  }

  public function tidak_lulus_penerimaan($id_pendaftaran)
  {
    $post = $this->request->getVar();
    $data = [
      'id_pendaftaran' => $id_pendaftaran,
      'status' => 'Tidak Lulus',
      'nilai_tes' => $post['nilai_tes'],
      'id_admin' => session()->get('admin')['id_admin'],
    ];

    $simpan = $this->pendaftaranM->save($data);
    if ($simpan) {
      $type = 'success';
      $msg = 'Berhasil Simpan data.';
    } else {
      $type = 'danger';
      $msg = 'Gagal Simpan data.';
    }
    return redirect()->to(base_url() . 'admin/penerimaan')->with('msg', myAlert($type, $msg));
  }

  public function tolak_penerimaan($id_pendaftaran)
  {
    $data = [
      'id_pendaftaran' => $id_pendaftaran,
      'status' => 'Tidak Lulus',
      'id_admin' => session()->get('admin')['id_admin'],
    ];

    $simpan = $this->pendaftaranM->save($data);
    if ($simpan) {
      $type = 'success';
      $msg = 'Berhasil Simpan data.';
    } else {
      $type = 'danger';
      $msg = 'Gagal Simpan data.';
    }
    return redirect()->to(base_url() . 'admin/penerimaan')->with('msg', myAlert($type, $msg));
  }


  public function hapus_penerimaan($id_pendaftaran)
  {
    $dataPendaftaran = $this->pendaftaranM->find($id_pendaftaran);
    $hapus = $this->pendaftaranM->delete($id_pendaftaran);

    if (file_exists(FCPATH . '/img/pendaftaran/' . $dataPendaftaran['photo'])) {
      unlink(FCPATH . '/img/pendaftaran/' . $dataPendaftaran['photo']);
    }
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
