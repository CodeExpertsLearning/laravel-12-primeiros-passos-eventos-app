@if (session()->has('success'))
    <div class="
            p-2 border border-green-900
          bg-green-400 text-green-900 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="
            p-2 border border-red-900
          bg-red-400 text-red-900 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('warning'))
    <div class="
            p-2 border border-yellow-900
          bg-yellow-400 text-yellow-900 rounded mb-6">
        {{ session('success') }}
    </div>
@endif
