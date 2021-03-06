@extends('admin.layouts.app')

@section('title', 'Usuários')

@section('content')

    <div class="container_right panel">

        <!-- Header search bar starts -->
        <div class="title_pg f_avante"
             style="place-content: start;">

            <button data-href="{{ route('admin.usuarios') }}"
                    class="btn btn-flat btn-small btn-floating transparent waves-effect waves-light white-text bt_ac btn-flat mr-1"
                    data-tooltip="Voltar">
                <i class="material-icons">arrow_back</i>
            </button>

            <div class="mr-2">Usuários - {{ !isset($row) ? 'Adicionar' : 'Editar' }}</div>

        </div>
        <!-- Header search bar Ends -->

        <!-- BEGIN panel-content -->
        <div class="panel-content">

            <!-- BEGIN panel-header -->
            <div class="panel-header no-border">

                <!-- BEGIN Toolbar -->
                <div class="toolbar bts_acao f_bebas">

                    <div class="buttons">

                        <!-- BEGIN Lista de Botões -->
                        <div class="buttons show-buttons">

                            @if (isset($row))
                                <button class="btn btn-large excluir waves-effect"
                                        value="{{ isset($row) ? $row->id : null }}"
                                        data-tooltip="Excluir"
                                        data-link="{{ route('admin.usuarios.delete') }}"
                                        style="border: none">
                                    <i class="material-icons">delete_forever</i>
                                </button>
                                <div class="divider"></div>
                            @endif

                        </div>
                        <!-- END Lista de Botões -->

                    </div>

                </div>
                <!-- END Toolbar -->

            </div>
            <!-- END panel-header -->

            <!-- BEGIN panel-body -->
            <div class="area_dashboard panel-body pl-0 pr-0 pt-1">


                <!-- BEGIN form -->
                <form novalidate
                      action="{{ route('admin.usuarios.insert') }}"
                      method="post"
                      autocomplete="off">
                    <!-- BEGIN Input[Nome] -->
                    <div class="row">
                        <div class="input-field amber-border grey-text">
                            <i class="material-icons prefix">person</i>
                            <input type="text"
                                   name="nome"
                                   class="white-text"
                                   id="nome"
                                   value="{{ isset($row) ? $row->nome : null }}"
                                   autofocus="autofocus">
                            <label class="grey-text"
                                   for="nome"> Nome </label>
                        </div>
                    </div>
                    <!-- END Input[Nome] -->
                    <!-- BEGIN Input[Login] -->
                    <div class="row">
                        <div class="input-field amber-border grey-text">
                            <i class="material-icons prefix">account_circle</i>
                            <input type="text"
                                   name="login"
                                   class="white-text"
                                   id="login"
                                   value="{{ isset($row) ? $row->login : null }}">
                            <label class="grey-text"
                                   for="login"> Login </label>
                        </div>
                    </div>
                    <!-- END Input[Login] -->
                    <!-- BEGIN Select[Grupo] -->
                    <div class="row">
                        <div class="input-field amber-border grey-text">
                            <i class="material-icons prefix">group</i>
                            <select name="grupo"
                                    class="white-text">
                                <option value=""
                                        disabled="disabled"
                                        {{ !isset($row) ? 'selected="selected"' : null }}> Selecione um grupo</option>
                                @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->id }}"
                                            {{ isset($row) && $grupo->id == $row->id_grupo ? 'selected="selected"' : null }}
                                            data-icon=""> {{ $grupo->grupo }} </option>
                                @endforeach
                            </select>
                            <label>Grupo</label>
                        </div>
                    </div>
                    <!-- END Select[Grupo]-->
                    <!-- BEGIN Input[Email] -->
                    <div class="row">
                        <div class="input-field amber-border grey-text">
                            <i class="material-icons prefix">email</i>
                            <input type="email"
                                   name="email"
                                   class="white-text"
                                   value="{{ isset($row) ? $row->email : null }}"
                                   id="email">
                            <label class="grey-text"
                                   for="email"> E-mails </label>
                        </div>
                    </div>
                    <!-- END Input[Email] -->
                    <!-- BEGIN Input[Senha] -->
                    <div class="row">
                        <div class="input-field amber-border grey-text">
                            <i class="material-icons prefix">vpn_key</i>
                            <input type="password"
                                   name="senha"
                                   class="white-text"
                                   id="senha">
                            <label class="grey-text"
                                   for="senha"> Senha </label>
                        </div>
                    </div>
                    <!-- END Input[Senha] -->
                    <!-- BEGIN form-header -->
                    <div class="row">
                        <div class="label-buttons left">
                            <label class="left"
                                   data-tooltip="Bloquear">
                                <input type="checkbox"
                                       name="status"
                                       value="0"
                                       {{ isset($row) && $row->status === '0' ? 'checked="checked"' : null }}>
                                <i class="material-icons"
                                   style="width: auto !important;">lock</i>
                            </label>
                        </div>
                    </div>
                    <!-- BEGIN panel-footer -->
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col s12">
                                <button type="submit"
                                        class="btn waves-effect right">
                                    <i class="material-icons left">save</i> Salvar alterações </button>
                            </div>
                            <input type="hidden"
                                   name="id"
                                   value="{{ isset($row) ? $row->id : null }}">
                            <input type="hidden"
                                   name="_method"
                                   value="{{ !isset($row) ? 'post' : 'put' }}">
                        </div>
                    </div>
                    <!-- END panel-footer -->
                </form>
                <!-- END form -->

            </div>
            <!-- END panel-body -->

        </div>
        <!-- END panel-content -->

    </div>

@endsection
