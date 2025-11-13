# 🎬 Aplikasi Manajemen Film (PHP + MySQL)

Proyek ini adalah aplikasi web sederhana berbasis **PHP Native** dan **MySQL** yang digunakan untuk melakukan manajemen data film — mulai dari menambah, mengedit, menghapus, hingga menampilkan daftar film.  
Selain itu, aplikasi ini juga dilengkapi dengan sistem **login dan register pengguna** menggunakan **password hashing** untuk keamanan.

---

## 🧩 Fitur Utama

### 🔐 Autentikasi
- Form *Register* dengan konfirmasi password  
- Password disimpan aman menggunakan `password_hash()`  
- Validasi login menggunakan `password_verify()`  
- Session login & logout  

### 🎞️ CRUD Data Film
- Tambah data film baru (judul, sutradara, harga tiket)  
- Edit data film yang sudah ada  
- Hapus film berdasarkan ID  
- Tabel data film dengan tampilan scrollable dan sticky header/footer  
- Total harga tiket tampil otomatis di bagian bawah tabel  

### 💅 UI/UX
- Desain menggunakan **Bootstrap 5**  
- Tampilan responsif dan bersih  
- Warna tema dapat diubah lewat `style.css` global  

---

## 🗄️ Struktur Database

**Nama Database:** `nwind`

**Tabel:** `film`

| Kolom | Tipe Data | Keterangan |
|-------|------------|------------|
| id_film | INT(11) AUTO_INCREMENT | Primary key |
| judul_film | VARCHAR(255) | Judul film |
| sutradara | VARCHAR(255) | Nama sutradara |
| harga_tiket | INT(11) | Harga tiket film |

---

## 👨‍💻 Pengembang

**Nama:** Arsyadi Indra Hasan P  
**Peran:** Praktikan  
**Mata Kuliah:** Praktikum Pemrograman Web IF-D  
**Tahun:** 2025
