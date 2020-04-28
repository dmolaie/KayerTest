<header class="header bg-white md:none">
    <div class="container">
        <div class="header__brand flex items-center justify-between">
            <a href="{{ route('index',config('app.locale')) }}"
               class="header__logo block m-l-auto"
            >
                <img src="{{ secure_asset('/images/ic_ehda-center.png') }}"
                     alt="انجمن اهدای عضو ایرانیان"
                     class="header__logo_image block object-contain"
                />
            </a>
            <button class="s-domain__button text-blue font-sm font-bold">
                پرتال استان‌ها
            </button>
        </div>
    </div>
    <nav class="header__nav">
        <div class="header__nav_container container flex items-center">
            @foreach($menus as $menu)
                <div class="header__nav_menu relative cursor-pointer text-nowrap text-black font-xs-bold">
                    <a class="text-nowrap text-black font-xs-bold" href="{{ is_null($menu->parent_id) ?  !is_null($menu->link) ?  $menu->link : '#' : config('app.locale') .'/page/'.$menu->alias }}">
                        {{$menu->title}}
                    </a>
                    @if($menu->child->count() > 0)
                        <div class="header__nav_sub-menu absolute bg-white cursor-default line-height-1 z-10">
                            @foreach($menu->child as $child)
                                <a href="/{{config('app.locale')}}/page/{{$child->alias}}"
                                   class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap">
                                    {{$child->title}}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
            <div class="header__user header__user--{{auth()->check() ? 'active' : 'toggle'}} relative flex items-center m-r-auto">
                <a href="{{route('admin.login')}}"
                   class="flex items-center header__user_link"
                >
                    @if(auth()->check())
                        <span class="text-green-300 font-sm font-bold text-nowrap">
                     {{auth()->user()->name .' '.auth()->user()->last_name . ' '}}خوش آمدید
                    </span>
                    @endif
                </a>
                <div class="block relative">
                    <a href="{{route('admin.login')}}"
                       class="block header__nav_btn header__nav_btn--user bg-size-contain m-0"></a>
                    @if( auth()->check() )
                        <div class="header__dropdown absolute bg-white border border-solid rounded-10">
                            @if( in_array(config('role.roles.legate.name'),auth()->user()->roles->pluck('type')->toArray()) || in_array(config('role.roles.admin.name'),auth()->user()->roles->pluck('name')->toArray()))
                                <a href="{{route('admin.login',config('app.locale'))}}"
                                   class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200">
                                    بخش سفیران اهدای عضو
                                </a>
                            @endif

                            @if( in_array(config('role.roles.client.name'),auth()->user()->roles->pluck('type')->toArray()))
                                <a href="{{route('page.client.profile',config('app.locale'))}}"
                                   class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200">
                                    کارت اهدای عضو
                                </a>
                            @endif

                            @if(in_array(config('role.roles.legate.name'),auth()->user()->roles->pluck('type')->toArray()) && !in_array(config('role.roles.client.name'),auth()->user()->roles->pluck('name')->toArray()))
                                <a href="{{route('admin.login',config('app.locale'))}}"
                                   class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200">
                                    ویرایش پروفایل
                                </a>
                            @elseif(!in_array(config('role.roles.legate.name'),auth()->user()->roles->pluck('type')->toArray()) && in_array(config('role.roles.client.name'),auth()->user()->roles->pluck('name')->toArray()))
                                <a href="{{route('page.edit.client.profile',config('app.locale'))}}"
                                   class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200">
                                    ویرایش پروفایل
                                </a>
                            @elseif(in_array(config('role.roles.legate.name'),auth()->user()->roles->pluck('type')->toArray()) && in_array(config('role.roles.client.name'),auth()->user()->roles->pluck('name')->toArray()))
                                <a href="{{route('admin.login',config('app.locale'))}}"
                                   class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200">
                                    ویرایش پروفایل
                                </a>
                            @endif

                            <a href="/user/#/logout"
                               class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200">
                                خروج
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <a href="{{route('index',config('app.locale'))}}" class="header__nav_btn header__nav_btn--home"></a>
            <button class="header__nav_btn header__nav_btn--search bg-size-contain"></button>
            <div class="header__nav_lang inline-flex rounded-3 text-center overflow-hidden">
                <a href="{{route('index','en')}}"
                   class="header__nav_lang text-uppercase font-xs-bold flex-1 l:transition {{ app()->getLocale() == 'en' ? 'header__nav_lang--active' : '' }}"
                   lang="en"
                >
                    en
                </a>
                <a href="{{route('index','fa')}}"
                   class="header__nav_lang text-uppercase font-xs-bold flex-1 l:transition {{ app()->getLocale() == 'fa' ? 'header__nav_lang--active' : '' }}"
                   lang="fa"
                >
                    fa
                </a>
            </div>
        </div>
    </nav>
