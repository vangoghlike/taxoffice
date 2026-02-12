{ #header }

<!-- Container -->
<div class="container" id="container">

    { #subtop }
    <!-- 세목구분 (class) -->
    <!-- 	mt01 : 증여세
            mt02 : 양도세
            mt03 : 상속세
            mt04 : 소득세
            mt05 : 부가가치세(일반)
            mt06 : 법인세 -->

    <!-- subContent -->
    <div class="subContent">

        { #breadcrumbs }

        <!-- contStart -->
        <div class="contStart">

            { #dep3 }

            { CONTENTS['head_contents'] }
            <div class="listTyp01 cont_calc">

                { ? CALC_CODE == 'mt01' }
                { #calc_form01 }
                { : CALC_CODE == 'mt02' }
                { #calc_form02 }
                { : CALC_CODE == 'mt03' }
                { #calc_form03 }
                { : CALC_CODE == 'mt04' }
                { #calc_form04 }
                { : CALC_CODE == 'mt05' }
                { #calc_form05 }
                { : CALC_CODE == 'mt06' }
                { #calc_form06 }
                { : }
                { #calc_form01 }
                { / }

                <div class="calc_link_wrap">
                    <ul class="calc_link">
                        <li class="{ ? CONTENTS['menu_idno'] == CALC_MT02 }on{ / }">
                            <a href="{ BASE_URL }/{ CALC_MT02 }" target="_self">
                                양도세<br>
                                계산도우미
                            </a>
                        </li>
                        <li class="{ ? CONTENTS['menu_idno'] == CALC_MT01 }on{ / }">
                            <a href="{ BASE_URL }/{ CALC_MT01 }" target="_self">
                                증여세<br>
                                계산도우미
                            </a>
                        </li>
                        <li class="{ ? CONTENTS['menu_idno'] == CALC_MT03 }on{ / }">
                            <a href="{ BASE_URL }/{ CALC_MT03 }" target="_self">
                                상속세<br>
                                계산도우미
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- //contStart -->

        </div>
        <!-- //subContent -->

    </div>
    <!-- //Container -->

    { #footer }