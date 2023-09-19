<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nome_fantasia">Nome Fantasia</label>
            <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="cidade">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control" id="estado" name="estado" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="pais">País</label>
            <input type="text" class="form-control" id="pais" name="pais" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="area_de_atuacao">Area de Atuação</label>
            <input type="text" class="form-control" id="area_de_atuacao" name="area_de_atuacao" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="quadro_societario">Quadro Societário</label>
            <input type="text" class="form-control" id="quadro_societario" name="quadro_societario" required>
        </div>
    </div>
</div>

<script>
    $("#cnpj").on("input", function() {
        var cnpj = $(this).val().replace(/\D/g, ''); // Remove todos os caracteres não numéricos
        if (cnpj.length <= 14) {
            $(this).mask("99.999.999/9999-99");
        } else {
            $(this).mask("99.999.999/9999-99", { reverse: true });
        }
    });
</script>