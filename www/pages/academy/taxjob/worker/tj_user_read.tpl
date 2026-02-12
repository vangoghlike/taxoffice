{ #header }

<!-- Container -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/solid.css" integrity="sha384-TbilV5Lbhlwdyc4RuIV/JhD8NR+BfMrvz4BL5QFa2we1hQu6wvREr3v6XSRfCTRp" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/regular.css" integrity="sha384-avJt9MoJH2rB4PKRsJRHZv7yiFZn8LrnXuzvmZoD3fh1aL6aM6s0BBcnCvBe6XSD" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/fontawesome.css" integrity="sha384-ozJwkrqb90Oa3ZNb+yKFW2lToAWYdTiF1vt8JiH5ptTGHTGcN7qdoR1F95e0kYyG" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .head {border-bottom:1px solid #e4e5e6;}
    .btn {transition:all .5s;}
    .subContent .subTopInfo {margin-bottom:0; border-bottom:none;}
    .viewWrap {margin-bottom:48px; padding:24px; border:1px solid #e4e5e6; border-top:2px solid #d1d2d3;}
    .viewWrap .line.headline .left.clear {float:none;}
    .viewWrap .line.headline .top {display:flex; align-items:center;}
    .viewWrap .line.headline .top img {margin-right:24px;}
    .viewWrap .line.headline .top span.cname {display:inline-block; padding:6px 12px; font-size:1.04rem; background:#f4f5f6;}
    .viewWrap .line.headline div.info {display:flex; justify-content:space-between; display:-webkit-flex; -webkit-justify-content:space-between;  align-items:center; padding:16px 0 8px; font-size:1.28rem;}
    .viewWrap .line.headline div.info div {display:flex; justify-content:flex-end; display:-webkit-flex;  -webkit-justify-content:flex-end;}
    .viewWrap .line.headline div.info div span {display:inline-block; margin:0 3px; padding:4px 10px; font-size:0.88rem; color:#fff; background:#b1b2b3;}
    .viewWrap .md {display:block; padding:24px 0;}
    .viewWrap .md aside {width:100%; font-size:1.0rem;}
    .viewWrap .md aside h4 {padding:8px 0 16px; font-size:1.08rem; font-weight:600; color:#232425;}
    .viewWrap .md aside dl dt {display:inline-block; padding:6px 0; width:96px; color:#aaa;}
    .viewWrap .md aside dl dd {display:inline-block; padding:6px 0; width:76%;}
    .viewWrap.vc {padding-top:0px;}
    .viewWrap.vc .viewContent {border-bottom:none;}

    .applyWrap {margin-bottom:48px; text-align:center;}
    button.btn_xl {display:inline-block; margin:0 2px; padding:16px 24px; color:#fff; font-size:1.28rem;  letter-spacing:-1px; border:none;}
    button.btn_apply {background: #379aff; border:1px solid #379aff;}
    button.btn_apply:hover {background:#195dae;}
    button.btn_scrap {background:none; color:#379aff; border:1px solid #379aff;;}
    button.btn_scrap:hover {background:#ebf2f8;}

    /* table */
    .resume_table {width:100%;}
    .resume_table th,
    .resume_table td {padding:1.0rem; color:#888; font-size:16px; letter-spacing:-1px; line-height: 20px; border:1px solid #dfdfdf;}
    .resume_table th {background:#f2f2f2; text-align: center;}


</style>

<div class="container" id="container">

    { #subtop }

    <!-- subContent -->
    <div class="subContent">

        { #breadcrumbs }
        <!-- contStart -->
        <div class="contStart">

            <div class="viewWrap">
                <div class="line headline">
                    <div class="left clear">
                        <div class="top">
                            { ? DATA['file'] }<img src="/common/imageload.php?type={ DATA['board_code'] }&file={ DATA['file'][0]['file_name_saved'] }" alt="썸네일 이미지" height="32px"/>{ / }
                            <span class="cname">{ JOB_DATA['user_name'] }</span>
                        </div>
                        <div class="info">
                            <b>{ JOB_DATA['cont_title'] }</b>
                            <div>
                                <span>{ JOB_DATA['user_name'] }</span>
                                <span>{ JOB_DATA['reg_date'] }</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md">
                    <aside>
                        <h4>구직자 정보</h4>
                        <dl>
                            <dt>이름 및 성별</dt>
                            <dd>
                                { JOB_DATA['user_name'] } ( { JOB_DATA['user_gender'] } )
                            </dd>
                        </dl>
                        <dl>
                            <dt>생년월일</dt>
                            <dd>
                                { JOB_DATA['user_birth'] }
                            </dd>
                        </dl>
                        <dl>
                            <dt>연락처</dt>
                            <dd>
                                { JOB_DATA['user_phone'] }
                            </dd>
                        </dl>
                        <dl>
                            <dt>이메일</dt>
                            <dd>
                                { JOB_DATA['user_email'] }
                            </dd>
                        </dl>
                        <dl>
                            <dt>주거지</dt>
                            <dd>
                                { JOB_DATA['user_addr1'] }
                            </dd>
                        </dl>
                        <dl>
                            <dt>경력구분</dt>
                            <dd>
                                { ? JOB_DATA['user_career'] == '1' }
                                    신입
                                { : }
                                    경력
                                { / }
                            </dd>
                        </dl>
                        <dl>
                            <dt>학력</dt>
                            <dd>
                                { ? JOB_DATA['user_education'] != '' }
                                JOB_DATA['user_education']
                                { : }
                                미입력
                                { / }
                            </dd>
                        </dl>
                        <br><br>
                        <h4>직무정보</h4>
                        <dl>
                            <dt>스킬</dt>
                            <dd>
                                { JOB_DATA['user_skill'] }
                            </dd>
                        </dl>
                        <dl>
                            <dt>경력 기술</dt>
                            <dd>
                                <div style="padding:1.0rem 0.5rem; border:1px solid #eee;">
                                    { JOB_DATA['user_hobby'] }
                                </div>
                            </dd>
                        </dl>
                        <br><br>
                        <h4>자격인증</h4>
                        <div>
                            <table class="resume_table">
                                <colgroup>
                                    <col style="width:10%;">
                                    <col style="width:20%;">
                                    <col style="width:20%;">
                                    <col style="width:15%;">
                                    <col style="width:15%;">
                                    <col style="width:20%;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>
                                        순번
                                    </th>
                                    <th>
                                        자격종류
                                    </th>
                                    <th>
                                        시행기관
                                    </th>
                                    <th>
                                        Code
                                    </th>
                                    <th>
                                        취득일자
                                    </th>
                                    <th>
                                        자격 보유기간
                                    </th>
                                </tr>
                                </thead>
                                <tbody><tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        전산회계 2급
                                    </td>
                                    <td rowspan="10">
                                        한국세무사회
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(1-1)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        전산회계 1급
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(1-2)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        전산세무 2급
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(1-3)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        전산세무 1급
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(1-4)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        5
                                    </td>
                                    <td>
                                        기업회계 3급
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(1-5)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        6
                                    </td>
                                    <td>
                                        기업회계 2급
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(1-6)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        7
                                    </td>
                                    <td>
                                        기업회계 1급
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(1-7)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        8
                                    </td>
                                    <td>
                                        세무회계 3급
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(1-8)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        9
                                    </td>
                                    <td>
                                        세무회계 2급
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(1-9)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        세무회계 1급
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(1-10)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        11
                                    </td>
                                    <td>
                                        FAT 2급
                                    </td>
                                    <td rowspan="4">
                                        공인회계사회
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(2-1)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        12
                                    </td>
                                    <td>
                                        FAT 1급
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(2-2)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        13
                                    </td>
                                    <td>
                                        TAT 2급
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(2-3)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        14
                                    </td>
                                    <td>
                                        TAT 1급
                                    </td>
                                    <td>
                                        <label>
                                            <input type="checkbox" value="" name="" class="" id="">&nbsp;
                                            A(2-4)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="date" value="" name="" class="" id="">
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>

                                </tbody></table>
                        </div>
                        <br><br>
                        <h4>경력 인증</h4>
                        <div>
                            <table class="resume_table">
                                <colgroup>
                                    <col style="width:10%;">
                                    <col style="width:30%;">
                                    <col style="width:20%;">
                                    <col style="width:20%;">
                                    <col style="width:20%;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>
                                        순번
                                    </th>
                                    <th>
                                        근무 형태
                                    </th>
                                    <th>
                                        근무 기간
                                    </th>
                                    <th>
                                        Code
                                    </th>
                                    <th>
                                        경력 보유기간
                                    </th>
                                </tr>
                                </thead>
                                <tbody><tr>
                                    <td>
                                        1
                                    </td>
                                    <td rowspan="5">
                                        전문회사 (세무사, 회계사)
                                    </td>
                                    <td>
                                        1~2년
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[a][]" class="" id="">&nbsp;
                                            B(1-1)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="2" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        3~4년
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[a][]" class="" id="">&nbsp;
                                            B(1-2)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="3" max="4" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        3
                                    </td>
                                    <td>
                                        5~6년
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[a][]" class="" id="">&nbsp;
                                            B(1-3)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="5" max="6" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        4
                                    </td>
                                    <td>
                                        7~10년
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[a][]" class="" id="">&nbsp;
                                            B(1-4)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="7" max="10" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        5
                                    </td>
                                    <td>
                                        10년 이상
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[a][]" class="" id="">&nbsp;
                                            B(1-5)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="10" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        6
                                    </td>
                                    <td rowspan="5">
                                        일반회사 근무 (중소, 중견기업)
                                    </td>
                                    <td>
                                        1~2년
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[b][]" class="" id="">&nbsp;
                                            B(2-1)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="2" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        7
                                    </td>
                                    <td>
                                        3~4년
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[b][]" class="" id="">&nbsp;
                                            B(2-2)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="3" max="4" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        8
                                    </td>
                                    <td>
                                        5~6년
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[b][]" class="" id="">&nbsp;
                                            B(2-3)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="5" max="6" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        9
                                    </td>
                                    <td>
                                        7~10년
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[b][]" class="" id="">&nbsp;
                                            B(2-4)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="7" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        10년 이상
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[b][]" class="" id="">&nbsp;
                                            B(2-5)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="10" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        11
                                    </td>
                                    <td rowspan="5">
                                        일반회사 근무 (대기업)
                                    </td>
                                    <td>
                                        1~2년
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[c][]" class="" id="">&nbsp;
                                            B(3-1)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="0" max="2" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        12
                                    </td>
                                    <td>
                                        3~4년
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[c][]" class="" id="">&nbsp;
                                            B(3-2)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="3" max="4" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        13
                                    </td>
                                    <td>
                                        5~6년
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[c][]" class="" id="">&nbsp;
                                            B(3-3)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="5" max="6" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        14
                                    </td>
                                    <td>
                                        7~10년
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[c][]" class="" id="">&nbsp;
                                            B(3-4)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="7" max="10" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        15
                                    </td>
                                    <td>
                                        10년 이상
                                    </td>
                                    <td>
                                        <label>
                                            <input type="radio" value="" name="career_type[c][]" class="" id="">&nbsp;
                                            B(3-5)
                                        </label>
                                    </td>
                                    <td>
                                        <input type="number" min="10" max="50" value="" name="" class="" id="">&nbsp;년
                                        <input type="number" min="0" max="12" value="" name="" class="" id="">&nbsp;개월
                                    </td>
                                </tr>

                                </tbody></table>
                        </div>
                        <br><br>
                        <h4>추가 정보</h4>
                        <dl>
                            <dt>종교</dt>
                            <dd>
                                { JOB_DATA['user_religion'] }
                            </dd>
                        </dl>
                        <dl>
                            <dt>취미</dt>
                            <dd>
                                { JOB_DATA['user_hobby'] }
                            </dd>
                        </dl>
                        <dl>
                            <dt>병역</dt>
                            <dd>
                                { ? JOB_DATA['user_military'] == '1' }
                                    군필
                                { : }
                                    미필
                                { / }
                            </dd>
                        </dl>
                        <br><br>
                        <h4>자기소개서</h4>
                        <dl>
                            <dt>제목</dt>
                            <dd>
                                { JOB_DATA['user_info_sbj'] }
                            </dd>
                        </dl>
                        <dl>
                            <dt>내용</dt>
                            <dd>
                                <div style="padding:1.0rem 0.5rem; border:1px solid #eee;">
                                    { JOB_DATA['user_info_con'] }
                                </div>
                            </dd>
                        </dl>
                    </aside>
                </div>
            </div>

        </div>
        <!-- //contStart -->

    </div>
    <!-- //subContent -->

</div>
<!-- //Container -->

{ #footer }
