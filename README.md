# ✨ PokéCare — Aplikasi Latihan Pokémon ✨

## Data Diri Peserta
**Nama Lengkap: Huriyatun Nur Anajmi**   
**NIM: H1H024035**  
**Shift Awal: C**
**Shift Akhir: B**   

---

## Deskripsi Singkat Aplikasi
PokéCare adalah aplikasi sederhana untuk simulasi latihan Pokémon.  
Pengguna dapat memilih jenis latihan dan intensitas untuk meningkatkan **level** dan **HP** Pokémon.  
Hasil latihan disimpan sebagai riwayat yang dapat dilihat kembali kapan saja.

---

## Penjelasan Singkat File Kode
| File | Fungsi |
|------|--------|
| `index.php` | Halaman beranda Pokémon; menampilkan info dasar Pokémon dan tombol ke halaman latihan/riwayat |
| `training.php` | Halaman latihan Pokémon; form latihan + logika kenaikan level & HP + simpan ke `history.json` |
| `history.php` | Menampilkan seluruh riwayat latihan dalam card dari `history.json` |
| `style.css` | Styling aplikasi: pastel, lucu, animasi pop pada card dan tombol |
| `history.json` | Penyimpanan data latihan yang sudah dilakukan |
| class `Pokemon` di `training.php` | Kelas untuk menyimpan atribut Pokémon, method `specialMove()` & `train()` |
  
> Catatan: Semua file PHP saling terhubung, `index.php` → `training.php` → `history.php`.

---

## Cara Menjalankan Aplikasi (Laragon)
1. **Siapkan Laragon**  
   - Pastikan Laragon sudah di-install dan aktif.  
   - Apache dan PHP running otomatis.

2. **Letakkan folder proyek di Laragon**  
   - Copy folder proyek (`pokemon`) ke:  
     ```
     C:\laragon\www\pokemon
     ```
3. **Jalankan aplikasi di browser**  
   - Klik **Menu Laragon → www → pilih folder proyek**  
   - Atau buka browser dan akses:  
     ```
     http://localhost/pokemon/
     ```
4. **Gunakan aplikasi**  
   - Mulai dari **index.php** → latihan di **training.php** → lihat riwayat di **history.php**.

## GIF Demonstrasi
Berikut contoh penggunaan aplikasi:

![Demo](assets/pokecare.gif)

