-- --------------------------------------------------------
-- 호스트:                          119.205.211.179
-- 서버 버전:                        5.5.33-log - MySQL Community Server (GPL)
-- 서버 OS:                        Linux
-- HeidiSQL 버전:                  12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- taxoffice2022 데이터베이스 구조 내보내기
CREATE DATABASE IF NOT EXISTS `taxoffice2022` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `taxoffice2022`;

-- 테이블 taxoffice2022.HPK_ADMIN_LOG 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_ADMIN_LOG` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `user_id` varchar(30) NOT NULL COMMENT '사용자ID',
  `user_name` varchar(50) DEFAULT NULL COMMENT '사용자명',
  `menu_name` varchar(500) NOT NULL COMMENT '메뉴명',
  `agent` varchar(255) NOT NULL COMMENT '접속환경',
  `ip` varchar(20) NOT NULL COMMENT 'IP',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=9308 DEFAULT CHARSET=utf8 COMMENT='관리자접속로그';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_BANNER 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_BANNER` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `cate_name` varchar(255) NOT NULL COMMENT '구분명',
  `ord_no` int(11) NOT NULL COMMENT '순서번호',
  `start_date` datetime DEFAULT NULL COMMENT '시작일시',
  `end_date` datetime DEFAULT NULL COMMENT '종료일시',
  `contents` longtext COMMENT '내용',
  `open_yn` enum('Y','N') NOT NULL COMMENT '게시여부',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`),
  KEY `IX_HPK_BANNER` (`cate_name`,`ord_no`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='배너';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_BOARD 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_BOARD` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `board_code` varchar(30) NOT NULL COMMENT '게시판코드',
  `sub_board_code` varchar(30) DEFAULT NULL COMMENT '서브게시판코드',
  `p_idno` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '부모글일련번호',
  `sector_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '업종별게시판 정렬',
  `sector_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '업종별게시판 선택',
  `subject` varchar(255) NOT NULL COMMENT '제목',
  `subject_color` varchar(30) DEFAULT NULL COMMENT '제목컬러',
  `contents` longtext COMMENT '내용',
  `contents_add` longtext COMMENT '내용추가',
  `wise_img_num` tinyint(4) DEFAULT NULL COMMENT '명언명구 이미지번호',
  `writer_name` varchar(50) NOT NULL COMMENT '작성자명',
  `utv_url` varchar(100) DEFAULT NULL COMMENT '유튜브주소',
  `utv_url_id` varchar(100) DEFAULT NULL COMMENT '유튜브영상ID',
  `passwd` varchar(255) DEFAULT NULL COMMENT '비밀번호',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일주소',
  `taxbizinfo_url` varchar(255) DEFAULT NULL COMMENT '세무경영정보 URL',
  `category_idno` int(10) unsigned DEFAULT NULL COMMENT '카테고리번호',
  `notice_yn` enum('Y','N') NOT NULL COMMENT '공지여부',
  `secret_yn` enum('Y','N') NOT NULL COMMENT '비밀글여부',
  `editor_yn` enum('Y','N') NOT NULL COMMENT '웹에디터여부',
  `open_yn` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '노출여부',
  `sendmail_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '메일전송여부',
  `sendmail_idno` int(11) NOT NULL DEFAULT '0' COMMENT '메일전송번호',
  `ord_no` int(11) NOT NULL DEFAULT '0' COMMENT '순서번호',
  `hits` int(11) NOT NULL COMMENT '조회수',
  `kl_status` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변처리여부',
  `kl_reply` longtext NOT NULL COMMENT '문의답변내용',
  `kl_email_manager` varchar(100) DEFAULT NULL COMMENT '한페이지_담당메일',
  `kl_manager_name` varchar(50) DEFAULT NULL COMMENT '한페이지 답변자명',
  `reply_status` enum('Y','N') NOT NULL COMMENT '답변완료여부',
  `recomms` int(11) NOT NULL COMMENT '추천수',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) DEFAULT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`),
  KEY `IX_HPK_BOARD` (`board_code`),
  KEY `IX_HPK_BOARD2` (`board_code`,`notice_yn`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='게시판';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_BOARD_CATEGORY 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_BOARD_CATEGORY` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `board_code` varchar(30) NOT NULL COMMENT '게시판코드',
  `category_title` varchar(255) NOT NULL COMMENT '카테고리명',
  `ord_no` int(11) NOT NULL DEFAULT '0' COMMENT '순서번호',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`),
  KEY `IX_HPK_BOARD_CATEGORY` (`board_code`,`ord_no`,`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COMMENT='게시판카테고리';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_BOARD_COMMENT 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_BOARD_COMMENT` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `board_code` varchar(30) NOT NULL COMMENT '게시판코드',
  `board_idno` int(10) unsigned NOT NULL COMMENT '게시물일련번호',
  `contents` longtext NOT NULL COMMENT '내용',
  `writer_name` varchar(50) DEFAULT NULL COMMENT '작성자명',
  `passwd` varchar(255) DEFAULT NULL COMMENT '비밀번호',
  `recomms` int(11) NOT NULL COMMENT '추천수',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='게시판댓글';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_BOARD_CONF 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_BOARD_CONF` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `board_code` varchar(30) NOT NULL COMMENT '게시판코드',
  `board_name` varchar(255) NOT NULL COMMENT '게시판명',
  `board_type` varchar(30) NOT NULL COMMENT '게시판유형',
  `board_div` varchar(30) NOT NULL COMMENT '한글/영문',
  `use_notice_yn` enum('Y','N') NOT NULL COMMENT '공지사용여부',
  `use_category_yn` enum('Y','N') NOT NULL COMMENT '카테고리사용여부',
  `use_file_yn` enum('Y','N') NOT NULL COMMENT '파일첨부사용여부',
  `use_reply_yn` enum('Y','N') NOT NULL COMMENT '답글사용여부',
  `use_comment_yn` enum('Y','N') NOT NULL COMMENT '댓글사용여부',
  `use_secret_yn` enum('Y','N') NOT NULL COMMENT '비밀글사용여부',
  `use_editor_yn` enum('Y','N') NOT NULL COMMENT '웹에디터사용여부',
  `auth_list` varchar(30) DEFAULT NULL COMMENT '목록권한',
  `auth_read` varchar(30) DEFAULT NULL COMMENT '읽기권한',
  `auth_write` varchar(30) DEFAULT NULL COMMENT '쓰기권한',
  `auth_notice` varchar(30) DEFAULT NULL COMMENT '공지권한',
  `auth_file` varchar(30) DEFAULT NULL COMMENT '첨부권한',
  `auth_reply` varchar(30) DEFAULT NULL COMMENT '답글권한',
  `auth_comment` varchar(30) DEFAULT NULL COMMENT '댓글권한',
  `auth_secret` varchar(30) DEFAULT NULL COMMENT '비밀글권한',
  `page_len` int(11) DEFAULT NULL COMMENT '페이지당목록갯수',
  `file_limit` int(11) DEFAULT NULL COMMENT '파일첨부갯수',
  `file_size_limit` int(11) DEFAULT NULL COMMENT '파일용량제한',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`board_code`),
  UNIQUE KEY `UIX_HPK_BOARD_CONF` (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=196 DEFAULT CHARSET=utf8 COMMENT='게시판설정';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_BOARD_FILE 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_BOARD_FILE` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `board_code` varchar(30) NOT NULL COMMENT '게시판코드',
  `board_idno` int(10) unsigned NOT NULL COMMENT '게시물일련번호',
  `type_code` varchar(30) DEFAULT NULL COMMENT '구분코드',
  `file_name` varchar(255) NOT NULL COMMENT '파일명',
  `file_name_saved` varchar(255) NOT NULL COMMENT '등록파일명',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  PRIMARY KEY (`idno`),
  KEY `IX_HPK_BOARD_FILE` (`board_idno`,`type_code`)
) ENGINE=MyISAM AUTO_INCREMENT=1214 DEFAULT CHARSET=utf8 COMMENT='게시판첨부파일';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_BOARD_FILE_20220103 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_BOARD_FILE_20220103` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `board_code` varchar(30) NOT NULL COMMENT '게시판코드',
  `board_idno` int(10) unsigned NOT NULL COMMENT '게시물일련번호',
  `type_code` varchar(30) DEFAULT NULL COMMENT '구분코드',
  `file_name` varchar(255) NOT NULL COMMENT '파일명',
  `file_name_saved` varchar(255) NOT NULL COMMENT '등록파일명',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  PRIMARY KEY (`idno`),
  KEY `IX_HPK_BOARD_FILE` (`board_idno`,`type_code`)
) ENGINE=MyISAM AUTO_INCREMENT=1211 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_CALC_LIST 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_CALC_LIST` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `calc_type` varchar(30) NOT NULL COMMENT '세액결제구분',
  `user_id` varchar(30) NOT NULL COMMENT '사용자ID',
  `user_name` varchar(50) DEFAULT NULL COMMENT '성명',
  `pay_price` int(11) DEFAULT NULL COMMENT '납부세액',
  `pay_detail` longtext COMMENT '전체내역',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='세액계산내역';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_CMN_CODE 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_CMN_CODE` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `p_cmn_code` varchar(30) NOT NULL COMMENT '상위코드',
  `cmn_code` varchar(30) NOT NULL COMMENT '코드',
  `cmn_name` varchar(255) NOT NULL COMMENT '코드명',
  `cmn_value` text COMMENT '코드값',
  `ord_no` int(11) NOT NULL DEFAULT '0' COMMENT '순서번호',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`p_cmn_code`,`cmn_code`),
  UNIQUE KEY `UIX_HPK_CMN_CODE` (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='공통코드';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_CONTENTS 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_CONTENTS` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `menu_idno` int(10) unsigned NOT NULL COMMENT '메뉴번호',
  `contents_title` varchar(255) DEFAULT NULL COMMENT '컨텐츠명',
  `use_yn` enum('Y','N') NOT NULL COMMENT '사용여부',
  `ord_no` int(11) NOT NULL COMMENT '순서번호',
  `cont_type` varchar(30) NOT NULL COMMENT '컨텐츠유형',
  `cont_detail_type` varchar(30) NOT NULL COMMENT '세부 컨텐츠 타입',
  `site_idno` int(10) unsigned DEFAULT NULL COMMENT '사이트번호',
  `board_kl_type` varchar(64) DEFAULT NULL COMMENT '한페이지 게시판타입',
  `board_code` varchar(30) DEFAULT NULL COMMENT '게시판코드',
  `news_code` varchar(30) DEFAULT NULL COMMENT 'ajax뉴스코드',
  `calc_code` varchar(30) DEFAULT NULL COMMENT '세금계산기코드',
  `tf_code` varchar(30) DEFAULT NULL COMMENT '신고의뢰코드',
  `tcs_code` varchar(30) DEFAULT NULL COMMENT '신고의뢰코드(new)',
  `program_code` varchar(30) DEFAULT NULL COMMENT '프로그램코드',
  `contents` longtext COMMENT '내용',
  `link_url` varchar(255) DEFAULT NULL COMMENT '연결URL',
  `setval` longtext COMMENT '기타속성',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`),
  KEY `IX_HPK_CONTENTS` (`use_yn`,`menu_idno`,`ord_no`,`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=621 DEFAULT CHARSET=utf8 COMMENT='컨텐츠';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_CONTENTS_FILE 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_CONTENTS_FILE` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `contents_idno` int(10) unsigned NOT NULL COMMENT '컨텐츠번호',
  `type_code` varchar(30) DEFAULT NULL COMMENT '구분코드',
  `file_name` varchar(255) NOT NULL COMMENT '파일명',
  `file_name_saved` varchar(255) NOT NULL COMMENT '등록파일명',
  `file_size` int(11) NOT NULL COMMENT '파일크기',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='컨텐츠첨부파일';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_CONTENTS_LOG 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_CONTENTS_LOG` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `menu_idno` int(10) unsigned NOT NULL COMMENT '메뉴번호',
  `contents_idno` int(10) unsigned NOT NULL COMMENT '컨텐츠번호',
  `contents_title` varchar(255) DEFAULT NULL COMMENT '컨텐츠명',
  `cont_type` varchar(30) NOT NULL COMMENT '컨텐츠유형',
  `site_idno` int(10) unsigned DEFAULT NULL COMMENT '사이트번호',
  `board_code` varchar(30) DEFAULT NULL COMMENT '게시판코드',
  `contents` longtext COMMENT '내용',
  `link_url` varchar(255) DEFAULT NULL COMMENT '연결URL',
  `attr` varchar(500) DEFAULT NULL COMMENT '속성',
  `org_upt_date` datetime DEFAULT NULL COMMENT '기존수정일시',
  `org_upt_user_id` varchar(30) DEFAULT NULL COMMENT '기존수정ID',
  `org_upt_ip` varchar(20) DEFAULT NULL COMMENT '기존수정IP',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='컨텐츠내용변경로그';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_GOODS 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_GOODS` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `goods_name` varchar(255) NOT NULL COMMENT '상담명',
  `intro` varchar(255) DEFAULT NULL COMMENT '소개',
  `contents` longtext COMMENT '내용',
  `category_yn` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '업무구분여부',
  `option_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '이용권여부',
  `use_yn` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '사용여부',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) DEFAULT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='상담정보';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_GOODS_CATEGORY 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_GOODS_CATEGORY` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `goods_idno` int(10) unsigned NOT NULL COMMENT '상담번호',
  `category_name` varchar(255) NOT NULL COMMENT '카테고리명',
  `contents` longtext COMMENT '내용',
  `contents1` longtext,
  `checklist` longtext COMMENT '체크리스트',
  `file_name` varchar(255) DEFAULT NULL COMMENT '파일명',
  `file_name_saved` varchar(255) DEFAULT NULL COMMENT '등록파일명',
  `file_size` int(11) DEFAULT NULL COMMENT '파일크기',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) DEFAULT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=355 DEFAULT CHARSET=utf8 COMMENT='상담카테고리';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_GOODS_CATEGORY_170728 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_GOODS_CATEGORY_170728` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `goods_idno` int(10) unsigned NOT NULL COMMENT '상담번호',
  `category_name` varchar(255) NOT NULL COMMENT '카테고리명',
  `contents` longtext COMMENT '내용',
  `contents1` longtext,
  `file_name` varchar(255) DEFAULT NULL COMMENT '파일명',
  `file_name_saved` varchar(255) DEFAULT NULL COMMENT '등록파일명',
  `file_size` int(11) DEFAULT NULL COMMENT '파일크기',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) DEFAULT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=343 DEFAULT CHARSET=utf8 COMMENT='상담카테고리';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_GOODS_OPTION 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_GOODS_OPTION` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `goods_idno` int(10) unsigned NOT NULL COMMENT '상담번호',
  `option_name` varchar(255) DEFAULT NULL COMMENT '이용권명',
  `price` int(11) NOT NULL DEFAULT '0' COMMENT '가격',
  `value` varchar(500) DEFAULT NULL COMMENT '적용값',
  `use_yn` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '사용여부',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) DEFAULT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='상담이용권';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_INCRUIT 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_INCRUIT` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `user_id` varchar(30) NOT NULL COMMENT '사용자ID',
  `passwd` varchar(255) DEFAULT NULL COMMENT '비밀번호',
  `user_name` varchar(50) NOT NULL COMMENT '사용자명',
  `company` varchar(255) DEFAULT NULL COMMENT '기업명',
  `tel` varchar(30) DEFAULT NULL COMMENT '전화번호',
  `phone` varchar(30) DEFAULT NULL COMMENT '휴대폰번호',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일주소',
  `postcode` varchar(6) DEFAULT NULL COMMENT '우편번호',
  `addr1` varchar(255) DEFAULT NULL COMMENT '주소1',
  `addr2` varchar(255) DEFAULT NULL COMMENT '주소2',
  `job` varchar(255) DEFAULT NULL COMMENT '직업',
  `email_agree_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '이메일수신동의',
  `sms_agree_yn` enum('Y','N') DEFAULT 'N' COMMENT 'SMS수신동의',
  `cms_auth` varchar(500) DEFAULT NULL COMMENT '관리자권한설정',
  `sns_reg_code` varchar(30) DEFAULT NULL COMMENT 'SNS가입구분',
  `status` enum('Y','N','R') NOT NULL DEFAULT 'Y' COMMENT '상태',
  `point` int(11) NOT NULL DEFAULT '0' COMMENT '보유포인트',
  `temp_passwd_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '임시비밀번호여부',
  `email_auth_no` varchar(30) DEFAULT NULL COMMENT '이메일인증코드',
  `phone_auth_no` varchar(30) DEFAULT NULL COMMENT '휴대폰인증코드',
  `login_date` datetime DEFAULT NULL COMMENT '최종로그인일시',
  `passwd_upt_date` datetime DEFAULT NULL COMMENT '비밀번호수정일시',
  `rest_date` datetime DEFAULT NULL COMMENT '휴면전환일시',
  `out_date` datetime DEFAULT NULL COMMENT '탈퇴일시',
  `out_reason` longtext COMMENT '탈퇴사유',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`),
  UNIQUE KEY `UIX_HPK_USER` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=597 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='회원';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_MENU 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_MENU` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `site_idno` int(10) unsigned NOT NULL COMMENT '사이트번호',
  `p_idno` int(10) unsigned DEFAULT NULL COMMENT '상위일련번호',
  `menu_title` varchar(255) NOT NULL COMMENT '메뉴명',
  `link_sub_yn` enum('Y','N') NOT NULL COMMENT '하위메뉴연결여부',
  `use_yn` enum('Y','N') NOT NULL COMMENT '사용여부',
  `show_yn` enum('Y','N') NOT NULL COMMENT '숨김여부',
  `head_contents` longtext COMMENT '상단고정내용',
  `footer_contents` longtext COMMENT '하단고정내용',
  `ord_no` int(11) NOT NULL COMMENT '순서번호',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`),
  KEY `IX_HPK_MENU` (`site_idno`,`use_yn`,`p_idno`,`ord_no`,`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=546 DEFAULT CHARSET=utf8 COMMENT='메뉴';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_MNGR 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_MNGR` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `type_code` varchar(30) NOT NULL COMMENT '구분',
  `show_yn` enum('Y','N') NOT NULL DEFAULT 'Y',
  `mngr_name` varchar(50) NOT NULL COMMENT '성명',
  `user_id` varchar(50) NOT NULL,
  `mngr_level` int(8) NOT NULL DEFAULT '0' COMMENT '팀장레벨',
  `bran_name` varchar(255) DEFAULT NULL COMMENT '지점명',
  `phone` varchar(30) DEFAULT NULL COMMENT '연락처',
  `tel` varchar(30) DEFAULT NULL COMMENT '회사전화',
  `fax` varchar(30) DEFAULT NULL COMMENT '팩스',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일주소',
  `cs_zoom_url` varchar(255) DEFAULT NULL COMMENT 'zoom url',
  `cs_zoom_id` varchar(100) DEFAULT NULL COMMENT 'zoom id',
  `cs_zoom_pw` varchar(30) DEFAULT NULL COMMENT 'zoom pw',
  `cs_zoom_use` varchar(30) DEFAULT NULL COMMENT 'zoom on off',
  `info1` longtext COMMENT '정보1',
  `info2` longtext COMMENT '정보2',
  `info3` longtext COMMENT '정보3',
  `info4` longtext COMMENT '정보4',
  `info5` longtext COMMENT '정보5',
  `info6` longtext COMMENT '정보6',
  `info7` longtext COMMENT '정보7',
  `info8` longtext COMMENT '정보8',
  `info9` longtext COMMENT '정보9',
  `file_name` varchar(255) NOT NULL COMMENT '사진파일명',
  `goods_category` varchar(500) DEFAULT NULL COMMENT '상담업무',
  `ord_no` int(11) NOT NULL DEFAULT '0' COMMENT '순서번호',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8 COMMENT='세무사';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_MNGR_OFF 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_MNGR_OFF` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `mngr_idno` int(10) unsigned NOT NULL COMMENT '세무사일련번호',
  `off_date` date NOT NULL COMMENT '휴무일',
  `off_time` varchar(30) DEFAULT NULL COMMENT '휴무시간',
  `reason` varchar(500) DEFAULT NULL COMMENT '휴무사유',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='세무사휴무';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_ORDER 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_ORDER` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `goods_idno` int(10) unsigned NOT NULL COMMENT '상담번호',
  `send_idno` int(10) unsigned NOT NULL COMMENT '보낸메일 번호',
  `goods_name` varchar(255) NOT NULL COMMENT '상담명',
  `category_idno` int(10) unsigned DEFAULT NULL COMMENT '카테고리번호',
  `category_name` varchar(255) DEFAULT NULL COMMENT '카테고리명',
  `option_idno` int(10) unsigned DEFAULT NULL COMMENT '이용권번호',
  `option_name` varchar(255) DEFAULT NULL COMMENT '이용권명',
  `price` int(11) DEFAULT NULL COMMENT '금액',
  `pay_method` varchar(30) DEFAULT NULL COMMENT '결제수단',
  `pay_price` int(11) DEFAULT NULL COMMENT '결제금액',
  `pay_point` int(11) DEFAULT NULL COMMENT '결제포인트',
  `save_point` int(11) DEFAULT NULL COMMENT '적립포인트',
  `mngr_idno` int(10) unsigned DEFAULT NULL COMMENT '담당세무사번호',
  `mngr_name` varchar(50) DEFAULT NULL COMMENT '담당세무사명',
  `app_date` datetime DEFAULT NULL COMMENT '예약날짜',
  `app_minutes` int(11) DEFAULT NULL COMMENT '소요시간',
  `method` varchar(10) DEFAULT NULL COMMENT '상담방법',
  `user_id` varchar(30) NOT NULL COMMENT '사용자ID',
  `user_name` varchar(50) DEFAULT NULL COMMENT '성명',
  `phone` varchar(30) DEFAULT NULL COMMENT '연락처',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일주소',
  `company` varchar(255) DEFAULT NULL COMMENT '업체명',
  `com_kind` varchar(255) DEFAULT NULL COMMENT '업종업태',
  `com_regno` varchar(255) DEFAULT NULL COMMENT '사업자등록번호',
  `sales` varchar(255) DEFAULT NULL COMMENT '전년도매출',
  `addr` varchar(255) DEFAULT NULL COMMENT '주소',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` longtext COMMENT '내용',
  `contents2` longtext COMMENT '추가내용',
  `send_contents` longtext COMMENT 'sendmail 답변',
  `etc01` varchar(255) NOT NULL DEFAULT '' COMMENT '기타옵션',
  `status` varchar(30) NOT NULL COMMENT '진행상태',
  `send_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'sendmail 전송여부',
  `send_kakao_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '카카오 전송여부',
  `hidden_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'sendmail 감춤여부',
  `comp_date` datetime DEFAULT NULL COMMENT '완료일시',
  `cancel_date` datetime DEFAULT NULL COMMENT '취소일시',
  `pay_date` datetime DEFAULT NULL COMMENT '결제일시',
  `remark` longtext COMMENT '비고',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=889 DEFAULT CHARSET=utf8 COMMENT='상담신청';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_PAY 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_PAY` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `order_idno` int(10) unsigned DEFAULT NULL COMMENT '신청번호',
  `user_id` varchar(30) DEFAULT NULL COMMENT '사용자ID',
  `pay_method` varchar(30) NOT NULL COMMENT '결제수단',
  `price` int(11) NOT NULL COMMENT '결제금액',
  `reci_message` longtext COMMENT '수신메시지',
  `status` varchar(30) NOT NULL DEFAULT '1' COMMENT '결제상태',
  `cancel_date` datetime DEFAULT NULL COMMENT '취소일시',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=532 DEFAULT CHARSET=utf8 COMMENT='결제';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_POPUP 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_POPUP` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `site_idno` int(10) unsigned NOT NULL COMMENT '사이트번호',
  `subject` varchar(255) NOT NULL COMMENT '제목',
  `contents` longtext NOT NULL COMMENT '내용',
  `start_date` datetime DEFAULT NULL COMMENT '시작일시',
  `end_date` datetime DEFAULT NULL COMMENT '종료일시',
  `size_width` int(11) DEFAULT NULL COMMENT '가로크기',
  `size_height` int(11) DEFAULT NULL COMMENT '세로크기',
  `pos_top` int(11) DEFAULT NULL COMMENT '상단위치',
  `pos_left` int(11) DEFAULT NULL COMMENT '좌측위치',
  `scroll_yn` enum('Y','N') NOT NULL COMMENT '스크롤사용여부',
  `resize_yn` enum('Y','N') NOT NULL COMMENT '크기조정사용여부',
  `notopen_yn` enum('Y','N') NOT NULL COMMENT '하루보이지않기여부',
  `open_yn` enum('Y','N') NOT NULL COMMENT '게시여부',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='팝업';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_SENDMAIL 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_SENDMAIL` (
  `send_idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `idno` int(10) unsigned NOT NULL COMMENT '부모번호',
  `mngr_idno` int(10) unsigned NOT NULL COMMENT '세무사 등록넘버',
  `mail_type` varchar(30) DEFAULT NULL COMMENT '상담타입',
  `board_code` varchar(30) NOT NULL COMMENT '게시판코드',
  `send_type` varchar(30) DEFAULT NULL COMMENT '전송타입',
  `send_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '메일전송확인',
  `send_kakao_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '카카오 전송여부',
  `hidden_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '감춤여부확인',
  `goods_name` varchar(255) NOT NULL COMMENT '상담구분',
  `category_name` varchar(255) NOT NULL COMMENT '카테고리구분',
  `subject` varchar(255) NOT NULL COMMENT '제목',
  `mail_title` varchar(255) DEFAULT NULL COMMENT '메일 타이틀',
  `method` varchar(10) DEFAULT NULL COMMENT '상담방법',
  `contents` longtext COMMENT '내용',
  `send_contents` longtext COMMENT '내용추가',
  `writer_name` varchar(50) NOT NULL COMMENT '작성자명',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일주소',
  `company` varchar(255) DEFAULT NULL COMMENT '업체명',
  `com_kind` varchar(255) DEFAULT NULL COMMENT '업종업태',
  `com_regno` varchar(255) DEFAULT NULL COMMENT '사업자등록번호',
  `sales` varchar(255) DEFAULT NULL COMMENT '전년도매출',
  `addr` varchar(255) DEFAULT NULL COMMENT '주소',
  `receive_name` varchar(50) NOT NULL,
  `receive_phone` varchar(50) NOT NULL,
  `receive_email` varchar(100) DEFAULT NULL,
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  PRIMARY KEY (`send_idno`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='게시판';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_SITE 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_SITE` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `site_name` varchar(255) NOT NULL COMMENT '사이트명',
  `lang_code` varchar(30) NOT NULL COMMENT '언어',
  `domain` varchar(255) NOT NULL COMMENT '도메인',
  `base_path` varchar(255) DEFAULT NULL COMMENT '기본경로',
  `ssl_port` varchar(30) DEFAULT NULL COMMENT 'SSL포트',
  `temp_code` varchar(30) DEFAULT NULL COMMENT '템플릿코드',
  `site_title` varchar(255) NOT NULL COMMENT '브라우저타이틀',
  `open_yn` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '노출여부',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='사이트';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_SITE_LOG 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_SITE_LOG` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `visit_id` varchar(30) NOT NULL COMMENT '사용자ID',
  `login_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '로그인여부',
  `agent` varchar(255) NOT NULL COMMENT '접속환경',
  `ip` varchar(20) NOT NULL COMMENT 'IP',
  `referer` varchar(255) NOT NULL COMMENT '유입경로',
  `arrive_url` varchar(255) NOT NULL COMMENT '현재 url',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_day` varchar(10) NOT NULL COMMENT '등록일',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='사이트접접속로그';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_USER 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_USER` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `user_id` varchar(30) NOT NULL COMMENT '사용자ID',
  `passwd` varchar(255) DEFAULT NULL COMMENT '비밀번호',
  `user_name` varchar(50) NOT NULL COMMENT '사용자명',
  `company` varchar(255) DEFAULT NULL COMMENT '기업명',
  `tel` varchar(30) DEFAULT NULL COMMENT '전화번호',
  `phone` varchar(30) DEFAULT NULL COMMENT '휴대폰번호',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일주소',
  `postcode` varchar(6) DEFAULT NULL COMMENT '우편번호',
  `addr1` varchar(255) DEFAULT NULL COMMENT '주소1',
  `addr2` varchar(255) DEFAULT NULL COMMENT '주소2',
  `job` varchar(255) DEFAULT NULL COMMENT '직업',
  `email_agree_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '이메일수신동의',
  `sms_agree_yn` enum('Y','N') DEFAULT 'N' COMMENT 'SMS수신동의',
  `cms_auth` varchar(500) DEFAULT NULL COMMENT '관리자권한설정',
  `sns_reg_code` varchar(30) DEFAULT NULL COMMENT 'SNS가입구분',
  `status` enum('Y','N','R') NOT NULL DEFAULT 'Y' COMMENT '상태',
  `point` int(11) NOT NULL DEFAULT '0' COMMENT '보유포인트',
  `temp_passwd_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '임시비밀번호여부',
  `email_auth_no` varchar(30) DEFAULT NULL COMMENT '이메일인증코드',
  `phone_auth_no` varchar(30) DEFAULT NULL COMMENT '휴대폰인증코드',
  `login_date` datetime DEFAULT NULL COMMENT '최종로그인일시',
  `passwd_upt_date` datetime DEFAULT NULL COMMENT '비밀번호수정일시',
  `rest_date` datetime DEFAULT NULL COMMENT '휴면전환일시',
  `out_date` datetime DEFAULT NULL COMMENT '탈퇴일시',
  `out_reason` longtext COMMENT '탈퇴사유',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idno`),
  UNIQUE KEY `UIX_HPK_USER` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=608 DEFAULT CHARSET=utf8 COMMENT='회원';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_USER_copy 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_USER_copy` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `user_id` varchar(30) NOT NULL COMMENT '사용자ID',
  `user_pw` varchar(255) DEFAULT NULL COMMENT '비밀번호',
  `user_name` varchar(50) NOT NULL COMMENT '사용자명',
  `company` varchar(255) DEFAULT NULL COMMENT '기업명',
  `phone` varchar(30) DEFAULT NULL COMMENT '전화번호',
  `mobile` varchar(30) DEFAULT NULL COMMENT '휴대폰번호',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일주소',
  `zip` varchar(6) DEFAULT NULL COMMENT '우편번호',
  `address` varchar(255) DEFAULT NULL COMMENT '주소1',
  `address_ext` varchar(255) DEFAULT NULL COMMENT '주소2',
  `job` varchar(255) DEFAULT NULL COMMENT '직업',
  `email_accept` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '이메일수신동의',
  `sms_accept` enum('Y','N') DEFAULT 'N' COMMENT 'SMS수신동의',
  `etc_1` varchar(500) DEFAULT NULL COMMENT '관리자권한설정',
  `etc_2` int(11) NOT NULL DEFAULT '0' COMMENT '보유포인트',
  `login_date` datetime DEFAULT NULL COMMENT '최종로그인일시',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `UIX_HPK_USER` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=606 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.HPK_USER_LOG 구조 내보내기
CREATE TABLE IF NOT EXISTS `HPK_USER_LOG` (
  `idno` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `user_id` varchar(30) NOT NULL COMMENT '사용자ID',
  `agent` varchar(255) NOT NULL COMMENT '접속환경',
  `ip` varchar(20) NOT NULL COMMENT 'IP',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  PRIMARY KEY (`idno`)
) ENGINE=MyISAM AUTO_INCREMENT=1818 DEFAULT CHARSET=utf8 COMMENT='사용자접속로그';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_admin 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `a_id` varchar(20) NOT NULL COMMENT '아이디',
  `a_pw` varchar(40) NOT NULL COMMENT '비밀번호',
  `a_name` varchar(20) DEFAULT NULL COMMENT '이름',
  `a_class` varchar(20) DEFAULT NULL COMMENT '직급',
  `a_phone` varchar(20) DEFAULT NULL COMMENT '전화',
  `a_email` varchar(50) DEFAULT NULL COMMENT '이메일',
  `a_grade` enum('ROOT','ADMIN') NOT NULL DEFAULT 'ADMIN' COMMENT '등급',
  `a_auth` text COMMENT '권한',
  `a_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `a_id` (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=euckr COMMENT='관리자 정보 테이블';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_admin_login_log 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_admin_login_log` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `a_id` varchar(20) NOT NULL COMMENT '아이디',
  `a_ip` varchar(40) NOT NULL COMMENT '접속IP',
  `a_login` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '로그인 성공여부',
  `a_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '접속일',
  PRIMARY KEY (`idx`),
  KEY `a_id` (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2429 DEFAULT CHARSET=euckr COMMENT='관리자 로그인 로그';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_admin_menu_code 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_admin_menu_code` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `m_code` varchar(30) NOT NULL COMMENT '메뉴코드',
  `m_name` varchar(30) NOT NULL DEFAULT '',
  `is_use` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '사용여부',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `m_code` (`m_code`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=euckr COMMENT='관리자 메뉴코드 정보';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_banner 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_banner` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `b_subject` varchar(100) NOT NULL COMMENT '제목',
  `b_image` varchar(50) NOT NULL COMMENT '이미지',
  `b_url` varchar(255) NOT NULL COMMENT '링크주소',
  `b_target` enum('_blank','_self','_top') NOT NULL DEFAULT '_self' COMMENT '타겟',
  `b_show` enum('Y','N') NOT NULL COMMENT '표시여부',
  `b_sort` int(11) NOT NULL COMMENT '정렬순서',
  `b_type` tinyint(4) NOT NULL COMMENT '배너타입',
  `b_hit` int(11) NOT NULL COMMENT '클릭수',
  `b_brand` int(11) DEFAULT NULL,
  `b_date` date NOT NULL COMMENT '등록일자',
  `b_title` varchar(500) DEFAULT NULL,
  `b_contents` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=euckr COMMENT='배너관리';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_001 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_001` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_002 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_002` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_005 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_005` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_006 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_006` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_007 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_007` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_008 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_008` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_011 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_011` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_012 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_012` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_013 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_013` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_016 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_016` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=229 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_017 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_017` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=186 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_018 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_018` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=403 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_019 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_019` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_020 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_020` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=291 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_021 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_021` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_022 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_022` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_023 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_023` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_024 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_024` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=798 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_025 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_025` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_2011_bbs1 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_2011_bbs1` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_2011_bbs2 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_2011_bbs2` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_2011_bbs3 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_2011_bbs3` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=345 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_2015_bbs 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_2015_bbs` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_account 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_account` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_adminboard 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_adminboard` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_admin_tmp 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_admin_tmp` (
  `boardid` varchar(60) NOT NULL,
  `linkurl` varchar(200) NOT NULL,
  `b_idx` int(11) unsigned NOT NULL,
  `subject` varchar(200) NOT NULL,
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `etc_yn` enum('Y','N') DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=euckr;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_art_industry 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_art_industry` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_assettax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_assettax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_basic_tax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_basic_tax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=262 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_biz_wise 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_biz_wise` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_build 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_build` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_calendar_menu02 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_calendar_menu02` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_chinaqna 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_chinaqna` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_ch_fdi 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_ch_fdi` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`) USING BTREE,
  KEY `no` (`no`,`main`,`sub`) USING BTREE,
  KEY `s_date` (`schedule_date`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_collection_tax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_collection_tax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_Column 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_Column` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=439 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_comptax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_comptax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_cooperative_sector 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_cooperative_sector` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_corporatetax_ex 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_corporatetax_ex` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=294 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_corporationTax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_corporationTax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_cr_estate_ex 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_cr_estate_ex` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_disadvantage 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_disadvantage` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=490 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_dissatisfaction01 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_dissatisfaction01` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_dissatisfaction02 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_dissatisfaction02` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_dissolution 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_dissolution` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_domestic1 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_domestic1` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_eng_hanpage 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_eng_hanpage` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `kl_email_manager` varchar(100) DEFAULT NULL COMMENT '한페이지메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `r_contents` mediumtext COMMENT '답변내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`) USING BTREE,
  KEY `no` (`no`,`main`,`sub`) USING BTREE,
  KEY `s_date` (`schedule_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=456 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_eng_member_notice 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_eng_member_notice` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_eng_none 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_eng_none` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_eng_opreation 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_eng_opreation` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_eng_other 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_eng_other` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_eng_process 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_eng_process` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_eng_set 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_eng_set` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_eng_social 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_eng_social` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_eng_tax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_eng_tax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_eng_treaties 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_eng_treaties` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_eng_Value_added_tax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_eng_Value_added_tax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_eng_venture 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_eng_venture` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_enter_standard02 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_enter_standard02` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_enter_standard03 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_enter_standard03` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_enter_standard04 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_enter_standard04` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_en_latest 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_en_latest` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=196 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_establishment 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_establishment` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=224 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_etc1 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_etc1` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_etc2 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_etc2` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_etc3 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_etc3` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_etc4 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_etc4` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_etc5 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_etc5` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_etc6 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_etc6` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_family_occupation 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_family_occupation` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=243 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_family_occupation_ex 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_family_occupation_ex` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`) USING BTREE,
  KEY `no` (`no`,`main`,`sub`) USING BTREE,
  KEY `s_date` (`schedule_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_faq 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_faq` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=331 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_fdi_board 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_fdi_board` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_files 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_files` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `boardid` varchar(30) NOT NULL COMMENT '게시판아이디',
  `b_idx` int(11) NOT NULL DEFAULT '0' COMMENT '게시물아이디',
  `ori_name` varchar(255) NOT NULL COMMENT '원본이름',
  `re_name` varchar(300) NOT NULL COMMENT '저장이름',
  `type` varchar(100) NOT NULL COMMENT '파일타입',
  `ext` varchar(10) NOT NULL COMMENT '확장자',
  `size` int(11) NOT NULL DEFAULT '0' COMMENT '파일사이즈',
  `download` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '다운로드횟수',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `boardid_b_idx` (`boardid`,`b_idx`)
) ENGINE=MyISAM AUTO_INCREMENT=5650 DEFAULT CHARSET=euckr COMMENT='게시판 파일';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_files_20220103 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_files_20220103` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `boardid` varchar(30) NOT NULL COMMENT '게시판아이디',
  `b_idx` int(11) NOT NULL DEFAULT '0' COMMENT '게시물아이디',
  `ori_name` varchar(255) NOT NULL COMMENT '원본이름',
  `re_name` varchar(300) NOT NULL COMMENT '저장이름',
  `type` varchar(100) NOT NULL COMMENT '파일타입',
  `ext` varchar(10) NOT NULL COMMENT '확장자',
  `size` int(11) NOT NULL DEFAULT '0' COMMENT '파일사이즈',
  `download` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '다운로드횟수',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `boardid_b_idx` (`boardid`,`b_idx`)
) ENGINE=MyISAM AUTO_INCREMENT=3411 DEFAULT CHARSET=euckr;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_foreigner 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_foreigner` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_foreigner_speculate 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_foreigner_speculate` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_foreigner_speculate1 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_foreigner_speculate1` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_foreign_investment 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_foreign_investment` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_four_insurance 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_four_insurance` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=215 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_franchise_sector 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_franchise_sector` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_giftTax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_giftTax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_gifttax_ex 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_gifttax_ex` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_hanpage 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_hanpage` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(100) NOT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `kl_email_manager` varchar(100) DEFAULT NULL COMMENT '한페이지메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext CHARACTER SET utf8 COLLATE utf8_polish_ci COMMENT '내용',
  `r_contents` mediumtext COMMENT '답변내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=961 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_hanpage2024 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_hanpage2024` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(100) NOT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `kl_email_manager` varchar(100) DEFAULT NULL COMMENT '한페이지메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext CHARACTER SET utf8 COLLATE utf8_polish_ci COMMENT '내용',
  `r_contents` mediumtext COMMENT '답변내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`) USING BTREE,
  KEY `no` (`no`,`main`,`sub`) USING BTREE,
  KEY `s_date` (`schedule_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=821 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_hanpage_20241005 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_hanpage_20241005` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(100) NOT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `kl_email_manager` varchar(100) DEFAULT NULL COMMENT '한페이지메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext CHARACTER SET utf8 COLLATE utf8_polish_ci COMMENT '내용',
  `r_contents` mediumtext COMMENT '답변내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`) USING BTREE,
  KEY `no` (`no`,`main`,`sub`) USING BTREE,
  KEY `s_date` (`schedule_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=822 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_incomeTax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_incomeTax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_incometax_ex 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_incometax_ex` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=301 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_info 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_info` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `boardid` varchar(30) NOT NULL COMMENT '게시판아이디',
  `boardname` varchar(50) NOT NULL DEFAULT 'New Board' COMMENT '게시판이름',
  `skin` varchar(50) NOT NULL DEFAULT 'default' COMMENT '스킨이름',
  `scale` int(8) unsigned NOT NULL DEFAULT '10' COMMENT '게시물표시수',
  `pagescale` int(8) unsigned NOT NULL DEFAULT '10' COMMENT '게시물링크수',
  `widthscale` tinyint(4) NOT NULL DEFAULT '4' COMMENT '갤러리형 목록 가로표시수',
  `thumwidth` int(11) NOT NULL DEFAULT '100' COMMENT '썸네일 가로크기',
  `newmark` int(8) unsigned NOT NULL DEFAULT '3' COMMENT '신규글표시 일수',
  `besthit` int(8) unsigned NOT NULL DEFAULT '100' COMMENT '베스트글 클릭 횟수',
  `subjectcut` int(8) unsigned DEFAULT '40' COMMENT '제목자르기',
  `useadminonly` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '관리자만 글쓰기',
  `useintranet` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '인트라넷으로 사용여부',
  `usepds` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '자료실 사용여부',
  `usereply` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답글 사용여부',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답글시 메일 알림 사용여부',
  `usecat` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '게시물 카테고리 사용여부',
  `usememo` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '게시물댓글(메모) 사용여부',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금 기능',
  `readlevel` tinyint(4) NOT NULL DEFAULT '0' COMMENT '읽기등급',
  `writelevel` tinyint(4) NOT NULL DEFAULT '0' COMMENT '쓰기등급',
  `replylevel` tinyint(4) NOT NULL DEFAULT '0' COMMENT '답글등록등급',
  `listlevel` tinyint(4) NOT NULL DEFAULT '0' COMMENT '목록보기등급',
  `category` varchar(255) NOT NULL COMMENT '게시판 카테고리',
  `header` text COMMENT '헤더',
  `footer` text COMMENT '푸터',
  `wdate` date NOT NULL DEFAULT '0000-00-00' COMMENT '등록일',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `boardid` (`boardid`)
) ENGINE=MyISAM AUTO_INCREMENT=360 DEFAULT CHARSET=euckr COMMENT='게시판 설정정보';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_info_dissatisfaction 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_info_dissatisfaction` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_info_gifttax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_info_gifttax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`) USING BTREE,
  KEY `no` (`no`,`main`,`sub`) USING BTREE,
  KEY `s_date` (`schedule_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=257 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_inheritanceTax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_inheritanceTax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_inheritance_ex 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_inheritance_ex` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_inner_community 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_inner_community` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_insurance_ex 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_insurance_ex` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=321 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_local_ex 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_local_ex` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=324 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_loTax_acquisition01 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_loTax_acquisition01` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_member_notice 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_member_notice` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=1004 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_merger_split 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_merger_split` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nationalTax_foreign 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nationalTax_foreign` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=815 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nationalTax_income01 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nationalTax_income01` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nationalTax_income02 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nationalTax_income02` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nati_Tax_corpo02 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nati_Tax_corpo02` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nati_Tax_immovable01 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nati_Tax_immovable01` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nati_Tax_immovable02 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nati_Tax_immovable02` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nati_Tax_legacy01 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nati_Tax_legacy01` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nati_Tax_legacy02 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nati_Tax_legacy02` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nati_Tax_restrict01 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nati_Tax_restrict01` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nati_Tax_restrict01_ 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nati_Tax_restrict01_` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nati_Tax_special01 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nati_Tax_special01` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nati_Tax_supertax01 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nati_Tax_supertax01` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nati_Tax_supertax02 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nati_Tax_supertax02` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nati_Tax_transfer01 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nati_Tax_transfer01` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_nati_Tax_transfer02 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_nati_Tax_transfer02` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_newarticle 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_newarticle` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_new_biz_normal 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_new_biz_normal` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_outsourcing 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_outsourcing` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_overseas_iv 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_overseas_iv` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_oversea_bbs 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_oversea_bbs` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_paytable 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_paytable` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_prev_priceTax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_prev_priceTax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_qna_gsy 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_qna_gsy` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_qna_sub 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_qna_sub` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_report_obligation 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_report_obligation` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_revisedtaxlaw 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_revisedtaxlaw` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_semu 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_semu` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` int(11) NOT NULL DEFAULT '0' COMMENT '여분필드3 (순번)',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_semueng 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_semueng` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_service 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_service` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_startUp 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_startUp` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_stock_ex 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_stock_ex` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_submission 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_submission` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_supertax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_supertax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_taxes 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_taxes` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_taxInfo 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_taxInfo` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_taxInfo2 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_taxInfo2` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_taxInfo_stock 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_taxInfo_stock` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=520 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_taxspecial 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_taxspecial` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=215 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_tax_consult 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_tax_consult` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_tax_news 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_tax_news` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=928 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_tax_table 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_tax_table` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_tcbc1_11 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_tcbc1_11` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_tcbc1_12 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_tcbc1_12` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_tcbc1_13 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_tcbc1_13` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_tcbc1_14 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_tcbc1_14` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_tcbc1_15 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_tcbc1_15` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_tcbc2_10 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_tcbc2_10` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_tcbc2_11 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_tcbc2_11` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_test 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_test` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_testboard 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_testboard` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_testing 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_testing` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=295 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_tmp 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_tmp` (
  `boardid` varchar(60) NOT NULL,
  `linkurl` varchar(200) NOT NULL,
  `b_idx` int(11) unsigned NOT NULL,
  `subject` varchar(200) NOT NULL,
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `etc_yn` enum('Y','N') DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=euckr;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_total 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_total` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `board_id` varchar(30) NOT NULL COMMENT '게시판코드',
  `subject` varchar(255) NOT NULL COMMENT '제목',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) DEFAULT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `IX_HPK_BOARD` (`board_id`),
  KEY `IX_HPK_BOARD2` (`board_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34505 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_total2 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_total2` (
  `idx` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `board_id` varchar(30) NOT NULL COMMENT '게시판코드',
  `subject` varchar(255) NOT NULL COMMENT '제목',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) DEFAULT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `IX_HPK_BOARD` (`board_id`),
  KEY `IX_HPK_BOARD2` (`board_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33054 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_total_20241005 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_total_20241005` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `board_id` varchar(30) NOT NULL COMMENT '게시판코드',
  `subject` varchar(255) NOT NULL COMMENT '제목',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) DEFAULT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`) USING BTREE,
  KEY `IX_HPK_BOARD` (`board_id`) USING BTREE,
  KEY `IX_HPK_BOARD2` (`board_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=32865 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_transferTax 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_transferTax` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_transfer_income_ex 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_transfer_income_ex` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_travel_sector 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_travel_sector` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_utv_thumbs 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_utv_thumbs` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_vat_ex 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_vat_ex` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=328 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_ventureetc 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_ventureetc` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_ventureinvestor 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_ventureinvestor` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_venturestorck 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_venturestorck` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N' COMMENT '수정한 아이피',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_webfr_webzine 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_webfr_webzine` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_webzine 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_webzine` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=203 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_wholesale 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_wholesale` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_board_wise_pic_story 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_board_wise_pic_story` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sidx` int(10) unsigned DEFAULT '0' COMMENT '통합검색 일련번호',
  `no` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '정렬용 번호',
  `main` int(10) unsigned NOT NULL DEFAULT '99999999' COMMENT '원글번호',
  `sub` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '답글위치',
  `depth` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '답글깊이',
  `w_user` varchar(200) DEFAULT NULL COMMENT '글쓴사람',
  `r_user` varchar(200) DEFAULT NULL COMMENT '답글쓴사람',
  `name` varchar(20) DEFAULT NULL COMMENT '작성자명',
  `pass` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `homepage` varchar(100) DEFAULT NULL COMMENT '홈페이지',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일',
  `subject` varchar(100) DEFAULT NULL COMMENT '제목',
  `contents` mediumtext COMMENT '내용',
  `usereplyemail` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '답변시 메일받음',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'HTML 사용',
  `category` varchar(50) DEFAULT NULL COMMENT '게시판 카테고리',
  `uselock` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '글잠금',
  `hit` int(10) DEFAULT NULL COMMENT '조회수',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '여분필드1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '여분필드2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '여분필드3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '여분필드4',
  `etc_5` text COMMENT '여분필드5',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `schedule_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '스케줄일정',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '작성일',
  `upt_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  `upt_user_id` varchar(200) DEFAULT NULL COMMENT '수정 아이디',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정한 아이피',
  `etc_yn` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`idx`),
  KEY `no` (`no`,`main`,`sub`),
  KEY `s_date` (`schedule_date`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_catalog_files 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_catalog_files` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `b_idx` int(11) NOT NULL DEFAULT '0',
  `ori_name` varchar(100) NOT NULL DEFAULT '',
  `re_name` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(100) NOT NULL,
  `ext` varchar(10) NOT NULL DEFAULT '',
  `size` int(11) NOT NULL DEFAULT '0',
  `download` int(10) unsigned NOT NULL DEFAULT '0',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idx`),
  KEY `b_idx` (`b_idx`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=euckr COMMENT='제품카탈로그 파일';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_category 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_no` int(11) NOT NULL DEFAULT '0' COMMENT '번호',
  `cat_code` varchar(255) NOT NULL COMMENT '코드',
  `cat_name` varchar(255) NOT NULL COMMENT '이름',
  `location` varchar(500) DEFAULT NULL COMMENT '파일 위치',
  `cat_depth` int(11) NOT NULL DEFAULT '0' COMMENT '뎁스',
  `cat_sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '정렬순위',
  `cat_content` text NOT NULL COMMENT '내용',
  `cat_link_idx` int(11) NOT NULL DEFAULT '0' COMMENT '해당 값이 0이 아닌경우 현재 값인 cat_no로 이동',
  `cat_cont_idx` int(11) NOT NULL DEFAULT '0' COMMENT 'tbl_contents 의 idx 값',
  `cat_is_show` enum('Y','N') NOT NULL DEFAULT 'Y',
  `cat_board_id` varchar(255) DEFAULT NULL COMMENT '보드ID',
  `cat_news_id` varchar(255) DEFAULT NULL COMMENT '뉴스ID',
  `cat_report_type` int(11) DEFAULT '0' COMMENT '신고 ID',
  `cat_use_type` varchar(2) NOT NULL DEFAULT 'C' COMMENT '사용타입 (C=콘텐츠,B=보드,N=뉴스)',
  PRIMARY KEY (`cat_no`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr COMMENT='분류';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_category_banner 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_category_banner` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `cat_no` int(11) NOT NULL COMMENT '카테고리번호',
  `c_subject` varchar(100) NOT NULL COMMENT '제목',
  `c_image` varchar(50) NOT NULL COMMENT '이미지',
  `c_url` varchar(255) NOT NULL COMMENT '링크주소',
  `c_target` enum('_blank','_self','_top') NOT NULL DEFAULT '_self' COMMENT '타겟',
  `c_sort` int(11) NOT NULL COMMENT '정렬순서',
  `c_type` enum('1','2') NOT NULL COMMENT '배너타입',
  `c_date` date NOT NULL COMMENT '등록일자',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_category_call 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_category_call` (
  `cat_no` int(11) NOT NULL DEFAULT '0' COMMENT '번호',
  `cat_code` varchar(255) NOT NULL COMMENT '코드',
  `cat_name` varchar(255) NOT NULL COMMENT '이름',
  `location` varchar(500) DEFAULT NULL COMMENT '파일 위치',
  `cat_depth` int(11) NOT NULL DEFAULT '0' COMMENT '뎁스',
  `cat_sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '정렬순위',
  `cat_content` text NOT NULL COMMENT '내용',
  `cat_link_idx` int(11) NOT NULL DEFAULT '0' COMMENT '해당 값이 0이 아닌경우 현재 값인 cat_no로 이동',
  `cat_cont_idx` int(11) NOT NULL DEFAULT '0' COMMENT 'tbl_contents 의 idx 값',
  `cat_is_show` enum('Y','N') NOT NULL DEFAULT 'Y',
  `cat_board_id` varchar(255) DEFAULT NULL COMMENT '보드ID',
  `cat_news_id` varchar(255) DEFAULT NULL COMMENT '뉴스ID',
  `cat_report_type` int(11) DEFAULT '0' COMMENT '신고 ID',
  `cat_use_type` varchar(2) NOT NULL DEFAULT 'C' COMMENT '사용타입 (C=콘텐츠,B=보드,N=뉴스)'
) ENGINE=MyISAM DEFAULT CHARSET=euckr ROW_FORMAT=DYNAMIC COMMENT='분류';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_category_ch 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_category_ch` (
  `cat_no` int(11) NOT NULL DEFAULT '0' COMMENT '번호',
  `cat_code` varchar(255) NOT NULL COMMENT '코드',
  `cat_name` varchar(255) NOT NULL COMMENT '이름',
  `location` varchar(500) DEFAULT NULL COMMENT '파일 위치',
  `cat_depth` int(11) NOT NULL DEFAULT '0' COMMENT '뎁스',
  `cat_sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '정렬순위',
  `cat_content` text NOT NULL COMMENT '내용',
  `cat_link_idx` int(11) NOT NULL DEFAULT '0' COMMENT '해당 값이 0이 아닌경우 현재 값인 cat_no로 이동',
  `cat_cont_idx` int(11) NOT NULL DEFAULT '0' COMMENT 'tbl_contents 의 idx 값',
  `cat_is_show` enum('Y','N') NOT NULL DEFAULT 'Y',
  `cat_board_id` varchar(255) DEFAULT NULL COMMENT '보드ID',
  `cat_news_id` varchar(255) DEFAULT NULL COMMENT '뉴스ID',
  `cat_report_type` int(11) DEFAULT '0' COMMENT '신고 ID',
  `cat_use_type` varchar(2) NOT NULL DEFAULT 'C' COMMENT '사용타입 (C=콘텐츠,B=보드,N=뉴스)',
  PRIMARY KEY (`cat_no`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=euckr ROW_FORMAT=DYNAMIC;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_category_eng 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_category_eng` (
  `cat_no` int(11) NOT NULL DEFAULT '0' COMMENT '번호',
  `cat_code` varchar(255) NOT NULL COMMENT '코드',
  `cat_name` varchar(255) NOT NULL COMMENT '이름',
  `location` varchar(500) DEFAULT NULL COMMENT '파일 위치',
  `cat_depth` int(11) NOT NULL DEFAULT '0' COMMENT '뎁스',
  `cat_sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '정렬순위',
  `cat_content` text NOT NULL COMMENT '내용',
  `cat_link_idx` int(11) NOT NULL DEFAULT '0' COMMENT '해당 값이 0이 아닌경우 현재 값인 cat_no로 이동',
  `cat_cont_idx` int(11) NOT NULL DEFAULT '0' COMMENT 'tbl_contents 의 idx 값',
  `cat_is_show` enum('Y','N') NOT NULL DEFAULT 'Y',
  `cat_board_id` varchar(255) DEFAULT NULL COMMENT '보드ID',
  `cat_news_id` varchar(255) DEFAULT NULL COMMENT '뉴스ID',
  `cat_report_type` int(11) DEFAULT '0' COMMENT '신고 ID',
  `cat_use_type` varchar(2) NOT NULL DEFAULT 'C' COMMENT '사용타입 (C=콘텐츠,B=보드,N=뉴스)',
  PRIMARY KEY (`cat_no`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_category_fdicenter 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_category_fdicenter` (
  `cat_no` int(11) NOT NULL DEFAULT '0' COMMENT '번호',
  `cat_code` varchar(255) NOT NULL COMMENT '코드',
  `cat_name` varchar(255) NOT NULL COMMENT '이름',
  `location` varchar(500) DEFAULT NULL COMMENT '파일 위치',
  `cat_depth` int(11) NOT NULL DEFAULT '0' COMMENT '뎁스',
  `cat_sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '정렬순위',
  `cat_content` text NOT NULL COMMENT '내용',
  `cat_link_idx` int(11) NOT NULL DEFAULT '0' COMMENT '해당 값이 0이 아닌경우 현재 값인 cat_no로 이동',
  `cat_cont_idx` int(11) NOT NULL DEFAULT '0' COMMENT 'tbl_contents 의 idx 값',
  `cat_is_show` enum('Y','N') NOT NULL DEFAULT 'Y',
  `cat_board_id` varchar(255) DEFAULT NULL COMMENT '보드ID',
  `cat_news_id` varchar(255) DEFAULT NULL COMMENT '뉴스ID',
  `cat_report_type` int(11) DEFAULT '0' COMMENT '신고 ID',
  `cat_use_type` varchar(2) NOT NULL DEFAULT 'C' COMMENT '사용타입 (C=콘텐츠,B=보드,N=뉴스)'
) ENGINE=MyISAM DEFAULT CHARSET=euckr ROW_FORMAT=DYNAMIC;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_category_fdi_eng 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_category_fdi_eng` (
  `cat_no` int(11) NOT NULL DEFAULT '0' COMMENT '번호',
  `cat_code` varchar(255) NOT NULL COMMENT '코드',
  `cat_name` varchar(255) NOT NULL COMMENT '이름',
  `location` varchar(500) DEFAULT NULL COMMENT '파일 위치',
  `cat_depth` int(11) NOT NULL DEFAULT '0' COMMENT '뎁스',
  `cat_sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '정렬순위',
  `cat_content` text NOT NULL COMMENT '내용',
  `cat_link_idx` int(11) NOT NULL DEFAULT '0' COMMENT '해당 값이 0이 아닌경우 현재 값인 cat_no로 이동',
  `cat_cont_idx` int(11) NOT NULL DEFAULT '0' COMMENT 'tbl_contents 의 idx 값',
  `cat_is_show` enum('Y','N') NOT NULL DEFAULT 'Y',
  `cat_board_id` varchar(255) DEFAULT NULL COMMENT '보드ID',
  `cat_news_id` varchar(255) DEFAULT NULL COMMENT '뉴스ID',
  `cat_report_type` int(11) DEFAULT '0' COMMENT '신고 ID',
  `cat_use_type` varchar(2) NOT NULL DEFAULT 'C' COMMENT '사용타입 (C=콘텐츠,B=보드,N=뉴스)'
) ENGINE=MyISAM DEFAULT CHARSET=euckr ROW_FORMAT=DYNAMIC;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_category_hanpage 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_category_hanpage` (
  `cat_no` int(11) NOT NULL DEFAULT '0' COMMENT '번호',
  `cat_code` varchar(255) NOT NULL COMMENT '코드',
  `cat_name` varchar(255) NOT NULL COMMENT '이름',
  `location` varchar(500) DEFAULT NULL COMMENT '파일 위치',
  `cat_depth` int(11) NOT NULL DEFAULT '0' COMMENT '뎁스',
  `cat_sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '정렬순위',
  `cat_content` text NOT NULL COMMENT '내용',
  `cat_link_idx` int(11) NOT NULL DEFAULT '0' COMMENT '해당 값이 0이 아닌경우 현재 값인 cat_no로 이동',
  `cat_cont_idx` int(11) NOT NULL DEFAULT '0' COMMENT 'tbl_contents 의 idx 값',
  `cat_is_show` enum('Y','N') NOT NULL DEFAULT 'Y',
  `cat_board_id` varchar(255) DEFAULT NULL COMMENT '보드ID',
  `cat_news_id` varchar(255) DEFAULT NULL COMMENT '뉴스ID',
  `cat_report_type` int(11) DEFAULT '0' COMMENT '신고 ID',
  `cat_use_type` varchar(2) NOT NULL DEFAULT 'C' COMMENT '사용타입 (C=콘텐츠,B=보드,N=뉴스)'
) ENGINE=MyISAM DEFAULT CHARSET=euckr ROW_FORMAT=DYNAMIC COMMENT='분류';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_category_sns 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_category_sns` (
  `b_cat_no` int(11) NOT NULL DEFAULT '0' COMMENT '번호',
  `s_cat_no` int(11) NOT NULL DEFAULT '0' COMMENT '번호',
  `sns_url` varchar(255) NOT NULL COMMENT '이름',
  KEY `b_cat_no` (`b_cat_no`),
  KEY `s_cat_no` (`s_cat_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_category_venture 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_category_venture` (
  `cat_no` int(11) NOT NULL DEFAULT '0' COMMENT '번호',
  `cat_code` varchar(255) NOT NULL COMMENT '코드',
  `cat_name` varchar(255) NOT NULL COMMENT '이름',
  `location` varchar(500) DEFAULT NULL COMMENT '파일 위치',
  `cat_depth` int(11) NOT NULL DEFAULT '0' COMMENT '뎁스',
  `cat_sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '정렬순위',
  `cat_content` text NOT NULL COMMENT '내용',
  `cat_link_idx` int(11) NOT NULL DEFAULT '0' COMMENT '해당 값이 0이 아닌경우 현재 값인 cat_no로 이동',
  `cat_cont_idx` int(11) NOT NULL DEFAULT '0' COMMENT 'tbl_contents 의 idx 값',
  `cat_is_show` enum('Y','N') NOT NULL DEFAULT 'Y',
  `cat_board_id` varchar(255) DEFAULT NULL COMMENT '보드ID',
  `cat_news_id` varchar(255) DEFAULT NULL COMMENT '뉴스ID',
  `cat_report_type` int(11) DEFAULT '0' COMMENT '신고 ID',
  `cat_use_type` varchar(2) NOT NULL DEFAULT 'C' COMMENT '사용타입 (C=콘텐츠,B=보드,N=뉴스)'
) ENGINE=MyISAM DEFAULT CHARSET=euckr ROW_FORMAT=DYNAMIC COMMENT='분류';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_chat 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_chat` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) NOT NULL,
  `umsg` varchar(500) NOT NULL,
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rnum` varchar(50) NOT NULL DEFAULT '0',
  `ip` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=362 DEFAULT CHARSET=utf8 COMMENT='채팅';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_chat_log 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_chat_log` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(100) NOT NULL,
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rnum` varchar(50) NOT NULL DEFAULT '0',
  `ip` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=448 DEFAULT CHARSET=utf8 COMMENT='채팅로그';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_comment 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `boardid` varchar(20) NOT NULL COMMENT '게시판아이디',
  `board_idx` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '게시물번호',
  `prino` int(10) unsigned NOT NULL DEFAULT '0',
  `depno` smallint(6) unsigned NOT NULL DEFAULT '0',
  `user_id` varchar(200) NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `re_name` varchar(80) NOT NULL,
  `comment` text NOT NULL,
  `ip` varchar(24) DEFAULT NULL COMMENT '등록자IP',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
  PRIMARY KEY (`idx`),
  KEY `board_board_idx` (`boardid`,`board_idx`)
) ENGINE=MyISAM AUTO_INCREMENT=419 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_consulting 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_consulting` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `goods_idx` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '상담번호',
  `send_idx` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '보낸메일 번호',
  `goods_name` varchar(255) NOT NULL COMMENT '상담명',
  `category_idx` int(10) unsigned DEFAULT '0' COMMENT '카테고리번호',
  `category_name` varchar(255) DEFAULT NULL COMMENT '카테고리명',
  `option_idx` int(10) unsigned DEFAULT '0' COMMENT '이용권번호',
  `option_name` varchar(255) DEFAULT NULL COMMENT '이용권명',
  `price` int(11) DEFAULT '0' COMMENT '금액',
  `pay_method` varchar(30) DEFAULT NULL COMMENT '결제수단',
  `pay_price` int(11) DEFAULT '0' COMMENT '결제금액',
  `pay_point` int(11) DEFAULT '0' COMMENT '결제포인트',
  `save_point` int(11) DEFAULT '0' COMMENT '적립포인트',
  `mngr_idx` int(10) unsigned DEFAULT '0' COMMENT '담당세무사번호',
  `mngr_name` varchar(50) DEFAULT NULL COMMENT '담당세무사명',
  `app_date` datetime DEFAULT NULL COMMENT '예약날짜',
  `app_minutes` int(11) DEFAULT '0' COMMENT '소요시간',
  `method` varchar(10) DEFAULT NULL COMMENT '상담방법',
  `user_id` varchar(30) NOT NULL COMMENT '사용자ID',
  `user_name` varchar(50) DEFAULT NULL COMMENT '성명',
  `phone` varchar(30) DEFAULT NULL COMMENT '연락처',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일주소',
  `company` varchar(255) DEFAULT NULL COMMENT '업체명',
  `com_kind` varchar(255) DEFAULT NULL COMMENT '업종업태',
  `com_regno` varchar(255) DEFAULT NULL COMMENT '사업자등록번호',
  `sales` varchar(255) DEFAULT NULL COMMENT '전년도매출',
  `addr` varchar(255) DEFAULT NULL COMMENT '주소',
  `subject` varchar(255) DEFAULT NULL COMMENT '제목',
  `contents` longtext COMMENT '내용',
  `contents2` longtext COMMENT '추가내용',
  `send_contents` longtext COMMENT 'sendmail 답변',
  `etc01` varchar(255) NOT NULL DEFAULT '' COMMENT '기타옵션',
  `status` varchar(30) NOT NULL COMMENT '진행상태',
  `send_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'sendmail 전송여부',
  `send_kakao_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '카카오 전송여부',
  `hidden_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'sendmail 감춤여부',
  `comp_date` datetime DEFAULT NULL COMMENT '완료일시',
  `cancel_date` datetime DEFAULT NULL COMMENT '취소일시',
  `pay_date` datetime DEFAULT NULL COMMENT '결제일시',
  `remark` longtext COMMENT '비고',
  `tid` varchar(255) DEFAULT NULL COMMENT 'TID 저장값',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=3472 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_consult_category 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_consult_category` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `consult_idx` int(10) unsigned NOT NULL COMMENT '상담번호',
  `category_name` varchar(255) NOT NULL COMMENT '카테고리명',
  `contents` longtext COMMENT '내용',
  `contents1` longtext COMMENT '내용1',
  `checklist` longtext COMMENT '체크리스트',
  `file_name` varchar(255) DEFAULT NULL COMMENT '파일명',
  `file_name_saved` varchar(255) DEFAULT NULL COMMENT '등록파일명',
  `file_size` int(11) DEFAULT NULL COMMENT '파일크기',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) DEFAULT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=365 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_consult_info 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_consult_info` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `consult_name` varchar(255) NOT NULL COMMENT '상담명',
  `subject` varchar(255) DEFAULT NULL COMMENT '소개',
  `contents` longtext COMMENT '내용',
  `category_yn` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '업무구분여부',
  `option_yn` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '이용권여부',
  `use_yn` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '사용여부',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) DEFAULT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_contents 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_contents` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `cat_no` int(10) unsigned NOT NULL COMMENT '메뉴번호',
  `subject` varchar(255) DEFAULT NULL COMMENT '컨텐츠명',
  `is_use` enum('Y','N') NOT NULL COMMENT '사용여부',
  `sort` int(11) NOT NULL COMMENT '순서번호',
  `cont_type` varchar(30) NOT NULL COMMENT '컨텐츠유형',
  `cont_detail_type` varchar(30) NOT NULL COMMENT '세부 컨텐츠 타입',
  `site_idno` int(10) unsigned DEFAULT NULL COMMENT '사이트번호',
  `board_kl_type` varchar(64) DEFAULT NULL COMMENT '한페이지 게시판타입',
  `boardid` varchar(30) DEFAULT NULL COMMENT '게시판코드',
  `news_code` varchar(30) DEFAULT NULL COMMENT 'ajax뉴스코드',
  `calc_code` varchar(30) DEFAULT NULL COMMENT '세금계산기코드',
  `tf_code` varchar(30) DEFAULT NULL COMMENT '신고의뢰코드',
  `tcs_code` varchar(30) DEFAULT NULL COMMENT '신고의뢰코드(new)',
  `program_code` varchar(30) DEFAULT NULL COMMENT '프로그램코드',
  `contents` longtext COMMENT '내용',
  `work_request_num` varchar(50) DEFAULT NULL COMMENT '업무의뢰 수',
  `work_request_member` varchar(255) DEFAULT NULL COMMENT '업무의뢰 멤버',
  `link_url` varchar(255) DEFAULT NULL COMMENT '연결URL',
  `setval` longtext COMMENT '기타속성',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idx`),
  KEY `IX_HPK_CONTENTS` (`is_use`,`cat_no`,`sort`,`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=1234 DEFAULT CHARSET=utf8 COMMENT='컨텐츠';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_coupon 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_coupon` (
  `idx` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(250) NOT NULL,
  `coupon_sdate` date NOT NULL,
  `coupon_edate` date NOT NULL,
  `coupon_dis` double NOT NULL,
  `coupon_unit` enum('P','F') NOT NULL DEFAULT 'P',
  `coupon_qty` int(11) unsigned NOT NULL DEFAULT '0',
  `over_price` double NOT NULL,
  `under_price` double NOT NULL,
  `coupon_content` text NOT NULL,
  `member_coupon` enum('Y','N') NOT NULL DEFAULT 'N',
  `cat_no` int(10) unsigned NOT NULL,
  `cat_code` varchar(255) NOT NULL,
  `wdate` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_course 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_course` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `b_subject` varchar(100) NOT NULL COMMENT '제목',
  `b_image` varchar(50) NOT NULL COMMENT '이미지',
  `b_url` varchar(255) NOT NULL COMMENT '링크주소',
  `b_target` enum('_blank','_self','_top') NOT NULL DEFAULT '_self' COMMENT '타겟',
  `b_show` enum('Y','N') NOT NULL COMMENT '표시여부',
  `b_sort` int(11) NOT NULL COMMENT '정렬순서',
  `b_type` tinyint(4) NOT NULL COMMENT '배너타입',
  `b_hit` int(11) NOT NULL COMMENT '클릭수',
  `b_brand` int(11) DEFAULT NULL,
  `b_date` date NOT NULL COMMENT '등록일자',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=euckr COMMENT='배너관리';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_giftcard 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_giftcard` (
  `idx` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `giftcard_name` varchar(250) NOT NULL,
  `giftcard_sdate` date NOT NULL,
  `giftcard_edate` date NOT NULL,
  `giftcard_dis` double NOT NULL,
  `giftcard_unit` enum('P','F') NOT NULL DEFAULT 'P',
  `giftcard_qty` int(11) unsigned NOT NULL DEFAULT '0',
  `over_price` double NOT NULL,
  `under_price` double NOT NULL,
  `giftcard_content` text NOT NULL,
  `cat_no` int(10) unsigned NOT NULL,
  `cat_code` varchar(200) NOT NULL,
  `wdate` datetime NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_giftcard_send 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_giftcard_send` (
  `idx` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mgf_idx` int(11) unsigned NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `send_name` varchar(40) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `memo` text NOT NULL,
  `mail_sms` char(2) NOT NULL,
  `wdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idx`),
  KEY `mgf_idx` (`mgf_idx`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_html_contents 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_html_contents` (
  `idx` int(8) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL DEFAULT '',
  `subject` varchar(50) NOT NULL DEFAULT '',
  `usehtml` enum('Y','N') NOT NULL DEFAULT 'Y',
  `contents` text NOT NULL,
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idx`),
  KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=euckr;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_ip_ban 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_ip_ban` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `ip` varchar(20) NOT NULL COMMENT '아이피',
  `reason` varchar(100) DEFAULT NULL COMMENT '이유',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
  PRIMARY KEY (`idx`) USING BTREE,
  UNIQUE KEY `a_id` (`ip`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=euckr ROW_FORMAT=DYNAMIC COMMENT='관리자 정보 테이블';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_mail_config 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_mail_config` (
  `code` varchar(30) NOT NULL COMMENT '코드',
  `code_subject` varchar(200) NOT NULL,
  `is_use` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '사용여부',
  `subject` varchar(255) NOT NULL COMMENT '제목',
  `contents` mediumtext NOT NULL COMMENT '내용',
  `is_use_m` enum('Y','N') NOT NULL DEFAULT 'N',
  `m_subject` varchar(100) NOT NULL,
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr COMMENT='메일발송 내용설정';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_mail_contents 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_mail_contents` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `subject` varchar(100) NOT NULL COMMENT '제목',
  `contents` mediumtext NOT NULL COMMENT '내용',
  `status` enum('WAIT','SEND','FINISH') NOT NULL DEFAULT 'WAIT' COMMENT '처리상태',
  `w_date` datetime NOT NULL COMMENT '입력일',
  `s_date` datetime NOT NULL COMMENT '발송시작일',
  `e_date` datetime NOT NULL COMMENT '발송종료일',
  `total` int(10) unsigned NOT NULL COMMENT '발송해야할 메일수',
  `send_total` int(11) NOT NULL COMMENT '발송완료',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr COMMENT='메일내용';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_mail_email 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_mail_email` (
  `idx` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `c_idx` int(10) unsigned NOT NULL COMMENT 'tbl_mail_contents_idx',
  `name` varchar(30) NOT NULL COMMENT '이름',
  `email` varchar(50) NOT NULL COMMENT '메일주소',
  `chk` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '발신여부',
  PRIMARY KEY (`idx`),
  KEY `c_idx` (`c_idx`),
  KEY `c_idx_chk` (`c_idx`,`chk`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr COMMENT='메일발송 목록';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_manager 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_manager` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `mngr_type` varchar(50) DEFAULT NULL COMMENT '구성원 타입',
  `gender` varchar(50) DEFAULT NULL COMMENT '성별',
  `type_code` varchar(30) NOT NULL COMMENT '구분',
  `mngr_name` varchar(50) NOT NULL COMMENT '성명',
  `eng_mngr_name` varchar(50) NOT NULL COMMENT '영문 성명',
  `mngr_position` varchar(50) NOT NULL COMMENT '직책',
  `eng_mngr_position` varchar(50) NOT NULL COMMENT '영문 직책',
  `mngr_headquarters` varchar(50) NOT NULL COMMENT '본부',
  `mngr_team` varchar(50) NOT NULL COMMENT '팀',
  `user_id` varchar(50) NOT NULL,
  `mngr_level` int(8) NOT NULL DEFAULT '0' COMMENT '팀장레벨',
  `counsel_level` int(8) NOT NULL DEFAULT '0' COMMENT '상담문의 구분',
  `mngr_history` int(8) NOT NULL DEFAULT '0' COMMENT '경력',
  `work_exp` varchar(10) DEFAULT NULL COMMENT '경력 시작 연차',
  `bran_name` varchar(255) DEFAULT NULL COMMENT '지점명',
  `phone` varchar(30) DEFAULT NULL COMMENT '연락처',
  `tel` varchar(30) DEFAULT NULL COMMENT '회사전화',
  `fax` varchar(30) DEFAULT NULL COMMENT '팩스',
  `email` varchar(100) DEFAULT NULL COMMENT '이메일주소',
  `cs_zoom_url` varchar(255) DEFAULT NULL COMMENT 'zoom url',
  `cs_zoom_id` varchar(100) DEFAULT NULL COMMENT 'zoom id',
  `cs_zoom_pw` varchar(30) DEFAULT NULL COMMENT 'zoom pw',
  `cs_zoom_use` varchar(30) DEFAULT NULL COMMENT 'zoom on off',
  `current_position` longtext COMMENT '현재 지위',
  `info1` longtext COMMENT '상단문구',
  `info2` longtext COMMENT '정보2',
  `info3` longtext COMMENT '정보3',
  `info4` longtext COMMENT '정보4',
  `info5` longtext COMMENT '정보5',
  `info6` longtext COMMENT '정보6',
  `info7` longtext COMMENT '정보7',
  `info8` longtext COMMENT '정보8',
  `info9` longtext COMMENT '정보9',
  `eng_current_position` longtext COMMENT '영문_현재 지위',
  `eng_info1` longtext COMMENT '영문_상단문구',
  `eng_info2` longtext COMMENT '영문_학력',
  `eng_info3` longtext COMMENT '영문_세무기수',
  `eng_info4` longtext COMMENT '영문_업무경력',
  `eng_info5` longtext COMMENT '영문_연구자료',
  `eng_info6` longtext COMMENT '영문_관심사항',
  `eng_info7` longtext COMMENT '영문_특기',
  `file_name` varchar(255) DEFAULT NULL COMMENT '사진파일명',
  `face_size` varchar(8) DEFAULT 'm' COMMENT '사진상 얼굴 크기 타입',
  `goods_category` varchar(500) DEFAULT NULL COMMENT '상담업무',
  `ord_no` int(11) NOT NULL DEFAULT '0' COMMENT '순서번호',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=143 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_manager_eng 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_manager_eng` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `mngr_idx` int(10) NOT NULL DEFAULT '0' COMMENT '세무사 번호',
  `mngr_type` varchar(50) DEFAULT NULL COMMENT '구성원 타입',
  `type_code` varchar(30) NOT NULL COMMENT '구분',
  `mngr_name` varchar(50) NOT NULL COMMENT '성명',
  `mngr_position` varchar(50) NOT NULL COMMENT '직책',
  `user_id` varchar(50) NOT NULL,
  `mngr_level` int(8) NOT NULL DEFAULT '0' COMMENT '팀장레벨',
  `bran_name` varchar(255) DEFAULT NULL COMMENT '지점명',
  `info1` longtext COMMENT '정보1',
  `info2` longtext COMMENT '정보2',
  `info3` longtext COMMENT '정보3',
  `info4` longtext COMMENT '정보4',
  `info5` longtext COMMENT '정보5',
  `info6` longtext COMMENT '정보6',
  `info7` longtext COMMENT '정보7',
  `info8` longtext COMMENT '정보8',
  `info9` longtext COMMENT '정보9',
  `file_name` varchar(255) DEFAULT NULL COMMENT '사진파일명',
  `goods_category` varchar(500) DEFAULT NULL COMMENT '상담업무',
  `ord_no` int(11) NOT NULL DEFAULT '0' COMMENT '순서번호',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idx`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_manager_off 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_manager_off` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `manager_idx` int(10) unsigned NOT NULL COMMENT '세무사일련번호',
  `off_date` date NOT NULL COMMENT '휴무일',
  `off_time` varchar(30) DEFAULT NULL COMMENT '휴무시간',
  `reason` varchar(500) DEFAULT NULL COMMENT '휴무사유',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_member 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_member` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `user_id` varchar(200) NOT NULL,
  `user_pw` varchar(20) DEFAULT NULL COMMENT '비밀번호',
  `regnum1` varchar(6) DEFAULT NULL COMMENT '주민번호앞',
  `regnum2` varchar(32) DEFAULT NULL COMMENT '주민번호뒤',
  `user_name` varchar(50) NOT NULL COMMENT '이름',
  `user_status` tinyint(4) DEFAULT '0' COMMENT '상태',
  `user_level` tinyint(4) DEFAULT NULL COMMENT '유저등급',
  `user_memo` text COMMENT '하시고 싶은 말',
  `company` varchar(100) DEFAULT NULL COMMENT '회사(학교)',
  `department` varchar(100) DEFAULT NULL COMMENT '부서(학과)',
  `duty` varchar(50) DEFAULT NULL COMMENT '직위',
  `birth` date DEFAULT '0000-00-00' COMMENT '생일',
  `solar` enum('S','L','E') DEFAULT 'E' COMMENT '양/음',
  `sex` enum('M','F') NOT NULL DEFAULT 'M' COMMENT '성별',
  `email` varchar(200) DEFAULT NULL,
  `zip` varchar(7) NOT NULL COMMENT '우편번호',
  `address` varchar(255) NOT NULL COMMENT '주소',
  `address_ext` varchar(255) NOT NULL COMMENT '상세주소',
  `address_type` enum('자택','직장') DEFAULT '자택' COMMENT '주소위치',
  `phone` varchar(30) NOT NULL COMMENT '전화',
  `mobile` varchar(30) NOT NULL COMMENT '핸드폰',
  `fax` varchar(30) DEFAULT NULL COMMENT '팩스',
  `f_cat` varchar(255) DEFAULT NULL COMMENT '관심분야',
  `f_product` varchar(255) DEFAULT NULL COMMENT '관심제품',
  `email_accept` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '메일수신 여부',
  `email_accept_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '메일수신 동의일자',
  `sms_accept` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'SMS 수신여부',
  `sms_accept_date` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'SMS 수신 허용일',
  `marriage` enum('Y','N','E') DEFAULT 'E' COMMENT '결혼여부',
  `marriage_date` date DEFAULT NULL COMMENT '결혼기념일',
  `job` varchar(20) DEFAULT NULL COMMENT '직업',
  `etc_1` varchar(255) DEFAULT NULL COMMENT '기타1',
  `etc_2` varchar(255) DEFAULT NULL COMMENT '기타2',
  `etc_3` varchar(255) DEFAULT NULL COMMENT '기타3',
  `etc_4` varchar(255) DEFAULT NULL COMMENT '기타4',
  `etc_5` varchar(255) DEFAULT NULL COMMENT '기타5',
  `etc_6` varchar(255) DEFAULT NULL COMMENT '기타6',
  `etc_7` varchar(255) DEFAULT NULL COMMENT '기타7',
  `etc_8` varchar(255) DEFAULT NULL COMMENT '기타8',
  `etc_9` varchar(255) DEFAULT NULL COMMENT '기타9',
  `etc_10` varchar(255) DEFAULT NULL COMMENT '기타10',
  `login_count` int(11) NOT NULL DEFAULT '0' COMMENT '로그인횟수',
  `login_last` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '마지막 로그인',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '가입일',
  `udate` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '수정일',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2297 DEFAULT CHARSET=euckr COMMENT='회원정보';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_member_address 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_member_address` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `d_addr` enum('Y','N') NOT NULL DEFAULT 'N',
  `shipping` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `zip` varchar(7) NOT NULL,
  `address` varchar(255) NOT NULL,
  `address_ext` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idx`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_member_baby 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_member_baby` (
  `idx` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `user_id` varchar(200) NOT NULL COMMENT '아이디',
  `babyname` varchar(80) NOT NULL COMMENT '자녀이름',
  `prenatal` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '출생전후',
  `sex` enum('M','F','N') NOT NULL DEFAULT 'N' COMMENT '성별',
  `birth` date NOT NULL DEFAULT '0000-00-00' COMMENT '생년월일',
  `children` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '대표자녀',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
  PRIMARY KEY (`idx`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_member_level 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_member_level` (
  `idx` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `level_no` tinyint(3) unsigned NOT NULL COMMENT '등급번호',
  `level_name` varchar(50) NOT NULL COMMENT '등급이름',
  `level_point` smallint(2) NOT NULL DEFAULT '0',
  `level_price` double NOT NULL DEFAULT '0',
  `coupon1` smallint(2) NOT NULL DEFAULT '0',
  `coupon2` smallint(2) NOT NULL DEFAULT '0',
  `favor1` smallint(2) NOT NULL DEFAULT '0',
  `favor2` smallint(2) NOT NULL DEFAULT '0',
  `favor1_ea` smallint(2) NOT NULL DEFAULT '0',
  `wdate` datetime NOT NULL COMMENT '등록일자',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `level_no` (`level_no`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=euckr COMMENT='회원등급 정보';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_member_point_log 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_member_point_log` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `order_idx` int(10) unsigned DEFAULT NULL COMMENT '신청번호',
  `user_id` varchar(30) DEFAULT NULL COMMENT '사용자ID',
  `pay_method` varchar(30) NOT NULL COMMENT '결제수단',
  `price` int(11) NOT NULL COMMENT '결제금액',
  `reci_message` longtext COMMENT '수신메시지',
  `status` varchar(30) NOT NULL DEFAULT '1' COMMENT '결제상태',
  `cancel_date` datetime DEFAULT NULL COMMENT '취소일시',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) NOT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=613 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_mycoupon 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_mycoupon` (
  `idx` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `e_idx` int(11) unsigned NOT NULL,
  `g_idx` int(11) unsigned NOT NULL,
  `coupon_no` varchar(40) NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_content` text NOT NULL,
  `coupon_dis` double NOT NULL,
  `coupon_unit` enum('P','F') NOT NULL DEFAULT 'F',
  `coupon_sdate` date NOT NULL,
  `coupon_edate` date NOT NULL,
  `coupon_use` enum('Y','N') NOT NULL DEFAULT 'N',
  `over_price` double NOT NULL DEFAULT '0',
  `under_price` double NOT NULL DEFAULT '0',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `udate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `unique_coupon` (`coupon_no`),
  KEY `user_id` (`user_id`),
  KEY `e_idx` (`e_idx`),
  KEY `g_idx` (`g_idx`)
) ENGINE=MyISAM AUTO_INCREMENT=11315 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_mygiftcard 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_mygiftcard` (
  `idx` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `e_idx` int(11) unsigned NOT NULL,
  `g_idx` int(11) unsigned NOT NULL,
  `giftcard_no` varchar(40) NOT NULL,
  `giftcard_name` varchar(255) NOT NULL,
  `giftcard_content` text NOT NULL,
  `giftcard_dis` double NOT NULL,
  `giftcard_unit` enum('P','F') NOT NULL DEFAULT 'F',
  `giftcard_sdate` date NOT NULL,
  `giftcard_edate` date NOT NULL,
  `giftcard_use` enum('Y','N') NOT NULL DEFAULT 'N',
  `over_price` double NOT NULL DEFAULT '0',
  `under_price` double NOT NULL DEFAULT '0',
  `order_no` varchar(100) NOT NULL,
  `send_gb` enum('Y','N') NOT NULL DEFAULT 'N',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `udate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `unique_giftcard` (`giftcard_no`),
  KEY `user_id` (`user_id`),
  KEY `e_idx` (`e_idx`),
  KEY `g_idx` (`g_idx`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_one_to_one 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_one_to_one` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `user_id` varchar(200) NOT NULL COMMENT '아이디',
  `user_name` varchar(50) NOT NULL COMMENT '이름',
  `status` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '처리상태',
  `subject` varchar(100) NOT NULL COMMENT '제목',
  `q_type` tinyint(4) NOT NULL COMMENT '문의타입',
  `contents` text NOT NULL COMMENT '내용',
  `re_contents` text NOT NULL COMMENT '답변내용',
  `ip` varchar(40) NOT NULL COMMENT 'IP 주소',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '신청일',
  `rdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '처리일',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=euckr;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_online_files 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_online_files` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `boardid` varchar(30) NOT NULL,
  `b_idx` int(11) NOT NULL DEFAULT '0',
  `ori_name` varchar(100) NOT NULL,
  `re_name` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `ext` varchar(10) NOT NULL,
  `size` int(11) NOT NULL DEFAULT '0',
  `download` int(10) unsigned NOT NULL DEFAULT '0',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idx`),
  KEY `boardid_b_idx` (`boardid`,`b_idx`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_online_form 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_online_form` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `o_type` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '자료신청,견적신청,제품등록',
  `p_name` varchar(100) NOT NULL COMMENT '문의제품',
  `user_id` varchar(20) NOT NULL COMMENT '아이디',
  `user_name` varchar(50) NOT NULL COMMENT '이름',
  `status` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '처리상태',
  `company` varchar(100) NOT NULL COMMENT '회사(학교)',
  `department` varchar(100) NOT NULL COMMENT '부서(학과)',
  `duty` varchar(50) NOT NULL COMMENT '직위',
  `email` varchar(100) NOT NULL COMMENT '이메일',
  `zip` varchar(7) NOT NULL COMMENT '우편번호',
  `address` varchar(255) NOT NULL COMMENT '주소',
  `address_ext` varchar(255) NOT NULL COMMENT '상세주소',
  `phone` varchar(30) NOT NULL COMMENT '전화',
  `mobile` varchar(30) NOT NULL COMMENT '핸드폰',
  `fax` varchar(30) NOT NULL COMMENT '팩스',
  `f_cat` varchar(255) NOT NULL COMMENT '신청분야(서비스,제품등록)',
  `f_product` varchar(255) NOT NULL COMMENT '관심제품',
  `reply_type` enum('EMAIL','PHONE') NOT NULL DEFAULT 'EMAIL' COMMENT '답변방식',
  `contents` text NOT NULL COMMENT '내용',
  `re_contents` text NOT NULL COMMENT '답변내용',
  `model` varchar(100) NOT NULL COMMENT '서비스 신청모델',
  `serial` varchar(100) NOT NULL COMMENT '시리얼번호',
  `ip` varchar(40) NOT NULL COMMENT 'IP 주소',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '신청일',
  `rdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '처리일',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr COMMENT='온라인자료,견적,제품등록';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_pay 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_pay` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `consult_idx` int(10) unsigned NOT NULL COMMENT '상담번호',
  `pay_name` varchar(255) DEFAULT NULL COMMENT '이용권명',
  `price` int(11) NOT NULL DEFAULT '0' COMMENT '가격',
  `value` varchar(500) DEFAULT NULL COMMENT '적용값',
  `use_yn` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '사용여부',
  `reg_date` datetime NOT NULL COMMENT '등록일시',
  `reg_user_id` varchar(30) DEFAULT NULL COMMENT '등록ID',
  `reg_ip` varchar(20) NOT NULL COMMENT '등록IP',
  `upt_date` datetime DEFAULT NULL COMMENT '수정일시',
  `upt_user_id` varchar(30) DEFAULT NULL COMMENT '수정ID',
  `upt_ip` varchar(20) DEFAULT NULL COMMENT '수정IP',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_point 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_point` (
  `idx` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `user_id` varchar(200) NOT NULL,
  `minus` int(11) unsigned NOT NULL COMMENT '적립금 사용',
  `plus` int(11) unsigned NOT NULL COMMENT '적립금 지급',
  `nowpoint` int(11) unsigned NOT NULL COMMENT '현재 포인트',
  `wdate` datetime NOT NULL COMMENT '작성일',
  `ip` varchar(40) NOT NULL COMMENT '아이피',
  `contents` varchar(255) NOT NULL COMMENT '내용',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=euckr COMMENT='적립금 로그';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_policy 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_policy` (
  `policy_name` varchar(100) NOT NULL COMMENT '카테고리 이름',
  `policy_contents` text COMMENT '내용'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_popup 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_popup` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL COMMENT '팝업제목',
  `contents` mediumtext NOT NULL COMMENT '콘텐츠',
  `width` varchar(50) NOT NULL COMMENT '가로',
  `height` varchar(50) NOT NULL COMMENT '세로',
  `p_lang` int(11) NOT NULL DEFAULT '0' COMMENT '0=국문,1=영문, 나머지는 추가할 경우 구분해줄것',
  `p_type` enum('IMG','HTML') NOT NULL DEFAULT 'IMG' COMMENT '이미지, HTML',
  `p_image` varchar(50) NOT NULL COMMENT '이미지명',
  `p_url` varchar(255) NOT NULL COMMENT '링크주소',
  `p_target` enum('O','B') NOT NULL DEFAULT 'O' COMMENT 'Opener, Blank',
  `s_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '시작일',
  `e_date` date NOT NULL DEFAULT '0000-00-00' COMMENT '종료일',
  `w_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '등록일',
  `pop_top` varchar(10) DEFAULT NULL,
  `pop_left` varchar(10) DEFAULT NULL,
  `p_mode` enum('P','L') NOT NULL DEFAULT 'P',
  PRIMARY KEY (`idx`),
  KEY `s_date` (`s_date`),
  KEY `e_date` (`e_date`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=euckr;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_product 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `cat_no` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '카테고리번호',
  `cat_code` varchar(255) NOT NULL COMMENT '카테고리코드',
  `p_name` varchar(255) NOT NULL COMMENT '제품이름',
  `memo` varchar(255) NOT NULL COMMENT '간략설명',
  `contents` mediumtext NOT NULL COMMENT '제품상세설명',
  `sort_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '정렬순서',
  `show_main` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '메인표시',
  `p_image` varchar(100) NOT NULL COMMENT '대표이미지',
  `etc_1` varchar(100) NOT NULL,
  `etc_2` varchar(100) NOT NULL,
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idx`),
  KEY `p_idx` (`cat_no`),
  KEY `e_idx` (`cat_code`),
  KEY `h_name` (`p_name`),
  KEY `sort_num` (`sort_num`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr COMMENT='제품정보';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_product_files 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_product_files` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `b_idx` int(11) NOT NULL DEFAULT '0',
  `ori_name` varchar(100) NOT NULL DEFAULT '',
  `re_name` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(100) NOT NULL,
  `ext` varchar(10) NOT NULL DEFAULT '',
  `size` int(11) NOT NULL DEFAULT '0',
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `download` int(10) unsigned NOT NULL DEFAULT '0',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idx`),
  KEY `b_idx` (`b_idx`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr COMMENT='제품정보 파일';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_cart 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_cart` (
  `c_idx` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `session_id` varchar(32) NOT NULL COMMENT '세션아이디',
  `user_id` varchar(200) NOT NULL,
  `g_idx` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '상품번호',
  `qty` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '수량',
  `opt_1` varchar(50) NOT NULL COMMENT '옵션',
  `opt_2` varchar(50) NOT NULL COMMENT '옵션',
  `opt_3` varchar(50) NOT NULL COMMENT '옵션',
  `opt_4` varchar(50) NOT NULL COMMENT '옵션',
  `opt_5` varchar(50) NOT NULL COMMENT '옵션',
  `opt_rel_1` varchar(50) NOT NULL COMMENT '연계옵션1',
  `opt_rel_2` varchar(50) NOT NULL COMMENT '연계옵션2',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '입력일자',
  PRIMARY KEY (`c_idx`),
  KEY `session_id` (`session_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=624 DEFAULT CHARSET=euckr COMMENT='장바구니 테이블';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_catalog_files 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_catalog_files` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `b_idx` int(11) NOT NULL DEFAULT '0',
  `ori_name` varchar(100) NOT NULL DEFAULT '',
  `re_name` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(100) NOT NULL,
  `ext` varchar(10) NOT NULL DEFAULT '',
  `size` int(11) NOT NULL DEFAULT '0',
  `download` int(10) unsigned NOT NULL DEFAULT '0',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idx`),
  KEY `b_idx` (`b_idx`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr COMMENT='상품카탈로그 파일';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_good 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_good` (
  `idx` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `cat_no` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '카테고리번호',
  `cat_code` varchar(255) NOT NULL COMMENT '카테고리코드',
  `g_code` varchar(30) NOT NULL COMMENT '상품코드',
  `g_name` varchar(255) NOT NULL COMMENT '상품명',
  `rel_g_idx` varchar(255) NOT NULL COMMENT '관련상품',
  `memo` text NOT NULL COMMENT '간략설명',
  `contents` mediumtext NOT NULL COMMENT '제품상세설명',
  `sort_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '정렬순서',
  `madein` varchar(50) NOT NULL COMMENT '원산지',
  `vendor` varchar(50) NOT NULL COMMENT '제조사',
  `brand` varchar(50) NOT NULL COMMENT '브랜드',
  `model` varchar(50) NOT NULL COMMENT '모델',
  `icons` text NOT NULL COMMENT '추가아이콘',
  `p_price` double NOT NULL DEFAULT '0',
  `sale_price` double NOT NULL DEFAULT '0' COMMENT '시중가',
  `price` double NOT NULL DEFAULT '0' COMMENT '판매가',
  `stock` int(11) NOT NULL COMMENT '재고량',
  `stock_type` enum('1','2','3','4') NOT NULL DEFAULT '1' COMMENT '재고관리 타입',
  `point` double NOT NULL COMMENT '포인트',
  `point_unit` enum('P','F') NOT NULL DEFAULT 'F' COMMENT '포인트지급방식(P:퍼센트,F:고정가)',
  `image_type` enum('1','2') NOT NULL DEFAULT '1' COMMENT '이미지 업로드 타입',
  `image_s` varchar(50) NOT NULL COMMENT '작은이미지(썸네일)',
  `image_m` varchar(50) NOT NULL COMMENT '중간이미지',
  `image_l` varchar(50) NOT NULL COMMENT '큰이미지(상세정보)',
  `p_image` varchar(100) NOT NULL COMMENT '대표이미지',
  `is_show` enum('Y','N') NOT NULL DEFAULT 'Y' COMMENT '상품진열여부',
  `main_show` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '메인노출여부',
  `brand_show` enum('Y','N') NOT NULL DEFAULT 'N',
  `special_show` enum('Y','N') NOT NULL DEFAULT 'N',
  `best_show` enum('Y','N') NOT NULL DEFAULT 'N',
  `mokcha` text NOT NULL COMMENT '목차',
  `author_name` varchar(50) NOT NULL COMMENT '저자',
  `author_text` text NOT NULL COMMENT '저자소개',
  `isbn` varchar(200) NOT NULL,
  `published_date` date NOT NULL COMMENT '발행일',
  `published_text` varchar(50) NOT NULL COMMENT '발행일관련 추가정보',
  `pages` varchar(200) NOT NULL,
  `pan_color` varchar(200) NOT NULL,
  `cdrom` enum('A','M','F') NOT NULL DEFAULT 'A',
  `movie` varchar(255) NOT NULL,
  `movie_url` varchar(255) NOT NULL COMMENT '동영상강좌 URL',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hit` int(11) NOT NULL COMMENT '조회수',
  `coupon_use` enum('Y','N') NOT NULL DEFAULT 'N',
  `coupon_dis` double NOT NULL,
  `coupon_unit` enum('P','F') NOT NULL DEFAULT 'F',
  `coupon_qty` smallint(6) unsigned NOT NULL,
  `coupon_limit` enum('N') DEFAULT NULL,
  `coupon_sdate` date NOT NULL,
  `coupon_edate` date NOT NULL,
  PRIMARY KEY (`idx`),
  KEY `author_name` (`author_name`),
  KEY `isbn` (`isbn`),
  KEY `published_date` (`published_date`),
  KEY `movie` (`movie`),
  KEY `g_name` (`g_name`),
  KEY `hit` (`hit`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=euckr COMMENT='상품정보';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_good_cat 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_good_cat` (
  `g_idx` int(11) NOT NULL DEFAULT '0',
  `cat_no` int(11) NOT NULL DEFAULT '0',
  `cat_code` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`g_idx`,`cat_no`),
  KEY `g_idx` (`g_idx`),
  KEY `cat_no` (`cat_no`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_good_files 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_good_files` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `b_idx` int(11) NOT NULL DEFAULT '0',
  `ori_name` varchar(100) NOT NULL DEFAULT '',
  `re_name` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(100) NOT NULL,
  `ext` varchar(10) NOT NULL DEFAULT '',
  `size` int(11) NOT NULL DEFAULT '0',
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `download` int(11) NOT NULL,
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idx`),
  KEY `b_idx` (`b_idx`)
) ENGINE=MyISAM AUTO_INCREMENT=243 DEFAULT CHARSET=euckr COMMENT='상품정보 파일';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_good_opt 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_good_opt` (
  `idx` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `g_idx` int(11) NOT NULL,
  `opt_1` varchar(100) NOT NULL,
  `opt_1_value` varchar(255) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`idx`),
  UNIQUE KEY `unique_key` (`g_idx`,`opt_1`,`opt_1_value`),
  KEY `p_idx` (`g_idx`),
  KEY `get_opt_info` (`g_idx`,`opt_1_value`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=euckr COMMENT='상품 옵션';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_good_opt_rel 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_good_opt_rel` (
  `idx` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `g_idx` int(11) NOT NULL,
  `opt_1` varchar(30) NOT NULL DEFAULT '',
  `opt_1_value` varchar(30) NOT NULL,
  `opt_2` varchar(30) NOT NULL DEFAULT '',
  `opt_2_value` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `stock` double unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `unique_key` (`g_idx`,`opt_1`,`opt_1_value`,`opt_2`,`opt_2_value`),
  KEY `p_idx` (`g_idx`),
  KEY `get_opt_info` (`g_idx`,`opt_1_value`,`opt_2_value`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr COMMENT='연계상품 옵션 및 재고';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_good_search 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_good_search` (
  `g_idx` int(11) NOT NULL DEFAULT '0',
  `cat_no` int(11) NOT NULL DEFAULT '0',
  `cat_code` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`g_idx`,`cat_no`),
  KEY `g_idx` (`g_idx`),
  KEY `cat_no` (`cat_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_opt 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_opt` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `opt_code` varchar(10) NOT NULL,
  `opt_name` varchar(100) NOT NULL,
  PRIMARY KEY (`idx`),
  KEY `opt_code` (`opt_code`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_opt_val 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_opt_val` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `opt_code` varchar(10) NOT NULL,
  `opt_value` varchar(200) NOT NULL,
  `opt_price` double NOT NULL,
  PRIMARY KEY (`idx`),
  UNIQUE KEY `unique_key` (`opt_code`,`opt_value`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_order_cart 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_order_cart` (
  `p_idx` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `c_idx` int(10) unsigned DEFAULT NULL COMMENT 'tbl_shop_cart_idx',
  `order_no` varchar(20) NOT NULL COMMENT '주문번호',
  `session_id` varchar(32) NOT NULL COMMENT '세션아이디',
  `user_id` varchar(200) NOT NULL,
  `g_idx` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '상품번호',
  `qty` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '수량',
  `opt_1` varchar(50) NOT NULL COMMENT '옵션',
  `opt_2` varchar(50) NOT NULL COMMENT '옵션',
  `opt_3` varchar(50) NOT NULL COMMENT '옵션',
  `opt_4` varchar(50) NOT NULL COMMENT '옵션',
  `opt_5` varchar(50) NOT NULL COMMENT '옵션',
  `opt_rel_1` varchar(50) NOT NULL COMMENT '연계옵션1',
  `opt_rel_2` varchar(50) NOT NULL COMMENT '연계옵션2',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '입력일자',
  PRIMARY KEY (`p_idx`),
  KEY `session_id` (`session_id`),
  KEY `user_id` (`user_id`),
  KEY `order_no` (`order_no`)
) ENGINE=MyISAM AUTO_INCREMENT=185 DEFAULT CHARSET=euckr COMMENT='주문직전 장바구니';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_order_good 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_order_good` (
  `idx` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `order_no` varchar(20) NOT NULL COMMENT '주문번호',
  `order_id` varchar(200) NOT NULL DEFAULT 'guest',
  `g_idx` int(11) unsigned NOT NULL COMMENT '상품 일련번호',
  `g_cat_no` int(11) NOT NULL COMMENT '상품 카테고리 번호',
  `g_code` varchar(30) NOT NULL COMMENT '상품코드',
  `g_name` varchar(255) NOT NULL COMMENT '상품이름',
  `g_vendor` varchar(50) NOT NULL COMMENT '제조사',
  `g_brand` varchar(50) NOT NULL COMMENT '브랜드',
  `g_model` varchar(50) NOT NULL COMMENT '모델명',
  `g_price` double NOT NULL DEFAULT '0' COMMENT '판매가',
  `g_qty` int(11) NOT NULL DEFAULT '0' COMMENT '구매수량',
  `g_point` int(11) NOT NULL DEFAULT '0' COMMENT '구매시 적립금',
  `g_opt_1` varchar(50) NOT NULL COMMENT '옵션1',
  `g_opt_1_price` double NOT NULL COMMENT '옵션1가격',
  `g_opt_2` varchar(50) NOT NULL COMMENT '옵션2',
  `g_opt_2_price` double NOT NULL COMMENT '옵션2가격',
  `g_opt_3` varchar(50) NOT NULL COMMENT '옵션3',
  `g_opt_3_price` double NOT NULL COMMENT '옵션3가격',
  `g_opt_4` varchar(50) NOT NULL COMMENT '옵션4',
  `g_opt_4_price` double NOT NULL COMMENT '옵션4가격',
  `g_opt_5` varchar(50) NOT NULL COMMENT '옵션5',
  `g_opt_5_price` double NOT NULL COMMENT '옵션5가격',
  `g_opt_rel_1` varchar(50) NOT NULL COMMENT '연계옵션1',
  `g_opt_rel_1_price` double NOT NULL COMMENT '연계옵션1가격',
  `g_opt_rel_2` varchar(50) NOT NULL COMMENT '연계옵션2',
  `g_opt_rel_2_price` double NOT NULL COMMENT '연계옵션2가격',
  `order_status` enum('O','X') NOT NULL DEFAULT 'X' COMMENT '주문상태(O:판매완료,X:판매대기)',
  PRIMARY KEY (`idx`),
  KEY `order_no` (`order_no`),
  KEY `order_id` (`order_id`),
  KEY `g_idx` (`g_idx`),
  KEY `order_status` (`order_status`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=euckr COMMENT='주문상품 정보 테이블';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_order_info 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_order_info` (
  `idx` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `order_no` varchar(20) NOT NULL COMMENT '주문번호',
  `order_summary` varchar(100) NOT NULL COMMENT '주문요약정보',
  `order_name` varchar(50) NOT NULL COMMENT '주문자명',
  `order_id` varchar(200) NOT NULL,
  `order_regnum1` varchar(6) NOT NULL COMMENT '비회원(주민번호앞)',
  `order_regnum2` varchar(32) NOT NULL COMMENT '비회원md5(주민번호뒤)',
  `order_phone` varchar(30) NOT NULL COMMENT '주문자 연락처',
  `order_mobile` varchar(30) NOT NULL COMMENT '주문자 핸드폰',
  `order_zip` varchar(7) NOT NULL COMMENT '주문자 우편번호',
  `order_address` varchar(100) NOT NULL COMMENT '주문자 주소',
  `order_address_ext` varchar(100) NOT NULL COMMENT '주문자 상세주소',
  `order_email` varchar(100) NOT NULL COMMENT '주문자 이메일',
  `ship_name` varchar(50) NOT NULL COMMENT '수취인명',
  `ship_phone` varchar(30) NOT NULL COMMENT '수취인 연락처',
  `ship_mobile` varchar(30) NOT NULL COMMENT '수취인 핸드폰',
  `ship_zip` varchar(7) NOT NULL COMMENT '수취인 우편번호',
  `ship_address` varchar(100) NOT NULL COMMENT '수취인 주소',
  `ship_address_ext` varchar(100) NOT NULL COMMENT '수취인 상세주소',
  `ship_email` varchar(200) NOT NULL,
  `charge_type` varchar(10) DEFAULT NULL,
  `pay_type` enum('cash','card','escrow','hp','online','cardnormal','virtualnormal','cardescrow','virtualescrow') DEFAULT NULL,
  `bank_type` varchar(50) NOT NULL COMMENT '은행계좌',
  `bank_name` varchar(30) NOT NULL COMMENT '입금자명',
  `bank_date` varchar(10) NOT NULL COMMENT '입금예정일',
  `using_point` double NOT NULL COMMENT '사용적립금',
  `using_point_idx` int(11) NOT NULL COMMENT '적립금테이블 idx',
  `add_point` double NOT NULL,
  `add_point_idx` int(11) NOT NULL,
  `coupon_amount` double NOT NULL,
  `coupon_idx` varchar(200) NOT NULL,
  `giftcard_idx` varchar(200) NOT NULL,
  `giftcard_amount` double NOT NULL,
  `ship_amount` double NOT NULL COMMENT '배송비',
  `birth_amount` double NOT NULL,
  `login_amount` double NOT NULL,
  `total_amount` double NOT NULL COMMENT '총 결제액(배송비,사용적립금제외)',
  `pay_amount` double NOT NULL COMMENT '실 결제금액',
  `order_date` datetime NOT NULL COMMENT '주문일시',
  `order_state` char(2) NOT NULL,
  `ipkum_date` date NOT NULL COMMENT '입금일자',
  `shipping_date` date NOT NULL COMMENT '배송일자',
  `shipping_company` varchar(100) NOT NULL COMMENT '택배사',
  `shipping_no` varchar(50) NOT NULL COMMENT '송장번호',
  `order_comment` varchar(255) NOT NULL COMMENT '주문자 메모',
  `admin_comment` text NOT NULL COMMENT '관리자메모',
  `claim_comment` text NOT NULL,
  `claim_date` datetime NOT NULL COMMENT '클레임발생일시',
  `handling_date` datetime NOT NULL COMMENT '클레임처리일시',
  `finish_date` datetime NOT NULL COMMENT '판매완료일시',
  `ip` varchar(40) NOT NULL COMMENT 'ip주소',
  `pay_point` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '적립금 지급여부',
  `pay_point_idx` int(11) NOT NULL COMMENT '적립금테이블 idx',
  `pay_point_date` datetime NOT NULL COMMENT '적립금 지금일',
  `stock_apply` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '재고처리여부',
  `stock_apply_date` datetime NOT NULL COMMENT '재고처리날짜',
  `tid` varchar(100) NOT NULL,
  `mail_sms` varchar(10) NOT NULL,
  `giftgb` char(1) NOT NULL,
  PRIMARY KEY (`idx`),
  UNIQUE KEY `order_no` (`order_no`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=euckr COMMENT='주문정보 테이블';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_review 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_review` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `g_idx` int(11) NOT NULL COMMENT '상품번호',
  `user_id` varchar(20) NOT NULL COMMENT '회원ID',
  `user_name` varchar(50) NOT NULL COMMENT '작성자명',
  `review_point` tinyint(4) NOT NULL COMMENT '점수',
  `subject` varchar(100) NOT NULL COMMENT '제목',
  `contents` text NOT NULL COMMENT '내용',
  `ip` varchar(40) NOT NULL COMMENT 'IP',
  `wdate` datetime NOT NULL COMMENT '작성일',
  PRIMARY KEY (`idx`),
  KEY `g_idx` (`g_idx`)
) ENGINE=MyISAM DEFAULT CHARSET=euckr;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_set 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_set` (
  `shop_name` varchar(100) NOT NULL COMMENT '쇼핑몰 이름',
  `eng_shop_name` varchar(100) DEFAULT NULL COMMENT '영문 이름',
  `shop_url` varchar(140) NOT NULL COMMENT '쇼핑몰 주소',
  `admin_email` varchar(200) NOT NULL,
  `shop_title` varchar(200) NOT NULL COMMENT '쇼핑몰 타이틀',
  `shop_keyword` text NOT NULL COMMENT '쇼핑몰 키워드',
  `shop_content` text NOT NULL COMMENT '쇼핑몰 소개글',
  `shop_payment` varchar(200) NOT NULL COMMENT '쇼핑몰 결제방법',
  `shop_pg_id` varchar(20) NOT NULL COMMENT 'pg 상점아이디',
  `shop_bankinfo` text NOT NULL COMMENT '은행계좌정보',
  `shop_delivery_company` varchar(100) NOT NULL COMMENT '택배사',
  `shop_delivery_url` varchar(100) NOT NULL COMMENT '배송추적',
  `shop_delivery_gb` char(1) NOT NULL COMMENT '배송정책',
  `shop_delivery_default` double NOT NULL DEFAULT '0' COMMENT '배송고정값',
  `shop_delivery_price` double NOT NULL DEFAULT '0' COMMENT '구매가기준',
  `shop_delivery_high` double NOT NULL DEFAULT '0' COMMENT '구매가이상',
  `shop_delivery_low` double NOT NULL DEFAULT '0' COMMENT '구매가이하',
  `shop_point_member` double NOT NULL DEFAULT '0' COMMENT '회원가입적립금',
  `shop_point_min` double NOT NULL DEFAULT '0' COMMENT '최소사용적립금',
  `shop_point_max` double NOT NULL DEFAULT '0' COMMENT '최대사용적립금 // 현재는 적립 %로 사용할 예정',
  `shop_badWord` text NOT NULL COMMENT '금지단어'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_shop_wish 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_shop_wish` (
  `c_idx` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `user_id` varchar(200) NOT NULL,
  `g_idx` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '상품번호',
  `wdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '입력일자',
  PRIMARY KEY (`c_idx`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=euckr COMMENT='위시리스트';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_websight_log 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_websight_log` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `browser` int(11) NOT NULL COMMENT 'tbl_websight_log_browser_idx',
  `domain` int(11) NOT NULL COMMENT 'tbl_websight_log_domain_idx',
  `referer` int(11) NOT NULL COMMENT 'tbl_websight_log_referer_idx',
  `ip` int(11) NOT NULL COMMENT 'tbl_websight_log_ip_idx',
  `searchengin` int(11) NOT NULL COMMENT 'tbl_websight_log_searchengin_idx',
  `keyword` int(11) NOT NULL COMMENT 'tbl_websight_log_keyword_idx',
  `os` int(11) NOT NULL COMMENT 'tbl_websight_log_os_idx',
  `page` int(11) NOT NULL COMMENT 'tbl_websight_log_page_idx',
  `wdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '접속시각',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=6394364 DEFAULT CHARSET=euckr COMMENT='접속로그';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_websight_log_browser 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_websight_log_browser` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `browser` varchar(30) DEFAULT NULL COMMENT '브라우저',
  `hit` int(11) NOT NULL DEFAULT '0' COMMENT '합계',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `browser` (`browser`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=euckr COMMENT='접속자 운영체제 정보';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_websight_log_counter 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_websight_log_counter` (
  `idx` int(11) NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `yyyy` year(4) DEFAULT NULL COMMENT '년도',
  `mm` char(2) DEFAULT NULL COMMENT '월',
  `dd` char(2) DEFAULT NULL COMMENT '일',
  `h0` int(11) DEFAULT '0',
  `h1` int(11) DEFAULT '0',
  `h2` int(11) DEFAULT '0',
  `h3` int(11) DEFAULT '0',
  `h4` int(11) DEFAULT '0',
  `h5` int(11) DEFAULT '0',
  `h6` int(11) DEFAULT '0',
  `h7` int(11) DEFAULT '0',
  `h8` int(11) DEFAULT '0',
  `h9` int(11) DEFAULT '0',
  `h10` int(11) DEFAULT '0',
  `h11` int(11) DEFAULT '0',
  `h12` int(11) DEFAULT '0',
  `h13` int(11) DEFAULT '0',
  `h14` int(11) DEFAULT '0',
  `h15` int(11) DEFAULT '0',
  `h16` int(11) DEFAULT '0',
  `h17` int(11) DEFAULT '0',
  `h18` int(11) DEFAULT '0',
  `h19` int(11) DEFAULT '0',
  `h20` int(11) DEFAULT '0',
  `h21` int(11) DEFAULT '0',
  `h22` int(11) DEFAULT '0',
  `h23` int(11) DEFAULT '0',
  `week` char(1) NOT NULL COMMENT '요일',
  `hit` int(11) DEFAULT '0' COMMENT '일합계',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `yyyy_mm_dd` (`yyyy`,`mm`,`dd`),
  KEY `yyyy` (`yyyy`),
  KEY `mm` (`mm`),
  KEY `dd` (`dd`)
) ENGINE=MyISAM AUTO_INCREMENT=623 DEFAULT CHARSET=euckr COMMENT='로그 카운터';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_websight_log_domain 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_websight_log_domain` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(100) DEFAULT NULL COMMENT '레퍼러 도메인',
  `hit` int(11) NOT NULL DEFAULT '0' COMMENT '합계',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `domain` (`domain`)
) ENGINE=MyISAM AUTO_INCREMENT=591 DEFAULT CHARSET=euckr COMMENT='레퍼러 도메인 정보';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_websight_log_init 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_websight_log_init` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '일련번호',
  `sid` varchar(200) NOT NULL COMMENT '세션ID',
  `ip` varchar(24) DEFAULT NULL COMMENT 'IP주소',
  `wdate` date NOT NULL DEFAULT '0000-00-00' COMMENT '기준일',
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=utf8;

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_websight_log_ip 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_websight_log_ip` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) DEFAULT NULL COMMENT '접속 IP',
  `hit` int(11) NOT NULL DEFAULT '0' COMMENT '합계',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `ip` (`ip`)
) ENGINE=MyISAM AUTO_INCREMENT=397367 DEFAULT CHARSET=euckr COMMENT='접속자 IP 정보';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_websight_log_keyword 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_websight_log_keyword` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(100) DEFAULT NULL COMMENT '검색 키워드',
  `hit` int(11) NOT NULL DEFAULT '0' COMMENT '합계',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `keyword` (`keyword`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=euckr COMMENT='검색 키워드';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_websight_log_os 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_websight_log_os` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `os` varchar(20) DEFAULT NULL COMMENT '운영체제',
  `hit` int(11) NOT NULL DEFAULT '0' COMMENT '합계',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `os` (`os`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=euckr COMMENT='접속자 운영체제 정보';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_websight_log_page 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_websight_log_page` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(255) DEFAULT NULL COMMENT '접속페이지 ',
  `hit` int(11) NOT NULL DEFAULT '0' COMMENT '합계',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `page` (`page`)
) ENGINE=MyISAM AUTO_INCREMENT=380962 DEFAULT CHARSET=euckr COMMENT='접속페이지';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_websight_log_referer 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_websight_log_referer` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `referer` varchar(255) DEFAULT NULL COMMENT '레퍼러 ',
  `hit` int(11) NOT NULL DEFAULT '0' COMMENT '합계',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `referer` (`referer`)
) ENGINE=MyISAM AUTO_INCREMENT=120066 DEFAULT CHARSET=euckr COMMENT='레퍼러 정보';

-- 내보낼 데이터가 선택되어 있지 않습니다.

-- 테이블 taxoffice2022.tbl_websight_log_searchengin 구조 내보내기
CREATE TABLE IF NOT EXISTS `tbl_websight_log_searchengin` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `searchengin` varchar(30) DEFAULT NULL COMMENT '검색엔진',
  `hit` int(11) NOT NULL DEFAULT '0' COMMENT '합계',
  PRIMARY KEY (`idx`),
  UNIQUE KEY `searchengin` (`searchengin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=euckr COMMENT='검색 엔진정보';

-- 내보낼 데이터가 선택되어 있지 않습니다.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
