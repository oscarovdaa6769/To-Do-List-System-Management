@extends('layouts.app')
@section('content')
<body>
    <div class=" block  rounded-[25px] w-100 py-5  text-start px-6">
        <h1 class="font-bold text-[40px] font-display">Account</h1>
        <p class="text-[25px] text-[#999999]">Preview account</p>
    </div>
    
    <div class="flex ">
        <div class="bg-[#F2F2F7] rounded-[20px] justify-center m-auto ">
            <div class="ml-[50px] flex flex-cols p-[20px]">
                <img src="{{asset('https://i.pinimg.com/1200x/5d/41/bc/5d41bc0b19e55fc7aa8c659c9ec109d9.jpg')}}" alt="" class="h-[90px] w-[90px] rounded-[100px] ml-[10px]">
                    <div class="ml-[25px]">
                        <p class="text-[20px] p-[10px] font-display ">Profile Picture</p>    
                        <p class="p-[10px] bg-[blue] rounded-[15px] text-center text-white"></i>Upload Image</p>
                    </div>
                    <div class="pt-[50px]">
                        <p class="p-[10px] border rounded-[15px] ml-[15px] "></i>Remove</p>
                    </div>
            </div>

            <div class="m-10">
                <form action="" class="block px-18 ">
                    <div class="flex gap-20">
                        <div>
                            <label for="">First Name</label><br>
                            <input type="text" name="" value="{{ Auth::user()->name }}" class="border rounded-[15px] p-3 w-100"><br>
                        </div>

                        <div>
                            <label for="">Last Name</label><br>
                            <input type="text" name="" value="{{ Auth::user()->name }}" class="border rounded-[15px] p-3 w-100">
                        </div>
                    </div>

                    <div class="flex gap-20 mt-5">
                        <div>
                            <label for="">Email</label><br>
                            <input type="text" name="" value="{{ Auth::user()->email }}" class="border rounded-[15px] p-3 w-220 "><br>
                        </div>
                    </div>

                    <div class="flex gap-20 mt-5 ">
                        <div>
                            <label for="">New Password</label><br>
                            <input type="password" name="password" placeholder="****" class="border rounded-[15px] p-3 w-100"><br>
                        </div>

                        <div>
                            <label for="">Retype Password</label><br>
                            <input type="password" name="password" placeholder="****" class="border rounded-[15px] p-3 w-100 pt-[15px] ">
                        </div>
                    </div>
                </form>

                <div class="flex mt-15  gap-10">
                   <p class="p-[10px] border rounded-[15px] text-center w-40 ml-auto text-[#999999] "></i>Discard Changes</p>
                   <p class="p-[10px] border rounded-[15px] text-center w-40 mr-18 bg-[blue] text-[white]"></i>Save Changes</p>
                </div>
            </div>
    </div>
    </div>


</body>
@endsection