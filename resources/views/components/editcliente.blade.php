<x-frameworks></x-frameworks>
 
<div class="container mt-5">
    @if(request()->query('success'))
        <div class="alert alert-success">
            {{ request()->query('success') }}
        </div>
    @endif
        @php
            $current_url = $_SERVER['REQUEST_URI'];
            $url_parts = explode('/', $current_url);
            $id = end($url_parts);
        @endphp
    <form method="post" action=" {{ route('api.cliente.update', $id)}}" id="formulario">
        @csrf
        <x-formularioCliente></x-formularioCliente> 
        <button type="submit" class="btn btn-primary" id="btn-submit">Atualizar</button>
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
        // Obtenha a URL atual
        const url = window.location.href;
        // proteção csrf_token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const regex = /\/cadastro\/(\d+)/; // O (\d+) corresponde a um ou mais dígitos
        const match = url.match(regex);
        if (match) {
            var id = match[1]; // O grupo de captura (\d+) é o segundo elemento do array correspondente
        }
        fetch(`/api/cliente/${id}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
        })
        .then(response => response.json())
        .then(data => {
            // Preencher os campos do formulário
            console.log(data.data.nome_fantasia)
            document.getElementById('nome_fantasia').value = data.data.nome_fantasia;
            document.getElementById('cnpj').value = data.data.cnpj;
            document.getElementById('endereco').value = data.data.endereco;
            document.getElementById('email').value = data.data.email;
            document.getElementById('cidade').value = data.data.cidade;
            document.getElementById('estado').value = data.data.estado;
            document.getElementById('pais').value = data.data.pais;
            document.getElementById('telefone').value = data.data.telefone;
            document.getElementById('area_de_atuacao').value = data.data.area_de_atuacao;
            document.getElementById('quadro_societario').value = data.data.quadro_societario;
        })
        .catch(error => {
            console.error('Erro ao obter detalhes da ID:', error);
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('formulario');
        const btnVoltar = document.getElementById('btn-submit');
        form.addEventListener('submit', async function(event) {
            try {
                const urlParts = window.location.pathname.split('/');
                const id = urlParts[urlParts.length - 1];
                const response = await fetch(`/api/cliente/${id}`, {
                    method: 'POST', 
                    body: new FormData(form) 
                });
                const data = await response.json();
                if (data.message === 'record updated successfully') {
                    window.location.href = '/cadastro?success=Cadastro atualizado com sucesso !';
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
