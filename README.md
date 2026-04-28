# 🏘️ Website Desa - Master Template

Master Template Website Profil Desa menggunakan **CodeIgniter 4.5.5 + MySQL**.

> ✅ **Tidak perlu `composer install`** — semua file framework sudah termasuk.

---

## 📦 Cara Install di Localhost (XAMPP)

### Persyaratan
- **PHP 8.1+** dengan ekstensi: `intl`, `json`, `mbstring`, `mysqli`
- **MySQL 5.7+** atau **MariaDB 10.3+**
- **Apache** dengan `mod_rewrite` aktif

### Langkah Install

1. **Extract** ZIP ke `C:\xampp\htdocs\master\`

2. **Buat Database** di phpMyAdmin:
   ```sql
   CREATE DATABASE desa_tabalagan;
   ```

3. **Import SQL**: phpMyAdmin → database `desa_tabalagan` → Import `database/desa_tabalagan.sql`

4. **Edit `.env`** — sesuaikan database:
   ```
   database.default.hostname = localhost
   database.default.database = desa_tabalagan
   database.default.username = root
   database.default.password =
   ```

5. **Akses web**: `http://localhost/master/public/`

6. **Admin**: `http://localhost/master/public/admin/login`
   - Username: `admin`
   - Password: `admin123`

---

## 🌐 Deploy ke Shared Hosting

1. Upload semua file ke hosting via FTP
2. **Document root** harus mengarah ke folder `public/`
3. Import `database/desa_tabalagan.sql` via phpMyAdmin
4. Edit `.env` sesuai database hosting
5. Selesai! ✅

---

## 🔐 Akun Default Admin

| Field    | Value      |
|----------|------------|
| Username | admin      |
| Password | admin123   |

> ⚠️ Segera ganti password setelah login pertama!
