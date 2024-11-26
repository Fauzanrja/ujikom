<header class="fixed w-full z-50 transition-all duration-300" id="navbar">
    <nav class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset('images/logo-sekolah.svg') }}" alt="Logo SMKN 4 Bogor" class="h-12 w-12 mr-3">
                <a href="/" class="text-2xl font-bold text-white hover:text-blue-600 transition nav-text">
                    SMKN 4 Bogor
                </a>
            </div>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-white hover:text-blue-600 transition border-b-2 border-transparent hover:border-blue-600 nav-link">Beranda</a>
                <a href="{{ route('profil') }}" class="text-white hover:text-blue-600 transition border-b-2 border-transparent hover:border-blue-600 nav-link">Profil</a>
                <div class="relative group">
                    <button class="text-white hover:text-blue-600 transition border-b-2 border-transparent hover:border-blue-600 flex items-center nav-link">
                        Program Keahlian
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <a href="{{ route('jurusan.pplg') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">PPLG</a>
                        <a href="{{ route('jurusan.tjkt') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">TJKT</a>
                        <a href="{{ route('jurusan.to') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Teknik Otomotif</a>
                        <a href="{{ route('jurusan.tp') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50">Teknik Pengelasan</a>
                    </div>
                </div>
                <a href="{{ route('galeri') }}" class="text-white hover:text-blue-600 transition border-b-2 border-transparent hover:border-blue-600 nav-link">Galeri</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white hover:text-blue-600 focus:outline-none nav-text">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden mt-4">
            <div class="flex flex-col space-y-2">
                <a href="/" class="text-white hover:text-blue-600 transition py-2 nav-link">Beranda</a>
                <a href="{{ route('profil') }}" class="text-white hover:text-blue-600 transition py-2 nav-link">Profil</a>
                <div class="space-y-2 pl-4">
                    <p class="text-white font-semibold nav-text">Program Keahlian:</p>
                    <a href="{{ route('jurusan.pplg') }}" class="block text-white hover:text-blue-600 transition py-1 nav-link">PPLG</a>
                    <a href="{{ route('jurusan.tjkt') }}" class="block text-white hover:text-blue-600 transition py-1 nav-link">TJKT</a>
                    <a href="{{ route('jurusan.to') }}" class="block text-white hover:text-blue-600 transition py-1 nav-link">Teknik Otomotif</a>
                    <a href="{{ route('jurusan.tp') }}" class="block text-white hover:text-blue-600 transition py-1 nav-link">Teknik Pengelasan</a>
                </div>
                <a href="{{ route('galeri') }}" class="text-white hover:text-blue-600 transition py-2 nav-link">Galeri</a>
            </div>
        </div>
    </nav>
</header>

<script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    const navLinks = document.querySelectorAll('.nav-link');
    const navTexts = document.querySelectorAll('.nav-text');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('bg-white/95', 'backdrop-blur-md', 'shadow-md');
            navLinks.forEach(link => {
                link.classList.remove('text-white');
                link.classList.add('text-gray-700');
            });
            navTexts.forEach(text => {
                text.classList.remove('text-white');
                text.classList.add('text-gray-900');
            });
        } else {
            navbar.classList.remove('bg-white/95', 'backdrop-blur-md', 'shadow-md');
            navLinks.forEach(link => {
                link.classList.add('text-white');
                link.classList.remove('text-gray-700');
            });
            navTexts.forEach(text => {
                text.classList.add('text-white');
                text.classList.remove('text-gray-900');
            });
        }
    });
</script> 