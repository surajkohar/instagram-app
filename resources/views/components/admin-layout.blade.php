
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="min-h-screen bg-gray-100">

    <div class="sidebar flex h-full md:grid grid-cols-5">

        <div class="h-screen h-full overflow-y-auto col-span-1 lg:flex  flex-col lg:w-full w-72 lg:static hidden  absolute top-0 left-0 z-50  bg-indigo-600 "
            id="sideBar">
            <div class="w-full flex justify-center relative">
                <div class="h-max w-max absolute top-2 right-4 lg:hidden  flex">
                    <i class="fa fa-xmark  text-white text-2xl cursor-pointer"
                        onclick="
                        document.getElementById('sideBar').classList.add('hidden');
                     "></i>
                </div>
            </div>
            <div class="w-full px-4 mt-4">
                <div class="w-full ">
                    <span class="text-normalText font-normal  text-sm font-montserrat mt-2">MANAGE</span>
                </div>

                <div class="w-full flex flex-col gap-2 mt-2">
                    <a href="{{ route('admin.index') }}"
                        class=" {{ Route::currentRouteName() == 'dashboard' ? 'text-agencyColor  bg-white font-semibold' : 'text-white bg-agencyColor ' }} relative w-full font-semibol border-[1px] border-agencyColor  text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-agencyColor  hover:bg-white transition ease-in duration-2000">
                    <i class="fa fa-dashboard mr-2 "></i> Dashboard
                    </a>

                    <a href="{{ route('admin.index') }}"
                        class=" {{ Route::currentRouteName() == 'admin.index' ? 'text-agencyColor  bg-white font-semibold' : 'text-white bg-agencyColor ' }} relative w-full font-semibol border-[1px] border-agencyColor  text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-agencyColor  hover:bg-white transition ease-in duration-2000">
                    <i class="fa fa-plane-departure mr-2 "></i> Flights

                    </a>
                   
                    <a href="{{ route('admin.index') }}"
                        class=" {{ Route::currentRouteName() == 'admin.index' ? 'text-agencyColor  bg-white font-semibold' : 'text-white bg-agencyColor ' }} relative w-full font-semibol border-[1px] border-agencyColor  text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-agencyColor  hover:bg-white transition ease-in duration-2000">
                    <i class="fa fa-hotel mr-2 "></i> Hotels

                    </a>

                </div>
            </div>

            {{-- <div class="w-full px-4 mt-4">
                <div class="w-full flex flex-col gap-2 mt-2">

                    <Link href="{{ route('logout') }}"
                        class=" {{ Route::currentRouteName() == 'logout' ? 'text-agencyColor  bg-white font-semibold' : 'text-white bg-agencyColor ' }} relative w-full font-semibol border-[1px] border-agencyColor  text-md font-montserrat py-2.5 px-4 rounded-[3px] hover:text-agencyColor  hover:bg-white transition ease-in duration-2000">
                    <i class="fa fa-right-from-bracket mr-2 "></i> Logout
                    </Link>

                </div>
            </div> --}}
        </div>


        <!-- Page Heading -->
        <div class="right-area container h-screen overflow-y-scroll overflow-x-auto mx-auto col-span-4 bg-[#F2F7FF]">
            {{--            <i class="fa-solid fa-bars text-3xl block md:hidden" id="toggleSideBar"></i> --}}

            <x-admin-navigation />
            <div class="p-4">
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                    @endif

                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>

                </div>
            </div>
        </div>
    </div>


   