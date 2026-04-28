-- ============================================================
-- Master Template Website Desa - Database Schema & Seed Data
-- CodeIgniter 4 + MySQL / phpMyAdmin
-- Cara Import: phpMyAdmin → Import → Pilih file ini → Go
-- ============================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+07:00";
SET NAMES utf8mb4;

-- ============================================================
-- TABEL: Admin
-- ============================================================
CREATE TABLE IF NOT EXISTS `admins` (
    `id` VARCHAR(30) NOT NULL,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- TABEL: Profil Desa
-- ============================================================
CREATE TABLE IF NOT EXISTS `village_profiles` (
    `id` VARCHAR(30) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `motto` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `history` TEXT NOT NULL,
    `vision` TEXT NOT NULL,
    `mission` TEXT NOT NULL,
    `area_size` VARCHAR(50) NOT NULL,
    `population` INT NOT NULL DEFAULT 0,
    `family_count` INT NOT NULL DEFAULT 0,
    `hamlets` VARCHAR(255) NOT NULL,
    `district` VARCHAR(100) NOT NULL,
    `regency` VARCHAR(100) NOT NULL,
    `province` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `address` TEXT NOT NULL,
    `postal_code` VARCHAR(10) NOT NULL,
    `latitude` VARCHAR(20) NOT NULL,
    `longitude` VARCHAR(20) NOT NULL,
    `logo_url` VARCHAR(255) DEFAULT NULL,
    `service_hours` VARCHAR(255) DEFAULT 'Senin - Jumat: 08.00 - 16.00 WIB',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- TABEL: Perangkat Desa
-- ============================================================
CREATE TABLE IF NOT EXISTS `officials` (
    `id` VARCHAR(30) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `position` VARCHAR(100) NOT NULL,
    `photo_url` VARCHAR(255) DEFAULT '',
    `nip` VARCHAR(50) DEFAULT NULL,
    `order_num` INT NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- TABEL: Anggaran Desa
-- ============================================================
CREATE TABLE IF NOT EXISTS `budgets` (
    `id` VARCHAR(30) NOT NULL,
    `year` INT NOT NULL,
    `category` VARCHAR(100) NOT NULL,
    `amount` DECIMAL(15,2) NOT NULL DEFAULT 0,
    `type` VARCHAR(20) NOT NULL,
    `description` VARCHAR(255) DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- TABEL: Layanan Desa
-- ============================================================
CREATE TABLE IF NOT EXISTS `services` (
    `id` VARCHAR(30) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `description` TEXT NOT NULL,
    `icon` VARCHAR(50) NOT NULL DEFAULT 'FileText',
    `requirements` TEXT DEFAULT NULL,
    `procedure` TEXT DEFAULT NULL,
    `order_num` INT NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- TABEL: Potensi Wisata
-- ============================================================
CREATE TABLE IF NOT EXISTS `tourism_spots` (
    `id` VARCHAR(30) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `description` TEXT NOT NULL,
    `image_url` VARCHAR(255) DEFAULT '',
    `category` VARCHAR(50) NOT NULL DEFAULT 'Alam',
    `location` VARCHAR(255) NOT NULL,
    `order_num` INT NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- TABEL: Berita
-- ============================================================
CREATE TABLE IF NOT EXISTS `news` (
    `id` VARCHAR(30) NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `excerpt` TEXT NOT NULL,
    `image_url` VARCHAR(255) DEFAULT NULL,
    `category` VARCHAR(50) NOT NULL,
    `is_published` TINYINT(1) NOT NULL DEFAULT 1,
    `date` DATE NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- TABEL: Kependudukan
-- ============================================================
CREATE TABLE IF NOT EXISTS `population_stats` (
    `id` VARCHAR(30) NOT NULL,
    `category` VARCHAR(50) NOT NULL,
    `male_count` INT NOT NULL DEFAULT 0,
    `female_count` INT NOT NULL DEFAULT 0,
    `year` INT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- TABEL: Infrastruktur
-- ============================================================
CREATE TABLE IF NOT EXISTS `infrastructure` (
    `id` VARCHAR(30) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `category` VARCHAR(50) NOT NULL,
    `quantity` INT NOT NULL DEFAULT 0,
    `unit` VARCHAR(20) NOT NULL,
    `condition` VARCHAR(20) DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- TABEL: Galeri
-- ============================================================
CREATE TABLE IF NOT EXISTS `gallery` (
    `id` VARCHAR(30) NOT NULL,
    `title` VARCHAR(100) NOT NULL,
    `image_url` VARCHAR(255) DEFAULT '',
    `category` VARCHAR(50) NOT NULL,
    `order_num` INT NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- TABEL: Pesan Kontak
-- ============================================================
CREATE TABLE IF NOT EXISTS `contact_messages` (
    `id` VARCHAR(30) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `message` TEXT NOT NULL,
    `is_read` TINYINT(1) NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- SEED DATA - Ganti sesuai data desa Anda
-- ============================================================

-- Admin: username=admin, password=admin123
-- Password di-hash dengan bcrypt. Jalankan /setup jika ingin membuat ulang.
INSERT IGNORE INTO `admins` (`id`, `username`, `password`, `name`) VALUES
('admin-1', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator Desa');

-- Profil Desa
INSERT IGNORE INTO `village_profiles` (`id`, `name`, `motto`, `description`, `history`, `vision`, `mission`, `area_size`, `population`, `family_count`, `hamlets`, `district`, `regency`, `province`, `phone`, `email`, `address`, `postal_code`, `latitude`, `longitude`, `logo_url`) VALUES
('village-1', 'Desa Taba Lagan', 'Maju Bersama, Sejahtera Berkah', 'Desa Taba Lagan merupakan salah satu desa yang terletak di Kecamatan Pondok Kelapa, Kabupaten Bengkulu Tengah, Provinsi Bengkulu. Desa ini dikenal dengan keindahan alamnya yang masih asri, masyarakat yang ramah, serta potensi sumber daya alam yang melimpah. Dengan semangat gotong royong dan kebersamaan, Desa Taba Lagan terus berkembang menuju desa yang maju, mandiri, dan sejahtera.', 'Desa Taba Lagan memiliki sejarah panjang yang erat kaitannya dengan perjalanan masyarakat Bengkulu Tengah. Kata "Taba" dalam bahasa lokal berarti daerah yang tinggi atau bukit, sedangkan "Lagan" merujuk pada nama sungai yang mengalir di sekitar desa. Desa ini didirikan oleh para leluhur yang mencari lahan pertanian subur di kawasan pedalaman Bengkulu. Seiring berjalannya waktu, Desa Taba Lagan berkembang menjadi pemukiman yang teratur dengan tata pemerintahan desa yang terstruktur.', 'Mewujudkan Desa Taba Lagan yang Maju, Mandiri, Sejahtera, dan Berbudaya Berdasarkan Nilai-Nilai Kebersamaan dan Gotong Royong', '1. Meningkatkan kualitas pelayanan publik kepada masyarakat\n2. Mengembangkan potensi ekonomi desa berbasis pertanian dan pariwisata\n3. Meningkatkan infrastruktur desa yang berkualitas dan merata\n4. Melestarikan budaya dan kearifan lokal masyarakat\n5. Meningkatkan kualitas SDM melalui pendidikan dan pelatihan\n6. Mewujudkan tata kelola pemerintahan desa yang transparan dan akuntabel', '12,5 km²', 3256, 876, '4 Dusun (Dusun I, Dusun II, Dusun III, Dusun IV)', 'Kecamatan Pondok Kelapa', 'Kabupaten Bengkulu Tengah', 'Provinsi Bengkulu', '(0736) 123456', 'desa.tabalagan@gmail.com', 'Jl. Desa Taba Lagan, Kec. Pondok Kelapa, Kab. Bengkulu Tengah, Bengkulu', '38372', '-3.8654', '102.2568', 'img/logo.svg');

-- Perangkat Desa
INSERT IGNORE INTO `officials` (`id`, `name`, `position`, `photo_url`, `nip`, `order_num`) VALUES
('official-1', 'H. Ahmad Fauzi, S.Sos', 'Kepala Desa', '', NULL, 1),
('official-2', 'Budi Santoso, S.Pd', 'Sekretaris Desa', '', NULL, 2),
('official-3', 'Rina Wati, SE', 'Kaur Keuangan', '', NULL, 3),
('official-4', 'Dedi Kurniawan', 'Kaur Perencanaan', '', NULL, 4),
('official-5', 'Siti Aminah', 'Kaur Umum & Tata Usaha', '', NULL, 5),
('official-6', 'Hendra Wijaya', 'Kasi Pemerintahan', '', NULL, 6),
('official-7', 'Dewi Sartika, S.Pd', 'Kasi Kesejahteraan', '', NULL, 7),
('official-8', 'Agus Pratama', 'Kasi Pelayanan', '', NULL, 8),
('official-9', 'Rahmat Hidayat', 'Kepala Dusun I', '', NULL, 9),
('official-10', 'Fajar Ramadhan', 'Kepala Dusun II', '', NULL, 10),
('official-11', 'Wahyu Saputra', 'Kepala Dusun III', '', NULL, 11),
('official-12', 'Eko Prasetyo', 'Kepala Dusun IV', '', NULL, 12);

-- Anggaran
INSERT IGNORE INTO `budgets` (`id`, `year`, `category`, `amount`, `type`, `description`) VALUES
('budget-1', 2024, 'Dana Desa', 850000000, 'PENDAPATAN', 'Transfer dari APBN'),
('budget-2', 2024, 'Alokasi Dana Desa', 450000000, 'PENDAPATAN', 'Dana dari APBD Kabupaten'),
('budget-3', 2024, 'Pendapatan Asli Desa', 125000000, 'PENDAPATAN', 'Hasil usaha desa dan swadaya'),
('budget-4', 2024, 'Bantuan Provinsi', 75000000, 'PENDAPATAN', 'Bantuan dari APBD Provinsi'),
('budget-5', 2024, 'Lain-lain PAD yang Sah', 30000000, 'PENDAPATAN', 'Sumbangan dan hibah'),
('budget-6', 2024, 'Penyelenggaraan Pemerintahan', 380000000, 'BELANJA', 'Gaji, tunjangan, operasional'),
('budget-7', 2024, 'Pelaksanaan Pembangunan', 520000000, 'BELANJA', 'Infrastruktur dan fasilitas'),
('budget-8', 2024, 'Pembinaan Kemasyarakatan', 280000000, 'BELANJA', 'PKK, Karang Taruna, posyandu'),
('budget-9', 2024, 'Pemberdayaan Masyarakat', 220000000, 'BELANJA', 'Pelatihan, BUMDes, UMKM'),
('budget-10', 2024, 'Penanggulangan Bencana', 70000000, 'BELANJA', 'Kedaruratan dan mitigasi'),
('budget-11', 2023, 'Dana Desa', 780000000, 'PENDAPATAN', 'Transfer dari APBN'),
('budget-12', 2023, 'Alokasi Dana Desa', 420000000, 'PENDAPATAN', 'Dana dari APBD Kabupaten'),
('budget-13', 2023, 'Pendapatan Asli Desa', 95000000, 'PENDAPATAN', 'Hasil usaha desa dan swadaya'),
('budget-14', 2023, 'Bantuan Provinsi', 60000000, 'PENDAPATAN', 'Bantuan dari APBD Provinsi'),
('budget-15', 2023, 'Penyelenggaraan Pemerintahan', 350000000, 'BELANJA', 'Gaji, tunjangan, operasional'),
('budget-16', 2023, 'Pelaksanaan Pembangunan', 460000000, 'BELANJA', 'Infrastruktur dan fasilitas'),
('budget-17', 2023, 'Pembinaan Kemasyarakatan', 250000000, 'BELANJA', 'PKK, Karang Taruna, posyandu'),
('budget-18', 2023, 'Pemberdayaan Masyarakat', 190000000, 'BELANJA', 'Pelatihan, BUMDes, UMKM');

-- Layanan
INSERT IGNORE INTO `services` (`id`, `name`, `description`, `icon`, `requirements`, `procedure`, `order_num`, `is_active`) VALUES
('service-1', 'Surat Keterangan Domisili', 'Penerbitan surat keterangan tempat tinggal untuk keperluan administrasi', 'FileText', 'KTP, Kartu Keluarga, Surat Pengantar RT/RW', '1. Ajukan surat pengantar ke RT/RW\n2. Bawa berkas ke kantor desa\n3. Verifikasi data\n4. Surat diterbitkan dalam 1 hari kerja', 1, 1),
('service-2', 'Surat Keterangan Tidak Mampu', 'Penerbitan SKTM untuk keperluan bantuan sosial dan kesehatan', 'Heart', 'KTP, Kartu Keluarga, Surat Pengantar RT/RW, Data Penghasilan', '1. Ajukan ke RT/RW\n2. Lengkapi berkas\n3. Survey lapangan\n4. Penerbitan surat 2 hari kerja', 2, 1),
('service-3', 'Surat Pengantar KTP', 'Pengurusan surat pengantar untuk pembuatan/perpanjangan KTP', 'CreditCard', 'KTP lama (jika perpanjangan), Kartu Keluarga, Akta Kelahiran', '1. Datang ke kantor desa\n2. Bawa berkas persyaratan\n3. Isi formulir\n4. Surat pengantar diterbitkan', 3, 1),
('service-4', 'Surat Keterangan Usaha', 'Penerbitan SKU untuk keperluan perizinan usaha dan pinjaman', 'Briefcase', 'KTP, Kartu Keluarga, Foto lokasi usaha', '1. Ajukan ke kantor desa\n2. Lengkapi berkas\n3. Verifikasi lokasi usaha\n4. Surat diterbitkan 1 hari kerja', 4, 1),
('service-5', 'Surat Keterangan Lahir', 'Penerbitan surat keterangan kelahiran bayi', 'Baby', 'KTP orang tua, Kartu Keluarga, Surat Keterangan Bidan/Rumah Sakit', '1. Bawa surat keterangan dari bidan/RS\n2. Lengkapi berkas\n3. Isi formulir\n4. Surat diterbitkan hari yang sama', 5, 1),
('service-6', 'Surat Keterangan Kematian', 'Penerbitan surat keterangan kematian untuk keperluan administrasi', 'FileCheck', 'KTP almarhum, Kartu Keluarga, Surat Keterangan RS/Puskesmas', '1. Bawa surat keterangan dari RS/Puskesmas\n2. Lengkapi berkas\n3. Verifikasi data\n4. Surat diterbitkan hari yang sama', 6, 1),
('service-7', 'Pengurusan Kartu Keluarga', 'Pembuatan atau perubahan data Kartu Keluarga', 'Users', 'KTP kepala keluarga, Kartu Keluarga lama, Surat keterangan perubahan', '1. Bawa berkas ke kantor desa\n2. Isi formulir pengajuan\n3. Verifikasi data\n4. Pengantar ke Kecamatan', 7, 1),
('service-8', 'Surat Izin Keramaian', 'Perizinan untuk mengadakan acara keramaian di wilayah desa', 'PartyPopper', 'KTP, Surat pengantar RT/RW, Denah lokasi acara', '1. Ajukan izin minimal 7 hari sebelum acara\n2. Lengkapi berkas\n3. Koordinasi dengan RT/RW\n4. Izin diterbitkan 3 hari kerja', 8, 1);

-- Wisata
INSERT IGNORE INTO `tourism_spots` (`id`, `name`, `description`, `image_url`, `category`, `location`, `order_num`) VALUES
('tourism-1', 'Air Terjun Taba Lagan', 'Air terjun alami dengan ketinggian sekitar 15 meter yang tersembunyi di balik hutan tropis.', '', 'Alam', 'Dusun II, Desa Taba Lagan', 1),
('tourism-2', 'Sungai Lagan', 'Sungai jernih yang mengalir sepanjang desa, ideal untuk kegiatan arung jeram ringan dan piknik keluarga.', '', 'Alam', 'Sepanjang Desa Taba Lagan', 2),
('tourism-3', 'Kebun Durian Taba Lagan', 'Kebun durian seluas 5 hektar yang menjadi destinasi wisata kuliner saat musim durian tiba.', '', 'Kuliner', 'Dusun I, Desa Taba Lagan', 3),
('tourism-4', 'Bukit Panorama Taba', 'Bukit dengan ketinggian 350 mdpl yang menawarkan pemandangan panorama desa dan pegunungan Bukit Barisan.', '', 'Alam', 'Dusun III, Desa Taba Lagan', 4),
('tourism-5', 'Agrowisata Kopi Taba Lagan', 'Perkebunan kopi robusta dan liberika dengan area agrowisata.', '', 'Agrowisata', 'Dusun IV, Desa Taba Lagan', 5),
('tourism-6', 'Sawah Terasering Taba', 'Hamparan sawah terasering yang indah dengan sistem irigasi tradisional.', '', 'Agrowisata', 'Dusun I & II, Desa Taba Lagan', 6);

-- Berita
INSERT IGNORE INTO `news` (`id`, `title`, `content`, `excerpt`, `image_url`, `category`, `is_published`, `date`) VALUES
('news-1', 'Desa Taba Lagan Raih Penghargaan Desa Tahunan 2024', 'Desa Taba Lagan berhasil meraih penghargaan sebagai Desa Terbaik Tingkat Kabupaten Bengkulu Tengah tahun 2024. Penghargaan ini diberikan atas keberhasilan desa dalam mengelola dana desa secara transparan dan akuntabel, serta inovasi program pemberdayaan masyarakat yang berkelanjutan.', 'Desa Taba Lagan berhasil meraih penghargaan sebagai Desa Terbaik Tingkat Kabupaten Bengkulu Tengah tahun 2024.', NULL, 'Prestasi', 1, '2024-11-15'),
('news-2', 'Program Literasi Digital untuk Warga Desa', 'Dalam upaya meningkatkan literasi digital masyarakat, Desa Taba Lagan bekerja sama dengan Kominfo menyelenggarakan pelatihan digital untuk warga desa.', 'Desa Taba Lagan bekerja sama dengan Kominfo menyelenggarakan pelatihan digital untuk warga desa.', NULL, 'Pemberdayaan', 1, '2024-10-20'),
('news-3', 'Pembangunan Jalan Desa Sepanjang 2 KM Selesai', 'Proyek pembangunan jalan desa sepanjang 2 kilometer yang menghubungkan Dusun III dan Dusun IV telah selesai dikerjakan.', 'Proyek pembangunan jalan desa sepanjang 2 KM yang menghubungkan Dusun III dan Dusun IV telah selesai.', NULL, 'Pembangunan', 1, '2024-09-10'),
('news-4', 'Festival Durian Taba Lagan 2024', 'Festival Durian Taba Lagan 2024 sukses digelar dengan menghadirkan berbagai varietas durian lokal.', 'Festival Durian Taba Lagan 2024 sukses digelar dengan ratusan pengunjung dari berbagai daerah.', NULL, 'Budaya', 1, '2024-08-25'),
('news-5', 'Pelatihan UMKM Pengolahan Kopi untuk Warga', 'Desa Taba Lagan mengadakan pelatihan pengolahan kopi bagi pelaku UMKM desa.', 'Desa Taba Lagan mengadakan pelatihan pengolahan kopi bagi pelaku UMKM desa untuk meningkatkan daya saing.', NULL, 'Pemberdayaan', 1, '2024-07-18'),
('news-6', 'Posyandu Aktif Layani 200 Balita dan Ibu Hamil', 'Pos Pelayanan Terpadu (Posyandu) Desa Taba Lagan secara rutin melayani sekitar 200 balita dan ibu hamil setiap bulannya.', 'Posyandu Desa Taba Lagan secara rutin melayani sekitar 200 balita dan ibu hamil setiap bulannya.', NULL, 'Kesehatan', 1, '2024-06-12');

-- Kependudukan
INSERT IGNORE INTO `population_stats` (`id`, `category`, `male_count`, `female_count`, `year`) VALUES
('pop-1', '0-14 tahun', 320, 305, 2024),
('pop-2', '15-24 tahun', 245, 238, 2024),
('pop-3', '25-44 tahun', 480, 465, 2024),
('pop-4', '45-64 tahun', 310, 325, 2024),
('pop-5', '65+ tahun', 86, 87, 2024),
('pop-6', '0-14 tahun', 315, 300, 2023),
('pop-7', '15-24 tahun', 240, 232, 2023),
('pop-8', '25-44 tahun', 470, 455, 2023),
('pop-9', '45-64 tahun', 305, 318, 2023),
('pop-10', '65+ tahun', 83, 85, 2023);

-- Infrastruktur
INSERT IGNORE INTO `infrastructure` (`id`, `name`, `category`, `quantity`, `unit`, `condition`) VALUES
('infra-1', 'Jalan Desa', 'Transportasi', 12, 'KM', 'Baik'),
('infra-2', 'Jembatan', 'Transportasi', 3, 'Unit', 'Baik'),
('infra-3', 'Gedung Kantor Desa', 'Pemerintahan', 1, 'Unit', 'Baik'),
('infra-4', 'Balai Desa', 'Pemerintahan', 1, 'Unit', 'Baik'),
('infra-5', 'Posyandu', 'Kesehatan', 4, 'Unit', 'Baik'),
('infra-6', 'Puskesmas Pembantu', 'Kesehatan', 1, 'Unit', 'Baik'),
('infra-7', 'SD/MI', 'Pendidikan', 2, 'Unit', 'Baik'),
('infra-8', 'PAUD/TK', 'Pendidikan', 2, 'Unit', 'Baik'),
('infra-9', 'Masjid', 'Keagamaan', 3, 'Unit', 'Baik'),
('infra-10', 'Mushola', 'Keagamaan', 8, 'Unit', 'Baik'),
('infra-11', 'Lapangan Olahraga', 'Olahraga', 2, 'Unit', 'Sedang'),
('infra-12', 'Irigasi', 'Pertanian', 5, 'KM', 'Baik'),
('infra-13', 'Pasar Desa', 'Ekonomi', 1, 'Unit', 'Sedang'),
('infra-14', 'Unit BUMDes', 'Ekonomi', 3, 'Unit', 'Baik');

-- Galeri
INSERT IGNORE INTO `gallery` (`id`, `title`, `image_url`, `category`, `order_num`) VALUES
('gallery-1', 'Kantor Desa Taba Lagan', '', 'Fasilitas', 1),
('gallery-2', 'Suasana Desa dari Bukit', '', 'Pemandangan', 2),
('gallery-3', 'Gotong Royong Warga', '', 'Kegiatan', 3),
('gallery-4', 'Panen Durian', '', 'Pertanian', 4),
('gallery-5', 'Upacara Adat', '', 'Budaya', 5),
('gallery-6', 'Pemandangan Sawah', '', 'Pemandangan', 6);

COMMIT;
