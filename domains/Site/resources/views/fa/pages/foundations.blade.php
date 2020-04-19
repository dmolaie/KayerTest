@extends('fa.template.master')
    @section('content')
        <div class="fou-page i-page">
            <div class="container sm:p-0">
                <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold">
                    <span class="i-page__title text-center cursor-default">
                        ارکان انجمن
                    </span>
                </h1>
                <div class="inner-box inner-box--white text-right">
                    <div class="fou-page__tab w-full flex items-stretch justify-between sm:flex-wrap">
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
                                <div class="fou-page__volunteers__list flex flex-wrap items-start justify-between">
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
                                <p class="text-blue-800 font-lg font-bold">
                                    سازمانها و نهادها
                                </p>
                                <div class="fou-page__sponsors">
                                    <a href=""
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton">
                                            <img src=""
                                                 data-src="https://ehda.center/uploads/default/image/1528646951_6mO5ZpmzwWGuxDZeHqChta2YbkKeNl_original.jpg"
                                                 alt=""
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-cover"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                بانک پاسارگاد
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                در راستای کمک به ارتقای اهدای عضو تعاملات زیادی بین انجمن با سازمانها، ارگانها و شرکت های مختلف به وقوع می پیوندد که در ذیل به پاره ای از آنها اشاره می گردد
                                            </p>
                                        </div>
                                    </a>
                                    <a href=""
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton">
                                            <img src=""
                                                 data-src="https://ehda.center/uploads/default/image/1528809832_HtJwkv5rtncnEjMleIqJAoOuOiQvnm_original.jpg"
                                                 alt=""
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-cover"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                بانک پاسارگاد
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                پاسارگاد و به طور ویژه جناب آقای دکتر قاسمی مدیرعامل محترم این بانک: الف. در اختیار گذاردن محل موقت انجمن در دانشگاه خاتم - ب. در اختیار کذاشتن محل دائمی انجمن واقع در خیابان ولیعصر - ج. بازسازی و تجهیز ساختمان محل دائمی انجمن - د. کمک در برگزاری مراسم جشن نفس ۱۳۹۴ و ۱۳۹۵ - ه. چاپ کتاب اثار جشنواره تجسمی نفس - و. تشکیل صندوق نیکوکاری برای انجمن اهدای عضو ایرانیان
                                            </p>
                                        </div>
                                    </a>
                                    <a href=""
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton">
                                            <img src=""
                                                 data-src="https://ehda.center/uploads/default/image/1528646757_anNJoZflqD1aBDgdGg8hkwC11WZpXR_original.jpg"
                                                 alt=""
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-cover"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                اعطای جایزه MBE به یک پرستار  به دلیل تشویق اقلیت‌ها به اهدای اعضا
                                                اعطای جایزه MBE به یک پرستار  به دلیل تشویق اقلیت‌ها به اهدای اعضا
                                                اعطای جایزه MBE به یک پرستار  به دلیل تشویق اقلیت‌ها به اهدای اعضا
                                                اعطای جایزه MBE به یک پرستار  به دلیل تشویق اقلیت‌ها به اهدای اعضا
                                                اعطای جایزه MBE به یک پرستار  به دلیل تشویق اقلیت‌ها به اهدای اعضا
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                در راستای کمک به ارتقای اهدای عضو تعاملات زیادی بین انجمن با سازمانها، ارگانها و شرکت های مختلف به وقوع می پیوندد که در ذیل به پاره ای از آنها اشاره می گردد
                                                در راستای کمک به ارتقای اهدای عضو تعاملات زیادی بین انجمن با سازمانها، ارگانها و شرکت های مختلف به وقوع می پیوندد که در ذیل به پاره ای از آنها اشاره می گردد
                                                در راستای کمک به ارتقای اهدای عضو تعاملات زیادی بین انجمن با سازمانها، ارگانها و شرکت های مختلف به وقوع می پیوندد که در ذیل به پاره ای از آنها اشاره می گردد
                                                در راستای کمک به ارتقای اهدای عضو تعاملات زیادی بین انجمن با سازمانها، ارگانها و شرکت های مختلف به وقوع می پیوندد که در ذیل به پاره ای از آنها اشاره می گردد
                                            </p>
                                        </div>
                                    </a>
                                    <a href=""
                                       class="i-cart relative w-full flex border border-solid rounded bg-white has-shadow">
                                        <figure class="i-cart__cover l:w-1/5 xl:w-1/6 flex-shrink-0 rounded-inherit has-skeleton">
                                            <img src=""
                                                 data-src="https://ehda.center/uploads/default/image/1530019067_aVAgH7EMzu5kmIrrUoxsxLy1n85maN_original.jpg"
                                                 alt=""
                                                 class="i-cart__cover_image block w-full h-full rounded-inherit object-cover"
                                            />
                                        </figure>
                                        <div class="i-cart__details flex-1">
                                            <p class="i-cart__title w-full text-blue-800 font-xs-bold">
                                                بانک پاسارگاد
                                            </p>
                                            <p class="i-cart__caption w-full font-xs-medium text-justify">
                                                پاسارگاد و به طور ویژه جناب آقای دکتر قاسمی مدیرعامل محترم این بانک: الف. در اختیار گذاردن محل موقت انجمن در دانشگاه خاتم - ب. در اختیار کذاشتن محل دائمی انجمن واقع در خیابان ولیعصر - ج. بازسازی و تجهیز ساختمان محل دائمی انجمن - د. کمک در برگزاری مراسم جشن نفس ۱۳۹۴ و ۱۳۹۵ - ه. چاپ کتاب اثار جشنواره تجسمی نفس - و. تشکیل صندوق نیکوکاری برای انجمن اهدای عضو ایرانیان
                                            </p>
                                        </div>
                                    </a>
                                </div>
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