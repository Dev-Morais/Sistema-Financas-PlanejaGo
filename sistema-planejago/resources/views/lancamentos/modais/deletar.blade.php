<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50">
    <div class="w-full max-w-lg p-6 bg-white shadow-xl sm:p-8 rounded-xl">
        
        <form id="form-deletar-lancamento" action="" method="POST" class="space-y-5">
            @csrf
            @method('DELETE')
            
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    Excluir Lançamento
                </h3>
                <div class="mt-2">
                    <p class="text-sm text-gray-500">
                        Tem certeza que deseja excluir o lançamento <strong id="texto-descricao-deletar" class="text-gray-700"></strong>? Esta ação não pode ser desfeita.
                    </p>
                </div>
            </div>

            <div class="flex items-center justify-center gap-3 pt-5 mt-6 border-t border-gray-200">
                <button type="button" id="btn-fechar-modal-deletar" class="px-5 py-2.5 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-gray-200 w-full">
                    Cancelar
                </button>
                <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white transition-colors bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 shadow-md w-full">
                    Sim, excluir
                </button>
            </div>
        </form>
    </div>
</div>