# Praktikum 1

1. Mengaktifkan Ekstensi di

```bash
  php.ini
```

Berikut adalah ekstensi PHP yang harus diaktifkan:

1. php-json → Diperlukan untuk bekerja dengan JSON.
2. php-mysqlnd → Native driver untuk MySQL.
3. php-xml → Diperlukan untuk bekerja dengan XML.
4. php-intl → Diperlukan untuk mendukung aplikasi multibahasa.
5. libcurl (opsional) → Diperlukan jika ingin menggunakan Curl.

##

Buka xampp file Config

```bash
  php.ini
```

Pastikan ekstensi berikut tidak dikomentari (hilangkan tanda ; di depannya jika ada):

```bash
extension=json
extension=mysqli
extension=xml
extension=intl
extension=curl
```

![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/1.png)

## Instalasi

### 1. Instalasi CodeIgniter

Instalasi dengan cara manual:

1. Unduh CodeIgniter → (https://codeigniter.com/download)
2. Extrak file zip Codeigniter ke direktori htdocs/Lab7Web
3. Ubah nama direktory framework-4.x.xx menjadi ci4.
4. Menjalankan CLI XAMPP
   Arahkan direktori sesuai dengan project → (xampp/htdocs/Lab7Web/ci4/)
   Perintah yang dapat dijalankan untuk memanggil CLI Codeigniter adalah: php spark serve Meluncurkan server pengembangan bawaan, Memungkinkan melihat aplikasi di browser (http://localhost:8080).

### 2. Menjalankan CLI XAMPP

- Arahkan direktori sesuai dengan project → (xampp/htdocs/Lab7Web/ci4/)
- Perintah yang dapat dijalankan untuk memanggil CLI Codeigniter adalah: php spark serve Meluncurkan server pengembangan bawaan, Memungkinkan melihat aplikasi di browser (http://localhost:8080).


![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/2.png)


![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/3.png)

### 3. Mengaktifkan Mode Debugging

Fitur debugging dari CodeIgniter 4 untuk memudahkan developer untuk mengetahui pesan error apabila terjadi kesalahan dalam membuat kode program. Mengaktifkan mode debugging dengan mengubah niai konfigurasi pada file
`env`, cari variable `CI_ENVIRONMENT` ubah menjadi `development`

![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/4.png)

Kemudian rename nama file `env → .env`

Contoh Error yang terjadi ketika menghapus function pada file app/Controller/Home.php


![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/5.png)


![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/6Home.php.png)

## 4. Routing dan Controllers

Routing dalam CodeIgniter 4 adalah proses yang menghubungkan permintaan (request) dari pengguna ke Controller yang sesuai untuk diproses. Routing ini memungkinkan kita menentukan bagaimana URL diterjemahkan menjadi aksi dalam aplikasi, sehingga setiap permintaan dapat diarahkan dengan benar.

#### Membuat Route baru (autoRoute(false)):

Secara default fitur autoRoute sudah aktif. Untuk mengubah status autoroute dapat mengubah nilai variabelnya. Untuk menonaktifkan ubah nilai true menjadi false. Nonaktifkan Auto Routing `($routes->setAutoRoute(false);)` ketika menjalankan di production.

tambahkan kode berikut dalam **app/Config/Routes.php**

![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/6RoutesPHPaWAL.png)

Untuk mengetahui route yang ditambahkan sudah benar, buka CLI dan jalankan perintah `php spark routes:`

![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/7SparkRoutes.png)

### Membuat Controllers:

tambahkan code berikut dalam **app/Controllers/Page.php & Home.page**

![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/8Page.png)

### 5. Membuat View

1. Buat File app/Views/about.php app/Views/artikel.php app/Views/contact.php app/Views/home.php:
2. Tambahkan code pada ke 4 file diatas:

![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/10codeDalamView.png)

### 6. Membuat Layout

1. Buat direktori layout yang di dalamnya berisi file `main.php`
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/10buatmain.php.png)

2. buat di file `style.css` di dalam direktori public
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/11buatStyle.css.png)

### 7. Hasil Output

![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/12HasilAbout.php.png)
# Praktikum 2

### Membuat Database dan Tabel

![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/12MembuatDataBase.png)

### Config Koneksi Database

Lakukan Config untuk menghubungkan dengan database server pada file `.env`
![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/13Setting.ENV.png)

### Membuat Artikel Model

Model ini menentukan hubungan antar data dan bagaimana data dapat diakses serta dimanipulasi. Membuat model untuk mengakses data artikel `app/Models`

![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/13MembuatArtikelModels.png)

### Membuat Controller

Pada direktori `app/Controllers/Home.php` buat Controller pada func index
![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/14MembuatControllerHome.png)

### Buat Perubahan Kecil Pada `Routes.php`

![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/15RoutesPHP.png)

### Ubah `Home.php` menjadi

![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/16Ubahhome.php.png)

### Membuat Artikel Sementara di PHPMyAdmin

![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/17BuatArtikelSementara.png)

### Membuat Tampilan Detail Artikel

1. Ubah func Artikel pada `app/Controllers/Page.php`
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/18ubahFuncArtikel.png)

