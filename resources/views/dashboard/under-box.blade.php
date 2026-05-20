@php $completePercent = $total > 0 ? round(($complete / $total) * 100) : 0; @endphp
<div class="bg-background rounded-2xl p-6 shadow-sm mb-6 mt-6 font-bold font-display">
    <div class="flex items-center justify-between mb-3">
        <h3 class="text-base font-semibold text-gray-700">Overall Progress</h3>
    </div>
    <div class="w-full bg-white rounded-full h-3">
        <div class="h-3 rounded-full transition-all duration-500"
            style="width: {{ $completePercent }}%; background-color: #22c55e;"></div>
    </div>
    <div class="flex justify-between mt-2 text-sm" style="color: #22c55e;">
        <div>
            <p>{{ $completePercent }}% Completed</p>
        </div>
        <div>
            <a href="#" style="border: 1px solid #22c55e; color: #22c55e;"
               class="rounded-full px-3 py-0.5 text-xs transition-colors duration-200">View All</a>
        </div>
    </div>
</div>

@php $pendingPercent = $total > 0 ? round(($pending / $total) * 100) : 0; @endphp
<div class="bg-background rounded-2xl p-6 shadow-sm mb-6 font-bold font-display">
    <div class="flex items-center justify-between mb-3">
        <h3 class="text-base font-semibold text-gray-700">Overall Progress</h3>
    </div>
    <div class="w-full bg-white rounded-full h-3">
        <div class="h-3 rounded-full transition-all duration-500"
            style="width: {{ $pendingPercent }}%; background-color: #f97316;"></div>
    </div>
    <div class="flex justify-between mt-2 text-sm" style="color: #f97316;">
        <div>
            <p>{{ $pendingPercent }}% Pending</p>
        </div>
        <div>
            <a href="#" style="border: 1px solid #f97316; color: #f97316;"
               class="rounded-full px-3 py-0.5 text-xs transition-colors duration-200">View All</a>
        </div>
    </div>
</div>

@php $highPercent = $total > 0 ? round(($high / $total) * 100) : 0; @endphp
<div class="bg-background rounded-2xl p-6 shadow-sm mb-6 font-bold font-display">
    <div class="flex items-center justify-between mb-3">
        <h3 class="text-base font-semibold text-gray-700">Overall Progress</h3>
    </div>
    <div class="w-full bg-white rounded-full h-3">
        <div class="h-3 rounded-full transition-all duration-500"
            style="width: {{ $highPercent }}%; background-color: #FF0000;"></div>
    </div>
    <div class="flex justify-between mt-2 text-sm" style="color: #FF0000;">
        <div>
            <p>{{ $highPercent }}% High-priority</p>
        </div>
        <div>
            <a href="#" style="border: 1px solid #FF0000    ; color: #FF0000;"
               class="rounded-full px-3 py-0.5 text-xs transition-colors duration-200">View All</a>
        </div>
    </div>
</div>
