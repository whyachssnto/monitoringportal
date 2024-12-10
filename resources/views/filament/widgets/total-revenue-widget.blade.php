<x-filament::widget>
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold text-gray-700">Total Revenue</h2>
        <p class="text-2xl font-bold text-gray-900">
            ${{ number_format($this->getTotalRevenue(), 2) }}
        </p>
    </div>
</x-filament::widget>