2. Membuat View baru di app/Views/artikel.php dan membuat routing baru di `app/Config/Routes.php`
   dan ubah dengan code
   **$routes->get('page/artikel/(:any)', 'Page::artikel/$1');**
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/19buatartikel.phpViews.png)  

3. Hasil
    ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/20hasilDetailArtikel.png)
   
### Membuat Menu Admin

1.  Membuat Method baru pada Controllers `app/Controllers/Artikel.php` dengan nama **admin_index()**
    ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/21MembuatControllerArtikel.php.png) 
    
2.  Menuju direktori `app/Views` lalu buat **admin_index.php**
     ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/22BuatAdminIndex.png)

3.  Tambah routes di `app/Config/Routes.php` untuk menu admin
    ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/23TambahRoutes.php.png)

4. Hasil Output
    ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/25HasilAdmin.png)

### Menambah Data Artikel

1. Menambah Func baru pada `app/Controllers/Artikel.php dengan **Add()**
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/23TambahFungsiAdd.png)

2. Buat **add.php** di `app/Views` untuk form tambah artikel
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/24BuatAdd.phpDiViews.png)
3. Hasil Output
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/25hasilAdd.png)
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/25HasilAdd1.png)

### Edit Data

1. Menambahkan func baru pada `app/Controllers/Artikel.php` dengan nama **edit($id)**
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/26EditPhp.png)

2. Buat `edit.php` di `app/Views` untuk form edit artikel
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/26editphphtml.png)

3. Hasil Output
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/25HasilEdit.png)

### Menghapus Data

1. Tambah Func baru pada `app/Controllers/Artikel.php` dengan nama **delete($id)**
    ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/27DeletePHP.png)
2. Hasil Output "P" terhapus
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/25HasilAdd1.png)
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/25HasilDelete.png)

# Praktikum 3

### Membuat Class View Cell

Membuat Direktori Cells di dalam `app` lalu buat file `Artikel.php` pada `app/Cells`
 ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/28aViewCels.png)

### Membuat View untuk View Cells

1. Lakukan perubahan field pada database dengan menambahkan tanggal agar dapat mengambil data artikel terbaru
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/29aMembuatdatabaru.png)
2. Buat folder component di `app/Views` yang didalamnya berisi `artikel_katgori.php & artikel_terkini.php`
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/29bMembuatArtikelTerkini.png)
3. Isikan code di dalam file `artikel_terkini.php`
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/29c.png)
4. Modifikasi `app/Views/layout/main.php`
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/29dModifikasiLayout.png)

### Mengubah Views Cells agar Menampilkan Kategori tertentu

1. Menambahkan data baru / column baru untuk kategori
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/29dMembuatColumnDataKategori.png)
2. Modifikasi model di `app/Models/ArtikelModel.php
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/30aModifikasiArtikelMoels.png)
3. Membuat File `ArtikelKategori.php` baru pada folder `app/Cells`
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/30cMembuatFileArtikelKategori.png)
4. Membuat file `artikel_kategori.php` baru pada folder `app/Views/components`.
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/30dMembuatartikel_kategori.php.png)
5. Modifikasi code di file `app/Views/layout/main.php`
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/30dModifLyout.php.png)
6. Tambahkan code berikut di file `app/Config/Routes.php`
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/30eTambahRoutes.png)
7. Tambah Method kategori controller di `app/Controllers/Home.php`
    ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/30fModifHome.php.png)
8. Hasil Output
   ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/LASSTTTT.png)

     ![image alt](https://github.com/ardhvka/Lab7web/blob/5c0754a252edb3a3fdab76d6dcb838fb5384336e/ci4/screnshoot/31a.BuatTabel.png)
