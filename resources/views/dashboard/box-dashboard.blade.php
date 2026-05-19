<div id="cards" class="flex justify-between mr-10 font-display">


        <div class="flex mt-8 gap-15 font-display">
            <div class="flex rounded-[20px] bg-[#F2F2F7] gap-20 justify-between py-5 px-5">
                <div class="block">
                    <h2 class="font-bold text-[18px]">Total</h2>
                    <p class="text-gray-500">All tasks</p>
                    <h2 class="font-bold text-[32px] pt-7 text-blue-500">{{ $total }}</h2>
                </div>
                <div class="block">
                    <div class="bg-blue-500 rounded-lg w-10 h-10">
                        <i class="fa-regular fa-file-lines text-white text-[25px] px-[11px] py-1.5"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex mt-8 gap-15 font-display">
            <div class="flex rounded-[20px] bg-[#F2F2F7] gap-20 justify-between py-5 px-5">
                <div class="block">
                    <h2 class="font-bold text-[18px]">Complete</h2>
                    <p class="text-gray-500">Important task</p>
                    <h2 class="font-bold text-[32px] pt-7 text-green-500">{{ $complete }}</h2>
                </div>
                <div class="block">
                    <div class="bg-blue-500 rounded-lg w-10 h-10">
                        <i class="fa-solid fa-check text-white text-[25px] px-2.5 py-1.5"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex mt-8 gap-15 font-display">
            <div class="flex rounded-[20px] bg-[#F2F2F7] gap-20 justify-between py-5 px-5">
                <div class="block">
                    <h2 class="font-bold text-[18px]">Pending</h2>
                    <p class="text-gray-500">Task to do</p>
                    <h2 class="font-bold text-[32px] pt-7 text-[#f97316]" style="color:  #f97316;">{{ $pending }}</h2>
                </div>
                <div class="block">
                    <div class="bg-blue-500 rounded-lg w-10 h-10">
                        <i class="fa-regular fa-clock text-white text-[25px] px-2 py-2"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex mt-8 gap-15 font-display">
            <div class="flex rounded-[20px] bg-[#F2F2F7] gap-20 justify-between py-5 px-5">
                <div class="block">
                    <h2 class="font-bold text-[18px]">High-priority</h2>
                    <p class="text-gray-500">Important task</p>
                    <h2 class="font-bold text-[32px] pt-7 text-red-500">{{ $high }}</h2>
                </div>
                <div class="block">
                    <div class="bg-blue-500 rounded-lg w-10 h-10">
                        <i class="fa-solid fa-circle-exclamation text-white text-[25px] px-2 py-2"></i>
                    </div>
                </div>
            </div>
        </div>

</div>


   



