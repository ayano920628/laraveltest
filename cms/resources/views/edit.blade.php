@extends('layouts.app')
@section('content')

    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- 本登録フォーム -->
        <form action="{{ url('books/update') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 本のタイトル -->
            <div class="card-title">
                本のタイトル
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="item_name" class="form-control" value="{{$book->item_name}}">
                </div>
            </div>

            <!-- 本の在庫数 -->
            <div class="card-title">
                本の在庫数
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="item_number" class="form-control" value="{{$book->item_number}}">
                </div>
            </div>

            <!-- 本の金額 -->
            <div class="card-title">
                本の金額
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="item_amount" class="form-control" value="{{$book->item_amount}}">
                </div>
            </div>

            <!-- 本の公開日 -->
            <div class="card-title">
                本の公開日
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="published" class="form-control" value="{{$book->published}}">
                </div>
            </div>
            
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$book->id}}">
            
            <!-- 本 登録ボタン -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection