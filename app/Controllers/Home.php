<?php

namespace App\Controllers;

use App\Models\GaleryM;
use App\Models\PengumumanM;
use App\Models\SlideshowM;

class Home extends BaseController
{

    private $slideshowM;
    private $galeryM;
    private $pengumumanM;

    public function __construct()
    {
        $this->slideshowM = new SlideshowM();
        $this->galeryM = new GaleryM();
        $this->pengumumanM = new PengumumanM();
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
}
