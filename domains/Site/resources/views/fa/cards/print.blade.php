@include('fa.template.part-theme.head')
<style>
    html, body {
        height: 100%;
    }

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    *::before, *::after {
        box-sizing: border-box;
    }

    body {
        font-family: IRANSans, serif;
        direction: rtl;
        overflow-x: hidden;
        background: #f7fafc;
    }

    .text-center {
        text-align: center;
    }

    .text-black-600 {
        color: #1a202c;
        font-weight: 600;
    }

    .app__container .app__from--label:not(:last-of-type) {
        margin-bottom: 18px;
    }

    .app__container .app__from--label span {
        display: inline-block;
        margin-bottom: 5px;
    }

    .app__container .app__from--submit {
        margin: 25px auto;
    }

    .relative {
        position: relative;
    }

    .cart-body {
        display: block;
        width: 86mm;
        /*height: 54mm;*/
        height: 100%;
        margin: 0 auto;
    }


    .user-name {
        position: absolute;
        left: 35%;
        top: 41mm;
        /*left: 43mm;*/
        font-size: 12px;
        font-weight: 600;
        /*bottom: 11mm;*/
        transform: translateX(-50%);
    }
    @media print {
        @page {
            size: 86mm 54mm;
            margin: 0 !important;
            padding: 0 !important;
        }

        * {
            padding: 0 !important;
            margin: 0 !important;
            -webkit-print-color-adjust: exact
        }

        .cart-body {
            margin: 0 auto 0 0 !important;
        }

        html, body {
            height: 100%;
        }

        body {
            background: white !important;
        }
    }
</style>

<script>
    let wnz = window.open('', '_self');
    wnz.document.write(`
    <div class="cart-body relative">
      <span class="user-name text-black-600 text-center">
         {{ $userData->name .' '. $userData->last_name.' - '. $userData->card_id }}
    </span>
  </div>
`);
    setTimeout(() => {
        wnz.print();
        // wnz.close();
    }, 2)

</script>

<script src="{{ secure_asset('js/site/runtime.js') }}" defer></script>
<script src="{{ secure_asset('js/site/card-mini~card-print~card-single~card-social~dashboard.js?v=c298c7f8233d') }}"
        defer></script>
<script src="{{ secure_asset('js/site/card-print.js') }}" defer></script>