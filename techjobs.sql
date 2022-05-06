CREATE TABLE `ung_cu_vien` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `gioi_tinh` int,
  `ngay_sinh` date,
  `hon_nhan` int,
  `dia_chi` varchar(255),
  `file` varchar(255),
  `avatar` varchar(255),
  `tieu_de` varchar(255),
  `trinh_do` varchar(255),
  `kinh_nghiem` varchar(255),
  `cap_bac` varchar(255),
  `cong_viec` varchar(255),
  `muc_luong` int,
  `noi_lam_viec` varchar(255)
);

CREATE TABLE `members` (
	`id` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `chuc_vu` int NOT NULL,
  `ung_cu_vien_id` int NULL,
  `nha_tuyen_dung_id` int NULL,
  `date_created` timestamp DEFAULT (now())
);

CREATE TABLE `nha_tuyen_dung` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `cong_ty` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `thanh_pho` varchar(255) NOT NULL,
  `logo` varchar(255),
  `quy_mo` int,
  `gioi_thieu` varchar(5000),
  `website` varchar(255)
);

CREATE TABLE `bai_dang` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nha_tuyen_dung_id` int,
  `tieu_de` varchar(255) NOT NULL,
  `so_luong` int NOT NULL,
  `gioi_tinh` int NOT NULL,
  `mo_ta` varchar(3000) NOT NULL,
  `yeu_cau` varchar(3000) NOT NULL,
  `tinh_chat` varchar(500) NOT NULL,
  `trinh_do` varchar(255) NOT NULL,
  `kinh_nghiem` varchar(255) NOT NULL,
  `muc_luong` varchar(255) NOT NULL,
  `hinh_thuc` varchar(255) NOT NULL,
  `thu_viec` varchar(255) NOT NULL,
  `quyen_loi` varchar(3000) NOT NULL,
  `nganh_nghe` varchar(255),
  `noi_lam_viec` varchar(255),
  `deadline` datetime NOT NULL,
  `phuc_loi` varchar(3000) NOT NULL,
  `luot_xem` int,
  `date_created` timestamp DEFAULT (now())
);

CREATE TABLE `ung_tuyen` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `bai_dang_id` int,
  `ung_cu_vien_id` int
);

ALTER TABLE `bai_dang` ADD FOREIGN KEY (`nha_tuyen_dung_id`) REFERENCES `nha_tuyen_dung` (`id`);

ALTER TABLE `ung_tuyen` ADD FOREIGN KEY (`bai_dang_id`) REFERENCES `bai_dang` (`id`);

ALTER TABLE `ung_tuyen` ADD FOREIGN KEY (`ung_cu_vien_id`) REFERENCES `ung_cu_vien` (`id`);

ALTER TABLE `members` ADD FOREIGN KEY (`ung_cu_vien_id`) REFERENCES `ung_cu_vien` (`id`);

ALTER TABLE `members` ADD FOREIGN KEY (`nha_tuyen_dung_id`) REFERENCES `nha_tuyen_dung` (`id`);
