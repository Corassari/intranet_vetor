@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="p-0 bg-secondary">
        <form action="">
            <!-- Input groups with icon -->
            <div class="row">
                <div class="col-md-2">
                    <label class="form-control-label">Pedido</label>
                    <input type="text" name="C7_NUM" maxlength="6"
                        class="form-control  form-control-alternative input-sm" placeholder="Número Pedido">
                </div>
                <div class="col-md-2">
                    <label class="form-control-label">Emissao</label>
                    <input type="text" name="C7_EMISSAO"
                        class="form-control form-control-alternative input-sm datepicker" value="{{ date('d/m/Y')}}"
                        placeholder="Emissão">
                </div>
                <div class="col-md-3">
                    <label class="form-control-label">Produto</label>
                    <input type="text" name="C7_COD" class="form-control  form-control-alternative input-sm"
                        placeholder="Número Pedido">
                </div>
            </div>
        </form>
    </div>

    <div class="card mt-3">
        <div id="dados">
            <button class="btn btn-link" v-on:click="listDados()">Botao de teste</button>
            <table-result :headers="comp_headers" :items="comp_items">
            </table-result>
        </div>
    </div>
</div>
</div>
</div>
@endsection