</header>
<header class="header m-header relative overflow-hidden bg-white l:none">
    <div class="m-header__top w-full relative flex items-center justify-center">
        <button class="m-header__menu absolute flex items-center justify-center">
            <span class="m-header__hamburger relative pointer-event-none">
                <span class="m-header__line absolute rounded"
                ></span>
                <span class="m-header__line absolute rounded"
                ></span>
                <span class="m-header__line absolute rounded"
                ></span>
            </span>
        </button>
        <a href="{{ route('index',config('app.locale')) }}"
           class="m-header__logo"
        >
            <img src="{{ secure_asset('/images/ic_ehda-center.png') }}"
                 alt="انجمن اهدای عضو ایرانیان"
                 class="h-full block object-contain"
            />
        </a>
        <div class="m-header__language absolute inline-flex rounded-3 text-center overflow-hidden opacity-0">
            <a href="{{route('index','en')}}"
               class="m-header__lang m-header__lang--en text-uppercase text-waterloo font-2xs font-bold flex-1 l:transition {{ app()->getLocale() == 'en' ? 'm-header__lang--active' : '' }}"
               lang="en"
            >
                en
            </a>
            <a href="{{route('index','fa')}}"
               class="m-header__lang m-header__lang--fa text-uppercase text-waterloo font-2xs font-bold flex-1 l:transition {{ app()->getLocale() == 'fa' ? 'm-header__lang--active' : '' }}"
               lang="fa"
            >
                fa
            </a>
        </div>
    </div>
    <div class="m-header__middle none">
        <nav class="m-header__nav opacity-0">
            <div class="w-full relative transition-opacity">
                @foreach($menus as $menu)
                    @if($menu->child->count() > 0)
                        <button class="m-header__mLink m-header__mLink--hasChild w-full relative flex items-center justify-between text-blue-800 font-sm font-bold text-right">
                            {{$menu->title}}
                        </button>
                        <div class="m-header__children h-0 overflow-hidden">
                            <div class="w-full">
                                @foreach($menu->child as $child)
                                    <a href="/{{config('app.locale')}}/page/{{$child->alias}}"
                                       class="m-header__child block text-black font-xs font-normal">
                                        {{$child->title}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="/{{config('app.locale')}}/page/{{$menu->alias}}"
                           class="m-header__mLink w-full block text-blue-800 font-sm font-bold"
                        >
                            {{$menu->title}}
                        </a>
                    @endif
                @endforeach
            </div>
        </nav>
        <div class="m-header__bottom w-full relative bg-white">
            <div class="container h-full flex items-center justify-between">
                <button class="m-header__button"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21"
                         class="block w-full h-full object-contain"
                    >
                        <path fill="#00B1F5" d="M20.33 18.303l-4.386-4.386c1.066-1.483 1.652-3.254 1.652-5.12 0-2.348-.914-4.557-2.578-6.22C13.358.918 11.148 0 8.798 0c-2.35 0-4.56.914-6.221 2.578C.916 4.238.001 6.448.001 8.798c0 2.35.914 4.558 2.576 6.221 1.661 1.661 3.87 2.578 6.22 2.578 1.865 0 3.635-.583 5.119-1.652l4.385 4.386c.281.28.647.42 1.014.42.368 0 .735-.14 1.014-.42.56-.561.56-1.468 0-2.028zM4.605 12.99c-1.12-1.12-1.736-2.61-1.736-4.193 0-1.583.616-3.071 1.736-4.192 1.12-1.12 2.608-1.737 4.192-1.737 1.583 0 3.072.617 4.192 1.737s1.737 2.61 1.737 4.193c0 1.583-.616 3.072-1.737 4.193-1.12 1.12-2.608 1.735-4.192 1.735-1.585 0-3.074-.616-4.192-1.736z"/>
                    </svg>
                </button>
                <button class="m-header__button"
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 18 21"
                         class="block w-full h-full object-contain"
                    >
                        <g fill="#00B1F5">
                            <path d="M8.414 9.865c1.355 0 2.529-.486 3.488-1.445.959-.959 1.445-2.132 1.445-3.487s-.486-2.529-1.445-3.488C10.942.486 9.769 0 8.414 0S5.885.486 4.926 1.445c-.959.959-1.445 2.132-1.445 3.487 0 1.356.486 2.53 1.446 3.488.959.96 2.132 1.445 3.487 1.445zM17.045 15.748c-.028-.399-.083-.834-.166-1.294-.083-.463-.19-.9-.318-1.301-.132-.414-.312-.822-.535-1.213-.23-.407-.502-.76-.806-1.052-.319-.304-.708-.549-1.16-.728-.448-.177-.946-.267-1.478-.267-.21 0-.411.086-.802.34-.24.157-.521.338-.835.538-.268.171-.632.331-1.08.476-.439.142-.883.214-1.322.214-.44 0-.884-.072-1.322-.214-.449-.145-.812-.305-1.08-.476-.31-.198-.592-.38-.836-.538-.39-.255-.592-.34-.801-.34-.533 0-1.03.09-1.48.268-.45.178-.84.423-1.158.728-.304.29-.576.644-.806 1.05-.223.392-.403.8-.535 1.214-.128.4-.235.838-.318 1.301-.082.46-.138.895-.166 1.295-.027.391-.041.798-.041 1.209 0 1.069.34 1.934 1.01 2.573.662.63 1.538.95 2.603.95h9.86c1.066 0 1.941-.32 2.603-.95.67-.638 1.01-1.504 1.01-2.573 0-.413-.013-.82-.04-1.21z"/>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>