{ #header }

<!-- Wrap -->
<div class="wrap">

    { #subtop }

    <!-- subContainer -->
    <div class="subContainer">

        { ? _GET.idno }

        <div class="cosultView">

            <div class="top">
                <img src="{ TYPE_URL }/images/bgConsult02.png" alt="" />
            </div>

            <div class="consultViewList">
                <ul>
                    <li class="no1">
                        <div class="tit">결제일시</div>
                        <div class="txt">{ DATA.reg_date }</div>
                    </li>
                    <li class="no6">
                        <div class="tit">결제금액</div>
                        <div class="txt">{ =number_format(DATA.price) } { ? DATA.pay_method == 'point' }포인트{ : }원{ / }</div>
                    </li>
                    <li class="no5">
                        <div class="tit">결제수단</div>
                        <div class="txt">{ DATA.pay_method_name }</div>
                    </li>
                    <li class="no5">
                        <div class="tit">결제내용</div>
                        <div class="txt">{ ? DATA.order_idno }[{ DATA.goods_name }] { DATA.option_name }{ : }{ DATA.reci_message }{ / }</div>
                    </li>

                </ul>
            </div>

        </div>

        { : }

        <table class="base04">
            <colgroup>
                <col style="width:33.3%;" />
                <col style="width:33.3%;" />
                <col />
            </colgroup>
            <thead>
            <tr>
                <th>결제금액</th>
                <th>결제수단</th>
                <th>결제일시</th>
            </tr>
            </thead>
            <tbody>
            { @DATA['list'] }
            <tr>
                <td><a href="./pay?status={ _GET.status }&idno={ .idno }">{ =number_format(.price) } { ? .pay_method == 'point' }포인트{ : }원{ / }</a></td>
                <td>{ .pay_method_name }</td>
                <td>{ .reg_date }</td>
            </tr>
            { / }
            { ? !DATA.size_ }
            <tr class="allmerge">
                <td>결제 내역이 없습니다.</td>
            </tr>
            { / }
            </tbody>
        </table>

        { / }

    </div>
    <!-- //subContainer -->

    { #footer }

</div>
<!-- //Wrap -->

</body>
</html>
