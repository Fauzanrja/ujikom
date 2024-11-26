<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-black font-sans leading-normal tracking-normal text-gray-300">

    <div class="flex h-screen bg-black">

        <!-- Sidebar -->
        <aside class="w-64 bg-black text-white flex flex-col shadow-lg border-r border-gray-800">
            <div class="p-6 text-center text-2xl font-semibold border-b border-gray-800">
                <span class="text-white">Admin</span> 
                <span class="text-gray-500">Dashboard</span>
            </div>
            <nav class="flex-grow p-4">
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('admin.dashboard') }}" class="font-semibold flex items-center space-x-4 px-4 py-3 rounded-lg hover:bg-gray-900 text-gray-300 hover:text-white transition duration-500 transform hover:scale-105">
                            <i class="fas fa-tachometer-alt text-xl"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('petugas.index') }}" class="font-semibold flex items-center space-x-4 px-4 py-3 rounded-lg hover:bg-gray-900 text-gray-300 hover:text-white transition duration-500 transform hover:scale-105">
                            <i class="fas fa-users-cog text-xl"></i>
                            <span>Management Petugas</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('admin.profile.index') }}" class="flex items-center space-x-4 px-4 py-3 rounded-lg hover:bg-gray-900 text-gray-300 hover:text-white transition duration-500 transform hover:scale-105">
                            <i class="fas fa-user-cog text-xl"></i>
                            <span>Management Profile</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('admin.kategori.index') }}" class="flex items-center space-x-4 px-4 py-3 rounded-lg hover:bg-gray-900 text-gray-300 hover:text-white transition duration-500 transform hover:scale-105">
                            <i class="fas fa-th-large text-xl"></i>
                            <span>Management Kategori</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('admin.posts.index') }}" class="flex items-center space-x-4 px-4 py-3 rounded-lg hover:bg-gray-900 text-gray-300 hover:text-white transition duration-500 transform hover:scale-105">
                            <i class="fas fa-pen text-xl"></i>
                            <span>Management Post</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('galery.index') }}" class="flex items-center space-x-4 px-4 py-3 rounded-lg hover:bg-gray-900 text-gray-300 hover:text-white transition duration-500 transform hover:scale-105">
                            <i class="fas fa-image text-xl"></i>
                            <span>Management Galeri</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('admin.foto.index') }}" class="flex items-center space-x-4 px-4 py-3 rounded-lg hover:bg-gray-900 text-gray-300 hover:text-white transition duration-500 transform hover:scale-105">
                            <i class="fas fa-camera text-xl"></i>
                            <span>Management Foto</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-4 border-t border-gray-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-3 rounded-lg hover:bg-gray-900 text-gray-300 hover:text-white transition duration-300 transform hover:scale-105">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-grow p-6 bg-black">
            @yield('content')
        </main>

    </div>

</body>

</html>
