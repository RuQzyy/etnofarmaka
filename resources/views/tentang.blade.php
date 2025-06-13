<html lang="id">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Tentang Kami - Nature Thing Green
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
   body {
     font-family: 'Montserrat', sans-serif;
   }
   .bg-overlay {
     background-color: rgba(0, 0, 0, 0.5);
   }
  </style>
 </head>
 <body class="m-0 p-0 min-h-screen flex flex-col relative">
  <img alt="Close-up photo of fresh green herbal plants with natural sunlight" class="absolute inset-0 w-full h-full object-cover brightness-75" height="1080" src="https://storage.googleapis.com/a1aa/image/cbf95115-18aa-43ed-c95c-936a178c0a0e.jpg" width="1920"/>
  <div class="absolute inset-0 bg-overlay z-0"></div>
 <header class="relative z-10 flex justify-between items-center px-6 py-4">
      <div class="text-white font-bold text-lg tracking-wide">YOUR LOGO</div>
      <nav class="hidden md:flex space-x-6 text-white text-sm font-normal">
        <a class="hover:underline" href="{{ url('/landing') }}">Home</a>
        <a class="hover:underline" href="{{ url('/tentang') }}">About Us</a>
      </nav>
      <a href="/login" class="hidden md:block bg-white text-gray-800 text-xs font-normal px-4 py-1 rounded-sm hover:bg-gray-100 transition">
        Get Started
      </a>
    </header>
  <main class="relative z-10 flex-grow max-w-4xl mx-auto px-6 py-20 text-white">
   <h1 class="text-4xl font-extrabold mb-8">
    Tentang Kami
   </h1>
   <section class="bg-black bg-opacity-50 rounded-lg shadow-md p-8 mb-12">
    <h2 class="text-2xl font-semibold mb-4">
     Profil Proyek
    </h2>
    <p class="leading-relaxed text-base">
     Website ini, <span class="font-semibold">Nature Thing Green</span>, adalah proyek kelompok yang dibuat oleh <span class="font-semibold">Kelompok 3</span> untuk mata kuliah <span class="italic font-semibold">Pemrograman Framework</span>. Tujuan kami adalah membangun aplikasi web yang profesional dan responsif yang menonjolkan keindahan dan pentingnya alam serta tanaman herbal.
    </p>
   </section>
   <section class="bg-black bg-opacity-50 rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-semibold mb-4">
     Tentang Pembuat
    </h2>
    <p class="leading-relaxed text-base mb-4">
     Proyek ini dikembangkan secara kolaboratif oleh anggota Kelompok 3. Kami memiliki semangat dalam pengembangan web dan berkomitmen untuk menghasilkan karya berkualitas menggunakan framework dan teknologi modern.
    </p>
    <ul class="list-disc list-inside space-y-2">
     <li>
      <span class="font-semibold">Anggota 1:</span> Bertanggung jawab atas desain frontend dan UI/UX.
     </li>
     <li>
      <span class="font-semibold">Anggota 2:</span> Pengembangan backend dan manajemen basis data.
     </li>
     <li>
      <span class="font-semibold">Anggota 3:</span> Koordinasi proyek dan pengujian.
     </li>
     <li>
      <span class="font-semibold">Anggota 4:</span> Pembuatan konten dan dokumentasi.
     </li>
    </ul>
   </section>
  </main>
 </body>
</html>
