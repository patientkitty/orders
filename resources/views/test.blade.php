@extends('layouts.mobileHead')

@section('content')
    <style>
        .table{
            font-size: 40px;
        }
    </style>
        <table class="table">
            <thead>
            <tr>
                {{--<th scope="col">编号</th>--}}
                <th scope="col">品名</th>
                {{--<th scope="col">类型</th>--}}
                <th scope="col">单位</th>
                <th scope="col">单价</th>
                <th scope="col">操作</th>
            </tr>
            </thead>
            @if(!empty($inputs))
                @foreach($inputs as $input)
                    <tbody>

                    <tr>
                        {{--<td>{{$input->id}}</td>--}}
                        <td>{{$input->pName}}</td>
                        {{--<td>{{$input->pType}}</td>--}}
                        <td>{{$input->pUnit}}</td>
                        <td>{{$input->rPrice}}</td>
                        <td></td>
                    </tr>

                    </tbody>
                @endforeach
            @endif
        </table>






@endsection