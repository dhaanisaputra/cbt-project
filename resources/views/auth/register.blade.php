<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{asset('css/output.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <title>Exam CBT Online | E-Learning</title>
</head>
<body class="font-poppins text-[#0A090B]">
<section id="signup" class="flex flex-col md:flex-row w-full h-screen overflow-hidden relative">
    <!-- NAVBAR -->
    <nav class="flex items-center px-[20px] md:px-[50px] pt-[20px] md:pt-[30px] w-full absolute top-0">
        <div class="flex items-center">
            <a href="index.html">
                <img src="{{asset('images/logo/mds-circle-logo.png')}}" alt="logo"
                     class="w-[70px] h-[70px] md:w-[100px] md:h-[100px] object-contain">
            </a>
        </div>
        <div class="flex items-center justify-end w-full">
            <ul class="flex items-center gap-[20px] md:gap-[30px]">
                <li><a href="" class="font-semibold text-white">Docs</a></li>
                <li><a href="" class="font-semibold text-white">About</a></li>
                <li><a href="" class="font-semibold text-white">Help</a></li>
                <li class="h-[42px] md:h-[52px] flex items-center">
                    <a href="{{route('login')}}"
                       class="font-semibold text-white p-[10px_20px] md:p-[14px_30px] bg-[#0A090B] rounded-full text-center">
                       Sign In
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- LEFT SIDE (FORM REGISTER) -->
    <div class="left-side h-full flex flex-col w-full pt-[100px] md:pt-[82px] pb-[20px] md:pb-[30px] px-6 md:px-[50px] bg-white">
        <div class="h-full w-full flex items-center justify-center">
            <form method="POST" action="{{ route('register') }}"
                  class="flex flex-col gap-[20px] md:gap-[30px] w-full max-w-[450px]">
                @csrf
                <h1 class="font-bold text-2xl md:text-3xl leading-9">Sign Up</h1>

                <!-- Name -->
                <div class="flex flex-col gap-2">
                    <p class="font-semibold">Complete Name</p>
                    <div class="flex items-center w-full h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/profile.svg')}}" class="h-full w-full object-contain" alt="icon">
                        </div>
                        <input type="text" name="name"
                               class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none"
                               placeholder="Write your full name">
                    </div>
                </div>

                <!-- Email -->
                <div class="flex flex-col gap-2">
                    <p class="font-semibold">Email Address</p>
                    <div class="flex items-center w-full h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/sms.svg')}}" class="h-full w-full object-contain" alt="icon">
                        </div>
                        <input type="email" name="email"
                               class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none"
                               placeholder="Write your correct email">
                    </div>
                </div>

                <!-- Password -->
                <div class="flex flex-col gap-2">
                    <p class="font-semibold">Password</p>
                    <div class="flex items-center w-full h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/lock.svg')}}" class="h-full w-full object-contain" alt="icon">
                        </div>
                        <input type="password" name="password"
                               class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none"
                               placeholder="Write your password">
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="flex flex-col gap-2">
                    <p class="font-semibold">Confirm Password</p>
                    <div class="flex items-center w-full h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/lock.svg')}}" class="h-full w-full object-contain" alt="icon">
                        </div>
                        <input type="password" name="password_confirmation"
                               class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none"
                               placeholder="Re-enter your password">
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit"
                        class="w-full h-[52px] p-[14px_30px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D]">
                        Create My Account
                </button>
            </form>
        </div>
    </div>

    <!-- RIGHT SIDE (MOCKUP IMAGE) -->
    <div class="right-side hidden md:flex h-full flex-col w-full md:w-[650px] shrink-0 pt-[82px] pb-[30px] bg-[#6436F1]">
        <div class="h-full w-full flex flex-col items-center justify-center pt-[30px] gap-[50px]">
            <div class="w-[90%] max-w-[500px] flex shrink-0">
                <img src="{{asset('images/thumbnail/Mockup2.png')}}" class="w-full h-[490px] object-contain" alt="banner">
            </div>
            <div class="logos w-full overflow-hidden">
                <div class="group/slider flex flex-nowrap w-max items-center">
                    <div class="logo-container animate-[slide_15s_linear_infinite] group-hover/slider:pause-animate flex gap-10 pl-10 items-center flex-nowrap">
                        <div class="w-fit flex shrink-0"><img src="{{asset('images/logo/logo-51.svg')}}" alt="logo"></div>
                        <div class="w-fit flex shrink-0"><img src="{{asset('images/logo/logo-51-1.svg')}}" alt="logo"></div>
                        <div class="w-fit flex shrink-0"><img src="{{asset('images/logo/logo-52.svg')}}" alt="logo"></div>
                        <div class="w-fit flex shrink-0"><img src="{{asset('images/logo/logo-52-1.svg')}}" alt="logo"></div>
                        <div class="w-fit flex shrink-0"><img src="{{asset('images/logo/logo-51.svg')}}" alt="logo"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
