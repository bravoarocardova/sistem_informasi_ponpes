<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SantriM;
use App\Models\UstadzM;

class DataC extends BaseController
{

  private $santriM;
  private $ustadzM;

  public function __construct()
  {
    $this->santriM = new SantriM();
    $this->ustadzM = new UstadzM();
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
        'status' => 1,
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

    d($is_unique);

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
  }

  public function proses_tambah_ustadz()
  {
  }

  public function edit_ustadz($kd_ustadz)
  {
  }

  public function proses_edit_ustadz($kd_ustadz)
  {
  }

  public function hapus_ustadz($kd_ustadz)
  {
  }
}
