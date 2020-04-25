<div class="s-domain fixed w-full h-full flex items-center justify-center z-50 none">
    <div class="s-domain__container bg-white rounded">
        <div class="s-domain__header flex items-center justify-between rounded-inherit rounded-bl-none rounded-br-none">
            <span class="text-blue-800 font-base font-bold cursor-default">
                 پرتال استان‌ها
            </span>
            <button class="s-domain__close relative"
            ></button>
        </div>
        <div class="s-domain__body">
            <div class="s-domain__row w-full flex items-center">
                <span class="s-domain__label flex-shrink-0 text-blue-800 font-base font-bold cursor-default">
                    شعب انجمن
                </span>
                <select class="s-domain__select">
                    <option value="">
                        انتخاب کنید...
                    </option>
                    @foreach($provinces as $province)
                    <option value="{{$province->getId()}}" data-url="{{ 'http://'.$province->getSlug() .'.'.config('app.url')}}">
                        {{$province->getName()}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="s-domain__row--link w-full flex items-center none">
                <span class="s-domain__label flex-shrink-0 text-blue-800 font-base font-bold cursor-default">
                     آدرس سایت
                </span>
                <a href=""
                   class="s-domain__link relative flex items-center text-white font-base font-medium bg-blue rounded l:transition-bg overflow-hidden"
                >
                    <span class="s-domain__link--hover absolute flex items-center justify-end w-full h-full text-white rounded-inherit pointer-event-none">
                        ورود به سایت
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 19">
                            <path fill="#ffffff"
                                  class="block w-full"
                                  d="M32.707 7.706l.036.008H6.353l4.838-4.823c.237-.235.367-.554.367-.889 0-.335-.13-.651-.367-.887l-.753-.75A1.252 1.252 0 0 0 9.549 0c-.336 0-.652.13-.889.365L.367 8.613A1.236 1.236 0 0 0 0 9.499c0 .337.129.652.367.888l8.293 8.248c.237.236.553.365.89.365.336 0 .651-.13.888-.365l.753-.749c.237-.235.367-.549.367-.884 0-.334-.13-.632-.367-.867l-4.893-4.85h26.426c.694 0 1.276-.594 1.276-1.283v-1.06c0-.688-.6-1.236-1.293-1.236z"
                            />
                        </svg>
                    </span>
                    <span class="s-domain__link--text">
                        شعبه فارس
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>