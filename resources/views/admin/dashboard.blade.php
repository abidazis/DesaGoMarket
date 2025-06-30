<x-admin-layout>
    <h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>

    <div class="mt-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <x-stats-card 
                title="Total Category" 
                value="{{ $totalKategori }}" 
                linkText="Jumlah kategori produk" 
                linkHref="#"
                colorClass="text-indigo-600"
            />
            <x-stats-card 
                title="Total Product" 
                value="{{ $totalProduk }}" 
                linkText="Jumlah semua produk" 
                linkHref="#"
                colorClass="text-green-600"
            />
            <x-stats-card 
                title="Total Slider" 
                value="{{ $totalSlider }}" 
                linkText="Jumlah slider aktif" 
                linkHref="#"
                colorClass="text-orange-600"
            />
            <x-stats-card 
                title="Total Pesanan" 
                value="{{ $totalPesanan }}" 
                linkText="Jumlah seluruh pesanan" 
                linkHref="#"
                colorClass="text-blue-600"
            />
        </div>
    </div>
    
    <div class="mt-8">
        <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-gray-600 text-lg font-medium">Total Pesanan Bulanan</h4>
            <div id="monthly-orders-chart"></div>
        </div>
    </div>
{{-- Skrip Khusus untuk Halaman Ini --}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var options = {
            chart: {
                type: 'area', // Bisa juga 'bar', 'line'
                height: 350,
                toolbar: {
                    show: false
                }
            },
            series: [{
                name: 'Jumlah Pesanan',
                data: @json($chartData) // <-- Mengambil data dari controller
            }],
            xaxis: {
                categories: @json($chartLabels) // <-- Mengambil label dari controller
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#monthly-orders-chart"), options);
        chart.render();
    });
</script>
@endpush
</x-admin-layout>