<?php
/**
 * 도메인별 폴더 세팅
 */
function getDomainPrefix() {
    $domain = $_SERVER['SERVER_NAME'];
    switch ($domain) {
        case 'etaxoffice.co.kr':
        case 'www.etaxoffice.co.kr':
            return '/eng';
        case 'fdioffice.co.kr':
        case 'www.fdioffice.co.kr':
            return '/eng';
        case 'fdihelpcenter.co.kr':
        case 'www.fdihelpcenter.co.kr':
            return '/fdicenter';
        case 'fdihelpcenter.com':
        case 'www.fdihelpcenter.com':
            return '/fdi_eng';
        case 'taxoffice.cn':
        case 'www.taxoffice.cn':
            return '/ch';
        case 'taxcall.co.kr':
        case 'www.taxcall.co.kr':
        case 'taxcallcenter.com':
        case 'www.taxcallcenter.com':
        case 'han-page.co.kr':
        case 'www.han-page.co.kr':
            return '/taxcall';
        default:
            return ''; // 기본은 prefix 없음
    }
}
