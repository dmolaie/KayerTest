@include('fa.template.part-theme.head')
<div class="d-cart d-cart__social font-zar">
    <span class="d-cart__social_title">
        <span>
            {{$userData->name.' '.$userData->last_name}}
        </span>
        <span>
            {{$userData->uuid}}
        </span>
    </span>
</div>

<script src="{{ asset('js/site/runtime.js') }}" defer ></script>
<script src="{{ asset('js/site/master.js') }}" defer ></script>