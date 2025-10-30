<div class="space-y-4">
    @if($message)
        <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-4 py-3 rounded-lg">
            <p class="font-medium">{{ $message }}</p>
        </div>
    @endif
    
    <div class="relative">
        <div class="absolute top-2 right-2">
            <button
                type="button"
                onclick="copyToClipboard()"
                class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                </svg>
                Копировать
            </button>
        </div>
        
        <pre id="json-content" class="bg-gray-900 text-gray-100 p-6 rounded-lg overflow-x-auto text-sm font-mono leading-relaxed max-h-[600px]">{{ $json }}</pre>
    </div>
    
    <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded-lg text-sm">
        <p class="font-medium mb-1">💡 Подсказка:</p>
        <p>Это предпросмотр того, как меню выглядит через API endpoint: <code class="bg-blue-100 px-2 py-0.5 rounded">/api/menus/{slug}</code></p>
    </div>
</div>

<script>
function copyToClipboard() {
    const jsonContent = document.getElementById('json-content').textContent;
    navigator.clipboard.writeText(jsonContent).then(function() {
        // Показываем уведомление об успешном копировании
        const button = event.target.closest('button');
        const originalText = button.innerHTML;
        button.innerHTML = '<svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Скопировано!';
        button.classList.add('bg-green-50', 'border-green-300', 'text-green-700');
        
        setTimeout(function() {
            button.innerHTML = originalText;
            button.classList.remove('bg-green-50', 'border-green-300', 'text-green-700');
        }, 2000);
    }, function(err) {
        console.error('Ошибка копирования: ', err);
    });
}
</script>