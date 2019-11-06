<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- 本登録フォーム -->
        <form action="{{ url('books') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 本のタイトル -->
            <div class="card-title">
                本のタイトル
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="item_name" class="form-control">
                </div>
            </div>

            <!-- 本の在庫数 -->
            <div class="card-title">
                本の在庫数
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="item_number" class="form-control">
                </div>
            </div>

            <!-- 本の金額 -->
            <div class="card-title">
                本の金額
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="item_amount" class="form-control">
                </div>
            </div>

            <!-- 本の公開日 -->
            <div class="card-title">
                本の公開日
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" name="published" class="form-control">
                </div>
            </div>

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
    <!-- Book: 既に登録されてる本のリスト -->
 <!-- 現在の本 -->
    @if (count($books) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>本一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <!-- 本タイトル -->
                                <td class="table-text">
                                    <div>{{ $book->item_name }}</div>
                                </td>

			        <!-- 本: 削除ボタン -->
                                <td>
                                    <form action="{{ url('book/'.$book->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">
                                            削除
                                        </button>
                                    </form>
                                </td>

			        <!-- 本: 更新ボタン -->
                                <td>
                                    <form action="{{ url('edit/'.$book->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">
                                            更新
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection