<x-frameworks></x-frameworks>

<div class="container mt-5">
    @if(request()->query('success'))
        <div class="alert alert-success">
            {{ request()->query('success') }}
        </div>
    @endif

    @if(request()->query('error'))
        <div class="alert alert-danger">
            {{ request()->query('error') }}
        </div>
    @endif
    <form method="POST" action="{{ route('api.cliente.store')}}" id="formulario">
        @csrf
        <x-formularioCliente></x-formularioCliente>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <button type="button" id="btn-voltar" class="btn btn-primary">Voltar</button>
    </form>
    <br><br>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnVoltar = document.getElementById('btn-voltar');
        btnVoltar.addEventListener('click', function() {
            history.back();
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('formulario');
    const btnVoltar = document.getElementById('btn-submit');
    form.addEventListener('submit', async function(event) {
        try {
            const response = await fetch('api/cliente', {
                method: 'POST', 
                body: new FormData(form) 
            });
            const data = await response.json();

            console.log(data)
            if (data.message === 'Customer successfully registered') {
                window.location.href = '/cadastro?success=Cadastro%20efetuado%20com%20sucesso';
            }else{
                window.location.href = '/cadastro?error=CNPJ Invalido';
            }
        } catch (error) {
            console.error('Erro ao fazer a requisição:', error);
        }
    });
        btnVoltar.addEventListener('click', function() {
            history.back();
        });
    });
</script>
