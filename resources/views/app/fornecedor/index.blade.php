<h3>Fornecedor</h3>
{{-- Fica o comentário que será descartado pelo interpretador /Modo blade --}}


@php
    /*
    if(){

    }else if(){

    }else{

    }
    */
@endphp

{{--
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif
--}}


@isset($fornecedores)
    @for ($i = 0; isset($fornecedores[$i]) ; $i++)
        Fornecedor: {{$fornecedores[$i]['nome']}}
        <br>
        Status: {{$fornecedores[$i]['status']}}
        <br>
        CNPJ: {{$fornecedores[$i]['cnpj']?? 'Dado não foi preenchido'}}
        <br>
        Telefone: ({{$fornecedores[$i]['ddd']?? ''}}) {{$fornecedores[$i]['telefone']?? ''}}
        <hr>
    @endfor

    @php  $i = 0; @endphp

    @while (isset($fornecedores[$i]))
        Fornecedor: {{$fornecedores[$i]['nome']}}
        <br>
        Status: {{$fornecedores[$i]['status']}}
        <br>
        CNPJ: {{$fornecedores[$i]['cnpj']?? 'Dado não foi preenchido'}}
        <br>
        Telefone: ({{$fornecedores[$i]['ddd']?? ''}}) {{$fornecedores[$i]['telefone']?? ''}}
        <hr>
        @php  $i++; @endphp

    @endwhile

   

    <!--
        $variavel testada não estiver definida 
        ou 
        $variavel testada possuir o valor null
    -->

    @forelse($fornecedores as $indice => $fornecedor)

        Iteração atual: {{$loop->iteration}}
        <br>
        Fornecedor: {{$fornecedor['nome']}}
        <br>
        Status: {{$fornecedor['status']}}
        <br>
        CNPJ: {{$fornecedor['cnpj']?? 'Dado não foi preenchido'}}
        <br>
        Telefone: ({{$fornecedor['ddd']?? ''}}) {{$fornecedor['telefone']?? ''}}
        <br>
        @if($loop->first)
            Primeira iteração do loop
        @endif

        @if($loop->last)
            Última iteração do loop
            <br>
            Total de registros: {{$loop->count}}
        @endif
        <hr>
    @empty
        Não existem fornecedores cadastrados
    @endforelse



    @foreach($fornecedores as $indice => $fornecedor)
    Fornecedor: {{$fornecedor['nome']}}
        <br>
        Status: {{$fornecedor['status']}}
        <br>
        CNPJ: {{$fornecedor['cnpj']?? 'Dado não foi preenchido'}}
        <br>
        Telefone: ({{$fornecedor['ddd']?? ''}}) {{$fornecedor['telefone']?? ''}}
        <hr>
    @endforeach

@endisset


