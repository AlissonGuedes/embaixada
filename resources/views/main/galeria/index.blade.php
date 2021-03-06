@extends('main.layouts.app')

@section('title', tradutor($album->titulo))

@section('content')

    @if (isset($album))

        <div class="title_pg" style="text-transform: capitalize">
            {{ tradutor($album->titulo) }}
        </div>

        <br>
        <br>

        <div class="geral">

            @foreach ($album as $row)
                <a href="{{ url('fotos/' . $row->slug) }}">
                    <div class="conj_item_cont">
                        <div class="img_item_cont">
                            <img src="{{ asset($row->imagem) }}" class="img_cem">
                        </div>
                        <div class="info_item_cont">
                            <div class="title_itemm_cont">
                                {{ tradutor(json_decode($row->titulo, true)) }}
                            </div>
                            <div class="data_item">
                                {{ tradutor($row->created_at) }}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>

    @endif

@endsection
