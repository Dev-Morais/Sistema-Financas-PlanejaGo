<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50">
    <div class="w-full max-w-lg p-6 bg-white shadow-xl sm:p-8 rounded-xl">
          
        <div class="space-y-5">
            
            <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold tracking-tight text-[#615ACD] md:text-3xl">Detalhes da Receita</h2>
                <p class="mt-1 text-sm text-gray-500">Abaixo estão as informações da receita selecionada.</p>
            </div>

            <div>
                <label for="modal-ver-descricao-receita" class="block mb-1.5 text-sm font-medium text-gray-700">Descrição</label>
                <input type="text" id="modal-ver-descricao-receita" class="block w-full px-3 py-2.5 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm cursor-not-allowed" disabled />
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <label for="modal-ver-valor-receita" class="block mb-1.5 text-sm font-medium text-gray-700">Valor</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">R$</span>
                        </div>
                        <input type="number" step="0.01" id="modal-ver-valor-receita" class="block w-full py-2.5 pl-9 pr-3 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm cursor-not-allowed" disabled />
                    </div>
                </div>
                
                <div>
                    <label for="modal-ver-dataCriacao-receita" class="block mb-1.5 text-sm font-medium text-gray-700">Data da Criação</label>
                    <input type="date" id="modal-ver-dataCriacao-receita" class="block w-full px-3 py-2.5 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm cursor-not-allowed" disabled />
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <label for="modal-ver-categoria-receita" class="block mb-1.5 text-sm font-medium text-gray-700">Categoria</label>
                    <select id="modal-ver-categoria-receita" class="block w-full px-3 py-2.5 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm cursor-not-allowed" disabled>
                        <option value="4">Salário</option>
                        <option value="5">Investimentos</option>
                        <option value="6">Empréstimos</option>
                    </select>
                </div>

                <div>
                    <label for="modal-ver-frequencia-receita" class="block mb-1.5 text-sm font-medium text-gray-700">Frequência</label>
                    <select id="modal-ver-frequencia-receita" class="block w-full px-3 py-2.5 text-sm text-gray-700 bg-gray-100 border border-gray-300 rounded-lg shadow-sm cursor-not-allowed" disabled>
                        <option value="1">Não se repete</option>
                        <option value="2">Diariamente</option>
                        <option value="3">Semanalmente</option>
                        <option value="4">Mensalmente</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-center pt-5 mt-6 border-t border-gray-200">
                <button type="button" id="btn-fechar-modal-ver-receita" class="px-5 py-2.5 text-sm font-medium text-white transition-colors bg-[#615ACD] rounded-lg hover:bg-[#4E48A4] focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-md">
                    Fechar
                </button>
            </div>
        </div>
    </div>
</div>