    <div x-data="{
        activeSlide: 0,
        slides: [
            'images/homepage/content/traveling-3.jpg',
            'images/homepage/content/traveling-2.avif',
            'images/homepage/content/traveling-1.avif',
            'images/homepage/content/traveling-5.jpg'
        ]
    }" x-init="setInterval(() => { activeSlide = (activeSlide + 1) % slides.length }, 6000)" class="relative h-[35vh] lg:h-[45vh] w-auto overflow-hidden">

        <div class="absolute top-10 z-10 left-10">

            <h1 class="font-bold text-default text-[12px] lg:text-xl">
                @lang('homepage.welcome_to_the_blogku')
            </h1>

            <p class="w-[50%] text-[12px] lg:text-base">
                @lang('homepage.description.hero')
            </p>

            <div class="flex mt-4 gap-2">

                <button
                    class="h-[3vh] lg:h-auto w-[10vh] lg:w-[18vh] text-[8px] flex justify-center items-center lg:text-sm text-center bg-primary text-white font-bold hover:bg-default p-2 rounded-full cursor-pointer">@lang('homepage.get_started')</button>

                <button
                    class="h-[3vh] lg:h-auto w-[7vh] lg:w-[14vh] text-[8px] flex justify-center items-center lg:text-sm text-center bg-default text-white font-bold hover:bg-primary p-2 rounded-full cursor-pointer">@lang('homepage.register')</button>
            </div>
        </div>

        <div class="flex transition-transform duration-700 ease-in-out"
            :style="'transform: translateX(-' + activeSlide * 100 + '%)'">

            <template x-for="(slide, index) in slides" :key="index">
                <div class="w-full flex-shrink-0">
                    <img :src="slide" class="w-full h-64 object-cover " alt="Slide">
                </div>
            </template>
        </div>

        <button @click="activeSlide = activeSlide === 0 ? slides.length - 1 : activeSlide - 1"
            class="absolute left-5 top-64 transform -translate-y-1/2 bg-gray-800 hover:bg-gray-400 text-white px-3 py-1 rounded-full">
            ❮
        </button>
        <button @click="activeSlide = (activeSlide + 1) % slides.length"
            class="absolute right-5 top-64 transform -translate-y-1/2 bg-gray-800 hover:bg-gray-400 text-white px-3 py-1 rounded-full">
            ❯
        </button>

        <div class="absolute bottom-3 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <template x-for="(slide, index) in slides" :key="index">
                <button @click="activeSlide = index" :class="activeSlide === index ? 'bg-white' : 'bg-gray-500'"
                    class="w-3 h-3 rounded-full transition-all duration-300"></button>
            </template>
        </div>
    </div>
