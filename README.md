# 🍰 KueKu - Aplikasi Toko Kue Laravel

![Laravel](https://img.shields.io/badge/Laravel-12.x-red?logo=laravel)
![License](https://img.shields.io/github/license/username/kueku)
![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)

**KueKu** adalah aplikasi toko kue berbasis Laravel yang memiliki 2 peran:
- 👩‍🍳 **Admin**: Menambahkan, mengedit, dan menghapus kue.
- 🛍️ **User**: Melihat detail kue dan melakukan pembelian melalui checkout.

---

## ✨ Fitur Utama

- 🧁 CRUD Produk Kue (Admin)
- 📦 Manajemen Stok dan Status Kue
- 💬 Deskripsi & Gambar Produk
- 🧾 Checkout Kue (User)
- 🎨 UI dengan Tailwind CSS & Bootstrap (tema pink!)
- 🔐 Autentikasi dengan Laravel Breeze

---

## 🖥️ Tampilan

| Halaman Admin | Halaman User |
|---------------|--------------|
| ![Admin](public/screenshots/admin.png) | ![User](public/screenshots/user.png) |

---

## 🚀 Instalasi

```bash
git clone https://github.com/username/kueku.git
cd kueku
composer updatw
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
