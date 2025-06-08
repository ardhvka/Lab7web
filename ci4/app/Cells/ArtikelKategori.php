<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;
use App\Models\KategoriModel;

class ArtikelKategori extends Cell
{
    public function render(array $params = []): string
    {
        $kategoriModel = new KategoriModel();
        $kategoriList = $kategoriModel->findAll();

        return view('components/artikel_kategori', ['kategoriList' => $kategoriList]);
    }
}
