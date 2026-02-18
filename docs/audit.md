# Audit Report (2026-02-12)

## 1) 엔트리포인트/라우팅/모듈 로딩 흐름 맵(파일 경로 기준)

### Public(Web) 공통 흐름
- 엔트리: `www/index.php:3`, `www/sub.php:3`
- 공통 부트스트랩: `www/common/conf/config.inc.php:3` -> `www/common/conf/dbconfig.inc.php`
- 모듈 로딩(메인):
  - `www/index.php:4` category lib
  - `www/index.php:5` contents lib
  - `www/index.php:6` board lib
  - `www/index.php:7` banner lib
- 모듈 라우팅(서브): `www/sub.php:64`
  - `cat_use_type=C` -> `www/module/contents/contents.php`
  - `cat_use_type=B` -> `www/module/board/menu_board.php`
  - `cat_use_type=N` -> `www/module/news/index.php` / `www/module/news/read.php`
- 동일 라우팅 재사용: `www/module/category/_menu.php:15`

### 멀티 사이트 변형(복제 구조)
- 엔트리 변형:
  - `www/eng/index.php:3` + `www/module/category/category_eng.lib.php`
  - `www/ch/index.php:3` + `www/module/category/category_ch.lib.php`
- 서브 변형:
  - `www/taxcall/sub/index.php:3` + `category_call.lib.php`
  - `www/fdicenter/sub/index.php:3` + `category_fdicenter.lib.php`
  - `www/venture/sub/index.php:3` + `category_venture.lib.php`
- 템플릿 include 경로 분기:
  - `www/taxcall/sub/index.php:8-9`
  - `www/fdicenter/sub/index.php:8-9`
  - `www/venture/sub/index.php:8-9` (여기서 `taxcall/pub/include` 재사용 결합 존재)

### Backoffice 흐름
- 엔트리: `www/backoffice/index.php:3`
- 인증 게이트: `www/backoffice/header.php:5` -> `www/backoffice/auth/auth.php`
- 메뉴/권한: `www/backoffice/header.php:11`, `www/backoffice/header_gnb.php`
- 기능 모듈: `/backoffice/module/*` 직접 진입 방식(파일 단위)

## 2) 도메인 경계 후보 + Common vs Shared vs Module 분리 기준(규칙화)

### 도메인 경계 후보
- `Menu/Category`: 메뉴 트리/노출/라우팅 (`module/category/*.lib.php`, `tbl_category*`)
- `Content`: 정적/설명형 콘텐츠 (`module/contents/*.php`, `tbl_contents`)
- `Board`: 게시판/첨부/댓글 (`module/board/*`, `tbl_board_*`, `tbl_board_files`)
- `Member/Auth`: 회원/세션/로그인 (`module/member/*`, `backoffice/auth/*`)
- `Presentation`: 사이트별 템플릿/에셋 (`*/pub/include/*`, `*/pub/js/*`, `*/pub/css/*`)

### 분리 기준(규칙)
- `Common`: DB 연결, 공통 함수, 전역 설정만 허용
  - 기준: 인프라/런타임 성격, 도메인 지식 없음
  - 위치: `www/common/conf/*`, `www/common/lib/*`
- `Shared`: 복수 도메인이 공통 사용하지만 도메인 중립인 코드
  - 기준: UI/헬퍼/유틸, 특정 메뉴/게시판 규칙 미포함
  - 위치(후보): `www/shared/*` (현재 없음, 도입 대상)
- `Module`: 도메인 규칙+데이터 접근+유스케이스 포함
  - 기준: `category/contents/board/member` 등 비즈니스 규칙 보유
  - 위치: `www/module/<domain>/*`

## 3) 겹치는 부분 TOP(중복 유틸/중복 쿼리/중복 템플릿/중복 CSS) + 근거

### TOP 1. 사이트별 JS 중복(동일 파일명 다중 복제)
- 근거:
  - `jquery-3.6.0.min.js` 8개 (`www/pub/js`, `www/eng/pub/js`, `www/ch/pub/js`, `www/fdi_eng/pub/js`, `www/fdicenter/pub/js`, `www/hanpage/pub/js`, `www/taxcall/pub/js`, `www/venture/pub/js`)
  - `main.js`, `main2.js`, `functions.js`, `grayscale.js`, `slick.min.js` 각각 8개

### TOP 2. pub/include 템플릿 중복
- 근거:
  - `head.php` 8개, `header.php` 8개, `footer.php` 8개, `nav.php` 8개
  - 경로군: `www/*/pub/include/*`

### TOP 3. category 모듈 lib 수평 복제
- 근거 파일:
  - `www/module/category/category.lib.php`
  - `www/module/category/category_call.lib.php`
  - `www/module/category/category_ch.lib.php`
  - `www/module/category/category_eng.lib.php`
  - `www/module/category/category_fdicenter.lib.php`
  - `www/module/category/category_fdi_eng.lib.php`
  - `www/module/category/category_hanpage.lib.php`
  - `www/module/category/category_venture.lib.php`
- 공통 패턴: 동일 함수군(`getCategoryList`, `addCategory`, `editCategoryNew` 등) 반복

### TOP 4. CSS 중복/분산
- 근거:
  - `style.css` 9개 (`www/backoffice/pub/css/style.css` 포함)
  - `reset.css`, `reactive.css`, `reactive_v1.css`, `sub.css`, `slick*.css` 각 8개
  - 또한 전역 레거시 CSS 병행: `www/pages/default/css/common.css`, `www/pages/default/css/dev.css`

### TOP 5. 중복 쿼리 패턴
- 근거:
  - 카테고리 다중 variant lib에서 동일 SQL 템플릿 반복 (`module/category/category*.lib.php`)
  - 공통 목록 조회에서 count/select 재실행 구조 (`www/common/conf/dbconfig.inc.php:170`, `:177`, `:178`, `:200`)

## 4) 병목 후보 TOP(반복 include/IO, 중복 쿼리, N+1 의심, 캐시 후보) + 근거

### TOP 1. 요청당 DB 연결/해제 중복
- 근거:
  - `config.inc.php` 자체가 DB 연결 후 사이트 설정 조회: `www/common/conf/config.inc.php:6`, `:8`, `:11`
  - 호출 페이지에서 다시 연결: `www/index.php:11`, `www/sub.php:60`, `www/backoffice/header.php:9`
- 영향: 페이지 1회 요청에 최소 2회 connect/disconnect 가능

### TOP 2. 카테고리 N+1 패턴
- 근거:
  - `www/module/category/category.lib.php:87` `getCategoryList`
  - 루프 내 하위 카운트 쿼리 반복: `:134-137`
- 영향: 카테고리 수 증가 시 쿼리 선형 증가

### TOP 3. 목록 조회 쿼리 재실행
- 근거:
  - `www/common/conf/dbconfig.inc.php:170` `getArticleList`
  - 동일 SQL로 total 계산 후 limit 재실행 (`:177`, `:178`, `:200`)
- 영향: 대형 테이블에서 I/O 증가

### TOP 4. 대량 include + 사이트 복제 구조
- 근거:
  - 공통 include 체인: `www/sub.php:3,11,12,13,90`
  - 사이트별 동일 include 파일 세트 8중 복제(`*/pub/include/*`)
- 영향: 변경 파편화 + 캐시 비효율

### TOP 5. 캐시 후보
- `shop_set`(사이트 기본설정): `www/common/conf/config.inc.php:8`
- 카테고리 트리/메뉴(`arrMenu`, `getCategoryList` 계열)
- 메인 배너 목록(`getMainBannerList`) 반복 접근: `www/index.php:13-14`

## 5) CSS 뒤죽박죽 원인 + 정리 기준(레이어/네임스페이스/스코프) + 적용 우선순위

### 원인
- 사이트별 `pub/css` 전체 복제 + 부분 수정 누적
- 전역 레거시(`pages/default/css/common.css`, `dev.css`)와 사이트별 CSS 동시 로드
- PHP 내부 inline style 혼입
  - `www/taxcall/sub/index.php:139`
  - `www/fdicenter/sub/index.php:139`
  - `www/venture/sub/index.php:139`
- 동일 컴포넌트 클래스가 여러 경로에서 중복 정의될 가능성 높음

### 정리 기준
- 레이어 규칙:
  - `01-reset` -> `02-base` -> `03-layout` -> `04-component` -> `05-utility` -> `06-page`
- 네임스페이스 규칙:
  - 사이트 접두사(`.site-main`, `.site-taxcall`) + 컴포넌트 접두사(`.c-`, `.l-`, `.u-`)
- 스코프 규칙:
  - 페이지 전용 스타일은 page 파일/블록으로 한정
  - inline style 금지, CSS 파일로 이동

### 적용 우선순위
1. 공통 CSS 진입점 단일화(`common.css/dev.css` 역할 분리)
2. 사이트별 `pub/css` 중 공통 파일 통합(reset/slick/reactive)
3. inline style 제거 및 컴포넌트화
4. 남은 사이트 커스텀만 오버라이드 레이어로 격리

## 6) DB 구조에서 컨텐츠/새 메뉴 생성 시 이상한 연결 원인 + 개선안(연결 규약/검증/무결성)

### 원인
- 메뉴-콘텐츠-보드 연결이 문자열/숫자 참조 혼합
  - `tbl_category.cat_use_type`, `cat_cont_idx`, `cat_board_id`, `cat_news_id` (`taxoffice_structure_20260212.sql:7359-7364`)
- 메뉴 생성 시 `max(cat_no)+1` 기반 수동 키 생성
  - `www/module/category/category.lib.php:205`
- 신규 메뉴 생성 시 `newContents(new_no)` 후 `tbl_contents.idx`를 다시 조회해 `cat_cont_idx`에 넣는 흐름
  - `www/module/category/category.lib.php:217`, `:233`
  - `newContents`: `www/module/category/category.lib.php:426`
- 스키마가 MyISAM 중심이라 FK 부재
  - `taxoffice_structure_20260212.sql` 다수 `ENGINE=MyISAM`
- 라우팅 판단이 DB 값 조합에 전적으로 의존
  - `www/sub.php:64-76`, `www/module/category/_menu.php:15-27`

### 개선안
- 연결 규약(필수)
  - `cat_use_type='C'`이면 `cat_cont_idx>0`, `cat_board_id/news_id`는 NULL/빈값
  - `cat_use_type='B'`이면 `cat_board_id` 필수 + `tbl_board_info.boardid` 존재 검증
  - `cat_use_type='N'`이면 `cat_news_id` 필수
- 저장 검증
  - `editCategoryNew` 저장 전 타입별 cross-check 추가
- 무결성
  - 가능 시 InnoDB 전환 + FK/UNIQUE
  - 최소한 애플리케이션 레벨 제약 및 정기 무결성 스캔 배치 도입
- 키 생성
  - `max(cat_no)+1` 제거, auto increment/시퀀스 방식으로 전환

## 7) 보안 점검(SQLi/XSS/CSRF/권한/파일업로드/세션/입력검증) 의심 지점 경로 명시

### SQLi 의심
- 직접 문자열 결합 업데이트:
  - `www/module/category/category.lib.php:302-342` (`$_REQUEST` 직접 결합)
- 전역적으로 `mysql_escape_string` 의존(구식/불완전 패턴)
  - `www/module/board/board_evn.php:184-218`
  - `www/module/category/ajax_get_cat.php:9`
  - `www/module/category/ajax_get_cat_html.php:10`
  - 다수 경로 전반

