<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/test', function () {
//     return "ようこそLalavelへ";
// });
use App\Book;
use Illuminate\Http\Request;

/**
* 本のダッシュボード表示(books.blade.php)
*/
Route::get('/', function () {
    $books = Book::orderBy('created_at', 'asc')->get();
    return view('books', [
        'books' => $books
    ]);
    //return view('books',compact('books')); //も同じ意味
});

/**
* 新「本」を追加 
*/
Route::post('/books', function (Request $request) {
    //バリデーション
    $validator = Validator::make($request->all(), [
        'item_name' => 'required|min:3|max:255',
        'item_number' => 'required|min:1|max:3',
        'item_amount' => 'required|max:6',
    ]);

    //バリデーション:エラー 
    if ($validator->fails()) {
        return redirect('/')
            ->withInput() //Sessionを保持する役目
            ->withErrors($validator); //$errors
    }
    //以下に登録処理を記述（Eloquentモデル）
    // Eloquent モデル
    $books = new Book;
    $books->item_name = $request->item_name;
    $books->item_number = $request->item_number;
    $books->item_amount = $request->item_amount;
    $books->published = $request->published.' 00:00:00';
    $books->save(); 
    return redirect('/');
});

/**
* 本を削除 
*/
Route::delete('/book/{book}', function (Book $book) {
    //
    $book->delete();       //追加
    return redirect('/');  //追加
});

/**
* 本の編集ボード表示(edit.php)
*/
Route::post('/edit/{book}', function (Book $book) {
    return view('edit', [
        'book' => $book
    ]);
});


// 本を更新
Route::post('/books/update', function (Request $request) {
    //バリデーション
    $validator = Validator::make($request->all(), [
        'id' => 'required',
        'item_name' => 'required|min:3|max:255',
        'item_number' => 'required|min:1|max:3',
        'item_amount' => 'required|max:6',
    ]);

    //バリデーション:エラー 
    if ($validator->fails()) {
        return redirect('/')
            ->withInput() //Sessionを保持する役目
            ->withErrors($validator); //$errors
    }
    //以下に登録処理を記述（Eloquentモデル）
    // Eloquent モデル
    $books = Book::find($request->id);
    // $books->id = $request->id;
    $books->item_name = $request->item_name;
    $books->item_number = $request->item_number;
    $books->item_amount = $request->item_amount;
    $books->published = $request->published;
    $books->save(); 
    return redirect('/');
});
