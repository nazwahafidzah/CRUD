 <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Post Baru</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .form-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-2xl">
        <!-- Header -->
        <div class="flex items-center mb-8">
            <a href="?controller=post&action=index" class="mr-4 text-gray-600 hover:text-gray-900 transition duration-200">
                <i class="fas fa-arrow-left text-xl"></i>
            </a>
            <h2 class="text-2xl font-bold text-gray-800">
                <i class="fas fa-plus-circle mr-2 text-blue-600"></i>Buat Post Baru
            </h2>
        </div>

        <!-- Form -->
        <form action="?controller=post&action=store" method="POST" class="bg-white rounded-xl shadow-md p-6">
            <!-- Judul Input -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-heading mr-2 text-blue-500"></i>Judul Post
                </label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    placeholder="Masukkan judul post Anda" 
                    required
                    class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none transition duration-200"
                >
            </div>

            <!-- Konten Textarea -->
            <div class="mb-8">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-align-left mr-2 text-blue-500"></i>Isi Konten
                </label>
                <textarea 
                    id="content" 
                    name="content" 
                    rows="8" 
                    placeholder="Tulis konten post Anda di sini..." 
                    required
                    class="form-input w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none transition duration-200"
                ></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between items-center">
                <a href="?controller=post&action=index" class="text-gray-600 hover:text-gray-900 font-medium transition duration-200">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
                <button 
                    type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-200 flex items-center shadow-md hover:shadow-lg"
                >
                    <i class="fas fa-save mr-2"></i>Simpan Post
                </button>
            </div>
        </form>

        <!-- Character Counter (Bonus) -->
        <div class="mt-4 text-right text-sm text-gray-500">
            <span id="char-counter">0</span> karakter
        </div>
    </div>

    <!-- Script untuk fitur tambahan -->
    <script>
        // Karakter counter
        const contentTextarea = document.getElementById('content');
        const charCounter = document.getElementById('char-counter');
        
        contentTextarea.addEventListener('input', function() {
            charCounter.textContent = this.value.length;
            
            // Ganti warna jika lebih dari 1000 karakter
            if(this.value.length > 1000) {
                charCounter.classList.add('text-red-500');
                charCounter.classList.remove('text-gray-500');
            } else {
                charCounter.classList.remove('text-red-500');
                charCounter.classList.add('text-gray-500');
            }
        });

        // Konfirmasi sebelum meninggalkan halaman jika form terisi
        window.addEventListener('beforeunload', function(e) {
            if(contentTextarea.value || document.getElementById('title').value) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
    </script>
</body>
</html>