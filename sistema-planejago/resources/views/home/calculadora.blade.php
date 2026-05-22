@extends('shared.layout')

@section('content')
<div id="toast-alerta" class="hidden fixed top-5 right-5 z-50 transform transition-all duration-300 translate-y-[-20px] opacity-0">
    <div class="bg-emerald-600 text-white px-6 py-3.5 rounded-xl shadow-lg flex items-center space-x-3 font-semibold text-sm border border-emerald-500/30">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span id="toast-mensagem">Mensagem aqui</span>
    </div>
</div>

<div class="container mx-auto p-4 md:p-6 min-h-screen bg-gray-50 text-gray-800">
    
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold text-[#2C2966] mb-6">Calculadora</h1>

        <div class="w-full">
            <input type="radio" id="tab-juros" name="abas_calculadora" class="hidden peer/juros" checked>
            <input type="radio" id="tab-comum" name="abas_calculadora" class="hidden peer/comum">

            <div class="bg-gray-200/80 p-1 rounded-xl inline-flex items-center space-x-1 mb-8">
                <label for="tab-comum" class="px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-200 flex items-center space-x-2 cursor-pointer text-gray-600 hover:text-gray-900 peer-checked/comum:bg-white peer-checked/comum:text-[#2C2966] peer-checked/comum:shadow-sm">
                    <span>Comum</span>
                </label>
                <label for="tab-juros" class="px-5 py-2 rounded-lg font-semibold text-sm transition-all duration-200 flex items-center space-x-2 cursor-pointer text-gray-600 hover:text-gray-900 peer-checked/juros:bg-white peer-checked/juros:text-[#2C2966] peer-checked/juros:shadow-sm">
                    <span>Juros</span>
                </label>
            </div>

            <div class="hidden peer-checked/juros:grid grid-cols-1 lg:grid-cols-12 gap-8">
                <div class="lg:col-span-5 bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between">
                    <h2 class="text-lg font-bold text-[#2C2966] mb-6">Calculadora de Juros</h2>
                    
                    <form onsubmit="event.preventDefault();" class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-[#2C2966] uppercase mb-1.5">Valor inicial (R$)</label>
                            <input type="number" id="valor_inicial" step="0.01" placeholder="Ex: 1000" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-[#4E44CE] bg-gray-50/50">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#2C2966] uppercase mb-1.5">Tipo de Juros</label>
                            <select id="tipo_juros" class="w-full border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-[#4E44CE] bg-white">
                                <option value="simples">Simples</option>
                                <option value="composto">Composto</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#2C2966] uppercase mb-1.5">Taxa de Juros (%)</label>
                            <div class="grid grid-cols-12 gap-2">
                                <input type="number" id="taxa_juros" step="0.01" placeholder="Ex: 2" class="col-span-7 border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-[#4E44CE] bg-gray-50/50">
                                <select id="tempo_taxa" class="col-span-5 border border-gray-300 rounded-lg px-2 py-2.5 text-sm focus:outline-none focus:border-[#4E44CE] bg-white">
                                    <option value="mes">Ao mês</option>
                                    <option value="ano">Ao ano</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#2C2966] uppercase mb-1.5">Período de Vigência</label>
                            <div class="grid grid-cols-12 gap-2">
                                <input type="number" id="periodo" placeholder="Ex: 12" class="col-span-7 border border-gray-300 rounded-lg px-3 py-2.5 text-sm focus:outline-none focus:border-[#4E44CE] bg-gray-50/50">
                                <select id="tempo_periodo" class="col-span-5 border border-gray-300 rounded-lg px-2 py-2.5 text-sm focus:outline-none focus:border-[#4E44CE] bg-white">
                                    <option value="meses">Meses</option>
                                    <option value="anos">Anos</option>
                                </select>
                            </div>
                        </div>

                        <button type="button" onclick="calcularJuros()" class="w-full bg-[#4E44CE] hover:bg-[#3b33a3] text-white font-semibold py-3 rounded-lg transition duration-200 mt-6 shadow-sm cursor-pointer">
                            Calcular
                        </button>
                    </form>
                </div>

                <div class="lg:col-span-7 bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col items-center justify-center min-h-[400px]">
                    <div class="text-center max-w-sm w-full">
                        <h3 class="text-sm font-bold text-gray-400 uppercase mb-2">Resultado</h3>
                        <div class="flex items-center justify-center space-x-2 mb-1">
                            <p class="text-2xl font-black text-[#4E44CE]" id="res_valor_final">Valor Final: R$ 0,00</p>
                            <button type="button" onclick="abrirModal('modalDespesa')" class="text-[#4E44CE] hover:text-[#3b33a3] cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex justify-center space-x-4 text-xs font-semibold text-gray-500 mb-6">
                            <span>Total de Juros: <strong class="text-gray-700" id="res_total_juros">R$ 0,00</strong></span>
                            <span>Rendimento: <strong class="text-gray-700" id="res_rendimento">0%</strong></span>
                        </div>
                        
                        <div class="h-48 w-full border-b border-l border-gray-200 relative mt-4 flex items-end">
                            <svg class="w-full h-full absolute inset-0 text-[#4E44CE]" viewBox="0 0 100 100" preserveAspectRatio="none">
                                <path d="M 0 90 L 25 70 L 50 50 L 75 35 L 100 10" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                                <circle cx="100" cy="10" r="4" fill="currentColor" />
                            </svg>
                            <div class="absolute bottom-1 left-2 text-[10px] text-gray-400">Início</div>
                            <div class="absolute bottom-1 right-2 text-[10px] text-gray-400">Fim</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden peer-checked/comum:block max-w-md mx-auto bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 mb-4 text-right min-h-[84px] flex flex-col justify-center">
                    <div id="comum_expressao" class="text-xs text-gray-400 font-medium tracking-wide h-4"></div>
                    <div class="text-3xl font-bold text-[#2C2966] flex items-center justify-end space-x-2">
                        <span id="comum_resultado">0</span>
                        <button type="button" onclick="abrirModal('modalReceita')" class="text-[#FFA051] hover:text-[#e08436] transition-colors cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-5 gap-2.5 text-sm font-bold">
                    <button type="button" onclick="addComum('**')" class="p-3 bg-indigo-50/50 text-[#4E44CE] rounded-xl">^</button>
                    <button type="button" onclick="addComum('(')" class="p-3 bg-indigo-50/50 text-[#4E44CE] rounded-xl">(</button>
                    <button type="button" onclick="addComum(')')" class="p-3 bg-indigo-50/50 text-[#4E44CE] rounded-xl">)</button>
                    <button type="button" onclick="addComum('/100')" class="p-3 bg-indigo-50/50 text-[#4E44CE] rounded-xl">%</button>
                    <button type="button" onclick="limparComum()" class="p-3 bg-red-50 text-red-500 rounded-xl">AC</button>
                    
                    <button type="button" class="p-3 bg-indigo-50/50 text-gray-300 rounded-xl cursor-not-allowed">log</button>
                    <button type="button" onclick="addComum('4')" class="p-3 bg-gray-50 text-gray-700 rounded-xl">4</button>
                    <button type="button" onclick="addComum('5')" class="p-3 bg-gray-50 text-gray-700 rounded-xl">5</button>
                    <button type="button" onclick="addComum('6')" class="p-3 bg-gray-50 text-gray-700 rounded-xl">6</button>
                    <button type="button" onclick="addComum('*')" class="p-3 bg-indigo-50 text-[#4E44CE] rounded-xl">×</button>
                    
                    <button type="button" class="p-3 bg-indigo-50/50 text-gray-300 rounded-xl cursor-not-allowed">√</button>
                    <button type="button" onclick="addComum('1')" class="p-3 bg-gray-50 text-gray-700 rounded-xl">1</button>
                    <button type="button" onclick="addComum('2')" class="p-3 bg-gray-50 text-gray-700 rounded-xl">2</button>
                    <button type="button" onclick="addComum('3')" class="p-3 bg-gray-50 text-gray-700 rounded-xl">3</button>
                    <button type="button" onclick="addComum('/')" class="p-3 bg-indigo-50 text-[#4E44CE] rounded-xl">÷</button>
                    
                    <button type="button" class="p-3 bg-indigo-50/50 text-gray-300 rounded-xl cursor-not-allowed">x^y</button>
                    <button type="button" onclick="addComum('0')" class="p-3 bg-gray-50 text-gray-700 rounded-xl">0</button>
                    <button type="button" onclick="addComum('.')" class="p-3 bg-gray-50 text-gray-700 rounded-xl">.</button>
                    <button type="button" onclick="calcularComum()" class="p-3 bg-[#4E44CE] text-white rounded-xl">=</button>
                    <button type="button" onclick="addComum('+')" class="p-3 bg-indigo-50 text-[#4E44CE] rounded-xl">+</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modalDespesa" class="hidden fixed inset-0 z-50 bg-black/40 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl p-6 max-w-sm w-full relative border border-gray-100">
            <button type="button" onclick="fecharModal('modalDespesa')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 font-bold text-xl cursor-pointer">&times;</button>
            <h3 class="text-center text-[#4E44CE] font-bold text-lg mb-5">Nova Despesa</h3>
            <form onsubmit="event.preventDefault();" class="space-y-4 text-xs font-semibold text-gray-500">
                <div><label class="block mb-1">Descrição</label><input type="text" placeholder="Ex: Investimento Inicial" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 font-normal focus:outline-none"></div>
                <div class="grid grid-cols-2 gap-3">
                    <div><label class="block mb-1">Valor</label><input type="text" id="modal_despesa_valor" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 font-normal bg-gray-50"></div>
                    <div><label class="block mb-1">Status</label><select class="w-full border border-gray-300 rounded-lg px-2 py-2 text-gray-700 font-normal bg-white"><option>Pago</option><option>Pendente</option></select></div>
                </div>
                <button type="button" onclick="mostrarToastPersonalizado('modalDespesa', 'Despesa adicionada com sucesso!')" class="w-full bg-[#008744] hover:bg-[#007038] text-white font-bold py-2.5 rounded-lg mt-2 transition text-sm cursor-pointer">Salvar</button>
            </form>
        </div>
    </div>

    <div id="modalReceita" class="hidden fixed inset-0 z-50 bg-black/40 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl p-6 max-w-sm w-full relative border border-gray-100">
            <button type="button" onclick="fecharModal('modalReceita')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 font-bold text-xl cursor-pointer">&times;</button>
            <h3 class="text-center text-[#4E44CE] font-bold text-lg mb-5">Nova Receita</h3>
            <form onsubmit="event.preventDefault();" class="space-y-4 text-xs font-semibold text-gray-500">
                <div><label class="block mb-1">Descrição</label><input type="text" placeholder="Ex: Rendimento Poupança" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 font-normal"></div>
                <div class="grid grid-cols-2 gap-3">
                    <div><label class="block mb-1">Valor</label><input type="text" id="modal_receita_valor" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700 font-normal bg-gray-50"></div>
                    <div><label class="block mb-1">Data</label><input type="date" class="w-full border border-gray-300 rounded-lg px-2 py-1.5 text-gray-700 font-normal"></div>
                </div>
                <button type="button" onclick="mostrarToastPersonalizado('modalReceita', 'Receita adicionada com sucesso!')" class="w-full bg-[#008744] hover:bg-[#007038] text-white font-bold py-2.5 rounded-lg mt-2 transition text-sm cursor-pointer">Salvar</button>
            </form>
        </div>
    </div>
</div>

<script>
    function abrirModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
    function fecharModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    // Função que cria a animação linda do aviso sem bugar o código
    function mostrarToastPersonalizado(modalId, mensagem) {
        fecharModal(modalId);
        
        const toast = document.getElementById('toast-alerta');
        const toastMsg = document.getElementById('toast-mensagem');
        
        // Define o texto customizado
        toastMsg.innerText = mensagem;
        
        // Torna visível estruturalmente
        toast.classList.remove('hidden');
        
        // Pequeno delay para o Tailwind processar a transição suave de entrada
        setTimeout(() => {
            toast.classList.remove('translate-y-[-20px]', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
        }, 10);

        // Depois de 3 segundos, ele some sozinho lindamente
        setTimeout(() => {
            toast.classList.remove('translate-y-0', 'opacity-100');
            toast.classList.add('translate-y-[-20px]', 'opacity-0');
            
            // Esconde o elemento depois que a animação terminar
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 300);
        }, 3000);
    }

    // LÓGICA DA CALCULADORA DE JUROS
    function calcularJuros() {
        const C = parseFloat(document.getElementById('valor_inicial').value) || 0;
        let i = parseFloat(document.getElementById('taxa_juros').value) || 0;
        let t = parseFloat(document.getElementById('periodo').value) || 0;
        
        const tipoJuros = document.getElementById('tipo_juros').value;
        const tempoTaxa = document.getElementById('tempo_taxa').value;
        const tempoPeriodo = document.getElementById('tempo_periodo').value;

        if (C <= 0 || i <= 0 || t <= 0) {
            alert('Por favor, preencha todos os campos com valores maiores que zero.');
            return;
        }

        if (tempoTaxa === 'mes' && tempoPeriodo === 'anos') t = t * 12;
        else if (tempoTaxa === 'ano' && tempoPeriodo === 'meses') t = t / 12;

        let valorFinal = 0;
        let totalJuros = 0;
        const taxaPercentual = i / 100;

        if (tipoJuros === 'simples') {
            totalJuros = C * taxaPercentual * t;
            valorFinal = C + totalJuros;
        } else {
            valorFinal = C * Math.pow((1 + taxaPercentual), t);
            totalJuros = valorFinal - C;
        }

        const formatarMoeda = (valor) => valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

        document.getElementById('res_valor_final').innerText = `Valor Final: ${formatarMoeda(valorFinal)}`;
        document.getElementById('res_total_juros').innerText = formatarMoeda(totalJuros);
        document.getElementById('res_rendimento').innerText = `${((totalJuros / C) * 100).toFixed(1)}%`;
        document.getElementById('modal_despesa_valor').value = formatarMoeda(valorFinal);
    }

    // LÓGICA DA CALCULADORA COMUM
    let expressaoComum = '';

    function addComum(caractere) {
        expressaoComum += caractere;
        document.getElementById('comum_expressao').innerText = expressaoComum.replace(/\*\*/g, '^');
    }

    function limparComum() {
        expressaoComum = '';
        document.getElementById('comum_expressao').innerText = '';
        document.getElementById('comum_resultado').innerText = '0';
    }

    function calcularComum() {
        try {
            if (!expressaoComum) return;
            const resultado = eval(expressaoComum);
            document.getElementById('comum_resultado').innerText = resultado;
            document.getElementById('modal_receita_valor').value = resultado.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        } catch (error) {
            document.getElementById('comum_resultado').innerText = 'Erro';
            expressaoComum = '';
        }
    }
</script>
@endsection