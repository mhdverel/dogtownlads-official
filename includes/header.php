<?php
if (!isset($path_prefix)) {
    $path_prefix = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($page_title) ? $page_title . ' - Dogtownlads' : 'Dogtownlads - Terror of Terrace'; ?></title>
  <link rel="icon" type="image/png" href="<?php echo isset($path_prefix) ? $path_prefix : ''; ?>assets/favicon.png">
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  
  <!-- AOS Animation CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Anton&family=Permanent+Marker&family=Teko:wght@300;400;600&family=Oswald:wght@300;400;500;700&display=swap');
    
    body {
      background-color: #050505;
      font-family: 'Oswald', sans-serif; /* Cool & Readable Streetwear Font */
      color: white;
      font-size: 1.1rem; /* Slightly larger for Oswald */
      letter-spacing: 0.05em; /* Cleaner look */
    }
    
    h1, h2, h3, .brand-font {
      font-family: 'Anton', sans-serif;
    }
    
    .font-teko {
      font-family: 'Teko', sans-serif;
    }
    
    .grunge-font {
      font-family: 'Permanent Marker', cursive;
    }

    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #111; }
    ::-webkit-scrollbar-thumb { background: #333; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: #555; }
    
    @font-face {
        font-family: 'Aerosoldier';
        src: url('<?php echo isset($path_prefix) ? $path_prefix : ''; ?>assets/Aerosoldier_PERSONAL_USE_ONLY.otf') format('opentype');
        font-weight: normal;
        font-style: normal;
    }

    .font-aero {
        font-family: 'Aerosoldier', sans-serif;
    }
    
    .hover\:text-shadow-red:hover {
        text-shadow: 0 0 10px rgba(220, 38, 38, 0.8);
    }

    /* Custom Animation: Branding Pulse (Glow Only) */
    @keyframes breathing {
        0%, 100% { filter: drop-shadow(0 0 15px rgba(220, 38, 38, 0.6)); }
        50% { filter: drop-shadow(0 0 25px rgba(220, 38, 38, 1)); }
    }
    
    .animate-breathing {
        animation: breathing 4s ease-in-out infinite;
    }
  </style>
</head>
<body class="overflow-x-hidden flex flex-col min-h-screen">

  <!-- NAVBAR -->
  <nav class="fixed w-full z-50 bg-black/90 backdrop-blur-md border-b border-gray-800 transition-all duration-300" id="navbar">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <a href="<?php echo $path_prefix; ?>index.php" class="text-2xl brand-font tracking-widest text-white hover:text-gray-300 transition flex items-center gap-2">
        <img src="<?php echo $path_prefix; ?>assets/logo_text_v2.png" alt="DOGTOWNLADS" class="h-10 md:h-16 object-contain"> 
      </a>
      
      <!-- Desktop Menu -->
      <div class="hidden md:flex items-center gap-6">
          <ul class="flex items-center gap-6 text-2xl font-normal uppercase tracking-widest text-gray-300 font-teko">
            <li><a href="<?php echo $path_prefix; ?>index.php" class="hover:text-white hover:text-shadow-red transition duration-300">Home</a></li>
            <li class="text-zinc-700">/</li>
            <li><a href="<?php echo $path_prefix; ?>index.php#about" class="hover:text-white hover:text-shadow-red transition duration-300">About</a></li>
            <li class="text-zinc-700">/</li>
            <li><a href="<?php echo $path_prefix; ?>catalog.php" class="hover:text-white hover:text-shadow-red transition duration-300">Catalog</a></li>
            <li class="text-zinc-700">/</li>
            <li><a href="<?php echo $path_prefix; ?>size-guide.php" class="hover:text-white hover:text-shadow-red transition duration-300">Size Guide</a></li>
          </ul>
          
          <!-- Admin Link -->
          <a href="<?php echo $path_prefix; ?>admin/index.php" class="ml-6 px-4 py-1 border border-zinc-700 rounded-full text-xs text-zinc-500 hover:text-white hover:border-red-600 hover:bg-red-600/20 transition">
              ADMIN
          </a>
      </div>

      <!-- Mobile Button -->
      <button id="mobile-menu-btn" class="md:hidden text-white focus:outline-none z-50">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
      </button>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed top-[81px] left-0 w-full h-screen bg-black border-t border-zinc-900 z-40 hidden flex-col items-start justify-start p-8 transition-opacity duration-300 opacity-0 pointer-events-none">
        
        <div class="flex flex-col w-full space-y-4">
            <a href="<?php echo $path_prefix; ?>index.php" class="text-2xl text-white font-bold hover:text-red-600 transition tracking-wider border-b border-zinc-900 pb-2 w-full uppercase">Home</a>
            <a href="<?php echo $path_prefix; ?>index.php#about" class="text-2xl text-white font-bold hover:text-red-600 transition tracking-wider border-b border-zinc-900 pb-2 w-full uppercase">About</a>
            <a href="<?php echo $path_prefix; ?>catalog.php" class="text-2xl text-white font-bold hover:text-red-600 transition tracking-wider border-b border-zinc-900 pb-2 w-full uppercase">Catalog</a>
            <a href="<?php echo $path_prefix; ?>size-guide.php" class="text-2xl text-white font-bold hover:text-red-600 transition tracking-wider border-b border-zinc-900 pb-2 w-full uppercase">Size Guide</a>
        </div>

        <a href="<?php echo $path_prefix; ?>admin/index.php" class="mt-8 text-sm text-zinc-600 hover:text-red-600 transition font-sans">[ADMIN AREA]</a>
    </div>
  </nav>
  
  <!-- Spacer for fixed nav -->
  <div class="h-20"></div>
