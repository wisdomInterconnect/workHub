<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend:{
                    colors:{
                        laravel: '#ff5400',
                    },
                },
            },
        }
    </script>
    <title>WorkHubs</title>
</head>
<body class="mb-48">
    
    <nav class="flex justify-between items-center mb-4">
        <a href="/">
            <img src="{{asset('images/workhubimage.jpg')}}" class="logo" alt="" class="w-15" style="width: 10%;">
        </a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
        <li>
                <span class="font-bold uppercase">Welcome {{ auth()->user()->name}}</span>
            </li>
            <li>
                <a href="/listings/manage"  class="hover:text-laravel"> <i class="fa-solid fa-arrow-right-to-bracket"></i> Manage Listing</a>
                
            </li>
            <li>
                <form class="inline" action="/logout" method="post">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
            @else
            <li>
                <a href="/register"  class="hover:text-laravel"> <i class="fa-solid fa-user-plus"></i> Register</a>
            </li>
            <li>
                <a href="/login"  class="hover:text-laravel"> <i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
            </li>
            @endauth
        </ul>

    </nav>
    <main>
    {{-- VIEW OUTPUT --}}
    <!-- @yield('content') -->
    {{$slot}}
    </main>
    <footer>
        <div class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
            <p class="ml-2">Copyright &copy  2023, All Rights reserved WorkHubs</p>
            <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
        </div>
    </footer>
    <x-flash-message/>
</body>
</html>