<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GaleryM;
use App\Models\SantriM;
use App\Models\UstadzM;
use App\Models\PengumumanM;
use App\Models\SlideshowM;

class DataC extends BaseController
{

  private $santriM;
  private $ustadzM;
  private $pengumumanM;
  private $slideshowM;
  private $galeryM;

  public function __construct()
  {
    $this->santriM = new SantriM();
    $this->ustadzM = new UstadzM();
    $this->pengumumanM = new PengumumanM();
    $this->slideshowM = new SlideshowM();
    $this->galeryM = new GaleryM();
  }

  private function ruleSantri($is_unique = true)
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
    ];

    return $ruleSantri;
  }

  private function ruleUstadz($is_unique = true)
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
    ];

    return $rulePengumuman;
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
    return view('admin/data/santri/data_santri_v', [
      'santri' => $this->santriM->findAll()
    ]);
  }

  public function tambah_santri()
  {
    return view('admin/data/santri/tambah_santri_form');
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
      'santri' => $this->santriM->find($nis)
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

    if (!$this->validate($this->ruleSantri($is_unique))) {
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
      ];
      d($nis);
      d($data);
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

  public function data_ustadz()
  {
    return view('admin/data/ustadz/data_ustadz_v', [
      'ustadz' => $this->ustadzM->findAll()
    ]);
  }

  public function tambah_ustadz()
  {
    return view('admin/data/ustadz/tambah_ustadz_form');
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
        'no_telp' => $post['no_telp']
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
      'ustadz' => $this->ustadzM->find($kd_ustadz)
    ]);
  }

  public function proses_edit_ustadz($kd_ustadz)
  {
    $dataLama = $this->ustadzM->find($kd_ustadz);
    $post = $this->request->getPost();

    $is_unique = true;
    if ($dataLama['kd_ustadz'] == $post['kd_ustadz']) {
      $is_unique = false;
    }

    if (!$this->validate($this->ruleUstadz($is_unique))) {
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
      $simpan = $this->ustadzM->update(['kd_ustadz' => $kd_ustadz], $data);
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


  // pengumuman
  public function data_pengumuman()
  {
    return view('admin/data/pengumuman/data_pengumuman_v', [
      'pengumuman' => $this->pengumumanM->findAll()
    ]);
  }

  public function tambah_pengumuman()
  {
    return view('admin/data/pengumuman/tambah_pengumuman_form');
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
      'pengumuman' => $this->pengumumanM->find($id_pengumuman)
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
        $msg = 'Berhasil tambah data.';
      } else {
        $type = 'danger';
        $msg = 'Gagal tambah data.';
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

  // SlideShow

  public function data_slideshow()
  {
    return view('admin/data/slideshow/data_slideshow_v', [
      'slideshow' => $this->slideshowM->findAll()
    ]);
  }

  public function tambah_slideshow()
  {
    return view('admin/data/slideshow/tambah_slideshow_form');
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
      'slideshow' => $this->slideshowM->find($id_slideshow)
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
      'galery' => $this->galeryM->findAll()
    ]);
  }

  public function tambah_galery()
  {
    return view('admin/data/galery/tambah_galery_form');
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
      'galery' => $this->galeryM->find($id_galery)
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
}
