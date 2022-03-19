-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Mar 2022 pada 06.34
-- Versi server: 10.5.9-MariaDB-log
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_config`
--

CREATE TABLE `app_config` (
  `id` varchar(10) NOT NULL,
  `nama_sistem` varchar(100) DEFAULT NULL,
  `tagline` varchar(100) DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `favicon` varchar(150) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `child_logo` varchar(150) DEFAULT NULL,
  `email_instansi` varchar(50) DEFAULT NULL,
  `pass_instansi` varchar(50) DEFAULT NULL,
  `url_root` varchar(100) DEFAULT NULL,
  `jalan` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `server_api_firebase` text DEFAULT NULL,
  `akronim_nama_sistem` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_config`
--

INSERT INTO `app_config` (`id`, `nama_sistem`, `tagline`, `instansi`, `status`, `favicon`, `logo`, `child_logo`, `email_instansi`, `pass_instansi`, `url_root`, `jalan`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `telp`, `fax`, `server_api_firebase`, `akronim_nama_sistem`) VALUES
('CONF1', 'Ecommerce Furniture', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `class_icon` varchar(50) DEFAULT NULL,
  `is_parent` varchar(2) DEFAULT NULL,
  `id_parent` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama`, `link`, `class_icon`, `is_parent`, `id_parent`, `keterangan`) VALUES
(1, 'Dashboard', '/home', 'fa fa-home', '1', NULL, 'Menu Dashboard'),
(2, 'Master Data', '#', 'fa fa-list', '1', NULL, 'Menu Master Data'),
(3, 'Produk', '/master/produk', NULL, '2', NULL, 'Menu Master Produk'),
(4, 'Jenis Produk', '/master/jenis-produk', NULL, '2', NULL, 'Menu Master Jenis Produk'),
(5, 'Kategori Produk', '/master/kategori-produk', NULL, '2', NULL, 'Menu Master Kategori Produk'),
(6, 'Pelanggan', '/master/pelaggan', NULL, '2', NULL, 'Menu Master Pelanggan'),
(7, 'Satuan', '/master/satuan', NULL, '2', NULL, 'Menu Master Satuan'),
(8, 'Pengaturan', '#', 'fa fa-wrench', '1', NULL, 'Menu Pengaturan'),
(9, 'User', '/pengaturan/user', NULL, '2', NULL, 'Menu Pengaturan User'),
(10, 'Menu', '/Pengaturan/menu', NULL, '2', NULL, 'Menu Pengaturan Menu'),
(11, 'Aplikasi', '/Pengaturan/aplikasi', NULL, '2', NULL, 'Menu Pengaturan Aplikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_user`
--

CREATE TABLE `menu_user` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_role` varchar(10) DEFAULT NULL,
  `posisi` varchar(10) DEFAULT NULL,
  `urutan` smallint(6) DEFAULT NULL,
  `level` smallint(6) DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_user`
--

INSERT INTO `menu_user` (`id`, `id_menu`, `id_role`, `posisi`, `urutan`, `level`, `id_parent`, `created_at`, `updated_at`) VALUES
(1, 1, 'SUPERADMIN', '1', 1, 1, NULL, '2022-03-19 05:56:28', '2022-03-19 05:55:59'),
(2, 2, 'SUPERADMIN', '1', 2, 1, NULL, '2022-03-19 05:56:30', '2022-03-19 05:56:01'),
(3, 8, 'SUPERADMIN', '1', 3, 1, NULL, '2022-03-19 05:56:32', '2022-03-19 05:56:05'),
(4, 3, 'SUPERADMIN', '1', 1, 2, 2, '2022-03-19 05:58:44', '2022-03-19 05:57:33'),
(5, 4, 'SUPERADMIN', '1', 2, 2, 2, '2022-03-19 05:58:45', '2022-03-19 05:57:36'),
(6, 5, 'SUPERADMIN', '1', 3, 2, 2, '2022-03-19 05:58:46', '2022-03-19 05:57:39'),
(7, 6, 'SUPERADMIN', '1', 4, 2, 2, '2022-03-19 05:58:50', '2022-03-19 05:57:42'),
(8, 7, 'SUPERADMIN', '1', 5, 2, 2, '2022-03-19 05:58:49', '2022-03-19 05:57:45'),
(9, 9, 'SUPERADMIN', '1', 1, 2, 8, '2022-03-19 05:59:54', '2022-03-19 05:59:18'),
(10, 10, 'SUPERADMIN', '1', 2, 2, 8, '2022-03-19 05:59:55', '2022-03-19 05:59:22'),
(11, 11, 'SUPERADMIN', '1', 3, 2, 8, '2022-03-19 05:59:56', '2022-03-19 05:59:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_jenis_produk`
--

CREATE TABLE `m_jenis_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kategori_produk`
--

CREATE TABLE `m_kategori_produk` (
  `id` varchar(36) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pelanggan`
--

CREATE TABLE `m_pelanggan` (
  `id` varchar(36) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_produk`
--

CREATE TABLE `m_produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `id_jenis_produk` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `id_kategori_produk` varchar(36) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `status` varchar(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_produk_image`
--

CREATE TABLE `m_produk_image` (
  `id` varchar(36) NOT NULL,
  `id_produk` varchar(36) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_satuan`
--

CREATE TABLE `m_satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `status` varchar(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_satuan`
--

INSERT INTO `m_satuan` (`id`, `nama`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PCS', '1', '2022-03-19 06:25:30', NULL, NULL),
(2, 'UNIT', '1', '2022-03-19 06:26:01', NULL, NULL),
(3, 'KARDUS', '1', '2022-03-19 06:26:08', NULL, NULL),
(4, 'BUAH', '1', '2022-03-19 06:28:44', '2022-03-19 06:28:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
('SUPERADMIN', 'Superadmin', 'Hak Akses Paling Tinggi', '2022-03-19 04:42:35', '2022-03-19 04:42:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(36) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `id_role` varchar(30) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `firebase_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `status`, `created_at`, `updated_at`, `email_verified_at`, `id_role`, `foto`, `firebase_token`) VALUES
('4a0f855b-8767-11ea-bede-f832e401f0e4', 'Muhammad Alkautsar', 'superadmin', 'superadmin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '2022-03-19 04:41:20', '2022-03-19 04:41:23', '2022-03-19 04:41:25', 'SUPERADMIN', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `app_config`
--
ALTER TABLE `app_config`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_user`
--
ALTER TABLE `menu_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_jenis_produk`
--
ALTER TABLE `m_jenis_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_kategori_produk`
--
ALTER TABLE `m_kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_pelanggan`
--
ALTER TABLE `m_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_produk`
--
ALTER TABLE `m_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_produk_image`
--
ALTER TABLE `m_produk_image`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_satuan`
--
ALTER TABLE `m_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `menu_user`
--
ALTER TABLE `menu_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `m_jenis_produk`
--
ALTER TABLE `m_jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_produk`
--
ALTER TABLE `m_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `m_satuan`
--
ALTER TABLE `m_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
