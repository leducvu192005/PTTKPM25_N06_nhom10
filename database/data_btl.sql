
CREATE DATABASE IF NOT EXISTS web_tim_phongtro
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
USE web_tim_phongtro;

/* (tuỳ chọn) Thiết lập phiên */
SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci;

/* 2) Làm sạch (để chạy lại không lỗi) */
DROP TRIGGER IF EXISTS trg_xac_minh_after_update;
DROP TRIGGER IF EXISTS trg_xac_minh_after_insert;

DROP TABLE IF EXISTS yeu_thich;
DROP TABLE IF EXISTS tin_tien_nghi;
DROP TABLE IF EXISTS tien_nghi;
DROP TABLE IF EXISTS anh_tin;
DROP TABLE IF EXISTS tin_dang;
DROP TABLE IF EXISTS phuong_xa;
DROP TABLE IF EXISTS quan_huyen;
DROP TABLE IF EXISTS tinh_tp;
DROP TABLE IF EXISTS xac_minh;
DROP TABLE IF EXISTS nguoi_dung;

/* 3) NGƯỜI DÙNG + CCCD + cờ xác thực */
CREATE TABLE nguoi_dung (
  id                 BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  ho_ten             VARCHAR(120) NOT NULL,
  email              VARCHAR(191) NOT NULL UNIQUE,
  mat_khau           VARCHAR(191) NOT NULL,
  so_dien_thoai      VARCHAR(20)  NULL,

  -- CCCD (12 số, duy nhất nếu có)
  cccd               VARCHAR(12)  NULL UNIQUE,
  ngay_cap_cccd      DATE         NULL,
  noi_cap_cccd       VARCHAR(120) NULL,

  -- trạng thái xác thực (0/1)
  xac_thuc           TINYINT(1) NOT NULL DEFAULT 0,

  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,

  CONSTRAINT chk_cccd_dinhdang CHECK (cccd IS NULL OR cccd REGEXP '^[0-9]{12}$')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE INDEX idx_nd_phone ON nguoi_dung (so_dien_thoai);

/* 4) ĐỊA GIỚI: Tỉnh/Quận/Phường (phục vụ lọc khu vực/quận) */
CREATE TABLE tinh_tp (
  id  BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  ten VARCHAR(120) NOT NULL,
  UNIQUE KEY u_tinh_ten (ten)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE quan_huyen (
  id      BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  tinh_id BIGINT UNSIGNED NOT NULL,
  ten     VARCHAR(120) NOT NULL,
  CONSTRAINT fk_quan_tinh FOREIGN KEY (tinh_id) REFERENCES tinh_tp(id) ON DELETE CASCADE,
  UNIQUE KEY u_quan (tinh_id, ten)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE phuong_xa (
  id      BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  quan_id BIGINT UNSIGNED NOT NULL,
  ten     VARCHAR(120) NOT NULL,
  CONSTRAINT fk_phuong_quan FOREIGN KEY (quan_id) REFERENCES quan_huyen(id) ON DELETE CASCADE,
  UNIQUE KEY u_phuong (quan_id, ten)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* 5) TIN ĐĂNG: giá/diện tích/nội thất + MAP (POINT) */
CREATE TABLE tin_dang (
  id            BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  nguoi_dung_id BIGINT UNSIGNED NOT NULL,

  tieu_de   VARCHAR(150) NOT NULL,
  mo_ta     TEXT NOT NULL,

  gia_thue  INT UNSIGNED NOT NULL,         -- VND/tháng (khoảng giá)
  dien_tich DECIMAL(7,2) NOT NULL,         -- m2        (diện tích)
  noi_that  TINYINT(1) NOT NULL DEFAULT 0, -- 0/1       (nội thất)

  tinh_id   BIGINT UNSIGNED NOT NULL,
  quan_id   BIGINT UNSIGNED NOT NULL,
  phuong_id BIGINT UNSIGNED NULL,
  dia_chi   VARCHAR(191) NULL,

  -- Map: toạ độ WGS84 (SRID 4326)
  vi_tri     POINT NOT NULL SRID 4326,
  lat        DECIMAL(10,7) AS (ST_Y(vi_tri)) STORED,
  lng        DECIMAL(10,7) AS (ST_X(vi_tri)) STORED,

  trang_thai ENUM('nhap','dang','an') NOT NULL DEFAULT 'dang',
  dang_luc   TIMESTAMP NULL,               -- dùng để sort mới nhất

  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,

  CONSTRAINT fk_tin_user   FOREIGN KEY (nguoi_dung_id) REFERENCES nguoi_dung(id) ON DELETE CASCADE,
  CONSTRAINT fk_tin_tinh   FOREIGN KEY (tinh_id)  REFERENCES tinh_tp(id),
  CONSTRAINT fk_tin_quan   FOREIGN KEY (quan_id)  REFERENCES quan_huyen(id),
  CONSTRAINT fk_tin_phuong FOREIGN KEY (phuong_id)REFERENCES phuong_xa(id),
  CONSTRAINT chk_gia  CHECK (gia_thue >= 0),
  CONSTRAINT chk_dt   CHECK (dien_tich > 0),
  CONSTRAINT chk_pos  CHECK (ST_IsValid(vi_tri))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Index tối ưu cho tìm kiếm + phân trang + map
CREATE INDEX idx_tin_khuvuc    ON tin_dang (tinh_id, quan_id, phuong_id);
CREATE INDEX idx_tin_gia       ON tin_dang (gia_thue);
CREATE INDEX idx_tin_dientich  ON tin_dang (dien_tich);
CREATE INDEX idx_tin_trangthai ON tin_dang (trang_thai, dang_luc);
ALTER TABLE tin_dang ADD SPATIAL INDEX spx_tin_vitri (vi_tri);
ALTER TABLE tin_dang ADD FULLTEXT  ft_tieude_mota (tieu_de, mo_ta);

/* 6) ẢNH TIN: gallery + ảnh đại diện */
CREATE TABLE anh_tin (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  tin_id BIGINT UNSIGNED NOT NULL,
  duong_dan VARCHAR(255) NOT NULL,      -- path/bucket
  la_anh_dai_dien TINYINT(1) NOT NULL DEFAULT 0,
  thu_tu SMALLINT UNSIGNED NOT NULL DEFAULT 0,
  created_at TIMESTAMP NULL, updated_at TIMESTAMP NULL,
  CONSTRAINT fk_anh_tin FOREIGN KEY (tin_id) REFERENCES tin_dang(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE INDEX idx_anh_cover ON anh_tin (tin_id, la_anh_dai_dien);

/* 7) TIỆN NGHI (để lọc nội thất/tiện ích chi tiết) */
CREATE TABLE tien_nghi (
  id  BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  ten VARCHAR(120) NOT NULL,
  UNIQUE KEY u_tiennghi (ten)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE tin_tien_nghi (
  tin_id BIGINT UNSIGNED NOT NULL,
  tien_nghi_id BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (tin_id, tien_nghi_id),
  CONSTRAINT fk_ttn_tin      FOREIGN KEY (tin_id)       REFERENCES tin_dang(id) ON DELETE CASCADE,
  CONSTRAINT fk_ttn_tiennghi FOREIGN KEY (tien_nghi_id)  REFERENCES tien_nghi(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* 8) YÊU THÍCH: đánh dấu tin */
CREATE TABLE yeu_thich (
  id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  nguoi_dung_id BIGINT UNSIGNED NOT NULL,
  tin_id BIGINT UNSIGNED NOT NULL,
  created_at TIMESTAMP NULL,
  CONSTRAINT fk_yt_user FOREIGN KEY (nguoi_dung_id) REFERENCES nguoi_dung(id) ON DELETE CASCADE,
  CONSTRAINT fk_yt_tin  FOREIGN KEY (tin_id)        REFERENCES tin_dang(id) ON DELETE CASCADE,
  UNIQUE KEY u_yt (nguoi_dung_id, tin_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* 9) XÁC MINH TÀI KHOẢN (duyệt CCCD) */
CREATE TABLE xac_minh (
  id             BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  nguoi_dung_id  BIGINT UNSIGNED NOT NULL,   -- người gửi yêu cầu
  so_cccd        VARCHAR(12) NOT NULL,
  anh_truoc      VARCHAR(255) NOT NULL,      -- ảnh CCCD mặt trước
  anh_sau        VARCHAR(255) NOT NULL,      -- ảnh CCCD mặt sau
  selfi_cccd     VARCHAR(255) NULL,          -- selfie cầm CCCD (tuỳ chọn)
  trang_thai     ENUM('cho_duyet','duyet','tu_choi') NOT NULL DEFAULT 'cho_duyet',
  ly_do_tu_choi  VARCHAR(255) NULL,
  duyet_boi      BIGINT UNSIGNED NULL,       -- id admin duyệt (cùng bảng nguoi_dung)
  duyet_luc      TIMESTAMP NULL,
  created_at     TIMESTAMP NULL,
  updated_at     TIMESTAMP NULL,
  CONSTRAINT fk_xm_user  FOREIGN KEY (nguoi_dung_id) REFERENCES nguoi_dung(id) ON DELETE CASCADE,
  CONSTRAINT fk_xm_admin FOREIGN KEY (duyet_boi)     REFERENCES nguoi_dung(id) ON DELETE SET NULL,
  CONSTRAINT chk_xm_cccd CHECK (so_cccd REGEXP '^[0-9]{12}$')
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Mỗi user chỉ có 1 yêu cầu đang "cho_duyet"
ALTER TABLE xac_minh
  ADD COLUMN pending_key BIGINT UNSIGNED
    GENERATED ALWAYS AS (CASE WHEN trang_thai='cho_duyet' THEN nguoi_dung_id ELSE NULL END) STORED,
  ADD UNIQUE KEY u_one_pending_per_user (pending_key);

CREATE INDEX idx_xm_user_status ON xac_minh (nguoi_dung_id, trang_thai);

/* 10) Trigger đồng bộ cờ xác thực về bảng nguoi_dung */
DELIMITER //

CREATE TRIGGER trg_xac_minh_after_insert
AFTER INSERT ON xac_minh
FOR EACH ROW
BEGIN
  IF NEW.trang_thai = 'duyet' THEN
    UPDATE nguoi_dung SET xac_thuc = 1, cccd = NEW.so_cccd
    WHERE id = NEW.nguoi_dung_id;
  END IF;
END//

CREATE TRIGGER trg_xac_minh_after_update
AFTER UPDATE ON xac_minh
FOR EACH ROW
BEGIN
  IF NEW.trang_thai = 'duyet' THEN
    UPDATE nguoi_dung SET xac_thuc = 1, cccd = NEW.so_cccd
    WHERE id = NEW.nguoi_dung_id;
  ELSEIF NEW.trang_thai = 'tu_choi' THEN
    UPDATE nguoi_dung SET xac_thuc = 0
    WHERE id = NEW.nguoi_dung_id;
  END IF;
END//

DELIMITER ;

/* 11) Seed tiện nghi cơ bản (tuỳ chọn) */
INSERT IGNORE INTO tien_nghi (ten) VALUES
('Noi that co ban'),('May lanh'),('May giat'),('Tu lanh'),('Nha de xe'),('Thang may');
