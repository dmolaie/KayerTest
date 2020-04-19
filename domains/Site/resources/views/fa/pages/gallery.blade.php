@extends('fa.template.master')
    @section('content')
        <div class="ga-page i-page">
            <div class="container">
                <h1 class="i-page__head flex items-center justify-center text-blue font-24 font-bold">
                    <span class="i-page__title text-center cursor-default">
                        هنر اهدا
                    </span>
                </h1>
                <div class="inner-box inner-box--white p-0">
                    <div class="ga-page__header flex rounded-inherit rounded-br-none rounded-bl-none overflow-hidden">
                        <div class="ga-page__tab flex items-center justify-center flex-1 cursor-pointer ga-page__tab--active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512.001"
                                 class="ga-page__icon object-contain"
                            >
                                <path d="m256 360.53125c51.832031 0 94-42.167969 94-94v-172.53125c0-51.832031-42.167969-94-94-94s-94 42.167969-94 94v172.53125c0 51.832031 42.167969 94 94 94zm0-340.53125c40.804688 0 74 33.195312 74 74v82.644531h-148v-82.644531c0-40.804688 33.195312-74 74-74zm-74 176.644531h148v69.886719c0 40.804688-33.195312 74-74 74s-74-33.195312-74-74zm0 0"/><path d="m231.667969 131.3125h48.664062c5.523438 0 10-4.476562 10-10s-4.476562-10-10-10h-48.664062c-5.523438 0-10 4.476562-10 10s4.476562 10 10 10zm0 0"/><path d="m231.667969 94.042969h48.664062c5.523438 0 10-4.476563 10-10 0-5.523438-4.476562-10-10-10h-48.664062c-5.523438 0-10 4.476562-10 10 0 5.523437 4.476562 10 10 10zm0 0"/><path d="m384.03125 256.53125c-5.519531 0-10 4.476562-10 10 0 65.082031-52.949219 118.03125-118.03125 118.03125s-118.03125-52.949219-118.03125-118.03125c0-5.523438-4.476562-10-10-10s-10 4.476562-10 10c0 65.992188 46.558594 121.308594 108.546875 134.851562v50.554688h-.785156c-27.605469 0-50.0625 22.457031-50.0625 50.0625 0 5.523438 4.476562 10 10 10h140.664062c5.523438 0 10-4.476562 10-10 0-27.601562-22.457031-50.0625-50.0625-50.0625h-.785156v-50.554688c61.992187-13.542968 108.546875-68.859374 108.546875-134.851562 0-5.523438-4.476562-10-10-10zm-69.40625 235.46875h-117.246094c4.128906-11.675781 15.277344-20.0625 28.351563-20.0625h60.542969c13.070312 0 24.21875 8.386719 28.351562 20.0625zm-49.140625-40.0625h-18.96875v-47.707031c3.136719.214843 6.296875.332031 9.484375.332031s6.347656-.117188 9.484375-.332031zm0 0"/><path d="m50 93.40625c-5.523438 0-10 4.476562-10 10v97.613281c0 5.519531 4.476562 10 10 10s10-4.480469 10-10v-97.613281c0-5.523438-4.476562-10-10-10zm0 0"/><path d="m130 186.027344c5.523438 0 10-4.476563 10-10v-47.632813c0-5.523437-4.476562-10-10-10s-10 4.476563-10 10v47.632813c0 5.523437 4.476562 10 10 10zm0 0"/><path d="m10 54c-5.523438 0-10 4.476562-10 10v166.332031c0 5.523438 4.476562 10 10 10s10-4.476562 10-10v-166.332031c0-5.523438-4.476562-10-10-10zm0 0"/><path d="m90 83.316406c-5.523438 0-10 4.476563-10 10v135.167969c0 5.523437 4.476562 10 10 10s10-4.476563 10-10v-135.167969c0-5.523437-4.476562-10-10-10zm0 0"/><path d="m462 93.40625c-5.523438 0-10 4.476562-10 10v97.613281c0 5.519531 4.476562 10 10 10s10-4.480469 10-10v-97.613281c0-5.523438-4.476562-10-10-10zm0 0"/><path d="m382 186.027344c5.523438 0 10-4.476563 10-10v-47.632813c0-5.523437-4.476562-10-10-10s-10 4.476563-10 10v47.632813c0 5.523437 4.476562 10 10 10zm0 0"/><path d="m502 54c-5.523438 0-10 4.476562-10 10v166.332031c0 5.523438 4.476562 10 10 10s10-4.476562 10-10v-166.332031c0-5.523438-4.476562-10-10-10zm0 0"/><path d="m422 218.488281c-2.628906 0-5.210938 1.0625-7.070312 2.921875-1.859376 1.871094-2.929688 4.441406-2.929688 7.078125 0 2.632813 1.070312 5.210938 2.929688 7.070313 1.859374 1.863281 4.441406 2.929687 7.070312 2.929687s5.210938-1.066406 7.070312-2.929687c1.859376-1.859375 2.929688-4.4375 2.929688-7.070313 0-2.636719-1.070312-5.207031-2.929688-7.078125-1.859374-1.859375-4.441406-2.921875-7.070312-2.921875zm0 0"/><path d="m422 83.316406c-5.523438 0-10 4.476563-10 10v92.710938c0 5.523437 4.476562 10 10 10s10-4.476563 10-10v-92.710938c0-5.523437-4.476562-10-10-10zm0 0"/><path d="m256 318.5c28.65625 0 51.972656-23.3125 51.972656-51.96875 0-5.523438-4.480468-10-10-10-5.523437 0-10 4.476562-10 10 0 17.625-14.34375 31.96875-31.972656 31.96875-5.523438 0-10 4.476562-10 10s4.476562 10 10 10zm0 0"/><path d="m297.96875 242c2.632812 0 5.210938-1.070312 7.070312-2.929688 1.859376-1.859374 2.929688-4.441406 2.929688-7.070312s-1.066406-5.210938-2.929688-7.070312c-1.859374-1.859376-4.4375-2.929688-7.070312-2.929688-2.628906 0-5.207031 1.070312-7.066406 2.929688-1.859375 1.859374-2.933594 4.441406-2.933594 7.070312s1.070312 5.210938 2.933594 7.070312c1.859375 1.859376 4.4375 2.929688 7.066406 2.929688zm0 0"/>
                            </svg>
                            <span class="text-blue font-24 font-bold">
                              صوتی
                            </span>
                        </div>
                        <div class="ga-page__tab flex items-center justify-center flex-1 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="1 -47 511.999 511"
                                 class="ga-page__icon object-contain"
                            >
                                <path d="m469.488281 84.417969h-4.390625c-2.570312-22.023438-20.292968-39.484375-42.441406-41.621094-2.542969-23.742187-22.683594-42.296875-47.085938-42.296875h-302.21875c-40.445312 0-73.351562 32.90625-73.351562 73.347656v211.902344c0 24.574219 18.804688 44.828125 42.773438 47.144531 2.515624 23.488281 22.261718 41.886719 46.3125 42.273438.0625 4.167969.714843 8.191406 1.898437 11.988281 5.386719 17.292969 21.550781 29.882812 40.59375 29.882812h337.910156c23.441407 0 42.511719-19.070312 42.511719-42.507812v-247.601562c0-23.441407-19.070312-42.511719-42.511719-42.511719zm22.511719 42.511719v163.738281l-43.5-32.859375c-11.886719-8.976563-27.960938-9.117188-40-.347656l-55.027344 40.09375-104.9375-108.1875c-12.5-12.890626-32.839844-13.683594-46.304687-1.800782l-93.160157 82.191406v-142.828124c0-12.414063 10.097657-22.511719 22.507813-22.511719h337.910156c12.414063 0 22.511719 10.097656 22.511719 22.511719zm0 247.597656c0 12.414062-10.097656 22.511718-22.507812 22.511718h-337.914063c-10.082031 0-18.640625-6.667968-21.492187-15.824218-.660157-2.113282-1.015626-4.359375-1.015626-6.683594v-78.105469l106.394532-93.863281c5.441406-4.804688 13.660156-4.484375 18.714844.726562l47.359374 48.828126c0 .003906 0 .003906.003907.003906l94.261719 97.183594c1.960937 2.023437 4.566406 3.039062 7.179687 3.039062 2.507813 0 5.019531-.9375 6.960937-2.820312 3.960938-3.847657 4.058594-10.175782.214844-14.140626l-22.625-23.328124 52.742188-38.425782c4.867187-3.546875 11.363281-3.492187 16.167968.136719l55.554688 41.964844zm-429.5-46.707032v-236.109374c0-1.003907.050781-2 .152344-2.976563 1.492187-14.675781 13.925781-26.164063 28.988281-26.164063h122.320313c5.523437 0 10-4.476562 10-10 0-5.523437-4.476563-10-10-10h-122.320313c-27.097656 0-49.140625 22.042969-49.140625 49.140626v220.976562c-12.777344-2.300781-22.5-13.503906-22.5-26.9375v-211.902344c0-29.414062 23.933594-53.347656 53.351562-53.347656h302.21875c13.273438 0 24.371094 9.503906 26.84375 22.070312h-108.453124c-5.523438 0-10 4.476563-10 10 0 5.523438 4.476562 10 10 10h118.96875.011718 5.128906c13.195313 0 24.242188 9.394532 26.800782 21.847657h-313.292969c-23.4375 0-42.507813 19.070312-42.507813 42.511719v164.976562.007812 63.253907c-14.722656-.417969-26.570312-12.523438-26.570312-27.347657zm0 0"/><path d="m388.515625 145.117188c-23.601563 0-42.796875 19.199218-42.796875 42.792968 0 23.597656 19.199219 42.796875 42.796875 42.796875 23.59375 0 42.792969-19.199219 42.792969-42.796875 0-23.59375-19.199219-42.792968-42.792969-42.792968zm0 65.589843c-12.570313 0-22.796875-10.226562-22.796875-22.792969 0-12.570312 10.226562-22.796874 22.796875-22.796874 12.566406 0 22.792969 10.226562 22.792969 22.796874 0 12.566407-10.226563 22.792969-22.792969 22.792969zm0 0"/><path d="m244.730469 56.398438c.25.601562.558593 1.179687.917969 1.722656.363281.546875.78125 1.058594 1.242187 1.519531.460937.457031.96875.878906 1.519531 1.25.539063.359375 1.128906.667969 1.730469.917969.597656.25 1.230469.441406 1.871094.570312.636719.128906 1.296875.191406 1.949219.191406.660156 0 1.308593-.0625 1.960937-.191406.636719-.128906 1.257813-.320312 1.867187-.570312.601563-.25 1.179688-.558594 1.722657-.917969.546875-.371094 1.058593-.792969 1.519531-1.25.46875-.460937.878906-.972656 1.25-1.519531.359375-.542969.667969-1.121094.917969-1.722656.25-.609376.441406-1.238282.570312-1.867188.128907-.652344.191407-1.3125.191407-1.960938 0-.652343-.0625-1.3125-.191407-1.949218-.128906-.640625-.320312-1.273438-.570312-1.871094-.25-.609375-.558594-1.191406-.917969-1.730469-.371094-.550781-.78125-1.058593-1.25-1.519531-.460938-.460938-.972656-.878906-1.519531-1.242188-.542969-.359374-1.121094-.667968-1.722657-.917968-.609374-.25-1.230468-.441406-1.867187-.570313-1.292969-.261719-2.621094-.261719-3.910156 0-.640625.128907-1.273438.320313-1.871094.570313-.601563.25-1.191406.558594-1.730469.917968-.550781.363282-1.058594.78125-1.519531 1.242188s-.878906.96875-1.242187 1.519531c-.359376.539063-.667969 1.121094-.917969 1.730469-.25.597656-.441407 1.230469-.570313 1.871094-.128906.636718-.199218 1.296875-.199218 1.949218 0 .648438.070312 1.308594.199218 1.960938.128906.628906.320313 1.257812.570313 1.867188zm0 0"/>
                            </svg>
                            <span class="text-blue font-24 font-bold">
                              تصویری
                            </span>
                        </div>
                        <div class="ga-page__tab flex items-center justify-center flex-1 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.14969 512"
                                 class="ga-page__icon object-contain"
                            >
                                <path d="m355.519531 512.113281c11.570313-.03125 21.695313-7.78125 24.746094-18.941406l23.597656-88.101563 89.367188-23.890624c13.617187-3.703126 21.679687-17.710938 18.050781-31.34375l-46.335938-172.699219 3.667969-13.652344c3.316407-12.574219-3.324219-25.636719-15.4375-30.371094l-20.863281-77.882812c-3.734375-13.605469-17.707031-21.679688-31.359375-18.125l-152.40625 40.882812-127.796875-34.261719c-5.238281-1.4375-10.800781-1.136718-15.851562.855469l-31.925782-31.871093c-10.761718-10.859376-26.507812-15.132813-41.28125-11.199219-14.773437 3.933593-26.3125 15.46875-30.25 30.242187-3.9375 14.773438.328125 30.523438 11.183594 41.285156l58.191406 58.191407-69.71875 260.265625c-3.648437 13.648437 4.421875 27.675781 18.054688 31.386718l329.722656 88.34375c2.164062.589844 4.398438.890626 6.644531.886719zm139.25-157.867187c1.207031 4.527344-1.460937 9.183594-5.976562 10.429687l-79.820313 21.332031 47.113282-175.878906zm-89.449219-300.636719c2.199219-.601563 4.546876-.296875 6.519532.84375 1.972656 1.136719 3.40625 3.019531 3.984375 5.222656l18.203125 67.996094-152.515625-40.859375zm-146.773437 205.054687-43.082031-14.359374 28.722656-28.75 14.359375 43.078124zm-34.730469-46.828124-72.40625-72.414063c-3.332031-3.332031-8.738281-3.332031-12.070312.003906-3.332032 3.332031-3.328125 8.738281.007812 12.070313l72.410156 72.394531-12.0625 12.078125-120.6875-120.6875 12.066407-12.066406 24.128906 24.140625c2.160156 2.15625 5.300781 3 8.25 2.207031 2.945313-.789062 5.246094-3.089844 6.035156-6.035156.789063-2.945313-.050781-6.089844-2.207031-8.246094l-24.132812-24.132812 12.066406-12.074219 120.667968 120.6875zm-168.949218-120.6875 36.207031-36.207032 12.066406 12.066406-36.199219 36.207032zm-37.667969-48.273438c0-10.355469 6.238281-19.695312 15.804687-23.65625 9.570313-3.960938 20.582032-1.769531 27.902344 5.554688l18.101562 18.101562-36.207031 36.207031-18.109375-18.109375c-4.8125-4.789062-7.511718-11.304687-7.492187-18.097656zm.394531 353.101562 67.171875-250.796874 108.886719 108.886718c.890625.871094 1.960937 1.53125 3.140625 1.9375.066406 0 .117187.09375.195312.117188l56.210938 18.773437c1.753906.578125 3.59375.863281 5.441406.855469 3.214844-.011719 6.359375-.9375 9.0625-2.671875l98.132813 26.351563c.722656.199218 1.46875.300781 2.21875.296874 4.285156 0 7.902343-3.175781 8.457031-7.421874.558593-4.246094-2.117188-8.246094-6.253907-9.351563l-94.71875-25.429687c-.085937-1.449219-.347656-2.882813-.785156-4.269532l-18.773437-56.214844c0-.078124-.09375-.128906-.128907-.207031-.40625-1.167969-1.066406-2.234375-1.929687-3.121093l-131.890625-131.945313 324.019531 86.792969c2.191407.585937 4.058594 2.015625 5.191407 3.980468 1.132812 1.960938 1.4375 4.292969.851562 6.484376l-88.304688 329.683593c-.582031 2.191407-2.015624 4.0625-3.980468 5.195313-1.964844 1.132812-4.300782 1.4375-6.488282.847656l-329.6875-88.3125c-2.1875-.585938-4.054687-2.015625-5.191406-3.976562-1.132812-1.964844-1.4375-4.296876-.847656-6.484376zm0 0"/><path d="m394.578125 200.785156c4.28125-.003906 7.898437-3.179687 8.457031-7.425781.554688-4.242187-2.121094-8.246094-6.253906-9.351563l-121.371094-32.519531c-2.976562-.886719-6.195312-.085937-8.410156 2.089844-2.214844 2.171875-3.074219 5.378906-2.246094 8.367187.828125 2.992188 3.21875 5.296876 6.234375 6.019532l121.378907 32.527344c.722656.195312 1.464843.292968 2.210937.292968zm0 0"/><path d="m381.316406 250.234375c4.28125-.003906 7.898438-3.175781 8.457032-7.421875.558593-4.246094-2.117188-8.246094-6.253907-9.355469l-82.519531-22.074219c-2.964844-.84375-6.152344-.027343-8.34375 2.144532-2.191406 2.167968-3.039062 5.351562-2.222656 8.324218.816406 2.972657 3.171875 5.273438 6.164062 6.015626l82.519532 22.078124c.714843.191407 1.457031.289063 2.199218.289063zm0 0"/><path d="m118.003906 268.324219-24.746094-6.628907c-2.96875-.867187-6.175781-.0625-8.378906 2.109376-2.203125 2.167968-3.0625 5.359374-2.242187 8.34375.820312 2.980468 3.1875 5.285156 6.191406 6.023437l24.746094 6.640625c.726562.191406 1.46875.289062 2.21875.289062 4.285156.003907 7.90625-3.171874 8.464843-7.417968.558594-4.246094-2.117187-8.25-6.253906-9.359375zm0 0"/><path d="m363.0625 342.8125c1.21875-4.550781-1.484375-9.222656-6.03125-10.445312l-189.585938-50.789063c-4.398437-.859375-8.710937 1.835937-9.875 6.164063-1.160156 4.328124 1.226563 8.820312 5.464844 10.277343l189.574219 50.792969c.722656.199219 1.464844.296875 2.210937.296875 3.855469.003906 7.234376-2.578125 8.242188-6.296875zm0 0"/><path d="m104.742188 317.777344-24.746094-6.632813c-4.542969-1.191406-9.195313 1.511719-10.410156 6.046875-1.214844 4.539063 1.46875 9.207032 6 10.441406l24.746093 6.621094c.71875.199219 1.460938.300782 2.210938.296875 4.28125.003907 7.902343-3.171875 8.460937-7.417969.5625-4.246093-2.113281-8.25-6.253906-9.355468zm0 0"/><path d="m343.777344 381.828125-189.574219-50.800781c-2.976563-.882813-6.195313-.082032-8.410156 2.089844-2.214844 2.175781-3.074219 5.378906-2.246094 8.371093.828125 2.988281 3.21875 5.292969 6.234375 6.019531l189.578125 50.796876c.722656.199218 1.46875.300781 2.21875.300781 4.28125-.003907 7.898437-3.179688 8.457031-7.425781.554688-4.246094-2.121094-8.246094-6.257812-9.351563zm0 0"/>
                            </svg>
                            <span class="text-blue font-24 font-bold">
                              نوشتاری
                            </span>
                        </div>
                        <div class="ga-page__tab flex items-center justify-center flex-1 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -40 512 512"
                                 class="ga-page__icon object-contain"
                            >
                                <path d="m462 0h-412c-27.570312 0-50 22.429688-50 50v331.863281c0 27.570313 22.429688 50 50 50h298.332031c5.523438 0 10-4.476562 10-10 0-5.523437-4.476562-10-10-10h-298.332031c-16.542969 0-30-13.460937-30-30v-273.863281h472v273.863281c0 16.539063-13.457031 30-30 30h-26c-5.523438 0-10 4.476563-10 10 0 5.523438 4.476562 10 10 10h26c27.570312 0 50-22.429687 50-50v-331.863281c0-27.570312-22.429688-50-50-50zm-442 88v-38c0-16.542969 13.457031-30 30-30h412c16.542969 0 30 13.457031 30 30v38zm0 0"/><path d="m392 411.863281c-2.628906 0-5.210938 1.0625-7.070312 2.929688-1.859376 1.859375-2.929688 4.441406-2.929688 7.070312 0 2.628907 1.070312 5.210938 2.929688 7.070313 1.859374 1.859375 4.441406 2.929687 7.070312 2.929687s5.210938-1.070312 7.070312-2.929687c1.859376-1.859375 2.929688-4.441406 2.929688-7.070313 0-2.628906-1.070312-5.210937-2.929688-7.070312-1.859374-1.867188-4.441406-2.929688-7.070312-2.929688zm0 0"/><path d="m62.4375 44c-5.523438 0-10 4.476562-10 10s4.476562 10 10 10h.09375c5.523438 0 9.953125-4.476562 9.953125-10s-4.523437-10-10.046875-10zm0 0"/><path d="m107.941406 44c-5.523437 0-10 4.476562-10 10s4.476563 10 10 10h.09375c5.523438 0 9.953125-4.476562 9.953125-10s-4.523437-10-10.046875-10zm0 0"/><path d="m153.445312 44c-5.519531 0-10 4.476562-10 10s4.480469 10 10 10h.09375c5.523438 0 9.953126-4.476562 9.953126-10s-4.523438-10-10.046876-10zm0 0"/><path d="m449 44h-217.242188c-5.523437 0-10 4.476562-10 10s4.476563 10 10 10h217.242188c5.523438 0 10-4.476562 10-10s-4.476562-10-10-10zm0 0"/><path d="m143.96875 259.929688c0 61.777343 50.257812 112.035156 112.03125 112.035156s112.03125-50.257813 112.03125-112.035156c0-61.773438-50.257812-112.03125-112.03125-112.03125s-112.03125 50.257812-112.03125 112.03125zm204.0625 0c0 50.75-41.285156 92.035156-92.03125 92.035156s-92.03125-41.285156-92.03125-92.035156c0-50.746094 41.285156-92.03125 92.03125-92.03125s92.03125 41.285156 92.03125 92.03125zm0 0"/><path d="m227.417969 204.820312c-7.089844 3.878907-11.492188 11.308594-11.492188 19.386719v69.546875c0 8.082032 4.402344 15.507813 11.492188 19.386719 3.3125 1.808594 6.957031 2.710937 10.601562 2.710937 4.152344 0 8.296875-1.171874 11.921875-3.496093l54.25-34.773438c6.371094-4.082031 10.171875-11.035156 10.171875-18.601562 0-7.5625-3.800781-14.515625-10.171875-18.597657l-54.25-34.777343c-6.804687-4.359375-15.433594-4.660157-22.523437-.785157zm66.945312 54.160157c0 .523437-.167969 1.25-.960937 1.761719l-54.253906 34.773437c-.695313.449219-1.410157.472656-2.132813.074219-.722656-.394532-1.089844-1.011719-1.089844-1.835938v-69.546875c0-.824219.367188-1.441406 1.089844-1.839843.339844-.183594.679687-.277344 1.015625-.277344.375 0 .75.117187 1.117188.351562l54.253906 34.777344c.792968.507812.960937 1.238281.960937 1.761719zm0 0"/><path d="m48 239.425781v97.5c0 5.519531 4.476562 10 10 10s10-4.480469 10-10v-97.5c0-5.523437-4.476562-10-10-10s-10 4.476563-10 10zm0 0"/><path d="m65.070312 191.402344c-1.859374-1.859375-4.441406-2.929688-7.070312-2.929688s-5.210938 1.070313-7.070312 2.929688c-1.859376 1.863281-2.929688 4.441406-2.929688 7.070312 0 2.640625 1.070312 5.210938 2.929688 7.070313 1.859374 1.871093 4.441406 2.929687 7.070312 2.929687s5.210938-1.058594 7.070312-2.929687c1.859376-1.859375 2.929688-4.4375 2.929688-7.070313 0-2.628906-1.070312-5.207031-2.929688-7.070312zm0 0"/>
                            </svg>
                            <span class="text-blue font-24 font-bold">
                              ویدیویی
                            </span>
                        </div>
                    </div>
                    <div class="ga-page__body flex items-start">
                        <aside class="ga-page__aside w-1/4 xl:w-1/5 flex-shrink-0">
                            <form action="#"
                                  class="block w-full"
                            >

                                <button class="ga-page__published relative w-full flex items-center justify-between text-blue-800 font-sm font-bold border border-solid rounded-6 has-shadow">
                                    آخرین مقالات
                                    <!-- asc class: ga-page__published--asc -->
                                    <span class="ga-page__published--desc"></span>
                                </button>
                                <div class="ga-page__panel w-full border border-solid rounded">
                                    <div class="ga-page__panel_header rounded-inherit rounded-br-none rounded-bl-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="-16 0 511 512"
                                             class="ga-page__panel_icon"
                                        >
                                            <path d="m132.261719 148.183594h167.375c5.523437 0 10-4.480469 10-10 0-5.523438-4.476563-10-10-10h-167.375c-5.523438 0-10 4.476562-10 10 0 5.519531 4.476562 10 10 10zm0 0"/><path d="m132.261719 220.164062h153.378906c5.523437 0 10-4.476562 10-10 0-5.523437-4.476563-10-10-10h-153.378906c-5.523438 0-10 4.476563-10 10 0 5.523438 4.476562 10 10 10zm0 0"/><path d="m132.261719 282.894531h97.84375c5.523437 0 10-4.476562 10-10 0-5.523437-4.476563-10-10-10h-97.84375c-5.523438 0-10 4.476563-10 10 0 5.523438 4.476562 10 10 10zm0 0"/><path d="m200.484375 325.625h-68.222656c-5.523438 0-10 4.476562-10 10s4.476562 10 10 10h68.222656c5.523437 0 10-4.476562 10-10s-4.476563-10-10-10zm0 0"/><path d="m189.121094 388.355469h-56.859375c-5.523438 0-10 4.476562-10 10 0 5.523437 4.476562 10 10 10h56.859375c5.523437 0 10-4.476563 10-10 0-5.523438-4.476563-10-10-10zm0 0"/><path d="m371.15625 336.171875c-.128906-.046875-.257812-.085937-.382812-.128906-.027344-.007813-.054688-.019531-.082032-.027344-5.703125-2.015625-11.671875-3.046875-17.742187-3.046875-29.328125 0-53.1875 23.855469-53.1875 53.183594s23.859375 53.1875 53.1875 53.1875c6.074219 0 12.039062-1.027344 17.742187-3.042969.027344-.011719.054688-.019531.082032-.027344.125-.046875.253906-.085937.382812-.128906 0-.003906.003906-.003906.007812-.003906 20.921876-7.625 34.976563-27.714844 34.976563-49.984375 0-22.269532-14.054687-42.351563-34.984375-49.980469zm-51.394531 49.976563c0-18.292969 14.886719-33.179688 33.1875-33.179688 1.613281 0 3.210937.121094 4.789062.351562v65.667969c-1.578125.230469-3.175781.351563-4.789062.351563-18.300781 0-33.1875-14.890625-33.1875-33.191406zm57.976562 22.011718v-44.011718c5.273438 5.953124 8.402344 13.730468 8.402344 22.003906 0 8.277344-3.128906 16.054687-8.402344 22.007812zm0 0"/><path d="m461.347656 355.5625h-14.449218c-1.589844-4.890625-3.558594-9.636719-5.890626-14.207031l10.222657-10.222657c3.300781-3.300781 5.113281-7.691406 5.109375-12.355468-.003906-4.664063-1.824219-9.042969-5.109375-12.316406l-18.582031-18.59375c-6.804688-6.800782-17.875-6.800782-24.679688 0l-10.226562 10.226562c-4.578126-2.332031-9.320313-4.300781-14.203126-5.890625v-14.453125c0-5.144531-2.195312-9.804688-5.800781-13.019531v-174.539063c0-19.730468-16.050781-35.78125-35.78125-35.78125h-17.875v-18.632812c0-19.726563-16.050781-35.777344-35.777343-35.777344h-252.027344c-19.726563 0-35.777344 16.050781-35.777344 35.777344v385.839844c0 19.726562 16.050781 35.777343 35.777344 35.777343h17.878906v18.636719c0 19.722656 16.054688 35.769531 35.78125 35.769531h247.300781c.847657.128907 1.707031.199219 2.570313.199219h26.277344c9.625 0 17.449218-7.828125 17.449218-17.449219v-14.449219c4.890625-1.589843 9.636719-3.558593 14.210938-5.890624l10.21875 10.21875c6.808594 6.804687 17.878906 6.808593 24.683594 0l18.582031-18.578126c6.804687-6.804687 6.804687-17.878906 0-24.683593l-10.222657-10.222657c2.332032-4.570312 4.300782-9.316406 5.890626-14.207031h14.449218c9.621094 0 17.449219-7.828125 17.449219-17.449219v-26.277343c.003906-9.621094-7.824219-17.449219-17.449219-17.449219zm-387.1875 120.46875v-260.359375c0-.695313-.070312-1.367187-.207031-2.019531-.929687-4.558594-4.960937-7.988282-9.796875-7.988282-5.519531 0-10 4.480469-10 10v221.730469h-17.878906c-8.699219 0-15.777344-7.078125-15.777344-15.777343v-385.839844c0-8.699219 7.078125-15.777344 15.777344-15.777344h252.027344c8.699218 0 15.777343 7.078125 15.777343 15.777344v18.632812h-214.148437c-19.726563 0-35.777344 16.046875-35.777344 35.773438v45.480468c0 .691407.070312 1.367188.207031 2.019532.929688 4.558594 4.960938 7.984375 9.796875 7.984375 5.523438 0 10-4.476563 10-10v-45.476563c0-8.703125 7.078125-15.78125 15.777344-15.78125h252.023438c8.699218 0 15.777343 7.078125 15.777343 15.78125v170.109375h-17.929687c-9.621094 0-17.449219 7.828125-17.449219 17.449219v14.453125c-4.882813 1.589844-9.628906 3.558594-14.203125 5.890625l-10.226562-10.226562c-6.804688-6.804688-17.875-6.800782-24.683594.003906l-18.566406 18.574218c-3.300782 3.289063-5.121094 7.667969-5.125 12.328126-.003907 4.667968 1.8125 9.058593 5.113281 12.359374l10.222656 10.222657c-2.332031 4.578125-4.300781 9.324219-5.890625 14.203125h-14.449219c-9.621093 0-17.449219 7.828125-17.449219 17.449218v26.28125c0 9.621094 7.828126 17.449219 17.449219 17.449219h14.453125c1.585938 4.882813 3.554688 9.628907 5.890625 14.203125l-10.226562 10.226563c-6.804688 6.804687-6.804688 17.878906 0 24.683593l18.578125 18.578126c3.300781 3.296874 7.683594 5.109374 12.34375 5.109374s9.042968-1.8125 12.339844-5.109374l10.222656-10.222657c4.570312 2.332031 9.320312 4.300781 14.207031 5.890625v11.703125h-232.417969c-8.703125 0-15.78125-7.074219-15.78125-15.769531zm384.640625-79.292969h-19.472656c-4.628906 0-8.65625 3.183594-9.726563 7.6875-1.941406 8.152344-5.148437 15.882813-9.53125 22.980469-2.4375 3.945312-1.839843 9.046875 1.4375 12.324219l13.777344 13.78125-14.976562 14.976562-13.777344-13.777343c-3.277344-3.277344-8.382812-3.875-12.328125-1.4375-7.097656 4.382812-14.828125 7.589843-22.976563 9.527343-4.507812 1.074219-7.6875 5.097657-7.6875 9.730469v19.46875h-21.179687v-19.46875c0-4.632812-3.179687-8.65625-7.6875-9.730469-8.148437-1.9375-15.882813-5.144531-22.976563-9.527343-3.945312-2.4375-9.046874-1.84375-12.328124 1.4375l-13.777344 13.777343-14.980469-14.980469 13.78125-13.777343c3.273437-3.277344 3.871094-8.375 1.4375-12.316407-4.390625-7.128906-7.601563-14.863281-9.53125-22.988281-1.074219-4.503906-5.097656-7.6875-9.730469-7.6875h-19.46875v-21.179687h19.46875c4.632813 0 8.65625-3.179688 9.730469-7.683594 1.933594-8.128906 5.140625-15.859375 9.53125-22.988281 2.433594-3.941407 1.835937-9.042969-1.4375-12.316407l-13.777344-13.773437 14.976563-14.984375 13.777344 13.777344c3.277343 3.277344 8.375 3.875 12.316406 1.441406 7.128906-4.390625 14.863281-7.597656 22.988281-9.535156 4.507813-1.070313 7.6875-5.097656 7.6875-9.726563v-19.46875h21.179687v19.46875c0 4.632813 3.179688 8.65625 7.683594 9.730469 8.128906 1.933594 15.863282 5.140625 22.988282 9.53125 3.941406 2.433594 9.042968 1.835938 12.320312-1.4375l13.777344-13.78125 14.972656 14.984375-13.773438 13.773437c-3.28125 3.277344-3.875 8.382813-1.4375 12.328126 4.382813 7.09375 7.589844 14.824218 9.527344 22.976562 1.074219 4.507812 5.097656 7.6875 9.730469 7.6875h19.472656zm0 0"/><path d="m73.390625 171.839844c-.25-.601563-.5625-1.179688-.921875-1.71875-.359375-.550782-.78125-1.0625-1.238281-1.523438-.460938-.46875-.972657-.878906-1.519531-1.25-.542969-.359375-1.121094-.667968-1.730469-.917968-.601563-.25-1.230469-.441407-1.871094-.570313-1.289063-.261719-2.621094-.261719-3.898437 0-.640626.128906-1.273438.320313-1.882813.570313-.597656.25-1.179687.558593-1.71875.917968-.550781.371094-1.058594.78125-1.519531 1.25-.460938.460938-.878906.972656-1.25 1.523438-.359375.539062-.671875 1.117187-.921875 1.71875-.25.609375-.4375 1.230468-.570313 1.871094-.128906.648437-.1875 1.308593-.1875 1.960937 0 .648437.058594 1.308594.1875 1.949219.132813.640625.332032 1.269531.582032 1.867187.25.601563.550781 1.191407.917968 1.730469.363282.550781.78125 1.0625 1.242188 1.519531.460937.460938.96875.882813 1.519531 1.242188.539063.359375 1.121094.667969 1.71875.917969.609375.25 1.242187.441406 1.882813.570312.636718.128906 1.296874.199219 1.949218.199219 2.628906 0 5.207032-1.070313 7.070313-2.929688.457031-.460937.878906-.96875 1.238281-1.519531.359375-.539062.671875-1.128906.921875-1.730469.25-.601562.4375-1.230469.570313-1.871093.128906-.640626.199218-1.300782.199218-1.949219 0-.648438-.070312-1.308594-.199218-1.957031-.132813-.640626-.320313-1.261719-.570313-1.871094zm0 0"/>
                                        </svg>
                                        <span class="text-blue-800 font-sm font-bold cursor-default">
                                            دسته‌بندی
                                        </span>
                                    </div>
                                    <div class="ga-page__panel_body">
                                        <label class="checkbox-square relative flex items-center cursor-pointer font-xs-bold">
                                            <input type="radio"
                                                   class="checkbox-square__input"
                                                   name="audio"
                                            />
                                            <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                            <span class="checkbox-square__label rounded user-select-none">
                                                موسیقی
                                            </span>
                                        </label>
                                        <label class="checkbox-square relative flex items-center cursor-pointer font-xs-bold">
                                            <input type="radio"
                                                   class="checkbox-square__input"
                                                   name="audio"
                                            />
                                            <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                            <span class="checkbox-square__label rounded user-select-none">
                                                مصاحبه رادیویی
                                            </span>
                                        </label>
                                        <label class="checkbox-square relative flex items-center cursor-pointer font-xs-bold">
                                            <input type="radio"
                                                   class="checkbox-square__input"
                                                   name="audio"
                                            />
                                            <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                            <span class="checkbox-square__label rounded user-select-none">
                                                موسیقی
                                            </span>
                                        </label>
                                        <label class="checkbox-square relative flex items-center cursor-pointer font-xs-bold">
                                            <input type="radio"
                                                   class="checkbox-square__input"
                                                   name="audio"
                                            />
                                            <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                            <span class="checkbox-square__label rounded user-select-none">
                                                مصاحبه رادیویی
                                            </span>
                                        </label>
                                        <label class="checkbox-square relative flex items-center cursor-pointer font-xs-bold">
                                            <input type="radio"
                                                   class="checkbox-square__input"
                                                   name="audio"
                                            />
                                            <span class="checkbox-square__checkbox relative flex-shrink-0 border border-solid rounded"></span>
                                            <span class="checkbox-square__label rounded user-select-none">
                                                موسیقی
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    @endsection