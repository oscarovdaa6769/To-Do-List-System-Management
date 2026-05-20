<div id="cards" class="grid grid-cols-4 gap-6 font-display">


        <div class="mt-8 font-display">
            <div class="flex rounded-[20px] bg-background gap-20 justify-between py-5 px-5">
                <div class="block">
                    <h2 class="font-bold text-[18px]">Total</h2>
                    <p class="text-gray-500">All tasks</p>
                    <h2 class="font-bold text-[32px] pt-7 text-blue-500">{{ $total }}</h2>
                </div>
                <div class="block">
                    <div class="bg-blue-500 rounded-lg w-10 h-10 flex items-center justify-center">
                        <x-solar-document-bold class="w-5 h-5 text-white"></x-solar-document-bold>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 font-display">
            <div class="flex rounded-[20px] bg-background gap-20 justify-between py-5 px-5">
                <div class="block">
                    <h2 class="font-bold text-[18px]">Complete</h2>
                    <p class="text-gray-500">Important task</p>
                    <h2 class="font-bold text-[32px] pt-7 text-green-500">{{ $complete }}</h2>
                </div>
                <div class="block">
                    <div class="bg-blue-500 rounded-lg w-10 h-10 flex items-center justify-center">
                        <x-solar-check-square-bold class="w-5 h-5 text-white"></x-solar-check-square-bold>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 font-display">
            <div class="flex rounded-[20px] bg-background gap-20 justify-between py-5 px-5">
                <div class="block">
                    <h2 class="font-bold text-[18px]">Pending</h2>
                    <p class="text-gray-500">Task to do</p>
                    <h2 class="font-bold text-[32px] pt-7 text-[#f97316]" style="color:  #f97316;">{{ $pending }}</h2>
                </div>
                <div class="block">
                    <div class="bg-blue-500 rounded-lg w-10 h-10 flex items-center justify-center">
                        <x-solar-clock-square-bold class="w-5 h-5 text-white"></x-solar-clock-square-bold>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 font-display">
            <div class="flex rounded-[20px] bg-background gap-20 justify-between py-5 px-5">
                <div class="block">
                    <h2 class="font-bold text-[18px]">High-priority</h2>
                    <p class="text-gray-500">Important task</p>
                    <h2 class="font-bold text-[32px] pt-7 text-red-500">{{ $high }}</h2>
                </div>
                <div class="block">
                    <div class="bg-blue-500 rounded-lg w-10 h-10 flex items-center justify-center">
                        <x-solar-danger-square-bold class="w-5 h-5 text-white"></x-solar-danger-square-bold>
                    </div>
                </div>
            </div>
        </div>

</div>






