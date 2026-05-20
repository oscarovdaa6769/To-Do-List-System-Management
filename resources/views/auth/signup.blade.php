<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>

<div class="flex min-h-screen">

    <div class="rounded-[25px] shadow-xl m-auto w-[420px] py-5 px-6">

        <h1 class="font-bold text-[40px]">
            Welcome Back!
        </h1>
        <p class="text-[#999999]">
            Sign up to continue to your account.
        </p>

        <form action="{{ route('signup.store') }}" method="POST">

            @csrf

            <div class="mt-[15px]">
                <label class="text-[15px] text-[#999999]">
                    NAME
                </label><br>

                <input type="text" name="name" placeholder="Your full name" class="bg-[#F2F2F7] rounded-[15px] h-[45px] pl-[15px] w-full">
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-[15px]">
                <label class="text-[15px] text-[#999999]">
                    EMAIL
                </label><br>

                <input
                    type="email"
                    name="email"
                    placeholder="admin@gmail.com"
                    class="bg-[#F2F2F7] rounded-[15px] h-[45px] pl-[15px] w-full"
                >

                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-[15px]">
                <label class="text-[15px] text-[#999999]">
                    PASSWORD
                </label><br>

                <input
                    type="password"
                    name="password"
                    placeholder="******"
                    class="bg-[#F2F2F7] rounded-[15px] h-[45px] pl-[15px] w-full"
                >

                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-[15px]">
                <label class="text-[15px] text-[#999999]">
                    CONFIRM PASSWORD
                </label><br>

                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="******"
                    class="bg-[#F2F2F7] rounded-[15px] h-[45px] pl-[15px] w-full"
                >
            </div>

            <button
                type="submit"
                class="mt-[20px] text-white rounded-[15px] w-full h-[45px] bg-blue-500"
            >
                Signup
            </button>

        </form>

        <p class="mt-[15px] text-center text-[#999999]">
            Already have an account?

            <a href="{{ route('login') }}" class="text-blue-500">
                Login
            </a>
        </p>

    </div>

</div>

</body>
</html>