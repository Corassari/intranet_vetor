<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('USR_LOGIN') ? 'has-danger' :''}}">
            <label class="form-control-label">LOGIN</label>
            <input type="text" class="form-control {{ $errors->has('USR_LOGIN') ? 'is-invalid' :''}}" name="USR_LOGIN"
                placeholder="Login" value="{{ isset($dados->USR_LOGIN)? trim($dados->USR_LOGIN) : old('USR_LOGIN') }}">
            @if($errors->has('USR_LOGIN'))
            <div class="invalid-feedback">
                {{ $errors->first('USR_LOGIN') }}
            </div>
            @endif
        </div>

    </div>
    <div class="col-lg-6">
        <div class="form-group  {{ $errors->has('USR_MAIL') ? 'has-danger' :''}}">
            <label class="form-control-label">E-MAIL</label>
            <input type="email" class="form-control {{ $errors->has('USR_MAIL') ? 'is-invalid' :''}}" name="USR_MAIL"
                placeholder="E-mail" value="{{ isset($dados->USR_MAIL)? trim($dados->USR_MAIL): old('USR_MAIL') }}">

            @if($errors->has('USR_MAIL'))
            <div class="invalid-feedback">
                {{ $errors->first('USR_MAIL') }}
            </div>
            @endif
        </div>

    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('USR_NAME') ? 'has-danger' :''}}">
            <label class="form-control-label">NOME </label>
            <input type="text" class="form-control {{ $errors->has('USR_NAME') ? 'is-invalid' :''}}" name="USR_NAME"
                placeholder="Nome" value="{{ isset($dados->USR_NAME) ? trim($dados->USR_NAME): old('USR_NAME') }}">
            @if($errors->has('USR_NAME'))
            <div class="invalid-feedback">
                {{ $errors->first('USR_NAME') }}
            </div>
            @endif
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group {{ $errors->has('USR_PASS') ? 'has-danger' :''}}">
            <label class="form-control-label">SENHA</label>
            <input type="password" class="form-control {{ $errors->has('USR_PASS') ? 'is-invalid' :''}}" name="USR_PASS"
                placeholder="Senha" value="{{ isset($dados->USR_PASS) ? trim($dados->USR_PASS): old('USR_PASS') }}">
            @if($errors->has('USR_PASS'))
            <div class="invalid-feedback">
                {{ $errors->first('USR_PASS') }}
            </div>
            @endif
        </div>
    </div>

</div>