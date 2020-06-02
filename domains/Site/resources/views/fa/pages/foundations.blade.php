@extends('fa.template.master')
    @section('title', ' | ارکان انجمن')
    @section('content')
        <div class="fou-page i-page">
            <div class="container sm:p-0">
                <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold">
                    <span class="i-page__title text-center cursor-default">
                        ارکان انجمن
                    </span>
                </h1>
                <div class="inner-box inner-box--white text-right">
                    <div class="fou-page__tab w-full flex items-stretch justify-between xl:justify-around sm:flex-wrap">
                        <button class="fou-page__tab_item fou-page__tab_item--volunteers text-white font-bold w-1/5 xl:w-1/6 sm:font-base"
                                data-tab="volunteers" role="tab"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="fou-page__tab_item_icon object-contain pointer-event-none"
                                 viewBox="0 0 73 73"
                            >
                                <g stroke-width=".78">
                                    <path d="M42.213 40.312c5.288-3.767 6.566-11.173 2.853-16.54-3.713-5.367-11.01-6.663-16.299-2.895-5.288 3.768-6.566 11.173-2.853 16.54a11.788 11.788 0 002.853 2.895c-6.247 1.09-10.816 6.583-10.827 13.016v16.465c0 .655.523 1.187 1.17 1.187 0 0 0 0 0 0h32.76c.646 0 1.17-.531 1.17-1.187 0 0 0 0 0 0V53.327c-.011-6.432-4.58-11.925-10.827-13.015zM26.13 30.61c0-5.246 4.19-9.498 9.36-9.498 5.17 0 9.36 4.252 9.36 9.498 0 5.246-4.19 9.5-9.36 9.5-5.167-.007-9.354-4.256-9.36-9.5zM50.7 68.605H20.28V53.327c.007-5.986 4.787-10.837 10.685-10.843h9.05c5.898.006 10.678 4.857 10.685 10.843v15.278zM34.32 7.02H36.66V11.7H34.32z" transform="translate(1 1)"/>
                                    <path d="M46.137 11.338L50.869 11.338 50.869 13.704 46.137 13.704z" transform="translate(1 1) rotate(-45 48.503 12.521)"/>
                                    <path d="M60.06 68.64H64.74000000000001V70.98H60.06zM60.06 56.94H64.74000000000001V59.28H60.06zM60.06 45.24H64.74000000000001V47.58H60.06z" transform="translate(1 1)"/>
                                    <path d="M59.153 33.122L63.885 33.122 63.885 35.488 59.153 35.488z" transform="translate(1 1) rotate(-18.446 61.519 34.305)"/>
                                    <path d="M55.478 20.854L60.209 20.854 60.209 23.22 55.478 23.22z" transform="translate(1 1) rotate(-18.446 57.843 22.037)"/>
                                    <path d="M21.295 10.158L23.661 10.158 23.661 14.89 21.295 14.89z" transform="translate(1 1) rotate(-44.992 22.478 12.524)"/>
                                    <path d="M6.24 68.64H10.92V70.98H6.24zM6.24 56.94H10.92V59.28H6.24zM6.24 45.24H10.92V47.58H6.24z" transform="translate(1 1)"/>
                                    <path d="M8.281 31.939L10.647 31.939 10.647 36.671 8.281 36.671z" transform="translate(1 1) rotate(-71.572 9.464 34.305)"/>
                                    <path d="M11.951 19.679L14.317 19.679 14.317 24.411 11.951 24.411z" transform="translate(1 1) rotate(-71.561 13.134 22.045)"/>
                                    <path d="M69.81 4.68a3.514 3.514 0 01-3.51-3.51 1.17 1.17 0 00-2.34 0 3.514 3.514 0 01-3.51 3.51 1.17 1.17 0 000 2.34 3.514 3.514 0 013.51 3.51 1.17 1.17 0 002.34 0 3.514 3.514 0 013.51-3.51 1.17 1.17 0 000-2.34zm-4.68 2.343a5.9 5.9 0 00-1.173-1.173 5.9 5.9 0 001.173-1.173 5.9 5.9 0 001.173 1.173 5.9 5.9 0 00-1.173 1.173zM10.53 4.68a3.514 3.514 0 01-3.51-3.51 1.17 1.17 0 00-2.34 0 3.514 3.514 0 01-3.51 3.51 1.17 1.17 0 000 2.34 3.514 3.514 0 013.51 3.51 1.17 1.17 0 002.34 0 3.514 3.514 0 013.51-3.51 1.17 1.17 0 000-2.34zM5.85 7.023A5.9 5.9 0 004.677 5.85 5.9 5.9 0 005.85 4.677 5.9 5.9 0 007.023 5.85 5.9 5.9 0 005.85 7.023z" transform="translate(1 1)"/>
                                </g>
                            </svg>
                            سفیران
                        </button>
                        <button class="fou-page__tab_item fou-page__tab_item--sponsors text-white font-bold w-1/5 xl:w-1/6 sm:font-base"
                                data-tab="sponsors" role="tab"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="fou-page__tab_item_icon object-contain pointer-event-none"
                                 viewBox="0 0 79 72"
                            >
                                <path d="M78 51.215l-3.957-3.943a1.616 1.616 0 00-2.293.01c-.63.639-.626 1.67.01 2.303l3.957 3.943a1.612 1.612 0 002.292-.01c.631-.639.627-1.67-.009-2.303zM70.859 43.622a1.439 1.439 0 00-2.036 0l-.002.002a1.439 1.439 0 102.037 2.034 1.44 1.44 0 000-2.036z"/>
                                <path d="M57.554 50.506l14.912-14.87a5.772 5.772 0 00-2.793-9.711c.35-.753.537-1.58.537-2.435a5.73 5.73 0 00-1.697-4.085 5.752 5.752 0 00-3.11-1.607A5.77 5.77 0 0060.89 10.3c.19-.578.292-1.188.292-1.814a5.73 5.73 0 00-1.697-4.084A5.763 5.763 0 0055.39 2.71c-.982 0-1.927.243-2.766.7l-.149-.16A10.27 10.27 0 0044.99 0H32.92c-.85 0-1.537.686-1.537 1.533v2.01c0 .805.136 1.588.397 2.324a5.798 5.798 0 00-2.223-.439c-1.547 0-3.002.6-4.096 1.692a5.77 5.77 0 00-1.402 5.897 5.765 5.765 0 00-3.112 1.605 5.731 5.731 0 00-1.696 4.084c0 .625.1 1.234.29 1.81a5.775 5.775 0 00-4.266 8.123 5.772 5.772 0 00-2.794 9.714l3.066 3.059L.45 56.467c-.6.599-.6 1.57 0 2.168a1.535 1.535 0 002.174 0l15.243-15.2a5.769 5.769 0 002.863.753c1.547 0 3.001-.601 4.096-1.692a5.752 5.752 0 001.688-4.318c.078.003.156.006.234.006a5.784 5.784 0 004.095-1.69 5.731 5.731 0 001.691-4.317 5.783 5.783 0 004.327-1.684 5.731 5.731 0 001.691-4.318c.077.003.154.006.231.006a5.773 5.773 0 004.48-9.435L53.467 6.57a2.703 2.703 0 011.922-.794c.726 0 1.409.282 1.922.794.514.512.796 1.192.796 1.917 0 .724-.282 1.404-.796 1.916l-1.504 1.5-5.459 5.444c-.6.599-.6 1.57 0 2.168a1.535 1.535 0 002.174 0l5.459-5.443a2.727 2.727 0 013.844 0 2.709 2.709 0 010 3.833l-1.505 1.5-3.954 3.944c-.6.598-.6 1.57 0 2.168.3.299.694.449 1.087.449s.787-.15 1.087-.45l3.954-3.942a2.703 2.703 0 011.922-.794c.726 0 1.409.281 1.922.794.513.512.796 1.192.796 1.916s-.283 1.405-.796 1.917l-2.065 2.06-1.89 1.883c-.6.599-.6 1.57 0 2.168.3.3.694.45 1.088.45.393 0 .786-.15 1.087-.45l1.89-1.885a2.727 2.727 0 013.843.002 2.708 2.708 0 010 3.833L55.379 48.34a20.851 20.851 0 01-14.013 6.088 1.539 1.539 0 00-1.033.45L26.558 68.665a1.535 1.535 0 001.089 2.615c.394 0 .788-.15 1.088-.451l10.132-10.142a14.318 14.318 0 008.678 2.227l7.93 7.908c.3.3.694.45 1.087.45a1.534 1.534 0 001.087-2.618l-8.431-8.409a1.54 1.54 0 00-1.213-.444l-.487.04a11.246 11.246 0 01-6.415-1.392l.988-.99a23.914 23.914 0 0015.463-6.953zM22.652 40.328a2.704 2.704 0 01-1.922.794 2.703 2.703 0 01-1.922-.794l-4.154-4.142a2.709 2.709 0 011.922-4.628c.726 0 1.41.282 1.922.794l4.154 4.142a2.709 2.709 0 010 3.834zm6.018-6.002a2.727 2.727 0 01-3.844 0l-4.154-4.142-2.065-2.06a2.709 2.709 0 011.922-4.627c.726 0 1.409.282 1.922.794l6.219 6.202a2.69 2.69 0 01.796 1.917 2.69 2.69 0 01-.796 1.916zm6.018-6.001a2.727 2.727 0 01-3.844 0l-7.724-7.702a2.689 2.689 0 01-.796-1.917 2.714 2.714 0 012.718-2.71c.696 0 1.392.265 1.921.792l3.52 3.51 4.205 4.193a2.69 2.69 0 01.796 1.917c0 .724-.283 1.405-.796 1.917zm6.018-6.002a2.727 2.727 0 01-3.844 0l-7.723-7.701-.003-.003-1.502-1.498a2.709 2.709 0 011.922-4.626c.696 0 1.392.264 1.922.792l9.228 9.203c.513.512.796 1.192.796 1.916 0 .725-.282 1.406-.796 1.917zm.404-7.766l-4.222-4.21c.479.102.971.156 1.472.156h.034l4.218-.02a1.535 1.535 0 001.53-1.54 1.535 1.535 0 00-1.537-1.526h-.007l-4.218.02h-.02a3.884 3.884 0 01-2.754-1.134 3.862 3.862 0 01-1.15-2.76v-.477H44.99c1.978 0 3.886.828 5.235 2.273l.062.067-9.177 9.151z"/>
                            </svg>
                            حامیان
                        </button>
                        <button class="fou-page__tab_item fou-page__tab_item--members text-white font-bold w-1/5 xl:w-1/6 sm:font-base"
                                data-tab="members" role="tab"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="fou-page__tab_item_icon object-contain pointer-event-none"
                                 viewBox="0 0 69 69"
                            >
                                <path d="M61.873 37.901v-2.297c.632 0 1.145-.514 1.145-1.148v-6.891c0-.635-.513-1.149-1.145-1.149h-6.18l-.222-.863a21.264 21.264 0 00-2.336-5.611l-.457-.769 4.388-4.41a1.141 1.141 0 000-1.609L52.205 8.27a1.158 1.158 0 00-1.603 0l-4.396 4.412-.766-.46a21.16 21.16 0 00-5.6-2.344l-.859-.224V3.446c0-.635-.512-1.149-1.144-1.149h-6.868c-.632 0-1.145.514-1.145 1.149v6.202l-.86.223a21.155 21.155 0 00-5.593 2.341l-.766.46-4.395-4.403a1.158 1.158 0 00-1.608 0l-4.862 4.878a1.143 1.143 0 000 1.615l4.396 4.411-.458.769a21.263 21.263 0 00-2.334 5.611l-.225.863H6.932c-.632 0-1.144.514-1.144 1.149v6.89c0 .635.512 1.15 1.144 1.15V37.9A3.44 3.44 0 013.5 34.456v-6.891a3.44 3.44 0 013.433-3.446h4.429a23.498 23.498 0 011.905-4.574l-3.148-3.159a3.441 3.441 0 010-4.863l4.865-4.88a3.497 3.497 0 014.847 0l3.146 3.156a23.333 23.333 0 014.56-1.909V3.446A3.44 3.44 0 0130.968 0h6.868a3.44 3.44 0 013.433 3.446V7.89a23.338 23.338 0 014.56 1.91l3.147-3.158a3.497 3.497 0 014.847 0l4.864 4.88a3.44 3.44 0 010 4.863l-3.148 3.158a23.587 23.587 0 011.905 4.576h4.428a3.44 3.44 0 013.434 3.446v6.89a3.44 3.44 0 01-3.434 3.446z"/>
                                <path d="M50.146 30.321h-2.29c0-7.453-6.154-13.494-13.745-13.494-7.59 0-13.744 6.041-13.744 13.494h-2.29c0-8.695 7.178-15.744 16.034-15.744 8.856 0 16.035 7.05 16.035 15.744z"/>
                                <path d="M34.111 39.65a6.706 6.706 0 116.706-6.705 6.712 6.712 0 01-6.706 6.706zm0-11.175a4.47 4.47 0 100 8.94 4.47 4.47 0 000-8.94zM53.354 44.315a6.706 6.706 0 116.705-6.705 6.712 6.712 0 01-6.705 6.705zm0-11.176a4.47 4.47 0 100 8.942 4.47 4.47 0 000-8.942zM14.869 44.315a6.706 6.706 0 116.706-6.705 6.712 6.712 0 01-6.706 6.705zm0-11.176a4.47 4.47 0 100 8.942 4.47 4.47 0 000-8.942z"/>
                                <path d="M63.749 47.172a10.089 10.089 0 00-5.76-1.787h-9.096c-.553.004-1.105.055-1.65.15a10.227 10.227 0 00-2.785-2.902 4.408 4.408 0 00-.524-.342 10.122 10.122 0 00-5.275-1.474h-9.096a10.11 10.11 0 00-8.58 4.718c-.546-.095-1.1-.146-1.653-.15h-9.097a10.089 10.089 0 00-5.756 1.785A10.29 10.29 0 000 55.662v4.567a8.003 8.003 0 004.63 7.256 7.683 7.683 0 003.33.738h11.37v-2.284H9.096V53.378H6.822v12.446a5.32 5.32 0 01-1.238-.413 5.72 5.72 0 01-3.31-5.182v-4.567a8.01 8.01 0 013.486-6.608 7.841 7.841 0 014.473-1.386h9.097c.2 0 .393.022.589.035a10.316 10.316 0 00-.59 3.391v11.419c.005 3.152 2.548 5.705 5.686 5.71h3.411v-18.27h-2.274v15.986h-1.137a3.419 3.419 0 01-3.411-3.426V51.094c0-4.415 3.564-7.993 7.96-7.993h9.095a7.92 7.92 0 014.145 1.175c.115.063.226.134.332.213a8.003 8.003 0 013.483 6.605v11.419a3.419 3.419 0 01-3.411 3.426H42.07V49.952h-2.275v18.27h3.412c3.138-.004 5.68-2.557 5.685-5.71V51.095a10.34 10.34 0 00-.588-3.39c.196-.014.389-.036.588-.036h9.096a7.847 7.847 0 014.476 1.388 8.013 8.013 0 013.483 6.606v4.567a5.719 5.719 0 01-3.329 5.19c-.388.186-.798.321-1.219.405V53.378h-2.274v12.56H48.893v2.285h11.37a7.664 7.664 0 003.31-.73 8.005 8.005 0 004.65-7.264v-4.567a10.29 10.29 0 00-4.474-8.49z"/>
                                <path d="M29.738 65.89L38.485 65.89 38.485 68.223 29.738 68.223z"/>
                            </svg>
                            اعضا
                        </button>
                        <button class="fou-page__tab_item fou-page__tab_item--committees text-white font-bold w-1/5 xl:w-1/6 sm:font-base"
                                data-tab="committees" role="tab"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="fou-page__tab_item_icon object-contain pointer-event-none"
                                 viewBox="0 0 69 69"
                            >
                                <path d="M62.471 54.906a6.607 6.607 0 002.62-5.26c0-3.274-2.391-5.992-5.517-6.52v-1.203a5.522 5.522 0 00-5.516-5.517H35.303v-4.02c.596.454 1.312.71 2.073.71a3.44 3.44 0 003.431-3.321 3.434 3.434 0 003.31-3.31 3.434 3.434 0 003.31-3.31 3.44 3.44 0 003.321-3.43c0-.92-.358-1.785-1.008-2.435l-.23-.23a10.384 10.384 0 002.342-6.596C51.852 4.694 47.157 0 41.388 0c-2.7 0-5.236 1.024-7.188 2.873A10.387 10.387 0 0027.012 0c-5.77 0-10.464 4.694-10.464 10.464 0 2.71 1.032 5.258 2.896 7.213a3.413 3.413 0 00-.69 2.048 3.44 3.44 0 003.323 3.43 3.434 3.434 0 003.31 3.31 3.434 3.434 0 003.309 3.31 3.44 3.44 0 003.431 3.322c.335 0 .658-.063.97-.155v3.464H14.342a5.522 5.522 0 00-5.516 5.517v1.202c-3.126.529-5.516 3.247-5.516 6.52a6.607 6.607 0 002.619 5.261C2.443 56.45 0 59.936 0 63.987V68.4h19.858v-4.413c0-4.05-2.442-7.538-5.929-9.08a6.607 6.607 0 002.62-5.262c0-3.273-2.391-5.991-5.517-6.52v-1.202a3.314 3.314 0 013.31-3.31h18.755v4.512c-3.126.527-5.516 3.246-5.516 6.52a6.607 6.607 0 002.619 5.261c-3.486 1.543-5.929 5.03-5.929 9.081V68.4h19.858v-4.413c0-4.05-2.443-7.538-5.929-9.08a6.607 6.607 0 002.62-5.262c0-3.273-2.391-5.991-5.517-6.52v-4.512h18.755a3.314 3.314 0 013.31 3.31v1.202c-3.126.527-5.516 3.246-5.516 6.52a6.607 6.607 0 002.619 5.261c-3.487 1.543-5.93 5.03-5.93 9.081V68.4H68.4v-4.413c0-4.05-2.443-7.538-5.929-9.08zm-21.083-52.7c4.553 0 8.257 3.705 8.257 8.258a8.187 8.187 0 01-1.71 5.02l-5.072-5.073a8.91 8.91 0 00.944-.805l-1.56-1.56a6.391 6.391 0 01-4.549 1.883H35.95l-1.883 1.883a1.098 1.098 0 01-.782.323h-4.144a.458.458 0 01-.324-.78l6.731-6.73a8.207 8.207 0 015.84-2.419zm-14.376 0c2.105 0 4.085.79 5.617 2.217l-5.373 5.373a2.666 2.666 0 001.884 4.546h4.145a3.29 3.29 0 002.341-.97l1.237-1.237h.835c1.102 0 2.17-.21 3.165-.602l7.317 7.317a1.238 1.238 0 01-1.75 1.75l-2.624-2.625-1.56 1.56 2.624 2.624a1.238 1.238 0 01-1.75 1.75l-2.624-2.624-1.56 1.56 2.625 2.624a1.238 1.238 0 01-1.75 1.75l-2.625-2.625-1.56 1.56 2.625 2.625a1.238 1.238 0 01-1.75 1.75l-.368-.369c.177-.42.273-.873.273-1.343a3.44 3.44 0 00-3.321-3.43 3.434 3.434 0 00-3.31-3.31 3.434 3.434 0 00-3.31-3.31 3.44 3.44 0 00-3.43-3.322c-.743 0-1.443.243-2.028.674a8.194 8.194 0 01-2.252-5.655c0-4.553 3.704-8.258 8.257-8.258zm-6.05 17.519c0-.331.128-.641.361-.875l.836-.837a1.238 1.238 0 011.75 1.75l-.836.836a1.238 1.238 0 01-2.112-.875zm3.309 3.31c0-.332.129-.642.362-.876l.836-.836a1.238 1.238 0 011.75 1.75l-.836.836a1.238 1.238 0 01-2.112-.875zm3.31 3.309c0-.331.129-.641.362-.875l.836-.836a1.238 1.238 0 011.75 1.75l-.837.836a1.238 1.238 0 01-2.112-.875zm4.546 4.546a1.238 1.238 0 01-.875-2.111l.836-.836a1.238 1.238 0 011.75 1.75l-.836.835a1.232 1.232 0 01-.875.362zM17.652 63.987v2.207h-2.207V61.78H13.24v4.413h-6.62V61.78H4.413v4.413H2.206v-2.207c0-4.258 3.465-7.722 7.723-7.722s7.723 3.464 7.723 7.722zm-3.31-14.342a4.417 4.417 0 01-4.413 4.413 4.417 4.417 0 01-4.413-4.413 4.417 4.417 0 014.413-4.413 4.417 4.417 0 014.413 4.413zm27.58 14.342v2.207h-2.206V61.78H37.51v4.413h-6.62V61.78h-2.206v4.413h-2.207v-2.207c0-4.258 3.465-7.722 7.723-7.722s7.723 3.464 7.723 7.722zm-3.31-14.342a4.417 4.417 0 01-4.412 4.413 4.417 4.417 0 01-4.413-4.413 4.417 4.417 0 014.413-4.413 4.417 4.417 0 014.413 4.413zm15.446 0a4.417 4.417 0 014.413-4.413 4.417 4.417 0 014.413 4.413 4.417 4.417 0 01-4.413 4.413 4.417 4.417 0 01-4.413-4.413zm12.136 16.549h-2.207V61.78h-2.206v4.413h-6.62V61.78h-2.206v4.413h-2.207v-2.207c0-4.258 3.465-7.722 7.723-7.722s7.723 3.464 7.723 7.722v2.207z"/>
                                <path d="M40.8 40.8L43.2 40.8 43.2 43.2 40.8 43.2zM45 40.8L47.4 40.8 47.4 43.2 45 43.2zM49.8 40.8L52.2 40.8 52.2 43.2 49.8 43.2zM16.2 40.8L18.6 40.8 18.6 43.2 16.2 43.2zM21 40.8L23.4 40.8 23.4 43.2 21 43.2zM25.2 40.8L27.6 40.8 27.6 43.2 25.2 43.2z"/>
                            </svg>
                            کمیته‌ها
                        </button>
                    </div>
                    <div class="fou-page__content cursor-default">
                        <div class="fou-page__content_item fou-page__content_item--volunteers"
                             data-tab="volunteers"
                        >
                            <div class="fou-page__volunteers">
                                <p class="i-page__sub-title text-blue-800 font-lg font-bold m-b-20 sm:font-sm">
                                    سفیران اهدای عضو :
                                </p>
                                <p class="text-bayoux font-base text-justify sm:font-base">
                                    بدیهی است فعالیت‌های انجمن بالاخص فعالیت‌های عظیم فرهنگی و آموزشی نمی‌تواند تنها توسط ۱۲ نفر پرسنل آن انجام گردد. در این راستا نیروهای داوطلب همیشه از ارکان مهم انجمن بوده و بخش اعظمی از کار زیر نظر مدیران انجمن توسط این نیروها صورت می‌گیرد. سفیر اهدای عضو نیروی داوطلبی است که با هر شغل و سمتی که دارد در کنار انجمن پاره‌ای از مسئولیت‌ها را در رشته تخصصی خود و گاهی کاملاً دور از آن به عهده گرفته و یکرنگ و خالصانه در کنار دیگر سفیران و پرسنل انجمن حماسه‌های مختلف را در کشور ایجاد می‌نماید.
                                    (<a href="" class="font-bold">سفیران اهدای عضو</a>)
                                </p>
                                <p class="relative text-bayoux font-base text-has-flower text-justify sm:font-base">
                                    بسیاری از سفیران انجمن هنرمندان، ورزشکاران، روحانیون و مقاماتی هستند که بودنشان در کنار انجمن موجب تاثیر بسیار مثبت در ارتقای فرهنگ مقدس اهدای عضو و جلب مردم گشته و هر چه بیشتر موجب نهادینه شدن این نهال نوپا می‌گردد. این افراد همیشه بدون چشمداشت در فعالیت‌های مختلف در کنار ما حضور پیدا کرده و با تبلیغ اهدای عضو بخصوص در فضای مجازی مردم را با مسئله مرگ مغزی و اهدای عضو آشناتر می‌کنند.
                                </p>
                                <p class="fou-page__volunteers__title relative flex items-center text-blue-800 font-lg font-bold m-b-20">
                                    <span class="i-page__sub-title">
                                        سفیران مشاهیر :
                                    </span>
                                    <a href=""
                                       class="router-link relative inline-block font-xs-bold m-r-auto">
                                        بیشتر
                                    </a>
                                </p>
                                <div class="fou-page__volunteers__list flex flex-wrap items-start justify-between xl:justify-around">
                                    <div class="fou-page__volunteers__list_item relative border border-solid border-blue-100 rounded-50 has-shadow">
                                        <figure class="fou-page__volunteers__list_item_body w-full h-full rounded-inherit has-skeleton">
                                            <img src=""
                                                 data-src="{{ asset('images/members/1571823208.jpg') }}"
                                                 alt="نفیسه روشن"
                                                 class="fou-page__volunteers__list_item_image block w-full h-full rounded-inherit object-cover"
                                            />
                                            <figcaption class="fou-page__volunteers__list_item_caption absolute w-full text-center font-sm font-medium pointer-event-none opacity-0 z-2">
                                                نفیسه روشن
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="fou-page__volunteers__list_item relative border border-solid border-blue-100 rounded-50 has-shadow">
                                        <figure class="fou-page__volunteers__list_item_body w-full h-full rounded-inherit has-skeleton">
                                            <img src=""
                                                 data-src="{{ asset('images/members/1529305726_vj9i8Q3lsn93.jpg') }}"
                                                 alt="مهراوه شریفی‌نیا"
                                                 class="fou-page__volunteers__list_item_image block w-full h-full rounded-inherit object-cover"
                                            />
                                            <figcaption class="fou-page__volunteers__list_item_caption absolute w-full text-center font-sm font-medium pointer-event-none opacity-0 z-2">
                                                مهراوه شریفی‌نیا
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="fou-page__volunteers__list_item relative border border-solid border-blue-100 rounded-50 has-shadow">
                                        <figure class="fou-page__volunteers__list_item_body w-full h-full rounded-inherit has-skeleton">
                                            <img src=""
                                                 data-src="{{ asset('images/members/HSNvtKX6rsFpgT.jpg') }}"
                                                 alt="ثریا قاسمی"
                                                 class="fou-page__volunteers__list_item_image block w-full h-full rounded-inherit object-cover"
                                            />
                                            <figcaption class="fou-page__volunteers__list_item_caption absolute w-full text-center font-sm font-medium pointer-event-none opacity-0 z-2">
                                                ثریا قاسمی
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="fou-page__volunteers__list_item relative border border-solid border-blue-100 rounded-50 has-shadow">
                                        <figure class="fou-page__volunteers__list_item_body w-full h-full rounded-inherit has-skeleton">
                                            <img src=""
                                                 data-src="{{ asset('images/members/v8YhNJEmbpTYEQKMux3RAWFc.jpg') }}"
                                                 alt="داریوش ارجمند"
                                                 class="fou-page__volunteers__list_item_image block w-full h-full rounded-inherit object-cover"
                                            />
                                            <figcaption class="fou-page__volunteers__list_item_caption absolute w-full text-center font-sm font-medium pointer-event-none opacity-0 z-2">
                                                داریوش ارجمند
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="fou-page__volunteers__list_item relative border border-solid border-blue-100 rounded-50 has-shadow">
                                        <figure class="fou-page__volunteers__list_item_body w-full h-full rounded-inherit has-skeleton">
                                            <img src=""
                                                 data-src="{{ asset('images/members/152931q1d4xGRaBk38nTH.jpg') }}"
                                                 alt="دکتر محمد نظری"
                                                 class="fou-page__volunteers__list_item_image block w-full h-full rounded-inherit object-cover"
                                            />
                                            <figcaption class="fou-page__volunteers__list_item_caption absolute w-full text-center font-sm font-medium pointer-event-none opacity-0 z-2">
                                                دکتر محمد نظری
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="fou-page__volunteers__list_item relative border border-solid border-blue-100 rounded-50 has-shadow">
                                        <figure class="fou-page__volunteers__list_item_body w-full h-full rounded-inherit has-skeleton">
                                            <img src=""
                                                 data-src="{{ asset('images/members/1529315796_w2J1JkgH2e.jpg') }}"
                                                 alt="محمد سلوکی"
                                                 class="fou-page__volunteers__list_item_image block w-full h-full rounded-inherit object-cover"
                                            />
                                            <figcaption class="fou-page__volunteers__list_item_caption absolute w-full text-center font-sm font-medium pointer-event-none opacity-0 z-2">
                                                محمد سلوکی
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <a href="{{route('page.volunteers',config('app.locale'))}}"
                                   class="fou-page__volunteers__link block bg-blue border border-solid rounded-2 text-white font-base-bold text-center transition-bg l:hover:bg-blue-200"
                                >
                                    می‌خواهید سفیر شوید ؟
                                </a>
                            </div>
                        </div>
                        <div class="fou-page__content_item fou-page__content_item--sponsors"
                             data-tab="sponsors"
                        >
                            <div class="fou-page__sponsors">
                                <p class="i-page__sub-title text-blue-800 font-20 font-bold m-b-17">
                                    حامیان :
                                </p>
                                <p class="text-blue-800 font-lg font-bold m-b-5">
                                    الف – سازمان‌ها و نهادها
                                </p>
                                <p class="text-bayoux font-base font-medium cursor-default m-b-20 md:font-sm text-justify sm:font-base">
                                    همانگونه که اعضای هیئت موسس، هیئت امنا و هیئت مدیره انجمن اهدای عضو ایرانیان بدون هیچگونه چشمداشت، با صرف انرژی، اعتبار و با تلاش بی‌شائبه خود مجدانه انجمن را در مسیر اهداف مقدس خود پیش برده‌اند، سازمان‌ها، نهادها و افراد زیادی با همراهی مادی و معنوی خود باعث عملی شدن این اهداف گردیده‌اند. در واقع می‌توان گفت که همه اقدامات موثر انجمن در ارتقای اهدای عضو کشور ماحصل همت جمعی همه این افراد، سازمان‌ها و ارگان‌ها و در کل ملت شریف ایران بوده و خواهد بود. از جمله سازمان‌ها و نهادهای همراه این انجمن می‌توان به موارد زیر اشاره کرد:
                                </p>
                                <div class="fou-page__sponsors">
                                    <a href="https://www.bpi.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/bpi.ir.jpg') }}"
                                                 alt="بانک پاسارگاد"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                بانک پاسارگاد
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                حمایت‌های بی‌دریغ بانک پاسارگاد و به طور ویژه جناب آقای دکتر قاسمی مدیرعامل محترم این بانک از جمله: الف. در اختیار گذاردن محل موقت انجمن در دانشگاه خاتم - ب. در اختیار کذاشتن محل دائمی انجمن واقع در خیابان ولیعصر - ج. بازسازی و تجهیز ساختمان محل دائمی انجمن - د. کمک در برگزاری مراسم جشن نفس ۱۳۹۴ و ۱۳۹۵ - ه. چاپ کتاب آثار جشنواره تجسمی نفس – و تلاش در جهت تشکیل صندوق نیکوکاری برای انجمن اهدای عضو ایرانیان.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.behdasht.gov.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/behdasht.gov.jpg') }}"
                                                 alt="وزارت بهداشت، درمان و آموزش پزشکی"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                وزارت بهداشت، درمان و آموزش پزشکی
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                وزرای محترم بهداشت، معاونت‌های محترم وزارت بهداشت بالاخص معاونت اجتماعی، معاونت درمان، معاونت تحقیقات و فناوری، معاونت فناوری اطلاعات و همچنین روابط عمومی، حراست و دیگر بخش‌ها و معاونت‌های وزارت بهداشت همه ساله در مراسم‌ها، همایش‌ها و فعالیت‌های انجمن حامی و همراه همیشگی بودند.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://www.irib.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/irib.ir.jpg') }}"
                                                 alt="سازمان صدا و سیمای جمهوری اسلامی"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                سازمان صدا و سیمای جمهوری اسلامی
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                صدا و سیمای جمهوری اسلامی ایران، سال هاست که صدا و سیمای جمهوری اسلامی ایران، فرهنگ سازی اهدای عضو را در اولویت امور تبلیغاتی خود در کشور، قرار داده است و با پخش رایگان  تیزر ، زیرنویس‌ ، پخش همه ساله خلاصه مراسم جشن نفس در تلویزیون، حمایت از تولید و پخش تله فیلمها و سریال ها، برنامه های مستند و مصاحبه محور و ... در ارتقای فرهنگ اهدای عضو ایران، مهم ترین نقش را ایفا نموده است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://www.mporg.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/mporg.ir.jpg') }}"
                                                 alt="سازمان برنامه و بودجه کشور"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                سازمان برنامه و بودجه کشور
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                یکی از حامیان اصلی نهادینه‌سازی فرهنگ اهدای عضو در کشور در طول سالیان گذشته، سازمان برنامه و بودجه بوده است که همواره با کمک به تامین هزینه‌ فعالیت‌های فرهنگی انجمن، مانند جشن نفس ، ضیافت نفس و ...  نقش به‌سزایی در آگاهی آحاد جامعه از این مقوله مهم نظام سلامت داشته است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://fanap.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/fanap.ir.jpg') }}"
                                                 alt="شرکت فناوری اطلاعات و ارتباطات پاسارگاد آریان (فناپ)"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت فناوری اطلاعات و ارتباطات پاسارگاد آریان (فناپ)
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                همراهی همیشگی در بخش‌های فنی و تخصصی IT، برندینگ، ارتباطات سازمانی با اپراتورهای تلفن همراه، طراحی و اجرای ربات فضای مجازی صدور کارت اهدای عضو.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://fanap.plus" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/fanap.plus.png') }}"
                                                 alt="شرکت فناپ پلاس"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت فناپ پلاس
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                تدوین کتاب راهنمای برندینگ انجمن، طراحی ربات فضای مجازی ثبت نام کارت اهدای عضو، طراحی سامانه فرهنگی انجمن و کمک به فرایندهای مرتبط با برنامه‌نویسی سامانه‌ها و تدوین و اجرای کمپین‌ها.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://negah.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/negah.ir.jpg') }}"
                                                 alt="آژانس تبلیغاتی نگاه شرقی سبز"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                آژانس تبلیغاتی نگاه شرقی سبز
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                شرکت نگاه شرقی سبز با مشاوره،  همراهی در اجرا و مستندسازی مراسم و رویدادهای انجمن و حتی کمک در تهیه و چاپ آثار فرهنگی، یار و یاور همیشگی انجمن بوده است. نکته مهم این است که تمام همراهی‌های بی‌دریغ و خالصانه این شرکت بدون هیچگونه چشم داشتی صورت گرفته و این شرکت یکی از موثرترین سازمان‌های همراه انجمن در مسیر سخت خود بوده است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://khatam.ac.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/khatam.ac.ir.png') }}"
                                                 alt="دانشگاه خاتم"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                دانشگاه خاتم
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                این دانشگاه که زیر مجموعه‌ای از بانک پاسارگاد است در طول سال‌های گذشته، یکی از بزرگترین حامیان انجمن اهدای عضو ایرانیان بوده است؛ در سال اول تأسیس انجمن، با در اختیار قرار دادن فضا و کلیه امکانات اداری و آموزشی، مکانی امن برای استقرار انجمن فراهم نمود و پس از آن با در اختیار قرار دادن سالن‌های اجتماعات با کلیه امکانات و حمایت بی‌نظیر، مأمنی شده است برای برگزاری مراسم مختلف انجمن اهدای عضو ایرانیان؛ به ویژه همایش‌های دوره‌ای سفیران.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.tehran.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/tehran.ir.jpg') }}"
                                                 alt="شهرداری تهران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شهرداری تهران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                در اختیار قرار دادن رایگان و یا در نظر گرفتن تخفیف قابل توجه برای استفاده امکانات برج میلاد در برگزاری جشن نفس‎ها و حضور فعال شهرداران محترم تهران در مراسم جشن نفس، تخصیص بوستان نفس به منظور فعالیت‌های فرهنگی و مددکاری در حوزه اهدای عضو و همکاری خوب و پررنگ در برگزاری ضیافت نفس.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://ccia.tehran.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/ccia.tehran.jpg') }}"
                                                 alt="مرکز ارتباطات و امور بین‌الملل شهرداری تهران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                مرکز ارتباطات و امور بین‌الملل شهرداری تهران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                مرکز ارتباطات و امور بین‌الملل شهرداری تهران با کمک در برگزاری ضیافت نفس در سال ۱۳۸۷ به مدت ده شب، کمک به تخصیص بوستان نفس به انجمن به منظور فعالیت‌های فرهنگی، کمک در برگزاری مراسم افتتاحیه بهره‌برداری از بوستان نفس و روز درختکاری و همچنین در برگزاری پویش شهر نفس، همراه موثر و فعال انجمن بوده‌اند به طوری که با همراهی این سازمان این حرکت‌های فرهنگی نمی‌توانست تا این حد باشکوه و موثر برگزار شود.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://farhangi.tehran.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/farhangi.tehran.jpg') }}"
                                                 alt="معاونت امور اجتماعی و فرهنگی شهرداری تهران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                معاونت امور اجتماعی و فرهنگی شهرداری تهران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                حمایت اداره کل سلامت معاونت امور اجتماعی و فرهنگی شهرداری تهران از برگزاری جشن نفس‌ها.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.zibasazi.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/zibasazi.ir.jpg') }}"
                                                 alt="سازمان زیباسازی شهر تهران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                سازمان زیباسازی شهر تهران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                عقد تفاهم‌نامه همکاری همه جانبه با انجمن اهدای عضو ایرانیان و در اختیار گذاردن فضاهای تبلیغاتی و طراحی و اجرای محتوای مرتبط با فرهنگ‌سازی اهدای عضو.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://www.farhangsara.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/farhangsara.ir.jpg') }}"
                                                 alt="سازمان فرهنگی هنری شهرداری تهران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                سازمان فرهنگی هنری شهرداری تهران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                سازمان فرهنگی هنری شهرداری تهران طی تفاهم‌نامه‌ای با انجمن اهدای عضو ایرانیان، حامی معنوی فعالیت‌های فرهنگی و هنری اهدای عضو بوده و طی تفاهم‌نامه‌ای از طریق فرهنگسراهای تهران در برنامه‌های مختلف با این انجمن همکاری می‌نماید. از جمله این همکاری‌ها تخصیص رایگان سالن برای برگزاری نشست‌های ادبی نفس در فرهنگسراهای شفق (خانواده)، فردوس و نیاوران بوده است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://parks.tehran.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/parks.tehran.jpg') }}"
                                                 alt="سازمان بوستان‌ها و فضای سبز شهر تهران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                سازمان بوستان‌ها و فضای سبز شهر تهران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                سازمان بوستان‌ها و فضای سبز تهران با تخصیص بوستان نفس به انجمن به منظور فعالیت‌های فرهنگی، کمک در برگزاری مراسم افتتاحیه بهره‌برداری از بوستان نفس و روز درختکاری و همچنین کمک در برگزاری ضیافت نفس به مدت ده شب در بوستان نفس، از مهمترین سازمان‌های همراه انجمن بوده است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://miladtower.tehran.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/miladtower.tehran.jpg') }}"
                                                 alt="برج میلاد تهران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                برج میلاد تهران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                از همراهان همیشگی اهدای عضو کشور در ارتقای این فرهنگ مقدس، مسئولین برج میلاد تهران بوده‎اند که از سال ۱۳۹۴ با در اختیار گذاردن رایگان و یا در نظر گرفتن تخفیف قابل توجه برای تمام فضاهای مربوطه در راستای برگزاری مراسم جشن نفس، نقش به سزایی در نهادینه‌سازی این فرهنگ مهم داشته‌اند.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://metro.tehran.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/metro.tehran.png') }}"
                                                 alt="شرکت بهره‌برداری قطار درون‌شهری تهران و حومه و فرهنگسرای مترو"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت بهره‌برداری قطار درون‌شهری تهران و حومه و فرهنگسرای مترو
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                کمک به برگزاری شهر نفس ۱۳۹۸ با تخصیص فضای برپایی غرفه در چهار ایستگاه پرتردد مترو تهران، همکاری در برگزاری سه شب مراسم در شهر نفس ۱۳۹۸ در ایوان انتظار میدان ولیعصر
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://setad.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/setad.ir.jpg') }}"
                                                 alt="ستاد اجرایی فرمان امام خمینی (ره)"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                ستاد اجرایی فرمان امام خمینی (ره)
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                این ستاد با حمایت مالی در زمینه تامین هزینه‌های جشن نفس به صورتی بسیار موثر همراه انجمن بوده است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://aftabnetgroup.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/aftabnetgroup.com.jpg') }}"
                                                 alt="شرکت تبلیغاتی آیینه آفتاب کیش"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت تبلیغاتی آیینه آفتاب کیش
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                این شرکت از مشاورین فرهنگی هنری انجمن اهدای عضو ایرانیان می‌‎باشد و با در اختیار قرار دادن اتاق فکر مجموعه و هم چنین تولید رایگان محتوای فرهنگی اهدای عضو، نقش به سزایی در فرهنگسازی جامعه داشته است.
                                            </p>
                                        </div>
                                    </a>
                                    <a target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/dirin-dirin.jpg') }}"
                                                 alt="شرکت نسل اندیشه سبز (دیرین دیرین)"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت نسل اندیشه سبز (دیرین دیرین)
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                مؤسسه دیرین دیرین با تخصیص رایگان حدود ۱۴ قسمت از مجموعه دیرین دیرین به اهدای عضو، نقش مؤثری در ارتقای فرهنگ اهدای عضو داشته است و مشاور فرهنگی هنری و سفیر همیشه همراه اهدای عضو کشور می‌باشد.
                                            </p>
                                        </div>
                                    </a>
                                    <a target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/s.d.jpg') }}"
                                                 alt="استودیو دفتر"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                استودیو دفتر
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                یکی دیگر از حامیان همیشه همراه انجمن اهدای عضو ایرانیان و نامی آشنا در فرهنگسازی اهدای عضو به ویژه در مقوله طراحی و گرافیک، آقای مجید کاشانی است که هم از طریق طراحی پوستر و آثار گرافیکی، در کنار انجمن بوده‌اند و هم با اهدای عایدی حاصل از تولید یک فونت ویژه به انجمن، در زمره حامیان مالی قرار گرفتند.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://tashrifat-ghoreishi.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/tashrifat-ghoreishi.jpg') }}"
                                                 alt="گروه غذایی قریشی"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                گروه غذایی قریشی
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                گروه غذایی قریشی حامی همیشه همراه انجمن اهدای عضو بوده است و با تهیه غذا و میان وعده خانواده‌های اهداکننده عضو، بیماران، تیم‌های درمانی، هنرمندان و مسئولین با تخفیف ویژه در مراسم جشن نفس و ضیافت نفس همواره در نهادینه‌سازی این فرهنگ مقدس حضور فعال داشته است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://bmi.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/bmi.ir.jpg') }}"
                                                 alt="بانک ملی ایران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                بانک ملی ایران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                مشارکت در تامین هزینه‌های برگزاری جشن نفس سال  ۱۳۹۴
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.bsi.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/bsi.ir.jpg') }}"
                                                 alt="بانک صادرات ایران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                بانک صادرات ایران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                حمایت مالی در برگزاری جشن نفس ۱۳۹۶
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://iranartists.org" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/iranartists.org.jpg') }}"
                                                 alt="خانه هنرمندان ایران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                خانه هنرمندان ایران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                خانه هنرمندان ایران پیرو مفاد تفاهم‌نامه منعقده با انجمن اهدای عضو ایرانیان با حمایت و در اختیار قرار دادن رایگان سالن‌ها و نگارخانه‌خانه هنرمندان ایران به منظور برگزاری نخستین جشنواره هنرهای تجسمی نفس، گالری آثار آن و شب شعر اهدای عضو (یادبود زنده‌یاد دکتر افشین یداللهی)، در کنار این انجمن حضور فعال داشته‌اند.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://www.mci.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/mci.ir.jpg') }}"
                                                 alt="- شرکت ارتباطات سیار ایران - همراه اول"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت ارتباطات سیار ایران - همراه اول
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                ارسال رایگان پیامک‌های علمی و فرهنگی انجمن برای مشترکین همراه اول، ارائه رایگان سرشماره ۳۴۳۲ (فون واژه اهدا)، همکاری در طرح ثبت‌نام آسان کارت اهدای عضو با راه‌اندازی طرح ثبت‌نام کارت اهدای عضو از طریق پیامک و USSD برای مشترکین همراه اول.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://irancell.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/irancell.ir.jpg') }}"
                                                 alt="شرکت ایرانسل"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت ایرانسل
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                ارسال رایگان پیامک‌های علمی و فرهنگی انجمن برای مشترکین ایرانسل، ارائه رایگان سرشماره ۳۴۳۲ (فون واژه اهدا)، همکاری در طرح ثبت‌نام آسان کارت اهدای عضو با راه‌اندازی طرح ثبت‌نام کارت اهدای عضو از طریق پیامک و USSD برای مشترکین ایرانسل.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://www.shatel.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/shatel.ir.jpg') }}"
                                                 alt="گروه فناوری ارتباطات و اطلاعات شاتل"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                گروه فناوری ارتباطات و اطلاعات شاتل
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                از دیگر حامیانی که سالهاست داوطلبانه، دغدغه تأمین سرور برای سامانه‌های انجمن را برطرف نموده و بدون هرگونه چشمداشتی، همیشه در نهایت آرامش و بزرگواری در کنار انجمن بوده است، گروه فناوری ارتباطات و اطلاعات شاتل است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://www.asiatech.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/asiatech.ir.png') }}"
                                                 alt="شرکت انتقال داده‌های آسیاتک"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت انتقال داده‌های آسیاتک
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                شرکت انتقال داده‌های آسیاتک با شعار "در برابر اجتماع مسئولیم" از طریق ارائه خدمات اینترنتی رایگان از جمله تخصیص سرور اختصاصی به انجمن اهدای عضو ایرانیان، نقش مؤثری در فرهنگ سازی اهدای عضو در کشور داشته است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://tooska.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/tooska.ir.png') }}"
                                                 alt="شرکت توسکا"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت توسکا
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                همکاری در راه‌اندازی طرح ثبت‌نام کارت اهدای عضو از طریق USSD برای مشترکین همراه اول از طریق تخصیص کد دستوری *3*3432#
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://shamimsoft.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/shamimsoft.ir.jpg') }}"
                                                 alt="شرکت شمیم سافت"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت شمیم سافت
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                ساخت اپلیکشن آیروس
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://www.dayins.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/dayins.com.jpg') }}"
                                                 alt="بیمه دی"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                بیمه دی
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                این شرکت بیمه‌گذار برای نخستین بار با طراحی بسته ی خدمات "جانبخش" (ویژه ی خانواده‌های ایثارگر اهداکننده اعضای پیوندی) و ارائه طرح بیمه تکمیلی درمان و حوادث به صورت رایگان قصد دارد در طول یک سال، با بیمه نمودن ۲۰ هزار نفر از اعضای درجه یک این خانواده‌ها، سهم به سزایی در حمایت از این فرایند معنوی داشته باشد که تاکنون برای حدود سه هزار نفر، این فرایند، اجرایی شده است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.insurancepasargad.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/insurancepasargad.com.jpg') }}"
                                                 alt="بیمه پاسارگاد"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                بیمه پاسارگاد
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                بیمه پاسارگاد از ضیافت نفس ۱۳۹۷ با ارائه رایگان بیمه مسئولیت و بیمه حوادث و آتش‌سوزی همایش و غرفه‌های بازارچه ضیافت به جمع حامیان انجمن پیوسته است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.bimehasia.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/bimehasia.com.jpg') }}"
                                                 alt="بیمه آسیا"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                بیمه آسیا
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                حمایت از برگزاری ضیافت نفس ۱۳۹۷
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://snapp.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/snapp.ir.jpg') }}"
                                                 alt="ایده گزین ارتباطات روماک (اسنپ)"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                ایده گزین ارتباطات روماک (اسنپ)
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                حمایت در برگزاری جشن نفس ۱۳۹۶ و ضیافت نفس ۱۳۹۷ با تامین رایگان خودروهای مورد نیاز
                                            </p>
                                        </div>
                                    </a>
                                    <a target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/sghe.png') }}"
                                                 alt="سازمان اقتصاد اسلامی"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                سازمان اقتصاد اسلامی
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                سازمان اقتصاد اسلامی از حامیان برجسته  اهدای عضو کشور می‌باشد که با کمک‌های مالی خود، نقش به سزایی در اجرای فعالیت‌های فرهنگی و نهادینه‌سازی این فرهنگ معنوی در جامعه داشته است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://www.ghadyani.org" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/ghadyani.org.jpg') }}"
                                                 alt="موسسه انتشارات قدیانی"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                موسسه انتشارات قدیانی
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                از جمله حامیانی است که نه تنها با کمک مالی در برگزاری مراسم فرهنگی مانند ضیافت نفس ۱۳۹۷، همراه ما در فرهنگسازی اهدای عضو بوده است، بلکه حامی و مددکار تعدادی از خانواده‌های ایثارگر اهداکننده نیز می‌باشد.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://tmoca.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/tmoca.com.jpg') }}"
                                                 alt="موزه هنرهای معاصر تهران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                موزه هنرهای معاصر تهران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                موزه هنرهای معاصر تهران در برگزاری جشنواره هنرهای تجسمی نفس با این انجمن همکاری داشته و فعالیت‌های خوبی در ترویج هرچه بهتر فرهنگ مقدس اهدای عضو داشته است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://hearthotel.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/hearthotel.ir.jpg') }}"
                                                 alt="هتل قلب تهران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                هتل قلب تهران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                اسکان رایگان خانواده‌های اهداکننده و پیوند شده برای مراسم مختلف انجمن اهدای عضو ایرانیان؛ مانند جشن نفس و ضیافت نفس و ...
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.behestandarou.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/behestandarou.com.png') }}"
                                                 alt="شرکت بهستان دارو"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت بهستان دارو
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                حمایت مالی از طرح سامانه ثبت ملی اطلاعات فراهم‌آوری و پیوند اعضای کشور و حامی چندین نوبت برگزاری دوره آموزشی بین‌المللی TPM
                                            </p>
                                        </div>
                                    </a>
                                    <a target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/sanofi.png') }}"
                                                 alt="شرکت دارویی سانوفی"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت دارویی سانوفی
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                حمایت مالی از طرح سامانه ی ثبت ملی اطلاعات فراهم آوری و پیوند اعضای کشور
                                            </p>
                                        </div>
                                    </a>
                                    <a target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/roche.png') }}"
                                                 alt="شرکت دارویی رش پارس"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت دارویی رش پارس
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                حمایت مالی از طرح سامانه ثبت ملی اطلاعات فراهم‌آوری و پیوند اعضای کشور
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://www.novartis.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/novartis.com.jpg') }}"
                                                 alt="شرکت دارویی نوارتیس"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت دارویی نوارتیس
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                حمایت مالی در برگزاری مراسم جشن نفس و دوره آموزشی بین‌المللی  TPM
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.vitanepharmed.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/vitanepharmed.com.jpg') }}"
                                                 alt="شرکت دارویی ویتان فارمد"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت دارویی ویتان فارمد
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                کمک در برگزاری مراسم جشن نفس و دوره آموزشی بین‌المللی  TPM
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.zahravi.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/zahravi.com.jpg') }}"
                                                 alt="شرکت دارویی زهراوی"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت دارویی زهراوی
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                کمک در برگزاری مراسم جشن نفس و دوره آموزشی بین‌المللی TPM
                                            </p>
                                        </div>
                                    </a>
                                    <a target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/astellas.jpg') }}"
                                                 alt="شرکت دارویی آستلاس"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت دارویی آستلاس
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                کمک در برگزاری مراسم جشن نفس و دوره آموزشی بین‌المللی  TPM
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://www.fadaktrains.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/fadaktrains.com.jpg') }}"
                                                 alt="شرکت قطارهای مسافربری فدک"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت قطارهای مسافربری فدک
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                همکاری و تامین بخشی از هزینه‌های سفر زیارتی خانواده‌های ایثارگر اهداکننده به مشهد مقدس (خانواده‌های منتخب در جشن نفس ۱۳۹۶)
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://chocologo.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/chocologo.ir.jpg') }}"
                                                 alt="شرکت شوکولوگو"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت شوکولوگو
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                تامین شکلات با لوگوی انجمن جهت هدیه به هنرمندان و مسئولین در اعیاد، همایش‌ها و ...
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.sahlan.co" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/sahlan.co.jpg') }}"
                                                 alt="گروه صنعتی سهلان"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                گروه صنعتی سهلان
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                در نظر گرفتن تخفیف قابل توجه برای برپایی غرفه و چادرهای مربوط به ثبت نام خانواده‌های اهداکننده، بیماران، خبرنگاران، صدور کارت اهدای عضو، غرفه انجمن‌های پیشگیری کننده از نیاز به پیوند در مراسم جشن نفس و ضیافت نفس
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.mums.ac.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/mums.ac.ir.jpg') }}"
                                                 alt="دانشگاه علوم پزشکی مشهد"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                دانشگاه علوم پزشکی مشهد
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                همکاری در سفر زیارتی خانواده‌های ایثارگر اهداکننده (منتخب در جشن نفس ۱۳۹۵ و ۱۳۹۶)
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://www.tamin.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/tamin.ir.jpg') }}"
                                                 alt="سازمان تامین اجتماعی"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                سازمان تامین اجتماعی
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                مشارکت در تامین هزینه‌های جشن نفس ۱۳۹۴
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.farbeyondidea.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/farbeyondidea.com.jpg') }}"
                                                 alt="شرکت فار ورا ایده"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت فار ورا ایده
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                این مجموعه از شرکت‌های فعال در عرصه تخصصی امنیت فناوری اطلاعات می‌باشد که با هدف ارائه خدمات تخصصی IT و مراکز ذخیره‌سازی اطلاعات (وب و دیتا سنتر) بنا نهاده شده و با ارائه لایسنس نرم‌افزار آنتی‌ویروس شرکت ESET و مشاوره فنی در زمینه‌های تخصصی IT از حامیان این انجمن می‌باشند.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://ostorehsazan.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/ostorehsazan.com.jpg') }}"
                                                 alt="موسسه آموزشی اسطوره‌سازان"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                موسسه آموزشی اسطوره‌سازان
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                این موسسه آموزشی ارائه‌دهنده خدمات آموزشی، روانشناسی و ... در سطح کشور، طی تفاهم‌نامه منعقد شده و به صورت داوطلبانه، خدمات مشاوره روانشناسی فردی و گروهی به خانواده‌های ایثارگر اهداکننده معرفی شده از سوی انجمن ارائه می‌نماید.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.ysp24.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/ysp24.ir.png') }}"
                                                 alt="شرکت یلداسیستم"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                شرکت یلداسیستم
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                این شرکت تجربه و توان فنی خود در زمینه سامانه آموزش آنلاین در اختیار این انجمن قرار داده است و با ارائه رایگان سامانه LMS به توسعه دوره‌های آموزشی اهدای عضو در کشور کمک نموده است.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://salamat-charity.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/salamat-charity.ir.jpg') }}"
                                                 alt="مجمع خیرین سلامت"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                مجمع خیرین سلامت
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                حمایت مالی از فعالیت‌های انجمن اهدای عضو ایرانیان در راستای نهادینه‌سازی این فرهنگ مقدس در جامعه
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://www.emdad.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/emdad.ir.png') }}"
                                                 alt="کمیته امداد امام خمینی (ره)"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                کمیته امداد امام خمینی (ره)
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                سازمان کمیته امداد پیرو مفاد تفاهم‌نامه منعقد شده با انجمن، خدمات ویژه‌ای را به خانواده‌های واجدالشرایط اهداکننده عضو معرفی شده از سوی انجمن، در سراسر کشور، ارائه می‌نماید.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.emamali-charity.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/emamali-charity.com.jpg') }}"
                                                 alt="موسسه خیریه امام علی (ع) شهر ری"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                موسسه خیریه امام علی (ع) شهر ری
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                همکاری در مددکاری خانواده‌های نیازمند اهداکننده عضو؛ پیرو تفاهم‌نامه منعقد شده با انجمن
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://fatemehzahra.org" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/fatemehzahra.org.jpg') }}"
                                                 alt="موسسه خیریه حضرت فاطمه زهرا (س)"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                موسسه خیریه حضرت فاطمه زهرا (س)
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                این موسسه طی عقد تفاهم‌نامه‌ای جهت توان افزایی خانواده‌های ایتام معرفی شده از سوی انجمن، خدمات اجتماعی شامل جذب یاریگر، مشاوره در حوزه اشتغال، وام‌های قرض‌الحسنه و... را به مددجویان اعطا می‌نماید.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://www.uswr.ac.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/uswr.ac.ir.jpg') }}"
                                                 alt="دانشگاه علوم بهزیستی و توانبخشی"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                دانشگاه علوم بهزیستی و توانبخشی
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                انعقاد تفاهم‌نامه در راستای هماهنگی، همکاری و همسویی در آشناسازی جامعه دانشگاهی با موضوع اهدای عضو، انجام پژوهش‌های دانشگاهی با موضوع اهدای عضو، کمک در آموزش عمومی و تخصصی، ارائه خدمات روانشناسی به خانواده‌های ایثارگر اهدا کننده عضو، بیماران لیست انتظار و گیرندگان اعضای پیوندی
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.childf.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/childf.com.png') }}"
                                                 alt="بنیاد کودک"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                بنیاد کودک
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                اعطای کمک هزینه تحصیلی به فرزندان تیزهوش خانواده‌های اهداکننده‌ای که ناتوان در تامین این هزینه هستند.
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://www.iranms.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/iranms.ir.png') }}"
                                                 alt="انجمن MS"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                انجمن MS
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                آموزش زنان بی‌سرپرست خانواده‌های اهداکننده در کارگاه خود اشتغالی چرم و میناکاری.
                                            </p>
                                        </div>
                                    </a>
                                    <a target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src=""
                                                 alt="کلینیک دندانپزشکی دکتر حکیمی"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                کلینیک دندانپزشکی دکتر حکیمی
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                طی تفاهم‌نامه‌ای با انجمن، این کلینیک خدمات دندانپزشکی را با ارائه معرفی نامه از طرف انجمن به صورت ۲۰ الی ۳۰ درصد تخفیف از تعرفه‌های خدمات دندانپزشکی به خانواده‌های اهداکننده عضو ارائه می‌نماید.
                                            </p>
                                        </div>
                                    </a>
                                    <a target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src=""
                                                 alt="درمانگاه فوق تخصصی جواد الائمه"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                درمانگاه فوق تخصصی جواد الائمه
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                تخصیص تخفیف ویژه در مورد خدمات پاراکلینیک و خدمات سرپایی برای خانواده‌های اهداکننده
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://basijasnaf.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/basijasnaf.ir.jpg') }}"
                                                 alt="بسیج اصناف و بازاریان کشور"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                بسیج اصناف و بازاریان کشور
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                کمک در تهیه و ارسال وسایل اساسی (وسایل منزل) خانواده های اهداکننده، گیرنده و بیمار لیست انتظار پیوند عضو سیل زده ساکن استان‌های خوزستان، لرستان و غرب استان مرکزی در کمپین نبض دوبار‌ه
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://iccima.ir" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/iccima.ir.png') }}"
                                                 alt="اتاق بازرگانی، صنایع، معادن و کشاورزی ایران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                اتاق بازرگانی، صنایع، معادن و کشاورزی ایران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                کمک قابل توجه مالی به انجمن اهدای عضو ایرانیان در راستای انجام فعالیت‌های فرهنگی و مددکاری
                                            </p>
                                        </div>
                                    </a>
                                    <a target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src=""
                                                 alt="بازاریان بازار بزرگ تهران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                بازاریان بازار بزرگ تهران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                کمک در تهیه و ارسال وسایل اساسی (وسایل منزل) خانواده‌های اهداکننده، گیرنده و بیمار لیست انتظار پیوند عضو سیل زده ساکن استان‌های خوزستان، لرستان و غرب استان مرکزی در کمپین نبض دوبار‌ه
                                            </p>
                                        </div>
                                    </a>
                                    <a href="https://nidc.ir/fa-IR/DouranPortal/4989/page/%D8%A8%D8%B3%DB%8C%D8%AC" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/smh.png') }}"
                                                 alt="بسیج شرکت حفاری ایران"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                بسیج شرکت حفاری ایران
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                کمک در تحویل وسایل اساسی (وسایل منزل) خانواده‌های اهداکننده، گیرنده و بیمار لیست انتظار پیوند عضو سیل زده ساکن استان خوزستان در کمپین نبض دوباره
                                            </p>
                                        </div>
                                    </a>
                                    <a href="http://jaamejamlab.com" target="_blank"
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow sm:flex-col">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton md:w-1/3 sm:w-full">
                                            <img src=""
                                                 data-src="{{ asset('/images/sponsors/jaamejamlab.com.jpg') }}"
                                                 alt="آزمایشگاه پاتوبیولوژی جام جم"
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-contain"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1 sm:p-0">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                آزمایشگاه پاتوبیولوژی جام جم
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                این آزمایشگاه پاتولوژی واقع در خیابان ولیعصر تهران و مجهز به دستگاه‌های پیشرفته آزمایشگاهی پذیرای خانواده‌های اهدا کننده عضو با تخفیف ویژه بوده است.
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                <p class="text-blue-800 font-lg font-bold m-t-25 m-b-5">
                                    ب - خیرین حقیقی
                                </p>
                                <p class="text-bayoux font-base font-medium cursor-default m-b-20 md:font-sm text-justify sm:font-base">
                                    اسامی خیرینی که طی یک سال گذشته با کمک به خانواده‌های اهداکننده، واحد مددکاری انجمن اهدای عضو لیرانیان را همراهی نموده‌اند، به قرار زیر است:
                                </p>
                                <ul class="counter text-bayoux font-base font-medium sm:font-base cursor-default">
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای علا میرمحمد صادقی:
                                        </span>
                                        حمایت مستمر مالی و معنوی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای دکتر ایرج فاضل:
                                        </span>
                                        حمایت مالی و معنوی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای دکتر علی نوبخت:
                                        </span>
                                        حمایت مالی و معنوی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای دکتر بهروز برومند:
                                        </span>
                                        حمایت مالی و معنوی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای دکتر مسعود کنزی:
                                        </span>
                                        حمایت مالی و معنوی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای دکتر مجتبی قدیانی:
                                        </span>
                                        حمایت مستمر مالی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای علی قیداری :
                                        </span>
                                        حمایت مالی و معنوی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای محمد ابوالحسنی:
                                        </span>
                                        حمایت مالی و معنوی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای محمدحسین آقازمانی:
                                        </span>
                                        حمایت مالی و معنوی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای حقیقی طلب:
                                        </span>
                                        حمایت مالی و معنوی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای دکتر فریدون نوحی بزنجانی:
                                        </span>
                                        حمایت مالی و معنوی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای دکتر سیف الله عبدی:
                                        </span>
                                        حمایت مالی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای محسن رفیق دوست:
                                        </span>
                                        حمایت مالی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای دکتر مجتبی کباری:
                                        </span>
                                        حمایت مالی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای سجاد میرزایی:
                                        </span>
                                        حمایت مالی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای احمد محمودیان:
                                        </span>
                                        حمایت مالی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای حسن نجفی:
                                        </span>
                                        حمایت مالی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای دکتر بصیری :
                                        </span>
                                        حمایت مالی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            سرکار خانم زهرا رفیعا:
                                        </span>
                                        حمایت مالی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای دکتر محمد عبده زاده:
                                        </span>
                                        حمایت مالی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای امیر حاجیعلی:
                                        </span>
                                        اعطای بسته حمایتی ارزاق و لوازم‌التحریر برای تعدادی از خانواده‌های اهداکننده
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای عباس براتی:
                                        </span>
                                        تحت پوشش قرار دادن خانواده اهداکننده به مدت ۶ ماه و پرداخت هزینه‌های توانمندسازی ایشان
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای محمدرضا براتی:
                                        </span>
                                        پرداخت هزینه‌های توانمندسازی یک خانواده اهداکننده برازجانی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            سرکار خانم اعظم طالبی:
                                        </span>
                                        پرداخت هزینه‌های درمانی یک خانواده اهداکننده تهرانی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            سرکار خانم هوشیار:
                                        </span>
                                        اعطای ۲ دستگاه اکسیژن‌ساز برای بیمار در انتظار ریه و خانواده اهداکننده دارای بیمار ریوی
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای رامین گبرلو:
                                        </span>
                                        پرداخت هزینه‌های درمان یک خانواده تهرانی و اعطای هدایا برای کودکان پیوند شده قلب
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            سرکار خانم آزاده مقدم:
                                        </span>
                                        پرداخت هزینه‌های دارویی و ایاب و ذهاب یک بیمار در انتظار پیوند ساکن کنگاور
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            سرکار خانم ناهید قدرتی:
                                        </span>
                                        پرداخت هزینه‌های درمانی تعدادی از خانواده‌های اهداکننده
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            سرکار خانم شکوه طلوعی:
                                        </span>
                                        پرداخت هزینه‌های درمان و کمک در توانمندسازی تعدادی از خانواده‌های اهداکننده
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای دکتر مهدی آخوندی:
                                        </span>
                                        کمک در توانمندسازی تعدادی از خانواده‌های اهداکننده
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای سید حسین میرزاده واقفی:
                                        </span>
                                        کمک در توانمندسازی تعدادی از خانواده‌های اهداکننده
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            سرکار خانم آسیه مزینانی:
                                        </span>
                                        مدیر هنری خانه هنرمندان
                                    </li>
                                    <li class="fou-page__list counter-increment">
                                        <span class="counter-item font-bold">
                                            جناب آقای رجبی معمار:
                                        </span>
                                        مدیرعامل خانه هنرمندان
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="fou-page__content_item fou-page__content_item--members"
                             data-tab="members"
                        >
                            <div class="fou-page__members">
                                <p class="i-page__sub-title text-blue-800 font-20 font-bold m-b-20">
                                    اعضا  :
                                </p>
                                <p class="font-20 font-bold text-blue-100 text-center m-b-22">
                                    هیات مدیره
                                </p>
                                <div class="fou-page__members_wrapper">
                                    <div class="fou-page__members_row fou-page__members--specials flex flex-wrap justify-center">
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر ایرج فاضل.jpg') }}"
                                                     alt="دکتر ایرج فاضل"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر ایرج فاضل
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر علی نوبخت حقیقی.jpg') }}"
                                                     alt="دکتر علی نوبخت حقیقی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر علی نوبخت حقیقی
                                            </p>
                                            <p class="fou-page__members_member_position text-gray-200 font-sm-medium text-center">
                                                رئیس هیأت مدیره
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر کتایون نجفی‌زاده.jpg') }}"
                                                     alt="دکتر کتایون نجفی‌زاده"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر کتایون نجفی‌زاده
                                            </p>
                                            <p class="fou-page__members_member_position text-gray-200 font-sm-medium text-center">
                                                مدیرعامل
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر امید قبادی.jpg') }}"
                                                     alt="دکتر امید قبادی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر امید قبادی
                                            </p>
                                            <p class="fou-page__members_member_position text-gray-200 font-sm-medium text-center">
                                                نایب رئیس هیأت مدیره
                                            </p>
                                        </div>
                                    </div>
                                    <div class="fou-page__members_row fou-page__members--normals flex flex-wrap justify-center">
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر فریدون نوحی بزنجانی.jpg') }}"
                                                     alt="دکتر فریدون نوحی بزنجانی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر فریدون نوحی بزنجانی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر بهروز برومند.jpg') }}"
                                                     alt="دکتر بهروز برومند"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر بهروز برومند
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/جواد نوروزبیگی.jpg') }}"
                                                     alt=""
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                جواد نوروزبیگی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر علی‌اصغر پورمحمدی.jpg') }}"
                                                     alt="دکتر علی‌اصغر پورمحمدی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر علی‌اصغر پورمحمدی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/مهندس عباس مهدوی‌مهر.jpg') }}"
                                                     alt="مهندس عباس مهدوی‌مهر"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                مهندس عباس مهدوی‌مهر
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر-کنزی.jpg') }}"
                                                     alt="دکتر مسعود کنزی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر مسعود کنزی
                                            </p>
                                            <p class="fou-page__members_member_position text-gray-200 font-sm-medium text-center">
                                                خزانه‌دار
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <p class="font-20 font-bold text-blue-100 text-center m-b-22">
                                    هیات امنا
                                </p>
                                <div class="fou-page__members_wrapper">
                                    <div class="fou-page__members_row fou-page__members--specials flex flex-wrap justify-center">
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر علی نوبخت حقیقی.jpg') }}"
                                                     alt="دکتر علی نوبخت حقیقی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر علی نوبخت حقیقی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر ایرج فاضل.jpg') }}"
                                                     alt="دکتر ایرج فاضل"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر ایرج فاضل
                                            </p>
                                            <p class="fou-page__members_member_position text-gray-200 font-sm-medium text-center">
                                                رئیس هیأت امنا
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر کتایون نجفی‌زاده.jpg') }}"
                                                     alt="دکتر کتایون نجفی‌زاده"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر کتایون نجفی‌زاده
                                            </p>
                                        </div>
                                    </div>
                                    <div class="fou-page__members_row fou-page__members--normals flex flex-wrap justify-center">
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر مجید قاسمی.jpg') }}"
                                                     alt="دکتر مجید قاسمی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر مجید قاسمی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر سعید نمکی.jpg') }}"
                                                     alt="دکتر سعید نمکی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر سعید نمکی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر محمدحسین ماندگار.jpg') }}"
                                                     alt="دکتر محمدحسین ماندگار"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر محمدحسین ماندگار
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر سیدعلی ملک‌حسینی.jpg') }}"
                                                     alt="دکتر سیدعلی ملک‌حسینی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر سیدعلی ملک‌حسینی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر سیدرضا ملک‌زاده.jpg') }}"
                                                     alt="دکتر سیدرضا ملک‌زاده"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر سیدرضا ملک‌زاده
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/ثریا قاسمی.jpg') }}"
                                                     alt=""
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                ثریا قاسمی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/پرویز پرستویی.jpg') }}"
                                                     alt="پرویز پرستویی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                پرویز پرستویی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر فریدون نوحی بزنجانی.jpg') }}"
                                                     alt="دکتر فریدون نوحی بزنجانی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر فریدون نوحی بزنجانی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر فضل‌اله شریعت‌پناهی.jpg') }}"
                                                     alt="دکتر فضل‌اله شریعت‌پناهی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر فضل‌اله شریعت‌پناهی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر مسعود کنزی.jpg') }}"
                                                     alt="دکتر مسعود کنزی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر مسعود کنزی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر امید قبادی.jpg') }}"
                                                     alt="دکتر امید قبادی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر امید قبادی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/حاج علی حاجی سید سلیمان.jpg') }}"
                                                     alt="حاج علی حاجی سید سلیمان"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                حاج علی حاجی سید سلیمان
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر سیدرضا مجتهد سعیدی فیروزآبادی.jpg') }}"
                                                     alt="دکتر سیدرضا مجتهد سعیدی فیروزآبادی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر سیدرضا مجتهد سعیدی فیروزآبادی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/مجید-مجیدی.jpg') }}"
                                                     alt="مجید-مجیدی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                مجید مجیدی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/عباس شاکری.jpg') }}"
                                                     alt="عباس شاکری"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                حاج عباس شاکری
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/ابراهیم عسگریان.jpg') }}"
                                                     alt="ابراهیم عسگریان"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                ابراهیم عسگریان
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر بهروز برومند.jpg') }}"
                                                     alt="دکتر بهروز برومند"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر بهروز برومند
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/جواد نوروزبیگی.jpg') }}"
                                                     alt="جواد نوروزبیگی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                جواد نوروزبیگی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/اکبر تشکری‌نیا.jpg') }}"
                                                     alt="اکبر تشکری‌نیا"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                اکبر تشکری‌نیا
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/مهندس عباس مهدوی‌مهر.jpg') }}"
                                                     alt="مهندس عباس مهدوی‌مهر"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                مهندس عباس مهدوی‌مهر
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر علی‌اصغر پورمحمدی.jpg') }}"
                                                     alt="دکتر علی‌اصغر پورمحمدی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر علی‌اصغر پورمحمدی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/حجت‌الاسلام والمسلمین مصطفی مرسلی.jpg') }}"
                                                     alt="حجت‌الاسلام والمسلمین مصطفی مرسلی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                حجت‌الاسلام والمسلمین مصطفی مرسلی
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <p class="font-20 font-bold text-blue-100 text-center m-b-22">
                                    هیات موسس
                                </p>
                                <div class="fou-page__members_wrapper">
                                    <div class="fou-page__members_row fou-page__members--specials flex flex-wrap justify-center">
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر علی نوبخت حقیقی.jpg') }}"
                                                     alt="دکتر علی نوبخت حقیقی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر علی نوبخت حقیقی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر ایرج فاضل.jpg') }}"
                                                     alt="دکتر ایرج فاضل"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر ایرج فاضل
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر کتایون نجفی‌زاده.jpg') }}"
                                                     alt="دکتر کتایون نجفی‌زاده"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر کتایون نجفی‌زاده
                                            </p>
                                        </div>
                                    </div>
                                    <div class="fou-page__members_row fou-page__members--normals flex flex-wrap justify-center">
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر محمدحسین ماندگار.jpg') }}"
                                                     alt=""
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر محمدحسین ماندگار
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر سیدعلی ملک‌حسینی.jpg') }}"
                                                     alt="دکتر سیدعلی ملک‌حسینی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر سیدعلی ملک‌حسینی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر سیدرضا ملک‌زاده.jpg') }}"
                                                     alt=""
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر سیدرضا ملک‌زاده
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر امید قبادی.jpg') }}"
                                                     alt="دکتر امید قبادی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر امید قبادی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/عباس-زارع-نژاد---هیأت-موسس.jpg') }}"
                                                     alt="دکتر عباس زارع‌نژاد"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر عباس زارع‌نژاد
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/دکتر علی‌اصغر پورمحمدی.jpg') }}"
                                                     alt="دکتر علی‌اصغر پورمحمدی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                دکتر علی‌اصغر پورمحمدی
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/مرحوم دکتر منصور قمشه.jpg') }}"
                                                     alt="مرحوم دکتر منصور قمشه"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                مرحوم دکتر منصور قمشه
                                            </p>
                                        </div>
                                        <div class="fou-page__members_member">
                                            <figure class="fou-page__members_member_cover border border-solid rounded-50 m-0-auto has-skeleton">
                                                <img src=""
                                                     data-src="{{ asset('images/members/حجت‌الاسلام والمسلمین مصطفی مرسلی.jpg') }}"
                                                     alt="حجت‌الاسلام والمسلمین مصطفی مرسلی"
                                                     class="w-full h-full block rounded-inherit object-cover"
                                                />
                                            </figure>
                                            <p class="fou-page__members_member_name text-blue-800 font-sm-bold text-center">
                                                حجت‌الاسلام والمسلمین مصطفی مرسلی
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fou-page__content_item fou-page__content_item--committees"
                             data-tab="committees"
                        >
                            <div class="fou-page__committees">
                                <p class="i-page__sub-title fou-page__committees_title font-20 font-bold text-blue-800">
                                    کمیته‌ها  :
                                </p>
                                <p class="relative text-bayoux font-base text-justify">
                                    یکی از ارکان انجمن اهدای عضو ایرانیان کمیته‌های آن است. با توجه به اینکه این انجمن رسالات مختلفی از جمله فرهنگ سازی، مددکاری خانواده‌های اهداکننده عضو، آموزش تیم‌های فراهم‌آوری اعضا، حمایت از پژوهش‌های مربوطه، کمک به وزارت بهداشت در ثبت اطلاعات فراهم‌آوری و پیوند اعضای کشور و بسیاری دیگر را بر عهده دارد که هر کدام از آنها بالاخص رسالت فرهنگی شاخه‌های متنوع و گوناگونی را در بر می‌گیرد و هر کدام نیاز به تخصص خاص آن دارد، انجمن اهدای عضو ایرانیان با دعوت از متخصصین مختلف در زمینه‌های هنری، فرهنگی، علمی، پژوهشی و مددکاری کمیته‌های مختلفی را ایجاد کرده که در آن متخصصان هر رشته با تبادل نظر بهترین راهکار‌های ارتقای اهدای عضو و پیوند اعضا در حیطه خود را در اختیار انجمن می‌گذارند. تاکنون کمیته‌های مختلفی در انجمن تشکیل شده و کمیته‌های دیگری نیز به تدریج در حال اضافه شدن به ساختار آن هستند. در زیر اسامی کمیته‌های انجمن آورده شده است:
                                </p>
                                <div class="fou-page__committees_list relative w-full">
                                    <ul class="fou-page__committees__list w-full">
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته آموزش
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته پژوهش
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته بین الملل
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته IT
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته مددکاری
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته هنرهای تجسمی
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته انیمیشن
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته سینما
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته تئاتر
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته شعر و ادبیات
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته موسیقی
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته خبر
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right flex-wrap"
                                        >
                                            کمیته سفیران:
                                            <ul class="fou-page__committees__list_sub block w-full">
                                                <li class="fou-page__committees__list_sub_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                                    گروه مترجمین
                                                </li>
                                                <li class="fou-page__committees__list_sub_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                                    گروه سفیران سخنران
                                                </li>
                                                <li class="fou-page__committees__list_sub_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                                    گروه برپایی غرفه
                                                </li>
                                                <li class="fou-page__committees__list_sub_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                                    گروه اجرایی و پشتیبانی
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته انتشارات و تبلیغات
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته فضای مجازی
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته برندینگ
                                        </li>
                                        <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                            کمیته جذب منابع و توانمند سازی انجمن
                                        </li>
                                    </ul>
                                </div>
                                <p class="text-bayoux font-sm text-justify">
                                    همچنین با توجه به واگذاری مسئولیت ایجاد سامانه کشوری اطلاعات فراهم‌آوری و پیوند اعضا از طرف وزارت بهداشت، درمان و آموزش پزشکی به انجمن در تاریخ ۱۴ آذر ۱۳۹۶، کمیته‌های علمی تخصصی زیر نیز یک به یک در حال تشکیل می‌باشند:
                                </p>
                                <ul class="fou-page__committees__list w-full">
                                    <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                        کمیته فراهم آوری اعضا
                                    </li>
                                    <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                        کمیته پیوند کلیه
                                    </li>
                                    <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                        کمیته پیوند کبد، پانکراس و سایر احشاء شکمی
                                    </li>
                                    <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                        کمیته پیوند قلب
                                    </li>
                                    <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                        کمیته پیوند ریه
                                    </li>
                                    <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                        کمیته تخصیص عضو
                                    </li>
                                    <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                        کمیته آمار
                                    </li>
                                    <li class="fou-page__committees__list_item i-page__text md:font-sm flex items-center text-bayoux font-base text-right">
                                        کمیته اخلاق
                                    </li>
                                </ul>
                                <figure class="fou-page__committees__image rounded-2 m-0-auto">
                                    <img src="{{ asset('images/1527950001_fPaMI2VneVOFcAWpQtJaX05whkhisW_original.jpg') }}"
                                         alt=""
                                         class="block w-full h-full rounded-inherit"
                                    />
                                </figure>
                                <figure class="fou-page__committees__image rounded-2 m-0-auto">
                                    <img src="{{ asset('images/1527950943_46lhdWa9tLj8Kw6CLHtYsG5P1aodLd_original.jpg') }}"
                                         alt=""
                                         class="block w-full h-full rounded-inherit"
                                    />
                                </figure>
                                <figure class="fou-page__committees__image rounded-2 m-0-auto">
                                    <img src="{{ asset('images/1527951018_kwEJutsQBfEkbNPqV8kVIkaNWZEHfx_original.jpg') }}"
                                         alt=""
                                         class="block w-full h-full rounded-inherit"
                                    />
                                </figure>
                                <figure class="fou-page__committees__image rounded-2 m-0-auto">
                                    <img src="{{ asset('images/1527951122_bI4vYRdXVcje9lTqcQtbt0z7gQ9hdC_original.jpg') }}"
                                         alt=""
                                         class="block w-full h-full rounded-inherit"
                                    />
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script src="{{asset('js/site/foundations.js')}}" defer></script>
    @endsection