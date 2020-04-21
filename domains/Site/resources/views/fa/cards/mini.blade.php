@include('fa.template.part-theme.head')
    <div class="d-cart profile-p">
        <br>
        <p class="text-black-300 font-zar font-24 w-full text-center cursor-default sm:font-base">
            کارت اهدا عضو:
            {{ $userData->name.' '.$userData->last_name }}
        </p>
        <br>
        <figure class="max-w-800 m-0-auto image_loading">
            <img src="{{ asset('/images/cards/mini_overlay.jpg') }}"
                 alt="{{ $userData->name .'-'. $userData->last_name }}"
                 class="mini_cart w-full block object-contain"
            />
        </figure>
        <br>
        <div class="w-0 h-0 overflow-hidden">
                <span id="label">
                    {{ $userData->name .' '. $userData->last_name.' - '. $userData->card_id }}
                </span>
        </div>
    </div>

    <script src="{{ asset('js/site/runtime.js') }}" defer ></script>
    <script src="{{ asset('js/site/card-mini~card-single~card-social~dashboard.js') }}" defer ></script>
    <script src="{{ asset('js/site/card-mini.js') }}" defer ></script>