### XSS 의심
- 요청값 직접 출력 패턴 다수:
  - `www/module/board/skin/hanpage/list.php:238-252` (query string 반영)
  - `www/module/board/skin/*/form.php` 계열 (`$_REQUEST` 기반 값 출력)

### CSRF 의심
- 쓰기/수정/삭제 endpoint에 토큰 검증 부재:
  - `www/module/board/board_evn.php` (write/modify/delete/comment)
  - `www/backoffice/module/*/*_evn.php` 계열 다수

### 권한검사 의심
- AJAX 삭제 엔드포인트에 명시적 권한체크 없음:
  - `www/module/board/ajax_board_del_user.php`
  - `www/module/board/ajax_board_del.php`

### 파일업로드 의심
- 확장자 블랙리스트 방식(우회 가능성) + MIME 신뢰:
  - `www/module/board/board.lib.php:2765-2812`
  - `www/module/board/board.lib.php:3444-3465`

### 세션/인증 의심
- 관리자 로그인 평문 비교:
  - `www/backoffice/auth/admin_login.php:22` (`a_pw == $_POST['Password']`)
- 세션 고정 방어(`session_regenerate_id`) 흔적 없음
  - `www/backoffice/auth/admin_login.php`, `www/module/member/member_evn.php`

### 입력검증 의심
- `$_REQUEST` 직접 사용 다수, 타입 검증 미흡
  - `www/sub.php:8`
  - `www/module/category/_menu.php:8`
  - `www/module/board/*.php` 다수

## 8) 1차 개선 로드맵(Quick Fix  도메인 연결 규약 구조화  CSS/중복 정리), PR 단위 제안

### PR-1 (Quick Fix: 안전장치)
- 범위
  - 쓰기/삭제 endpoint 공통 가드(권한/메서드/기본 입력검증)
  - CSRF 토큰 검증 훅 추가(최소 board_evn + backoffice 주요 evn)
  - 관리자 로그인 비밀번호 해시 검증으로 전환 준비
- 산출물
  - 보안 체크리스트 + 실패 로그 표준화

### PR-2 (도메인 연결 규약 구조화)
- 범위
  - category 저장 규약 강제(`cat_use_type`별 필수 필드)
  - `editCategoryNew`/신규 메뉴 생성 흐름에서 교차검증 추가
  - 무결성 점검 스크립트(고아 `cat_cont_idx`, 없는 `cat_board_id`) 추가
- 산출물
  - 연결 규약 문서 + 운영 점검 리포트

### PR-3 (CSS/중복 정리 1단계)
- 범위
  - `pub/js`, `pub/include`, `pub/css` 공통 자산 통합(링크만 공통화, 기능 변경 없음)
  - inline style 분리 대상 목록 작성 후 우선순위 상위 페이지부터 이동
- 산출물
  - 공통 에셋 매핑표(기존 경로 -> 공통 경로) + 회귀 체크리스트

### PR-4 (중복 쿼리/병목 완화)
- 범위
  - `getCategoryList` N+1 개선(집계 join/subquery)
  - `getArticleList` count/data 분리 최적화
  - `shop_set`/메뉴/배너 캐시(짧은 TTL) 적용
- 산출물
  - 전/후 SQL 호출 수 비교표, 페이지별 응답시간 비교

---

## 참고 근거 파일
- `www/index.php`
- `www/sub.php`
- `www/module/category/_menu.php`
- `www/module/category/category.lib.php`
- `www/module/contents/contents.lib.php`
- `www/common/conf/config.inc.php`
- `www/common/conf/dbconfig.inc.php`
- `www/backoffice/header.php`
- `www/backoffice/auth/admin_login.php`
- `www/module/board/board_evn.php`
- `www/module/board/board.lib.php`
- `www/module/board/ajax_board_del_user.php`
- `www/module/board/ajax_board_del.php`
- `www/taxcall/sub/index.php`
- `www/fdicenter/sub/index.php`
- `www/venture/sub/index.php`
- `taxoffice_structure_20260212.sql`
