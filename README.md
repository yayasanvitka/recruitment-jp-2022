# Recruitment Test
**Junior Programmer Yayasan Vitka (Backend) 2022**
<hr>

Ini merupakan Test Untuk Backend Junior Programmer Yayasan Vitka,

## Batas Waktu pengerjaan
<hr>

Maksimal 7 Hari setelah soal diberikan. **Lebih cepat lebih baik**

### Skill Requirement
<hr>

- PHP
- CSS
- understand Laravel Framework
- Understand GIT and able to use it in workflow
- Understand MySQL
- JavaScript

### Detail Tentang Aplikasi
<hr>
Aplikasi ini adalah aplikasi untuk listing member dan lokasi mereka. Pengguna ingin agar lokasi member dapat dikelompokkan ke provinsi, kabupaten / kota, dan kecamatan.


### Challenge Detail
<hr>

Silahkan fork repositori ini, jalankan migrasi untuk database, dan seeder untuk user.

Lakukan <strong>Pull Request</strong> untuk challange di bawah ini:
1. Buat migrasi, model, dan CRUD untuk tabel `provinces`, `cities`, dan `districts`. Model ini harus berelasi dengan tabel `members`.
2. Relasikan tabel `members` dengan tabel `districts`
3. Perbaiki Validasi pada CRUD Members.
4. Member code seharusnya tidak dapat diisi secara manual. Buatlah sebuah `service` untuk mengisi kode member secara otomatis!
5. Tambahkan kolom `Cities / Districts` pada list tabel member sebelum kolom `Location`. Pastikan kolom tersebut dapat di sort dan *searchable*.

Bonus Quest:
6. Buat API untuk data members dengan format API: `{“data”:[[…], […], …], “count”:X}`

### Rules Tambahan
<hr>

1. Setiap point dalam challenge harus di submit dalam `pull request` yang terpisah.
2. Peserta tidak harus menyelesaikan seluruh challenge, namun bobot penilaian tentunya akan lebih tinggi jika peserta mampu menyelesaikan seluruh challenge yang diberikan.

<small>
<i>We are encouraging you to use linux / mac, as you will encounter some problems when setting up this project on windows.</i>
</small>

### Referensi
<hr>

- <img src="https://avatars3.githubusercontent.com/u/958072?s=200&v=4" width="12px"></img> [Laravel](https://laravel.com/docs/9.x)
- <img src="https://avatars0.githubusercontent.com/u/15017015?s=200&v=4" width="12px"></img> [BackPack](https://backpackforlaravel.com/docs)
- [Web Development Standard - Yayasan Vitka](https://kb.yayasanvitka.id/books/development-guidelines/page/web-development)

### Contact
<hr>

**[Stefanus E. Prasetyo](mailto:stefanus@yayasanvitka.id)** <br/>
**[Adli I. Ifkar](mailto:adly@yayasanvitka.id)**
