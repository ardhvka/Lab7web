<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel                                                    ;

class Artikel extends BaseController
{
   public function admin_index()
    {
        $title = 'Daftar Artikel (Admin)';
        $model = new ArtikelModel();
        $kategoriModel = new KategoriModel();

        $q = $this->request->getVar('q') ?? '';
        $kategori_id = $this->request->getVar('kategori_id') ?? '';
        $page = $this->request->getVar('page') ?? 1;

        $builder = $model->table('artikel')
            ->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left');

        if ($q != '') {
            $builder->like('artikel.judul', $q);
        }

        if ($kategori_id != '') {
            $builder->where('artikel.id_kategori', $kategori_id);
        }

        $artikel = $builder->paginate(10, 'default', $page);
        $pager = $builder->pager;

        $data = [
            'title' => $title,
            'q' => $q,
            'kategori_id' => $kategori_id,
            'artikel' => $artikel,
            'pager' => $pager,
            'kategori' => $kategoriModel->findAll(),
        ];

        if ($this->request->isAJAX()) {
            return $this->response->setJSON($data);
        } else {
            return view('artikel/admin_index', $data);
        }
    }

    public function add()
    {
        // validasi data.
        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {

            $file = $this->request->getFile('gambar');
            $file->move(ROOTPATH . 'public/gambar');

            $artikel = new ArtikelModel();
            $artikel->insert([
                'judul' => $this->request->getPost('judul'),
                'id_kategori' => $this->request->getPost('kategori_id'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul')),
                'gambar' => $file->getName(),
            ]);
            return redirect('admin/add');
        }

        $kategoriModel = new KategoriModel();
        $kategori = $kategoriModel->findAll();

        $title = "Tambah Artikel";
        return view('add', compact('title', 'kategori'));
    }

    public function edit($id = null)
    {
        $artikel = new ArtikelModel();

        // Validasi data
        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $artikel->update($id, [
                'judul' => $this->request->getPost('judul'),
                'id_kategori' => $this->request->getPost('kategori_id'),
                'isi'   => $this->request->getPost('isi'),
            ]);
            return redirect('admin');
        }

        // Ambil data lama
        $data = $artikel->where('id', $id)->first();
        $title = "Edit Artikel";
        return view('edit', compact('title', 'data'));
    }

    public function delete($id)
    {
        $artikel = new ArtikelModel();
        $artikel->delete($id);
        // Reset AUTO_INCREMENT berdasarkan ID terakhir
        $db = \Config\Database::connect();
        $query = $db->query("SELECT MAX(id) AS max_id FROM artikel")->getRow();
        $nextId = ($query->max_id ?? 0) + 1;
        $db->query("ALTER TABLE artikel AUTO_INCREMENT = $nextId");
        
        return redirect('admin');
    }
    
}