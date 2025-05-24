# 👨‍⚕️ SIAP-Project – Sistem Informasi Apotik Rumah Sakit

![SIAP Banner]([[https://pbs.twimg.com/media/ELr_JfsUwAIpELK.jpg](https://g4sky.net/wa-data/public/photos/00/33/23300/23300.970.jpg)](https://g4sky.net/wa-data/public/photos/00/33/23300/23300.970.jpg))

**SIAP (Sistem Informasi Apotik)** adalah solusi digital berbasis **Laravel** yang dirancang untuk mendukung pengelolaan apotik rumah sakit secara modern dan efisien. Proyek ini dibangun dengan fokus pada:

✨ *User-friendly Interface*  
🔐 *Keamanan Data*  
📈 *Skalabilitas Sistem*

![Top Languages](https://github-readme-stats.vercel.app/api/top-langs/?username=rizkySA-PUTRA1996&theme=dark&hide_border=false&include_all_commits=false&count_private=false&layout=compact)

---

## 🚀 Fitur Unggulan

- 🩺 **Manajemen Antrean Pasien** – Pemrosesan antrean secara real-time.
- 🔐 **Login Multi-Role** – Akses dibedakan untuk Admin dan Petugas.
- 📝 **Log Aktivitas** – Audit trail setiap tindakan pengguna.
- 📱 **UI Responsif** – Desain antarmuka yang nyaman di desktop & mobile.

---

## 🛠️ Teknologi yang Digunakan

| Kategori     | Teknologi                                                |
|--------------|-----------------------------------------------------------|
| ⚙️ Framework | Laravel 10                                                |
| 🎨 Frontend  | Blade, Bootstrap 5, JavaScript                            |
| 🗃️ Database | MySQL                                                     |
| 🔧 Tools     | Vite, Composer, PHPUnit                                   |

---

## 👨‍💻 Tim Pengembang

| 👤 Nama                  | 🧰 Peran                 | 🔗 Kontak                                                              |
|--------------------------|--------------------------|------------------------------------------------------------------------|
| Rizky Saputra            | 👔 Project Manager        | [Soon]()                                                              |
| M. Najuan Amin           | 🛠️ Backend Engineer       | [Soon]()                                                              |
| M. Abdillah Hidayat      | 🧪 Backend & UI Helper    | [Soon]()                                                              |
| M. Ridha Maulana         | 🧮 Database Engineer      | [Soon]()                                                              |
| Trindah Agustina         | 💻 Web Developer          | [Soon]()                                                              |
| Ismatul Hawa             | 💻 Web Developer          | [Soon]()                                                              |
| Naila Hafidah            | 🎨 UI/UX Designer         | [Soon]()                                                              |
| M. Harsa Fahlipi         | 📱 Mobile Programmer      | [Soon]()                                                              |
| Raditya Natha Azra       | 🌐 Fullstack Developer    | [LinkedIn](https://www.linkedin.com/in/raditya-azra-880a52241/)      |

---

## 📦 Cara Menjalankan Proyek

```bash
# 1. Clone repositori
git clone https://github.com/rizkySA-PUTRA1996/SIAP-Project.git

# 2. Masuk ke direktori proyek
cd SIAP-Project

# 3. Install dependensi
composer install
npm install

# 4. Salin file konfigurasi dan sesuaikan
cp .env.example .env
# Edit file .env untuk konfigurasi database

# 5. Generate key aplikasi
php artisan key:generate

# 6. Jalankan migrasi dan seed data awal
php artisan migrate --seed

# 7. Jalankan server lokal
php artisan serve
