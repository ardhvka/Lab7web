<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    public function admin_index()
    {
        $title = 'Daftar Artikel';
        $q = $this->request->getVar('q') ?? '';
        $model = new ArtikelModel();
        $data = [
            'title' => $title,
            'q' => $q,
            'artikel' => $model->like('judul', $q)->paginate(5), # data dibatasi 5 record per halaman
            'pager' => $model->pager,
        ];
        return view('artikel/admin_index', $data);
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
                'kategori' => $this->request->getPost('kategori'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul')),
                'gambar' => $file->getName(),
            ]);
            return redirect('admin/add');
        }

        $title = "Tambah Artikel";
        return view('add', compact('title'));
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
                'kategori' => $this->request->getPost('kategori'),
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