@component('components.datatable')@endcomponent
 
<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="container">
        <table id="tabela" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>País</th>
                    <th>Área de Atuação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                {{-- carregar os valores na tabela --}}
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>País</th>
                    <th>Área de Atuação</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="js/frames.js"></script>
</div>