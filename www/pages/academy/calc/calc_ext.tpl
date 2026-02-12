{ #header }

<!-- Container -->
<div class="container" id="container">

    { #subtop }
    <!-- 세목구분 (class) -->
    <!-- 	mt01 : 증여세
            mt02 : 양도세
            mt03 : 상속세
            mt04 : 종소세
            mt05 : 부가가치세(일반)
            mt06 : 부가가치세(간이) -->

    <!-- subContent -->
    <div class="subContent">

        { #breadcrumbs }

        <!-- contStart -->
        <div class="contStart">

        { #dep3 }

        { CONTENTS['head_contents'] }

        <?php
            $menu_li = array(
                'MT01' => '',
                'MT02' => '',
                'MT03' => '',
                'MT04' => '',
                'MT05' => '',
                'MT06' => ''
            );

            switch({ CALC_CODE }){

                case 'mt01' : $menu_li['MT01'] = 'on'; break;
                case '' :
                case 'mt02' : $menu_li['MT02'] = 'on'; break;
                case 'mt03' : $menu_li['MT03'] = 'on'; break;
                case 'mt04' : $menu_li['MT04'] = 'on'; break;
                case 'mt05' : $menu_li['MT05'] = 'on'; break;
                case 'mt06' : $menu_li['MT06'] = 'on'; break;
                default: 	break;
            }
        ?>
        <div class="listTyp01 cont_calc">
            <?php
                switch({ CALC_CODE }){
                    case '' :
                    case 'mt01' : ?>{ #calc_form01 }<?php break;
                    case 'mt02' : ?>{ #calc_form02 }<?php break;
                    case 'mt03' : ?>{ #calc_form03 }<?php break;
                    case 'mt04' : ?>{ #calc_form04 }<?php break;
                    case 'mt05' : ?>{ #calc_form05 }<?php break;
                    case 'mt06' : ?>{ #calc_form06 }<?php break;
                    default: 	break;
                }
            ?>
            <div class="calc_link_wrap">
                <ul class="calc_link">
                    <li class="{ ? CONTENTS['menu_idno'] == CALC_MT02 }on{ / }" style="display: none;">
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