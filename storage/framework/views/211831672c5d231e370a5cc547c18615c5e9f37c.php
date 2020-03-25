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
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="header__nav_menu relative cursor-pointer text-nowrap text-black font-xs-bold">
                    <?php echo e($menu->title); ?>

                    <?php if($menu->child->count() > 0): ?>
                        <div class="header__nav_sub-menu absolute bg-white cursor-default line-height-1 z-10">
                            <?php $__currentLoopData = $menu->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="/<?php echo e(config('app.locale')); ?>/page/<?php echo e($child->alias); ?>"
                                   class="header__nav_sub-menu_item text-black block l:hover:color-blue-200 text-nowrap">
                                    <?php echo e($child->title); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="header__user header__user--<?php echo e(auth()->check() ? 'active' : 'toggle'); ?> relative flex items-center m-r-auto">
                <a href="<?php echo e(route('admin.login')); ?>"
                   class="flex items-center header__user_link"
                >
                    <?php if(auth()->check()): ?>
                        <span class="text-green-300 font-sm font-bold text-nowrap">
                     <?php echo e(auth()->user()->name .' '.auth()->user()->last_name . ' '); ?>خوش آمدید
                    </span>
                    <?php endif; ?>
                    <object class="block relative">
                        <span class="block header__nav_btn header__nav_btn--user bg-size-contain m-0"></span>
                        <?php if( auth()->check() ): ?>
                            <div class="header__dropdown absolute bg-white border border-solid rounded-10">
                                <?php if( in_array(config('role.roles.legate.name'),auth()->user()->roles->pluck('name')->toArray()) || in_array(config('role.roles.admin.name'),auth()->user()->roles->pluck('name')->toArray())): ?>
                                    <a href="<?php echo e(route('admin.login',config('app.locale'))); ?>"
                                       class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200">
                                        بخش سفیران اهدای عضو
                                    </a>
                                <?php endif; ?>

                                <?php if( in_array(config('role.roles.client.name'),auth()->user()->roles->pluck('name')->toArray())): ?>
                                    <a href="<?php echo e(route('page.client.profile',config('app.locale'))); ?>"
                                       class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200">
                                        کارت اهدای عضو
                                    </a>
                                <?php endif; ?>

                                <?php if(in_array(config('role.roles.legate.name'),auth()->user()->roles->pluck('name')->toArray()) && !in_array(config('role.roles.client.name'),auth()->user()->roles->pluck('name')->toArray())): ?>
                                    <a href="<?php echo e(route('admin.login',config('app.locale'))); ?>"
                                       class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200">
                                        ویرایش پروفایل
                                    </a>
                                <?php elseif(!in_array(config('role.roles.legate.name'),auth()->user()->roles->pluck('name')->toArray()) && in_array(config('role.roles.client.name'),auth()->user()->roles->pluck('name')->toArray())): ?>
                                    <a href="<?php echo e(route('page.edit.client.profile',config('app.locale'))); ?>"
                                       class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200">
                                        ویرایش پروفایل
                                    </a>
                                <?php elseif(in_array(config('role.roles.legate.name'),auth()->user()->roles->pluck('name')->toArray()) && in_array(config('role.roles.client.name'),auth()->user()->roles->pluck('name')->toArray())): ?>
                                    <a href="<?php echo e(route('admin.login',config('app.locale'))); ?>"
                                       class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200">
                                        ویرایش پروفایل
                                    </a>
                                <?php endif; ?>

                                <a href="/user/#/logout"
                                   class="header__dropdown_item w-full block text-blue-800 font-sm font-bold text-nowrap l:hover:color-blue-200">
                                    خروج
                                </a>
                            </div>
                        <?php endif; ?>
                    </object>
                </a>
            </div>
            <a href="<?php echo e(route('index',config('app.locale'))); ?>" class="header__nav_btn header__nav_btn--home"></a>
            <button class="header__nav_btn header__nav_btn--search bg-size-contain"></button>
            <div class="header__nav_lang inline-flex rounded-3 text-center overflow-hidden">
                <a href="<?php echo e(route('index','en')); ?>"
                   class="header__nav_lang--en text-uppercase text-black font-xs-bold flex-1 l:transition"
                   lang="en"
                >
                    en
                </a>
                <a href="<?php echo e(route('index','fa')); ?>"
                   class="header__nav_lang--fa text-uppercase text-black font-xs-bold flex-1 l:transition"
                   lang="fa"
                >
                    fa
                </a>
            </div>
        </div>
    </nav>
</header>
<?php /**PATH /var/www/resources/views/fa/template/part-theme/header.blade.php ENDPATH**/ ?>