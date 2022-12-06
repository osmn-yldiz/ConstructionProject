-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 Ara 2021, 14:31:44
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `insaat_sitesi`
--

DELIMITER $$
--
-- Yordamlar
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `projeler` (`catid` INT)  BEGIN
  SELECT ID, Name, JobName FROM projects WHERE ProjectsCategoriesID = catid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `MailAdresi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Sifre` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `accounts`
--

INSERT INTO `accounts` (`ID`, `MailAdresi`, `Sifre`) VALUES
(3, 'ramazansen.tr@gmail.com2', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brands`
--

CREATE TABLE `brands` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Images` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Link` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brands`
--

INSERT INTO `brands` (`ID`, `Name`, `Images`, `Link`) VALUES
(1, 'Ermersan', '1633263841-Toy.png', 'http://ermersa.com.tr/'),
(2, 'Bartın Çimento', 'logo.png', 'https://www.bartincimento.com.tr/'),
(3, 'Ermersan', '1633263893-ijj.jpg', 'http://ermersa.com.tr/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `Header` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Adress` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Phone` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `Fax` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `Web` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Maps` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`ID`, `Header`, `Adress`, `Phone`, `Fax`, `Web`, `Email`, `Maps`) VALUES
(1, 'Merkez Adres', 'Bayır Mahalle, Fevzi Çakmak Cd. No: 31, 78100 Karabük Merkez/Karabük, TÜRKİYE', '(0370) 412 91 82', '(0370) 412 91 81', 'www.yildizliurunler.com.tr', 'info@yildiz-mobilya.com.tr', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3002.125072595148!2d32.607752015722824!3d41.197246715723054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x409cacd0e6959dd5%3A0x1e8da81c983b959b!2zWUlMRElaIE1PQsSwTFlBIEFSw4dFTMSwSy1LQVJBQsOcSw!5e0!3m2!1str!2str!4v1623398387707!5m2!1str!2str'),
(2, 'İstanbul Şubesi', 'Bayır Mahalle, Gür Cd. No: 31, 78100 Karabük Merkez/Karabük, ALMANYA', '(0370) 412 80 80', '(0370) 412 80 81', 'www.osman.com', 'info@www.osman.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3002.125072595148!2d32.607752015722824!3d41.197246715723054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x409cacd0e6959dd5%3A0x1e8da81c983b959b!2zWUlMRElaIE1PQsSwTFlBIEFSw4dFTMSwSy1LQVJBQsOcSw!5e0!3m2!1str!2str!4v1623398387707!5m2!1str!2str');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `email_list`
--

CREATE TABLE `email_list` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `IP` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `UserAgent` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `email_list`
--

INSERT INTO `email_list` (`ID`, `Email`, `IP`, `UserAgent`, `CreateDate`) VALUES
(1, 'ramazansen.tr@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-25 17:18:35'),
(2, 'ramazansen.tr@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-25 17:22:05'),
(3, 'ramazansen.tr@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36 Edg/93.0.961.52', '2021-09-25 17:23:13'),
(4, 'ramazansen.tr@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-26 16:13:37'),
(5, 'ramazansen.tr@gmail.com5', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-26 16:13:58');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `inbox`
--

CREATE TABLE `inbox` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Mail` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Subject` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Message` text COLLATE utf8_turkish_ci NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `inbox`
--

INSERT INTO `inbox` (`ID`, `Name`, `Mail`, `Subject`, `Message`, `CreateDate`) VALUES
(1, 'osman', 'osmann_yldz7878@hotmail.com', 'osman', 'osman', '2021-09-01 16:47:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logs`
--

CREATE TABLE `logs` (
  `ID` int(11) NOT NULL,
  `Type` int(11) NOT NULL COMMENT '4->Proje silindi',
  `Name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `CreateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `logs`
--

INSERT INTO `logs` (`ID`, `Type`, `Name`, `CreateDate`) VALUES
(1, 1, 'YENİ EKLENEN PROJE', '2021-10-24 15:44:14'),
(2, 2, 'yeni-2', '2021-10-24 15:50:30'),
(3, 1, 'yeni-2', '2021-10-24 15:50:30'),
(4, 4, 'yeni-2', '2021-10-24 16:14:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `main_menu`
--

CREATE TABLE `main_menu` (
  `ID` int(11) NOT NULL,
  `SupID` int(11) NOT NULL,
  `Name_tr` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Name_en` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Name_ge` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Link` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `OrderNumber` int(11) NOT NULL,
  `Status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `main_menu`
--

INSERT INTO `main_menu` (`ID`, `SupID`, `Name_tr`, `Name_en`, `Name_ge`, `Link`, `OrderNumber`, `Status`) VALUES
(1, 0, 'ANASAYFA', 'HOME', 'STARTSEITE', 'anasayfa', 1, '1'),
(2, 0, 'KURUMSAL', 'ABOUT US', 'ÜBER MICH', 'javascript:void(0)', 2, '1'),
(3, 0, 'PROJELERİMİZ', 'PROJECTS', 'UNSERE PROJEKTE', 'projelerimiz', 3, '1'),
(4, 0, 'HİZMETLERİMİZ', 'HİZMETLERİMİZ', 'HİZMETLERİMİZ', 'javascript:void(0)', 4, '1'),
(5, 0, 'İLETİŞİM', 'CONTACT', 'KONTAKT', 'contact.php', 5, '1'),
(6, 3, 'DEVAM EDEN PROJELERİMİZ', 'CONTINUE PROJECTS', 'UNSERE LAUFENDEN PROJEKTE', 'projelerimiz/devam-eden-projelerimiz', 1, '1'),
(7, 3, 'TAMAMLANAN PROJELERİMİZ', 'COMPLETED PROJECTS', 'UNSERE ABGESCHLOSSENEN PROJEKTE', 'projelerimiz/tamamlanan-projelerimiz', 2, '1'),
(20, 2, 'Misyon', 'Misyon', 'Misyon', 'sayfa/kurumsal/misyon', 1, '1'),
(21, 2, 'Vizyon', 'Vizyon', 'Vizyon', 'sayfa/kurumsal/vizyon', 2, '1'),
(22, 4, 'İnşaat Yapımı', 'İnşaat Yapımı', 'İnşaat Yapımı', 'sayfa/hizmetlerimiz/insaat-yapimi', 1, '1'),
(23, 4, 'Bina Yıkımı', 'Bina Yıkımı', 'Bina Yıkımı', 'sayfa/hizmetlerimiz/bina-yikimi', 2, '1'),
(24, 4, 'PimaPen Cam Yapımı', 'PimaPen Cam Yapımı', 'PimaPen Cam Yapımı', 'sayfa/hizmetlerimiz/pimapen-cam-yapimi', 3, '1'),
(30, 3, 'GELECEK PROJELERİMİZ', 'OUR FUTURE PROJECTS', 'UNSERE ZUKUNFTSPROJEKTE', 'projelerimiz/gelecek-projelerimiz', 3, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

CREATE TABLE `pages` (
  `ID` int(11) NOT NULL,
  `SupID` int(11) DEFAULT NULL,
  `Header` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SeoName` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Content` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `Description` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Keywords` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `HomeShow` tinyint(1) NOT NULL,
  `FooterShow` tinyint(1) NOT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`ID`, `SupID`, `Header`, `SeoName`, `Content`, `Description`, `Keywords`, `Status`, `HomeShow`, `FooterShow`, `CreateDate`, `UpdateDate`) VALUES
(1, 0, 'Kurumsal', 'kurumsal', 'Yıldız Mobilya ve Konfeksiyon Mağazaları olarak 1976 dan bu yana bölgede hizmet veren firmamız 2000 yılından itibaren inşaat sektöründe hizmet vermektedir. Bölgede kendini kanıtlamış olan firmamız yaptıklarımız yapacaklarımızın teminatıdır.', 'Yıldız Mobilyaa ve Konfeksiyon Mağazaları olarak 1976 dan bu yana bölgede hizmet veren firmamız 2000 yılından itibaren inşaat sektöründe hizmet vermektedir. Bölgede kendini kanıtlamış olan firmamız yaptıklarımız yapacaklarımızın teminatıdır.', 'Yıldız Mobilya ve Konfeksiyon Mağazaları olarak 1976 dan bu yana bölgede hizmet veren firmamız 2000 yılından itibaren inşaat sektöründe hizmet vermektedir. Bölgede kendini kanıtlamış olan firmamız yaptıklarımız yapacaklarımızın teminatıdır.', 1, 0, 0, '2021-08-08 13:37:55', '2021-10-15 19:24:17'),
(2, 1, 'Vizyon', 'vizyon', '<div style=\"text-align: justify;\">\r\n	<span style=\"font-size:16px;\">İnşaat sektörüne adım attığımız ilk günden bugüne kadar değişmeyen prensiplerimiz ve yenilikçi anlayışımız ile çalışmaya devam ediyoruz. Projelerimizi istenen zamanda tamamlayabilmek ve gelişen teknolojik olanakları her daim göz önünde bulundurabilmek bizi rakiplerimizden ayıran en önemli özelliğimizdir.</span></div>\r\n<div style=\"text-align: justify;\">\r\n	&nbsp;</div>\r\n<div style=\"text-align: justify;\">\r\n	<span style=\"font-size:16px;\">Koşullar ne olursa olsun sonuçlandırdığımız projelerin başarısını belirleyen şeyin müşteri memnuniyeti olduğuna inanıyoruz. Yıldızlar Gayrimenkul &amp; İnşaat olarak 1999 yılından bu yana yüzlerce projenin altından imzamız var. Bizi biz yapan, sizi memnun edebilmek ve hayallerinizi gerçeğe dönüştürebilmektir.</span></div>\r\n<div style=\"text-align: justify;\">\r\n	&nbsp;</div>\r\n<div style=\"text-align: justify;\">\r\n	<span style=\"font-size:16px;\">Memnuniyet odaklı iş anlayışımız, profesyonel ekiplerimiz, güvenli çalışma sahalarımız, ekipmanlarımız ve kaliteden ödün vermeyen ürünlerimiz ile siz de Yıldızlar Gayrimenkul &amp; İnşaat\'ın ayrıcalıklarından yararlanabilirsiniz.</span></div>\r\n<div style=\"text-align: justify;\">\r\n	&nbsp;</div>\r\n<div style=\"text-align: justify;\">\r\n	<span style=\"font-size:16px;\">Tekstil, konfeksiyon, beyaz eşya, mobilya gibi sektörlerde de elde ettiğimiz başarı ve geliştirdiğimiz iş prensipleri, inşaat sektöründeki en büyük referanslarımızdan biridir. Yaptıklarımız, yapacaklarımızın garantisidir.</span></div>\r\n', 'Yıldız Mobilya ve Konfeksiyon Mağazaları olarak 1976 dan bu yana bölgede hizmet veren firmamız 2000 yılından itibaren inşaat sektöründe hizmet vermektedir. Bölgede kendini kanıtlamış olan firmamız yaptıklarımız yapacaklarımızın teminatıdır.', 'Yıldız Mobilya ve Konfeksiyon Maadsdasdasdsadsadsadasdsadsadsaadsadsğazaları olarak 1976 dan bu yana bölgede hizmet veren firmamız 2000 yılından itibaren inşaat sektöründe hizmet vermektedir. Bölgede kendini kanıtlamış olan firmamız yaptıklarımız yapacakl', 1, 1, 0, '2021-08-08 13:37:55', '2021-10-22 18:56:21'),
(3, 1, 'Misyon', 'misyon', 'Yıldız Mobilya ve Konfeksiyon Mağazaları olarak 1976 dan bu yana bölgede hizmet veren firmamız 2000 yılından itibaren inşaat sektöründe hizmet vermektedir. Bölgede kendini kanıtlamış olan firmamız yaptıklarımız yapacaklarımızın teminatıdır.', 'Yıldız Mobilya ve Konfeksiyon Mağazaları olarak 1976 dan bu yana bölgede hizmet veren firmamız 2000 yılından itibaren inşaat sektöründe hizmet vermektedir. Bölgede kendini kanıtlamış olan firmamız yaptıklarımız yapacaklarımızın teminatıdır.', 'Yıldız Mobilya ve Konfeksiyon Mağazaları olarak 1976 dan bu yana bölgede hizmet veren firmamız 2000 yılından itibaren inşaat sektöründe hizmet vermektedir. Bölgede kendini kanıtlamış olan firmamız yaptıklarımız yapacaklarımızın teminatıdır.', 1, 1, 0, '2021-08-08 13:37:55', '2021-10-15 19:24:26'),
(4, 0, 'Hizmetlerimiz', 'hizmetlerimiz', NULL, NULL, NULL, 1, 0, 0, '2021-08-08 14:13:08', '2021-10-15 19:24:32'),
(5, 4, 'Bina Yıkımı', 'bina-yikimi', '<p style=\"text-align: justify;\">\r\n	Section e1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC \"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\" 1914 translation by H. Rackham \"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi arch</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<img alt=\"\" src=\"/osman/insaat_sitesi/documents/Uploads/WhatsApp_Image_2021_02_22_at_14_.13.jpeg\" style=\"width: 750px; height: 1000px;\" /></p>\r\n', 'Bina yıkımı için bizi tercih ediniz', 'bina yıkımı, inşaat yıkımı, dinamit ile bina yıkımı', 1, 1, 0, '2021-08-08 14:13:44', '2021-10-15 19:24:40'),
(6, 4, 'PİMAPEN CAM YAPIMI', 'pimapen-cam-yapimi', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut', 'pimapencam yapımında bizi tercih edebiliriniz', 'pimapen, cam, hava geçirmeyen cam, ısı yalıtımı pimapen', 1, 1, 0, '2021-08-08 14:16:58', '2021-10-15 19:24:50'),
(7, 4, 'İNŞAAT YAPIMI', 'insaat-yapimi', '<p>\r\n	Where does it come from? Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more <span style=\"background-color:#ffd700;\">obscure </span>Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<img alt=\"\" src=\"/osman/insaat_sitesi/documents/Uploads/4.png\" style=\"width: 1000px; height: 278px;\" /></p>\r\n', 'inşaat yapımında bizi tercih edebiliriniz', 'inşaat yapımı', 1, 1, 0, '2021-08-08 14:16:58', '2021-10-15 19:25:02'),
(12, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, '2021-08-30 12:53:45', '2021-08-30 12:53:45'),
(13, NULL, NULL, '', 'sdsdf', 'sdsdf', 'sdfsdf', 1, 0, 0, '2021-08-30 12:53:45', NULL),
(14, NULL, NULL, '', NULL, NULL, NULL, NULL, 0, 0, '2021-08-30 12:54:46', NULL),
(15, 1, 'Hakkımızda', '', '<p>\r\n	<strong>Yıldız Mobilya ve Konfeksiyon</strong> Mağazaları olarak 1976 dan bu yana bölgede hizmet veren firmamız 2000 yılından itibaren inşaat sektöründe hizmet vermektedir. Bölgede kendini kanıtlamış olan firmamız yaptıklarımız yapacaklarımızın teminatıdır.</p>\r\n<p>\r\n	<img alt=\"\" src=\"/osman/insaat_sitesi/admin/plugins/ELtemFi8149896/Uploads/WhatsApp_Image_2021_02_22_at_14_.13.jpeg\" style=\"width: 750px; height: 1000px;\" /></p>\r\n', 'Yıldız Mobilya ve Konfeksiyon Mağazaları olarak 1976 dan bu yana bölgede hizmet veren firmamız 2000 yılından itibaren inşaat sektöründe hizmet vermektedir. Bölgede kendini kanıtlamış olan firmamız yaptıklarımız yapacaklarımızın teminatıdır.', 'Yıldız Mobilya ve Konfeksiyon Maadsdasdasdsadsadsadasdsadsadsaadsadsğazaları olarak 1976 dan bu yana bölgede hizmet veren firmamız 2000 yılından itibaren inşaat sektöründe hizmet vermektedir. Bölgede kendini kanıtlamış olan firmamız yaptıklarımız yapacakl', 1, 1, 1, '2021-08-08 13:37:55', '2021-10-09 10:42:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `placard`
--

CREATE TABLE `placard` (
  `ID` int(11) NOT NULL,
  `PlaCardCategoryID` int(11) NOT NULL,
  `Header` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Link` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Target` varchar(10) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Images` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `placard`
--

INSERT INTO `placard` (`ID`, `PlaCardCategoryID`, `Header`, `Link`, `Target`, `Images`) VALUES
(1, 1, 'BİNA YIKIMI', 'https://www.google.com', '_blank', '1.jpg'),
(2, 50, 'İNŞAAT YIKIMI', 'https://www.facebook.com', '_blank', '2.jpg'),
(3, 1, 'PETROL ÇIKARMA', 'https://www.instagram.com', '_blank', '3.jpg'),
(4, 2, 'SU ÇIARMA', 'https://www.instagram.com', '_blank', '3.jpg'),
(5, 50, 'Kum İşleri', 'https://www.instagram.com', '_blank', '3.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `placardcategories`
--

CREATE TABLE `placardcategories` (
  `ID` int(11) NOT NULL,
  `PlaCardRouterID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Header` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Exp` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `placardcategories`
--

INSERT INTO `placardcategories` (`ID`, `PlaCardRouterID`, `Name`, `Header`, `Exp`) VALUES
(1, 1, 'Hizmetlerimiz', 'Hizmetlerimiz', 'İnşaat Yıkımı ile kısa yazımız ve devamı.. On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble'),
(2, 2, 'Yapılanlar', 'Yapılanlar', 'Yapılanlar, On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble'),
(50, 3, 'Yapılmaynalar', 'Yapılmaynalar', 'Yapılmaynalar, On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `placardrouter`
--

CREATE TABLE `placardrouter` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `RouterLink` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `placardrouter`
--

INSERT INTO `placardrouter` (`ID`, `Name`, `RouterLink`) VALUES
(1, 'Anasayfa Afiş', 'index'),
(2, 'Kurumsal Afiş', 'pages'),
(3, 'İletişim Afiş', 'contact');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `popup`
--

CREATE TABLE `popup` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Header` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Images` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Content` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `popup`
--

INSERT INTO `popup` (`ID`, `Name`, `Header`, `Images`, `Content`, `Status`, `StartDate`, `EndDate`) VALUES
(1, 'Kurban Bayramı 2019', 'Kurban Bayramınız Mübarek Olsun...', 'kurban-2019.jpg', '', 1, '2021-08-07 00:00:00', '2021-08-12 00:00:00'),
(2, 'Kurban Bayramı 2020', 'Kurban Bayramınız Mübarek Olsun...', 'kurban-2020.jpg', NULL, 1, '2020-08-01 00:00:00', '2020-08-03 00:00:00'),
(7, 'GELECEK PROJELERİMİZ', 'Ramazan Bayramınız Mübarek Olsun...', '1629301697-Fuj.jpg', '1950\'den beri inşaat alanında en iyi biziz.', 1, '2021-08-27 18:48:00', '2021-08-28 18:48:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projects`
--

CREATE TABLE `projects` (
  `ID` int(11) NOT NULL,
  `ProjectsCategoriesID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SeoName` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Images` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Boss` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `JobName` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ContractStartDate` date DEFAULT NULL,
  `ContractEndDate` date DEFAULT NULL,
  `Content` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `projects`
--

INSERT INTO `projects` (`ID`, `ProjectsCategoriesID`, `Name`, `SeoName`, `Images`, `Boss`, `JobName`, `ContractStartDate`, `ContractEndDate`, `Content`) VALUES
(1, 3, 'Kastamonu-Çankırı Yolu', 'kastamonu-cankiri-yolu', '1.jpg', 'osman', 'Köprü Yapımı', '2021-08-10', '2021-08-06', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(2, 2, 'Ankara - Çankırı Yolu İkmal İnşaatı', 'ankara-cankiri-yolu-ikmal-insaati', '2.jpg', '', '', NULL, '2021-08-21', ''),
(3, 2, 'K1-K5 Köprülü Kavşaklarının Yapımı', 'k1-k5-koprulu-kavsaklarinin-yapimi', '3.jpg', '', '', NULL, '2021-08-22', ''),
(4, 2, 'Amasya - Delice Yolu BSK Onarımı', 'amasya-delice-yolu-bsk-onarimi', '4.jpg', '', '', NULL, NULL, ''),
(5, 1, 'Kastamonu Çevre Yolu Kavşağı Yapımı', 'kastamonu-cevre-yolu-kavsagi-yapimi', '5.jpg', '', '', NULL, NULL, ''),
(6, 1, 'Ankara İnşaat WINGS Ankara ', 'ankara-insaat-wings-ankara', '6.jpg', '', '', NULL, NULL, ''),
(7, 1, 'Kanyonpark Kemer Köprü İnşaatı', 'kanyonpark-kemer-kopru-insaati', '7.jpg', '', '', NULL, NULL, ''),
(8, 1, 'Kastamonu-Çankırı Arası Tetek Yolu', 'kastamonu-cankiri-arasi-tetek-yolu', '8.jpg', '', '', NULL, NULL, ''),
(9, 1, 'Kastamonu-Çankırı Yolu TMA Yapımı', 'kastamonu-cankiri-yolu-tma-yapimi', '9.jpg', '', '', NULL, NULL, ''),
(10, 1, 'Kırşehir OSB Alt Yapı', 'kirsehir-osb-alt-yapi', '10.jpg', '', '', NULL, NULL, ''),
(11, 1, 'Kastamonu-Korgun', 'kastamonu-korgun', '11.jpg', '', '', NULL, NULL, ''),
(12, 1, 'Kırşehir BB Yol Düzenlemesi', 'kirsehir-bb-yol-duzenlemesi', '12.jpg', '', '', NULL, NULL, ''),
(13, 1, 'Çankırı Rusubat Zararlarından Korunması', 'cankiri-rusubat-zararlarindan-korunmasi', '13.jpg', '', '', NULL, NULL, ''),
(14, 1, 'Kırşehir Şehir Geçişi Toprak İşleri ', 'kirsehir-sehir-gecisi-toprak-isleri', '14.jpg', '', '', NULL, NULL, ''),
(15, 1, 'Kastamonu-İnebolu Yolu Toprak Tesviyesi', 'kastamonu-inebolu-yolu-toprak-tesviyesi', '15.jpg', '', '', NULL, NULL, ''),
(16, 1, 'Ormanköy - Dokurcun Hudut Yolu Kesimi', 'ormankoy-dokurcun-hudut-yolu-kesimi', '16.jpg', '', '', NULL, NULL, ''),
(17, 1, 'Kastamonu-Ilgaz Yolu Toprak Tesviye', 'kastamonu-ilgaz-yolu-toprak-tesviye', '17.jpg', '', '', NULL, NULL, ''),
(18, 1, 'Çankırı Beton Asfalt', 'cankiri-beton-asfalt', '18.jpg', '', '', NULL, NULL, ''),
(19, 1, 'TCDD 2.Bölge Müdürlüğü  Balast Temini', 'tcdd-2.bolge-mudurlugu-balast-temini', '19.jpg', '', '', NULL, NULL, ''),
(20, 1, 'Düzce Köprülü Kavşağı Toprak Tesviyesi', 'duzce-koprulu-kavsagi-toprak-tesviyesi', '20.jpg', '', '', NULL, NULL, ''),
(21, 1, 'Tosya Çankırı  Yolu BSK Yapım ve Onarımı', 'tosya-cankiri-yolu-bsk-yapim-ve-onarimi', '21.jpg', '', '', NULL, NULL, ''),
(22, 1, 'Kastamonu-Korgun Ayrımı Hudut Yolu', 'kastamonu-korgun-ayrimi-hudut-yolu', '22.jpg', '', '', NULL, NULL, ''),
(23, 1, 'Atkaracalar-Kurşunlu Bölünmüş Yol Yapımı', 'atkaracalar-kursunlu-bolunmus-yol-yapimi', '23.jpg', '', '', NULL, NULL, ''),
(24, 1, 'Kastamonu-Çankırı Yolu Sanat Yapıları', 'kastamonu-cankiri-yolu-sanat-yapilari', '24.jpg', '', '', NULL, NULL, ''),
(25, 1, 'Mudurnu-Göynük Yolu', 'mudurnu-goynuk-yolu', '25.jpg', '', '', NULL, NULL, ''),
(26, 1, 'Ilgaz-Tosya Yolu', 'ilgaz-tosya-yolu', '26.jpg', '', '', NULL, NULL, ''),
(27, 1, 'Ankara-Sivrihisar Yolu Düzenlemesi', 'ankara-sivrihisar-yolu-duzenlemesi', '27.jpg', '', '', NULL, NULL, ''),
(28, 1, 'Ankara İnşaat Özel Bina İşleri', 'ankara-insaat-ozel-bina-isleri', '28.jpg', '', '', NULL, NULL, ''),
(29, 1, 'Kurşunlu Şehir Geçişi Köprülü Kavşak', 'kursunlu-sehir-gecisi-koprulu-kavsak', '29.jpg', '', '', NULL, NULL, ''),
(30, 1, 'Kabataş - Mahmutbey Metro Hattı Depo Sahası', 'kabatas-mahmutbey-metro-hatti-depo-sahasi', '30.jpg', '', '', NULL, '2021-09-15', ''),
(4139, 2, 'YENİ EKLENEN PROJE', 'yeni-eklenen-proje', '9.jpg', '', '', NULL, NULL, '');

--
-- Tetikleyiciler `projects`
--
DELIMITER $$
CREATE TRIGGER `projects_before_ekle_log` BEFORE INSERT ON `projects` FOR EACH ROW BEGIN
  INSERT INTO logs(Type, Name,CreateDate) VALUES(2,NEW.Name,NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `projects_delete_logs_add` AFTER DELETE ON `projects` FOR EACH ROW BEGIN
	INSERT INTO logs(Type,Name,CreateDate) VALUES(4,OLD.Name,NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `projects_ekle_log` AFTER INSERT ON `projects` FOR EACH ROW BEGIN
  INSERT INTO logs(Type, Name,CreateDate) VALUES(1,NEW.Name,NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projectscategories`
--

CREATE TABLE `projectscategories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `SeoName` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Images` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `CreateDate` datetime DEFAULT current_timestamp(),
  `UpdateDate` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `projectscategories`
--

INSERT INTO `projectscategories` (`ID`, `Name`, `SeoName`, `Images`, `CreateDate`, `UpdateDate`) VALUES
(1, 'DEVAM EDEN PROJELERİMİZ', 'devam-eden-projelerimiz', '1.jpg', '2021-08-31 17:07:16', '2021-10-16 17:54:42'),
(2, 'TAMAMLANANN PROJELERİMİZ', 'tamamlanan-projelerimiz', '2.jpg', '2021-08-31 17:07:16', '2021-10-16 17:54:54'),
(3, 'GELECEK PROJELERİMİZ', 'gelecek-projelerimiz', '3.jpg', '2021-08-31 17:08:16', '2021-10-16 17:55:19');

--
-- Tetikleyiciler `projectscategories`
--
DELIMITER $$
CREATE TRIGGER `projects_delete` BEFORE DELETE ON `projectscategories` FOR EACH ROW BEGIN
 DELETE FROM projects WHERE ProjectsCategoriesID=OLD.ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projectsimages`
--

CREATE TABLE `projectsimages` (
  `ID` int(11) NOT NULL,
  `projectsID` int(11) NOT NULL,
  `Images` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `projectsimages`
--

INSERT INTO `projectsimages` (`ID`, `projectsID`, `Images`) VALUES
(1, 2, '31.jpg'),
(2, 2, '32.jpg'),
(3, 2, '33.jpg'),
(4, 2, '34.jpg'),
(5, 2, '2.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `property`
--

CREATE TABLE `property` (
  `ID` int(11) NOT NULL,
  `Images` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Content` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `property`
--

INSERT INTO `property` (`ID`, `Images`, `Name`, `Content`) VALUES
(1, '1628233903-uCr.png', 'EN ÇOK TERCİH EDİLEN', 'İnşaat sektöründe kalite odaklı projelerimiz ve uzman ekiplerimiz sayesinde her zaman en fazla tercih edilen firma olmaya devam ediyoruz.'),
(2, '2.png', 'EN İYİ KALİTE', 'Deneyimli ekip çalışanlarımız, üstün kalite malzemelerimiz ve pratik çalışma stratejilerimiz ile daima en iyiyi hedefliyor, zor olanı başarıyoruz.'),
(10, '1628420274-zib.png', 'PROJELERİMİZ', 'Kusursuz hizmet anlayışımız ve uzun yıllara dayanan tecrübemizle çalışıyor tüm projelerinizi istenen zamanda ve istenen şekilde gerçekleştiriyoruz.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `ID` int(11) NOT NULL,
  `Label` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Key` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Value` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`ID`, `Label`, `Key`, `Value`) VALUES
(52, 'Site Başlığı', 'siteName', 'Yıldızlar İnşaat 2'),
(53, 'Facebook', 'Facebook', 'https://www.facebook.com/Y%C4%B1ld%C4%B1zlar-in%C5%9Faat-Gayrimenk%C3%BCl-1579799005571183/'),
(54, 'Çalışma Saatleri', 'workHours', '9.30 - 18.30'),
(55, 'Telefon 1', 'Phone1', '(0542) 277 78 78'),
(56, 'Telefon 2', 'Phone2', '(0370) 412 91 82'),
(57, 'Instagram', 'Instagram', 'https://www.instagram.com/gayrimenkul78_/'),
(58, 'Site 1', 'Web1', 'www.yildizliurunler.com.tr'),
(59, 'Site 2', 'Web2', 'www.yildiz-mobilya.com.tr'),
(60, 'adı', 'adi', 'ramazan'),
(61, 'Logo', 'logo', 'logo.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `ID` int(11) NOT NULL,
  `Images` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `FirstName` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `SecondName` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Content` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `LinkName` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Link` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`ID`, `Images`, `FirstName`, `SecondName`, `Content`, `LinkName`, `Link`) VALUES
(7, '1627972853-cxF.jpg', '1999\'den Beri', 'İNŞAAT ALANINDA GÜVENİN ADRESİ', 'YILDIZLAR Gayrimenkul & İnşaat', 'Referanslarımız', 'http://localhost:8080/osman/insaat_sitesi/projelerimiz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `lockedCount` tinyint(1) NOT NULL,
  `CreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`ID`, `Email`, `Password`, `lockedCount`, `CreateDate`) VALUES
(1, 'osmann_yldz7878@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '2021-09-25 18:03:02'),
(2, 'ramazansen.tr@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, '2021-09-25 18:03:02'),
(5, 'ramazansen.tr@gmail.com2', 'e10adc3949ba59abbe56e057f20f883e', 3, '2021-09-25 18:03:02');

--
-- Tetikleyiciler `users`
--
DELIMITER $$
CREATE TRIGGER `users_add_account_add` AFTER INSERT ON `users` FOR EACH ROW BEGIN
	INSERT INTO accounts(MailAdresi,Sifre) VALUES(NEW.Email, NEW.Password);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `users_delete_account_delete` AFTER DELETE ON `users` FOR EACH ROW BEGIN
	DELETE FROM accounts WHERE MailAdresi = OLD.Email;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `users_edit_account_edit` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
	UPDATE accounts SET MailAdresi=NEW.Email, Sifre=NEW.Password;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `visited_count`
--

CREATE TABLE `visited_count` (
  `ID` int(11) NOT NULL,
  `Count` int(11) NOT NULL,
  `IP` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `visited_count`
--

INSERT INTO `visited_count` (`ID`, `Count`, `IP`, `CreateDate`, `Date`) VALUES
(3, 3373, '::1', '2021-08-08 14:27:27', '2021-08-08'),
(4, 39, '::1', '2021-08-08 14:29:48', '2021-08-09'),
(5, 153, '::1', '2021-08-10 09:34:07', '2021-08-10'),
(6, 41, '::1', '2021-08-11 09:36:35', '2021-08-11'),
(7, 1, '::1', '2021-08-12 18:41:23', '2021-08-12'),
(8, 12, '::1', '2021-08-13 10:32:53', '2021-08-13'),
(9, 98, '::1', '2021-08-14 10:42:34', '2021-08-14'),
(10, 73, '::1', '2021-08-17 10:56:05', '2021-08-17'),
(11, 45, '::1', '2021-08-18 10:50:12', '2021-08-18'),
(12, 3, '::1', '2021-08-19 17:43:01', '2021-08-19'),
(13, 74, '::1', '2021-08-20 10:38:38', '2021-08-20'),
(14, 101, '::1', '2021-08-21 09:59:48', '2021-08-21'),
(15, 635, '::1', '2021-08-30 13:13:32', '2021-08-30'),
(16, 73, '127.0.0.1', '2021-08-30 14:09:45', '2021-08-30'),
(17, 116, '::1', '2021-08-31 16:08:38', '2021-08-31'),
(18, 15, '127.0.0.1', '2021-08-31 16:23:35', '2021-08-31'),
(19, 97, '::1', '2021-09-01 10:14:30', '2021-09-01'),
(20, 16, '127.0.0.1', '2021-09-01 14:18:11', '2021-09-01'),
(21, 95, '::1', '2021-09-02 12:03:45', '2021-09-02'),
(22, 15, '127.0.0.1', '2021-09-02 12:12:07', '2021-09-02'),
(23, 15, '::1', '2021-09-03 17:42:54', '2021-09-03'),
(24, 61, '::1', '2021-09-06 10:17:56', '2021-09-06'),
(25, 113, '::1', '2021-09-11 13:43:20', '2021-09-11'),
(26, 1, '::1', '2021-09-13 11:57:48', '2021-09-13'),
(27, 13, '::1', '2021-09-14 20:44:08', '2021-09-14'),
(28, 3, '127.0.0.1', '2021-09-14 20:48:16', '2021-09-14'),
(29, 3, '::1', '2021-09-15 16:14:04', '2021-09-15'),
(30, 105, '::1', '2021-09-19 14:37:13', '2021-09-19'),
(31, 14, '127.0.0.1', '2021-09-19 14:45:34', '2021-09-19'),
(32, 8, '127.0.0.1', '2021-09-22 20:09:13', '2021-09-22'),
(33, 46, '::1', '2021-09-22 20:17:35', '2021-09-22'),
(34, 12, '::1', '2021-09-24 14:52:32', '2021-09-24'),
(35, 38, '::1', '2021-09-25 16:47:11', '2021-09-25'),
(36, 1, '127.0.0.1', '2021-09-25 17:17:57', '2021-09-25'),
(37, 7, '127.0.0.1', '2021-09-26 15:32:13', '2021-09-26'),
(38, 88, '::1', '2021-09-26 15:32:15', '2021-09-26'),
(39, 15, '::1', '2021-09-27 16:35:12', '2021-09-27'),
(40, 2, '127.0.0.1', '2021-09-27 16:36:34', '2021-09-27'),
(41, 24, '::1', '2021-09-29 19:56:00', '2021-09-29'),
(42, 3, '127.0.0.1', '2021-09-29 20:26:22', '2021-09-29'),
(43, 8, '::1', '2021-09-30 20:04:08', '2021-09-30'),
(44, 3, '127.0.0.1', '2021-10-01 18:24:51', '2021-10-01'),
(45, 17, '::1', '2021-10-01 18:24:56', '2021-10-01'),
(46, 50, '::1', '2021-10-03 14:10:06', '2021-10-03'),
(47, 7, '127.0.0.1', '2021-10-03 14:29:54', '2021-10-03'),
(48, 14, '::1', '2021-10-04 11:24:45', '2021-10-04'),
(49, 1, '127.0.0.1', '2021-10-04 11:26:13', '2021-10-04'),
(50, 26, '::1', '2021-10-05 17:58:52', '2021-10-05'),
(51, 5, '127.0.0.1', '2021-10-05 18:01:06', '2021-10-05'),
(52, 41, '::1', '2021-10-09 10:27:03', '2021-10-09'),
(53, 7, '127.0.0.1', '2021-10-09 10:33:34', '2021-10-09'),
(54, 15, '::1', '2021-10-11 15:23:19', '2021-10-11'),
(55, 25, '::1', '2021-10-14 20:12:40', '2021-10-14'),
(56, 2, '127.0.0.1', '2021-10-14 20:17:12', '2021-10-14'),
(57, 113, '::1', '2021-10-15 11:55:12', '2021-10-15'),
(58, 18, '127.0.0.1', '2021-10-15 11:56:06', '2021-10-15'),
(59, 101, '::1', '2021-10-16 17:46:43', '2021-10-16'),
(60, 72, '::1', '2021-10-18 20:01:26', '2021-10-18'),
(61, 59, '::1', '2021-10-20 14:10:36', '2021-10-20'),
(62, 18, '::1', '2021-10-21 10:08:23', '2021-10-21'),
(63, 19, '::1', '2021-10-22 19:33:19', '2021-10-22'),
(64, 1, '::1', '2021-10-23 15:33:34', '2021-10-23'),
(65, 26, '::1', '2021-10-24 15:17:19', '2021-10-24'),
(66, 7, '::1', '2021-11-04 21:33:16', '2021-11-04'),
(67, 15, '::1', '2021-11-09 21:06:27', '2021-11-09');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `email_list`
--
ALTER TABLE `email_list`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Mail` (`Mail`);

--
-- Tablo için indeksler `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `main_menu`
--
ALTER TABLE `main_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `placard`
--
ALTER TABLE `placard`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `placardcategories`
--
ALTER TABLE `placardcategories`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `placardrouter`
--
ALTER TABLE `placardrouter`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `popup`
--
ALTER TABLE `popup`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Status` (`Status`),
  ADD KEY `StartDate` (`StartDate`),
  ADD KEY `EndDate` (`EndDate`);

--
-- Tablo için indeksler `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `projectscategories`
--
ALTER TABLE `projectscategories`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `projectsimages`
--
ALTER TABLE `projectsimages`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `visited_count`
--
ALTER TABLE `visited_count`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `brands`
--
ALTER TABLE `brands`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `email_list`
--
ALTER TABLE `email_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `inbox`
--
ALTER TABLE `inbox`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `logs`
--
ALTER TABLE `logs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `main_menu`
--
ALTER TABLE `main_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `pages`
--
ALTER TABLE `pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `placard`
--
ALTER TABLE `placard`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `placardcategories`
--
ALTER TABLE `placardcategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Tablo için AUTO_INCREMENT değeri `placardrouter`
--
ALTER TABLE `placardrouter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `popup`
--
ALTER TABLE `popup`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `projects`
--
ALTER TABLE `projects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4141;

--
-- Tablo için AUTO_INCREMENT değeri `projectscategories`
--
ALTER TABLE `projectscategories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `projectsimages`
--
ALTER TABLE `projectsimages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `property`
--
ALTER TABLE `property`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `visited_count`
--
ALTER TABLE `visited_count`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
