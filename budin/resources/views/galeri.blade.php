@extends('layouts.app')

@section('title', 'Galeri - SMKN 4 Bogor')

@push('styles')
<style>
    /* Style untuk hero section */
    .hero-section {
        height: 100vh; /* Full viewport height */
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .hero-background {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
    }

    .hero-background .grid-overlay {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(2, 1fr);
        gap: 0.5rem;
        height: 100%;
        width: 100%;
    }

    .hero-background img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.1); /* Sedikit zoom untuk menghindari gap putih */
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0.7) 0%,
            rgba(0, 0, 0, 0.8) 50%,
            rgba(0, 0, 0, 0.9) 100%
        );
    }

    .hero-content {
        position: relative;
        z-index: 10;
        text-align: center;
        max-width: 800px;
        padding: 0 2rem;
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 800;
        color: white;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-description {
        font-size: 1.25rem;
        color: #e5e5e5;
        margin-bottom: 2rem;
        line-height: 1.6;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    /* Style lainnya tetap sama */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        padding: 1.5rem;
    }
    
    .gallery-item {
        position: relative;
        aspect-ratio: 1;
        overflow: hidden;
        border-radius: 1rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    
    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .gallery-item:hover img {
        transform: scale(1.05);
    }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 50%, rgba(0,0,0,0) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 1.5rem;
    }

    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        .gallery-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
    <!-- Hero Section with Dynamic Background -->
    <section class="hero-section">
        <div class="hero-background">
            <div class="grid-overlay">
                @foreach($fotos->take(6) as $foto)
                <div class="overflow-hidden">
                    <img src="{{ asset('storage/' . $foto->file) }}" 
                         alt="{{ $foto->judul }}"
                         loading="lazy">
                </div>
                @endforeach
            </div>
            <div class="hero-overlay"></div>
        </div>
        
        <div class="hero-content">
            <h1 class="hero-title" data-aos="fade-up">
                Galeri SMKN 4 Bogor
            </h1>
            <p class="hero-description" data-aos="fade-up" data-aos-delay="100">
                Momen-momen berharga dalam perjalanan pendidikan kami. Setiap gambar menceritakan kisah keberhasilan dan prestasi.
            </p>
            <a href="#gallery" 
               class="inline-block px-8 py-3 bg-white text-black rounded-lg hover:bg-gray-100 transition-colors"
               data-aos="fade-up" 
               data-aos-delay="200">
                Lihat Galeri
            </a>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section id="gallery" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="gallery-grid">
                @foreach($fotos as $foto)
                    <div class="gallery-item" data-aos="fade-up" data-aos-delay="50">
                        <img src="{{ asset('storage/' . $foto->file) }}" 
                             alt="{{ $foto->judul }}" 
                             loading="lazy">
                        <div class="gallery-overlay">
                            <h3 class="text-lg font-bold text-white mb-2">{{ $foto->judul }}</h3>
                            <p class="text-sm text-gray-300">{{ $foto->galeri->nama ?? 'Galeri' }}</p>
                            <button onclick="openLightbox('{{ asset('storage/'. $foto->file) }}', '{{ $foto->judul }}')"
                                    class="mt-4 px-4 py-2 bg-white/20 backdrop-blur-sm rounded-lg hover:bg-white/30 transition-colors text-white text-sm">
                                <i class="fas fa-expand-alt mr-2"></i>Lihat Detail
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load More -->
            <div class="text-center mt-16">
                <button class="px-8 py-3 bg-black text-white rounded-lg hover:bg-gray-900 transition-colors inline-flex items-center gap-2">
                    <span>Muat Lebih Banyak</span>
                    <i class="fas fa-arrow-down animate-bounce"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Lightbox -->
    <div id="lightbox" class="fixed inset-0 z-50 bg-black/95 hidden">
        <button class="absolute top-6 right-6 text-white hover:text-gray-300 transition-colors" onclick="closeLightbox()">
            <i class="fas fa-times text-2xl"></i>
        </button>
        <div class="flex items-center justify-center h-full p-8">
            <img id="lightbox-image" src="" alt="" class="max-w-full max-h-full object-contain">
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function openLightbox(imageSrc, imageAlt) {
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');
        
        lightboxImage.src = imageSrc;
        lightboxImage.alt = imageAlt;
        lightbox.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        lightbox.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeLightbox();
    });
</script>
@endpush 