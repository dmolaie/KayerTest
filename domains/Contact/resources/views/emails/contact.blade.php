<style>
    .body-email{
        direction: rtl !important;
        text-align: right !important;
    }
</style>
@component('mail::message')

<p class="body-email" dir="rtl" align="right"> پیام از: {{$data->getFullName()}}</p>
<p class="body-email" dir="rtl" align="right"> موضوع: {{$data->getTitle()}}</p>
<p class="body-email" dir="rtl" align="right"> ایمیل / شماره تماس: {{$data->getmobile()}}/{{$data->getEmail()}} </p>
<div class="body-email" dir="rtl" align="right"> {{$data->getContent()}} </div>

@endcomponent
