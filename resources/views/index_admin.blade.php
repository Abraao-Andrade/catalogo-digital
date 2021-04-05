@extends('layouts.principal')

@section('body')
<style>
  .btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;

    .btn-circle.btn-xl {
      width: 70px;
      height: 70px;
      padding: 10px 16px;
      border-radius: 35px;
      font-size: 24px;
      line-height: 1.33;
  }

}
</style>
<div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        @foreach ($produtos as $prod)  
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            <div class="card-body">
              <p class="card-text">{{$prod->name}}</p>
              <p class="card-text">{{$prod->message}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Download</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Apagar</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="dropup col-lg-12" style="text-align: right;">
        <button type="button" class="btn btn-success btn-circle btn-x1 dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
      </button>
      <div class="dropdown-menu">
        <button class="dropdown-item" type="button" role="button" onclick="novaCategoria()">Adicionar Categoria</button>
        <button class="dropdown-item" type="button" role="button" onclick="novoProduto()">Adicionar Produtos</button>
      </div>
    </div>
    </div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="dlgCategorias">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form class="form-horizontal" id="formCategoria">
            <div class="modal-header">
                <h5 class="modal-title">Nova Categoria</h5>
            </div>
            <div class="modal-body">

              <input type="hidden" id="id" class="form-control">
              <div class="form-group">
                  <label for="nomeCategoria" class="control-label">Nome da Categoria</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="nomeCategoria" placeholder="Categorias...">
                  </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" onclick="criarCategoria()">Salvar</button>
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form class="form-horizontal" id="formProduto">
            <div class="modal-header">
                <h5 class="modal-title">Novo Produto</h5>
            </div>
            <div class="modal-body">

              <input type="hidden" id="id" class="form-control">
              <div class="form-group">
                  <label for="nomeProduto" class="control-label">Nome do Produto</label>
                  <div class="input-group">
                      <input type="text" class="form-control" id="nomeProduto" placeholder="Produto">
                  </div>
              </div>

              <div class="form-group">
                <label for="messageProduto" class="control-label">Descricao do Produto</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="messageProduto" placeholder="Descrição">
                </div>
              </div>

              <div class="form-group">
                <label for="arquivoProduto" class="control-label">Imagem do Produto</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="arquivoProduto" placeholder="Imagem">
                </div>
              </div>

            <div class="form-group">
              <label for="categoriaProduto" class="control-label">Categoria</label>
              <div class="input-group">
                 <select class="form-control" id="categoriaProduto">

                 </select>
              </div>
            </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" onclick="criarProduto()">Salvar</button>
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
    </div>
  </div>
</div>

@endsection

@section('javascript')

<script type="text/javascript">
  
  $.ajaxSetup({
     Headers:{
       'X-CSRF-TOKEN': "{{ csrf_token() }}"
     }
  });

  function novoProduto(){
    $('#id').val('');
    $('#nomeProduto').val('');
    $('#messageProduto').val('');
    $('#arquivoProduto').val('');
    $('#dlgProdutos').modal('show');
}

function novaCategoria(){
  $('#id').val('');
  $('#nomeCategoria').val('');
  $('#dlgCategorias').modal('show');
}

function carregarCategorias(){
  $.getJSON('/api/categorias', function(data) {
      for(i=0;i<data.length;i++){
          opcao = '<option value="'+ data[i].id +'">' + data[i].name + '</option>';
          $('#categoriaProduto').append(opcao);
      }
  })
}

function criarProduto(){
  prod = {
      name: $("#nomeProduto").val(),
      message: $("#messageProduto").val(),
      arquivo: $("#arquivoProduto").val(),
      categoria_id: $("#categoriaProduto").val()
  };
  
  $.post("api/admin", prod, function(data){ 
  });
}

function criarCategoria(){
  cat = {
      name: $("#nomeCategoria").val(),
  };
  
  $.post("api/admin", cat, function(data){ 
 });
}

    $(function(){
      carregarCategorias();
    })

</script>

@endsection