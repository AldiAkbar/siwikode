-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 02:30 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siwikode`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `category_artikel_id` int(11) NOT NULL,
  `preview` varchar(100) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `detail_artikel` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `title`, `category_artikel_id`, `preview`, `penulis`, `image`, `detail_artikel`) VALUES
(1, 'ICIP-ICIP SUSHI TAKARAJIMA SUSHI DAN MIX & GRILL (DEPOK)', 2, 'Takarajima Japanese Restaurant namanya. Setiap kali saya ngelewatin tempat ini di tepi Jalan', 'Writer', 'taka1.jpg', '<p>Takarajima Japanese Restaurant namanya. Setiap kali saya dan istri ngelewatin tempat ini di tepi Jalan Margonda Raya, kita selalu pengen dateng dan nyobain makan di sini. Dari penampakannya aja menurut saya udah menarik. Di antara belantara gedung-gedung, mal-mal, dan ruko-ruko, Takarajima ini mengusung konsep bangunan yang lain dari yang lain. Bangunannya hanya berupa rumah satu lantai aja, ga kurang, ga lebih. Rumahnya didesain dengan bentuk yang mengingatkan saya dengan bentuk rumah pedesaan khas Jepang. Apalagi catnya pun makin mengesankan keeleganannya dengan warna hitam yang mendominasi.</p>\r\n\r\n<p> Pas kita akhirnya menyempatkan diri berkunjung ke Takarajima, rupanya di sebelah bangunan rumah yang saya deskripsiin tadi, ada bangunan baru dengan atap segitiga yang terlihat lebih modern. Di sebelah pintu dan jendela kacanya terdapat tulisan “Takarajima Mix & Grill”. Tapi kita masuknya ke Takarajima Japanese Restaurant, interiornya bagus, saya suka karena Jepang banget suasananya. Nah, rupanya, kalo Takarajima Japanese Restaurant lebih berfokus ke bermacam menu sushi, sashimi, dan ramen, Takarajima Mix & Grill lebih menawarkan beragam hidangan sate panggang. Walaupun keduanya merupakan restoran yang berbeda, bahkan ga ada jalan tembusnya dari dalem bangunan, kita boleh kok mesen makanan dari restoran sebelah. Tapi pas bayar jadi agak ribet karena struknya terpisah. </p>\r\n\r\n<p> Ketiga menu sushi yang kita cobain adalah Tornado Roll, Red Dragon Roll, dan Aurora Crispy Roll. Ketiganya kalo ga salah Fay yang milih deh, soalnya dia yang lebih seneng makan sushi ketimbang saya. Saya mah makan sushi apa aja entah kenapa rasanya kok ya sama-sama aja gitu. Tornado Roll berisi potongan daging sapi, shitake, dan saus mentaiko. Red Dragon Roll berisi kulit ikan salmon dengan saus mentaiko. Yang terakhir, Aurora Crispy Roll, berisi tamago (mirip kayak omelet), crabstick, dan tuna aburi. Saya dan Fay sepakat, walaupun tampilannya ciamik, namun belum ada yang bikin lidah kesambet. Fay malahan masih tetep ngerasa sushi-nya Osuushi lebih oke. Mantep lah pokoknya. </p>'),
(2, 'Sejarah Panjang Pembangunan Masjid Kubah Emas di Depok', 1, 'Pendiri Masjid Dian Al Mahri atau dikenal Masjid Kubah Emas di Depok, Jawa Barat, Dian Djuriah Rais', 'Admin', 'mas.jpg', '<p> Pendiri Masjid Dian Al Mahri atau dikenal Masjid Kubah Emas di Depok, Jawa Barat, Dian Djuriah Rais tutup usia, Jumat (29/3/2019). Dian adalah sosok di balik bangunan ikonik di Depok ini. </p>\r\n\r\n<p> Menurut skripsi karya Mirza Shahrani, Fakultas Teknik Universitas Indonesia, 2008, \"Masjid Kubah Emas di Depok: Fenomena Reproduksi Masjid Kawasan Timur Tengah Dalam Konteks Indonesia\", Dian merupakan pengusaha asal Banten yang lahir pada 1953.</p>\r\n\r\n<p> Usaha Dian ada banyak, salah satunya di bidang properti yang dirintis sejak 1980. Ia lebih banyak menjalankan usaha di Singapura, Malaysia, dan Arab Saudi. </p>\r\n\r\n<p> Selain terkenal sebagai pengusaha sukses, Dian juga terkenal sebagai seorang dermawan yang gemar membantu anak yatim piatu dan membangun masjid sebagai bentuk ibadah. Tercatat kurang lebih ada 1.000 masjid yang dibangun Dian tersebar di Indonesia. </p>\r\n\r\n<p> Dian disebutkan membangun masjid berdasarkan spontanitas. Saat jalan-jalan ke suatu daerah dan melihat masyarakat membutuhkan masjid, secara spontan Dian akan membantu pembangunan masjid di daerah tersebut.  Salah satu yang paling terkenal adalah Masjid Dian Al Mahri yang dibangun pada 2001 dan selesai pada 2006. Masjid Dian Al Mahri dengan luas 8.000 meter persegi berdiri di lahan seluas 70 hektar, membuatnya menjadi masjid dengan lahan terluas di Jabodetabek. </p>\r\n\r\n<p> Dian berharap Masjid Kubah Emas menjadi kawasan terpadu yang memfasilitasi kebutuhan umat Islam akan sarana ibadah, dakwah, pendidikan, dan sosial yang menyatu dalam kawasan Islamic Center Dian Al Mahri. </p>'),
(3, 'Aladin Waterpark Depok Bangkrut, Ribuan Orang Kehilangan Pekerjaan', 1, ' Taman rekreasi air Depok Fantasi Waterpark atau yang dikenal Aladin Waterpark akhirnya ditutup.', 'Writer', 'renang.jpg', '<p> DEPOK – Taman rekreasi air Depok Fantasi Waterpark atau yang dikenal Aladin Waterpark akhirnya ditutup. Gedung taman rekreasi itu, kini sudah rata dengan tanah. Hanya menyisakan satu unit bangunan mini di bagian depan. </p>\r\n\r\n<p> Setelah ditelusuri, ternyata bangunan yang disisakan masih berfungsi sebagai tempat penyediaan mesin Anjungan Tunai Mandiri (ATM). Sejumlah security terlihat sedang berjaga-jaga di bagian depan gedung itu. </p>\r\n\r\n<p> “Kalau mulai tutupnya sih sejak pandemi (Covid-19), ya sekitar satu tahun terakhir lah,” ungkap Rahmat salah satu pedagang kaki lima yang ditemui di area sebelah kanan gedung eks Depok Fantasi Waterpark, Sabtu (27/2). </p>\r\n\r\n<p> Sementara menurut Arman, 54, yang juga pemilik kios kelontong di dekat Waterpark Aladin, bangunan rekreasi itu mulai dibongkar sejak 2 minggu terakhir. </p>\r\n\r\n<p> “Kurang lebih 2 minggu terakhir dilakukan pembongkaran,” ujar Arman. </p>\r\n\r\n<p> Sama, Arman juga menyebut alasan ditutupnya tempat wisata air itu lantaran terkena dampak Covid-19. </p>');

-- --------------------------------------------------------

--
-- Table structure for table `category_artikel`
--

CREATE TABLE `category_artikel` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_artikel`
--

