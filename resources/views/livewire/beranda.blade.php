<x-app-layout>

    <div class="py-4 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="bg-white overflow-hidden shadow rounded-lg mb-10">
                <div class="px-6 py-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h1 class="text-3xl font-bold text-blue-700 mb-4">Selamat Datang di Toko Kelontong</h1>
                        <p class="text-gray-600 mb-6">Tempat belanja kebutuhan rumah tangga dengan harga bersahabat dan layanan terbaik.</p>
                        <a class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                            Selamat Berbelanja 
                        </a>
                    </div>
                    <div class="text-center">
                        <img src="{{ asset('img/toko.jpg') }}" alt="Toko Kelontong" class="mx-auto w-64 rounded-xl shadow">
                    </div>
                </div>
            </div>

            <!-- Produk Unggulan -->
            <div id="produk" class="bg-white shadow rounded-lg p-6">
                <h3 class="text-2xl font-bold text-blue-700 mb-6 text-center">Produk Unggulan</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center bg-gray-50 p-4 rounded-lg shadow hover:shadow-md transition">
                        <img src="{{ asset('img/beras.jpeg') }}" alt="Beras" class="w-20 h-20 mx-auto mb-3">
                        <h4 class="text-lg font-semibold">Beras Premium</h4>
                        <p class="text-gray-600">Rp 12.000 / kg</p>
                    </div>

                    <div class="text-center bg-gray-50 p-4 rounded-lg shadow hover:shadow-md transition">
                        <img src="{{ asset('img/minyak.jpg') }}" alt="Minyak Goreng" class="w-20 h-20 mx-auto mb-3">
                        <h4 class="text-lg font-semibold">Minyak Goreng</h4>
                        <p class="text-gray-600">Rp 14.500 / liter</p>
                    </div>
                    
                    <div class="text-center bg-gray-50 p-4 rounded-lg shadow hover:shadow-md transition">
                        <img src="{{ asset('img/mi.jpeg') }}" alt="Mi Instan" class="w-20 h-20 mx-auto mb-3">
                        <h4 class="text-lg font-semibold">Mi Instan</h4>
                        <p class="text-gray-600">Rp 2.500 / bungkus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- Footer -->
<!-- Footer -->
<!-- Footer -->
<footer class="bg-blue-700 text-white mt-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center">

        <!-- Alamat Toko (tengah & memanjang) -->
        <div class="mb-4">
            <h5 class="text-lg font-semibold mb-2">Alamat Toko</h5>
            <p class="text-sm">
                Toko Kelontong Sejahtera - Jl. Mawar No. 123, Kelurahan Sukamaju, Kecamatan Suka Makmur, Kota Bahagia, Indonesia 12345
            </p>
        </div>

        <!-- Sosial Media (horizontal & tengah) -->
        <div>
            <h5 class="text-lg font-semibold mb-3">Ikuti Kami</h5>
            <div class="flex justify-center space-x-6 items-center">
                <a href="https://facebook.com" target="_blank" class="flex items-center space-x-2 hover:underline">
                    <img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" alt="Facebook" class="w-5 h-5">
                    <span>Facebook</span>
                </a>
                <a href="https://instagram.com" target="_blank" class="flex items-center space-x-2 hover:underline">
                    <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram" class="w-5 h-5">
                    <span>Instagram</span>
                </a>
                <a href="https://wa.me/6281234567890" target="_blank" class="flex items-center space-x-2 hover:underline">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" class="w-5 h-5">
                    <span>WhatsApp</span>
                </a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="text-sm text-blue-100 mt-6 border-t border-blue-500 pt-4">
            &copy; {{ date('Y') }} Toko Kelontong. All rights reserved.
        </div>
    </div>
</footer>



