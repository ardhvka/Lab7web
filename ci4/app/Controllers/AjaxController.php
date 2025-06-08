<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\Response;
use App\Models\ArtikelModel;

class AjaxController extends Controller
{
    public function index()
    {
        return view('ajax/admin_ajax');
    }

   public function getData()
    {
        $request = service('request');
        $model = new ArtikelModel();

        $q = $request->getGet('q') ?? '';
        $kategori_id = $request->getGet('kategori_id') ?? '';
        $page = $request->getGet('page') ?? 1;

        // Join dan filter langsung di model
        $model->select('artikel.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = artikel.id_kategori', 'left');

        if ($q !== '') {
            $model->like('artikel.judul', $q);
        }

        if ($kategori_id !== '') {
            $model->where('artikel.id_kategori', $kategori_id);
        }

        // Paginate di model (INI YANG BENAR)
        $artikel = $model->paginate(10, 'default', $page);
        $pager = $model->pager;

        return $this->response->setJSON([
            'artikel' => $artikel,
            'pager' => [
                'links' => $pager->links('default')
            ],
            'q' => $q,
            'kategori_id' => $kategori_id
        ]);
    }


    public function delete($id)
    {
        $model = new ArtikelModel();
        $data = $model->delete($id);
        $data = [
            'status' => 'OK'
        ];
        // Kirim data dalam format JSON
        return $this->response->setJSON($data);
    }
}
