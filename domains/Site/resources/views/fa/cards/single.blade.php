@include('fa.template.part-theme.head')
<div class="d-cart d-cart__single font-zar">
    <span class="d-cart__single_title">
                    {{$userData->name.' '.$userData->last_name}} - {{$userData->uuid}}
    </span>
</div>
<script src="{{ asset('js/site/runtime.js') }}" defer ></script>
<script src="{{ asset('js/site/master.js') }}" defer ></script>