INSERT INTO `category_artikel` (`id`, `category`) VALUES
(1, 'Rekreasi'),
(2, 'Kuliner');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kuliner`
--

CREATE TABLE `jenis_kuliner` (
  `id` int(11) NOT NULL,
  `jenis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kuliner`
--

INSERT INTO `jenis_kuliner` (`id`, `jenis`) VALUES
(1, 'Restaurant'),
(2, 'Cafe/Kedai'),
(3, 'Pasar Kaget');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_rekreasi`
--

CREATE TABLE `jenis_rekreasi` (
  `id` int(11) NOT NULL,
  `jenis` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_rekreasi`
--

INSERT INTO `jenis_rekreasi` (`id`, `jenis`) VALUES
(1, 'Taman Hiburan / Taman Bermain'),
(2, 'Tempat ibadah'),
(3, 'Taman Wisata'),
(4, 'Museum'),
(5, 'Water Park / Kolam Renang');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `job` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kontributor`
--

CREATE TABLE `kontributor` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `image` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontributor`
--

INSERT INTO `kontributor` (`id`, `name`, `nim`, `image`) VALUES
(1, 'Aldi Akbar Alimi', '0110220262', 'aldi.jpg'),
(2, 'Ninys Revalyna', '0110220039', 'ninys.jpg'),
(3, 'Syifa Nuraini Al Rohman', '0110220066', 'syifa.jpg'),
(4, 'Zhafira Aghniya Rahman', '0110220121', 'fira.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kuliner`
--

CREATE TABLE `kuliner` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `jenis_kuliner_id` int(11) NOT NULL,
  `menu` varchar(120) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `time_open` varchar(50) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuliner`
--

INSERT INTO `kuliner` (`id`, `name`, `image`, `jenis_kuliner_id`, `menu`, `price`, `address`, `time_open`, `deskripsi`) VALUES
(1, 'Takarajima', 'taka1.jpg', 1, 'Sushi, Shabu - shabu, Ramen, Udon, Bento, Donburi dan lain - lain.', '20.000 - 50.000 per porsi', 'Jalan Mangonda Raya, Beji, Depok.', '10.00 WIB - 22.00 WIB', 'Desain dari restoran ini bernuansa Jepang, ditambah suasana yang nyaman dan tenang membuat siapapun orang ingin singgah di tempat ini. Dengan menu unggulan seperti sushi, ramen, bento, donburi hingga shabu - shabu tersedia di restoran ini. Harga yang ditetapkan di restoran ini untuk setiap porsi cukup murah dan terjangkau.'),
(2, 'What\'s Up Cafe', 'up1.jpg', 2, 'Indomie Biasa, Indomie Carbonara, Indomie Ramen, Indomie Tomyum, Indomie Burger Steak, Nasi Goreng Lada Hitam, Aneka min', '20.000 - 50.000 per porsi', 'Jalan Margonda Raya No.463, Beji, Depok', '10.00 WIB - 22.00 WIB', 'Restoran ini memiliki tagline \"The Next Level of Indomie\" yang mengisyaratkan bahwa menu utama di restoran ini merupakan indomie. Banyak varian menu indomie yang tidak biasa seperti indomie carbonara, indomie tomyum seafood dan lainnya. Namun, jangan khawatir bagi kalian yang tidak suka dengan indomie bisa mencoba menu lain seperti nasi goreng lada hitam, nasi goreng mercon, dan lain - lain.'),
(3, 'Saung Talaga', 'saung1.jpg', 1, 'Ikan Gurame Goreng / Bakar, Sop Iga Sapi, Sate Ayam/Sapi/Kambing, Aneka gorengan dan Aneka minuman.', '20.000 - 50.000 per porsi', 'Jl. Raya Sawangan No.1, Rangkapan Jaya, Kec. Pancoran Mas, Kota Depok, Jawa Barat 16435', '10.00 - 21.00 WIB', 'Kalau mau makan sajian khas Sunda dan Jawa di Depok, tempat ini cocok didatangi, apalagi bersama keluarga. Ada ikan gurame goreng dan karedok yang pedas nonjok. Dekat dengan Jakarta, Depok, ternyata punya tempat makan yang bisa disambangi bersama keluarga. Tempatnya sangat terkenal bagi warga Depok. Karena bernuansa asri dan menawarkan beragam sajian tradisional. Terdapat kolam ikan dan beberapa saung di pinggirnya yang dulunya sebuah telaga, bernama Telaga Subur.'),
(4, 'Fat Bubble', 'fat1.jpg', 2, 'Fat Q Ball, Rice Bowl, Es Cincau, Es Krim Teh Hijau, serta aneka dessert lainnya.', '20.000 - 50.000 per porsi', 'Jl. Margonda Raya No.238, Kemiri Muka, Beji, Depok City, West Java 16423', '10.00 - 21.00 WIB', 'Tempat ini menyajikan berbagai <i>dessert</i> atau hidangan pencuci mulut yang pastinya sayang banget kalo dilewatkan begitu saja. Karena menu utama disini merupakan <i>dessert,</i> jadi jangan berharap ada makanan berat dijual disini. Tempat ini didesain dengan konsep yang sangat ceria, sehingga sangat cocok buat kalian yang ingin sekedar nongkrong bersama teman atau sahabat ramai - ramai. Tempat ini bisa makan ditempat, pesanan secara online maupun pesanan untuk dibawa pulang'),
(5, 'Roti Bakar Eddy', 'roti.jpg', 2, 'roti bakar keju, coklat, kacang, srikaya keju, stroberi keju, sate taicha, pempek dan lain - lain.', '20.000 - 50.000 per orang', 'Jl. Margonda Raya No.2, RW.12, Kemiri Muka, Kecamatan Beji, Kota Depok, Jawa Barat 16424', '07.00 - 02.00 WIB', 'Berbagai macam roti bakar yang benar - benar garing siap disajikan ke meja kalian jika datang kesini. Mulai dari roti bakar keju, coklat, kacang, srikaya keju, stroberi keju dan masih banyak lagi. Bagi kalian yang mungkin tidak terlalu suka dengan roti, mungkin kalian bisa menyoba menu lainnya seperti pisang bakar coklat keju, bubur ayam, mie goreng, dan berbagai minuman hangat ataupun dingin. Tempat ini bisa makan ditempat, pesanan secara online maupun pesanan untuk dibawa pulang.'),
(6, 'Es Pocong', 'es.jpg', 2, 'Jl. Margonda Raya No.476, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424', '20.000 - 50.000 per orang', 'Jl. Margonda Raya No.476, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424', '10.00 - 22.00 WIB', 'Dilihat dari nama toko dan menunya saja sudah terlihat bahwa makanan dan minuman yang ada disini bertemakan horror. Ditambah topping yang digunakan di makanan dan minuman menambah kesan horror yang sudah ada di nama hidangannya. Namun, rasanya tetap enak dan tidak mengandung unsur horror sama sekali. Tempat ini memiliki akses jalan yang cukup sulit karena berada di gang kecil. Namun, pengunjung tetap antusias untuk datang dan mencoba rasa dari es pocong ini.');

-- --------------------------------------------------------

--
-- Table structure for table `nav_home`
--

CREATE TABLE `nav_home` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nav_home`
--

INSERT INTO `nav_home` (`id`, `title`, `url`, `is_active`) VALUES
(1, 'Beranda', 'home', 1),
(2, 'Wisata Rekreasi', 'rekreasi', 1),
(3, 'Wisata Kuliner', 'kuliner', 1),
(4, 'Artikel', 'artikel', 1),
(5, 'Tentang', 'about', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rekreasi`
--

CREATE TABLE `rekreasi` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `jenis_rekreasi_id` int(11) NOT NULL,
  `facility` varchar(120) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `ticket` varchar(50) DEFAULT NULL,
  `time_open` varchar(50) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekreasi`
--

INSERT INTO `rekreasi` (`id`, `name`, `image`, `jenis_rekreasi_id`, `facility`, `address`, `ticket`, `time_open`, `deskripsi`) VALUES
(1, 'Taman Balai Kota Depok', 'balai.jpg', 3, 'Perpustakaan Umum Balai Kota, Pos Pemadam Kebakaran, Masjid Balai Kota', 'Jl. Magonda Raya No.54 Depok', 'Free (Belum termasuk tiket parkir)', ' 00.00 WIB - 24.00 WIB', 'Taman Balai Kota Depok bisa menjadi referensi sebagai tempat rekreasi keluarga jika tidak ingin mengeluarkan banyak budget. Akses jalan yang ada juga mudah dicapai sehingga bisa dilewati oleh kendaraan umum atau pribadi. Dengan lapangan yang luas sehingga bisa dijadikan tempat untuk bersantai ataupun bermain. Dikelilingnya juag terdapat  bunga - bunga indah di tengah landmark bisa dijadikan sebagai tempat untuk berfoto - foto.'),
(2, 'Depok Fantasy Water Park', 'renang.jpg', 5, 'wahana waterpark, foodcourt, gazebo, panggung, hiburan serta fasilitas lainnya.', 'Jalan Boulevard Grand Depok City, Depok 16412.', '40.000 - 70.000 per orang', '07.00 WIB - 17.00 WIB', 'Waterpark ini salah satu tempat rekreasi air pertama dan terbesar yang berada di kawasan Grand Depok City, Kota Depok. Waterpark yang memiliki tema dan bernuansa Negeri 1001 malam dengan berbagai permainan air yang seru buat keluarga. Banyak wahana seru yang bisa dicoba baik untuk anak-anak maupun dewasa. Esthatic Tower, Giant Slide, Waterplay, Kiddy Pool, adalah beberapa wahana yang bisa dimainkan.'),
(3, 'Masjid Kubah Emas', 'mas.jpg', 2, 'tempat sholat dan berwudhu, peralatan sholat, toko makanan dan butik.', 'Jl. Raya Meruyung, Meruyung, Kec. Limo, Kota Depok, Jawa Barat', 'Free (Belum termasuk tiket parkir)', ' 00.00 WIB - 22.00 WIB', 'Masjid Kubah Emas atau Masjid Dian Al Mahri diresmikan pada Desember 2006 ini memang terinspirasi dari gaya arsitektur Timur Tengah. Masjid ini tidak hanya bisa menjadi tempat bagi umat muslim untuk beribadah, tetapi juga bisa dijadikan sebagai tempat untuk sekedar berkeliling bersama keluarga ataupun sekedar untuk berfoto. Namun, jangan dilupakan bahwa fungsi utama masjid ini yaitu menjadi tempat ibadah bagi kaum muslim.'),
(4, 'D\'Kandang Amazing Farm', 'kandang.jpg', 1, 'wahana yang berhubungan dengan hewan peternakan, ada wahana permainan, wahana kreasi, spot foto menarik dan restoran.', 'Jalan Penarikan (Perum PGRI), RT 07 RW 02, Kelurahan Pasir Putih, Kecamatan Sawangan, Kota Depok, Ja', '20.000 - 40.000 per orang', '08.00-16.00 WIB dan Minggu 06.00 WIB-16.00 WIB', 'Berwisata sambil menuntut ilmu kerap dilakukan orang tua ketika mengajak anak-anak mereka untuk berlibur. Objek wisata ini mengambil konsep wisata edukatif dengan tema pertanian dan peternakan. Di D’Kandang Amazing Farm, para pengunjung tidak hanya akan melihat bagaimana susu sapi diperah, tetapi juga ikut merasakan memerah susu sapi dan mendapatkan pengetahuan menarik lainnya. Selain itu, ada keseruan menarik lainnya, seperti menanam tanaman hias, bercocok tanam, hingga melakukan pencangkokan.'),
(5, 'Taman Bunga Wiladatika', 'taman.jpg', 3, 'Taman Bunga, Kolam Renang, Hiburan anak - anak, Outbound, Gazebo, Gedung Pertemuan dan berbagai fasilitas umum lainnya.', 'Jalan Jambore 1 Cibubur/Cimanggis, Depok, Jawa Barat.', 'Umum 15.000 dan Kegiatan Pramuka 5.000', '08.00 - 16.00 WIB ', 'Taman Bunga Wiladatika menjadi salah satu referensi wisata warga Depok dan sekitarnya. Disekeliling diberikan pemandangan berbagai macam bunga yang sangat memanjakan mata para pengunjung. Nama taman ini merupakan singkatan dari Widya Mandala Krida Bakti Pramuka. Awalnya dibangun sebagai sarana dan sumber pendanaan aktivitas Pramuka. Taman ini sangat cocok bagi anda yang ingin sekedar bersantai atau mengajak anak bermain di taman ini juga cukup menyenangkan.');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `job` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `name`, `job`, `description`, `image`) VALUES
(1, 'Cesil', 'Pemeriksa kardus', 'Saya suka dengan websitenya. Design dan recommend tempatnya bagus-bagus.', 't1.jpg'),
(2, 'Amy', 'Tukang tidur', 'Webnya sangat membantu, infonya sesuai banget sama keadaan.. jadi ga ragu lagi buat wisata', 't2.jpg'),
(3, 'Boo', 'Kepala kegemoyan', 'Buat yang masih ragu mau wisata kemana, bisa liat di web ini. Asli infonya dan ga ngecewain.', 't3.jpg'),
(4, 'Dawn', 'Bos que', 'Berkat website ini, saya jadi tau ingin pergi wisata kuliner apa.. Terima kasih siwikode.', 't4.jpg'),
(5, 'Elaine', 'Selebcing', 'Isi webnya sesuai banget sama realita infonya, aku suka eh.. mantappp..', 't5.jpg'),
(6, 'Piko', 'Walicing', 'Recommend banget nih webnya, sangat sangatt terbantu buat yang pengen jalan - jalan di Depok.', 't6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni_kuliner`
--

CREATE TABLE `testimoni_kuliner` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `job_id` int(11) NOT NULL,
  `kuliner_id` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testimoni_rekreasi`
--

CREATE TABLE `testimoni_rekreasi` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `job_id` int(11) NOT NULL,
  `rekreasi_id` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'Aldi Akbar', 'aldiakbar373@gmail.com', 'Aldi.jpg', '$2y$10$ZSMh.IksXAJvX1u87Lk9ZucT.q0fTp41zIdKNUwDRmZabggnszPpm', 2, 1, 1620398940),
(4, 'Admin', 'admin@example.com', 'default.jpg', '$2y$10$6MK1Pl47r1ezlDpOZNNY1u8kumQGHv2ME.ynTI57t/X6oDtlPB.b.', 1, 1, 1620402568),
(6, 'Writer', 'writer@example.com', 'default.jpg', '$2y$10$VVp15S/zEpKrHuqm.ja62.toius29bjkl7JD1avI30I2oCRID7Qbq', 3, 1, 1624657042);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(4, 2, 2),
(5, 1, 1),
(7, 1, 2),
(9, 2, 3),
(10, 1, 3),
(11, 3, 3),
(14, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Writer');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member'),
(3, 'Writer');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` tinyint(2) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user-circle', 1),
(3, 2, 'Edit Profile', 'user/editProfile', 'fas fa-fw fa-user-edit', 1),
(4, 1, 'Menu Management', 'admin/menu', 'fas fa-fw fa-folder', 1),
(5, 1, 'Submenu Management', 'admin/submenu', 'fas fa-fw fa-folder-open', 1),
(11, 1, 'Access Manager', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(12, 2, 'Change Password', 'user/changePassword', 'fas fa-fw fa-key', 1),
(13, 1, 'User Management', 'admin/User_Management', 'fas fa-fw fa-users', 1),
(16, 3, 'Profile Writer', 'writer', 'fas fa-fw fa-user-circle', 1),
(17, 3, 'Write Article', 'writer/artikel', 'fas fa-fw fa-book', 1),
(19, 1, 'Article Management', 'admin/artikel', 'fas fa-fw fa-book', 1),
(20, 1, 'Kuliner Management', 'admin/kuliner', 'fas fa-fw fa-utensils', 1),
(21, 3, 'Write Kuliner', 'writer/kuliner', 'fas fa-fw fa-drumstick-bite', 1),
(22, 1, 'Rekreasi Management', 'admin/rekreasi', 'fas fa-fw fa-mountain', 1),
(23, 3, 'Write Rekreasi', 'writer/rekreasi', 'fas fa-fw fa-campground', 1),
(24, 1, 'Testimoni Management', 'admin/testimoni', 'fas fa-fw fa-user-edit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'writer@example.com', '65JHIRXrcea6vKdQr0Ziz5wJDU02IqW9psSlzzOImxU=', 1624657042),
(2, 'writer@gmail.com', 'Z3CAbTuknoUo1PVK8iDjk4eqdylnwXTh0gkZxmdKWVQ=', 1624657111);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_artikel_id` (`category_artikel_id`);

--
-- Indexes for table `category_artikel`
--
ALTER TABLE `category_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kuliner`
--
ALTER TABLE `jenis_kuliner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_rekreasi`
--
ALTER TABLE `jenis_rekreasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontributor`
--
ALTER TABLE `kontributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_kuliner_id` (`jenis_kuliner_id`);

--
-- Indexes for table `nav_home`
--
ALTER TABLE `nav_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekreasi`
--
ALTER TABLE `rekreasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_rekreasi_id` (`jenis_rekreasi_id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni_kuliner`
--
ALTER TABLE `testimoni_kuliner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni_rekreasi`
--
ALTER TABLE `testimoni_rekreasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_artikel`
--
ALTER TABLE `category_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_kuliner`
--
ALTER TABLE `jenis_kuliner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_rekreasi`
--
ALTER TABLE `jenis_rekreasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kontributor`
--
ALTER TABLE `kontributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kuliner`
--
ALTER TABLE `kuliner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nav_home`
--
ALTER TABLE `nav_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rekreasi`
--
ALTER TABLE `rekreasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimoni_kuliner`
--
ALTER TABLE `testimoni_kuliner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimoni_rekreasi`
--
ALTER TABLE `testimoni_rekreasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`category_artikel_id`) REFERENCES `category_artikel` (`id`);

--
-- Constraints for table `kuliner`
--
ALTER TABLE `kuliner`
  ADD CONSTRAINT `kuliner_ibfk_2` FOREIGN KEY (`jenis_kuliner_id`) REFERENCES `jenis_kuliner` (`id`);

--
-- Constraints for table `rekreasi`
--
ALTER TABLE `rekreasi`
  ADD CONSTRAINT `rekreasi_ibfk_2` FOREIGN KEY (`jenis_rekreasi_id`) REFERENCES `jenis_rekreasi` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
