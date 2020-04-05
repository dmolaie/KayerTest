<header class="header bg-white">
    <div class="container">
        <div class="header__brand flex items-center justify-between">
            <a href="/"
               class="header__logo block m-l-auto"
            >
                <img src="/images/ic_ehda-center.png"
                     alt="انجمن اهدای عضو ایرانیان"
                     class="header__logo_image block object-contain"
                />
            </a>
        </div>
    </div>
    <nav class="header__nav">
        <div class="header__nav_container container flex items-center">
            @foreach($menus as $menu)
                <div class="header__nav_menu relative cursor-pointer text-nowrap text-black font-xs-bold">
                    {{$menu->title}}
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
                    <object class="block relative">
                        <span class="block header__nav_btn header__nav_btn--user bg-size-contain m-0"></span>
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
                    </object>
                </a>
            </div>
            <a href="{{route('index',config('app.locale'))}}" class="header__nav_btn header__nav_btn--home"></a>
            <button class="header__nav_btn header__nav_btn--search bg-size-contain"></button>
            <div class="header__nav_lang inline-flex rounded-3 text-center overflow-hidden">
                <a href="{{route('index','en')}}"
                   class="header__nav_lang--en text-uppercase text-black font-xs-bold flex-1 l:transition"
                   lang="en"
                >
                    en
                </a>
                <a href="{{route('index','fa')}}"
                   class="header__nav_lang--fa text-uppercase text-black font-xs-bold flex-1 l:transition"
                   lang="fa"
                >
                    fa
                </a>
            </div>
        </div>
    </nav>
</header>
