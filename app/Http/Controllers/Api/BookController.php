<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //menampilkan semua buku
    public function index()
    {
        return Book::all();
    }

    //menambahkan buku
    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required',
            'isbn' => 'required',
            'stock' => 'required',
        ]);
        $book = new Book;
        $book->title = $request->title;
        $book->category_id = $request->category_id;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->publication_year = $request->publication_year;
        $book->isbn = $request->isbn;
        $book->stock = $request->stock;
        $book->borrowed = $request->borrowed;
        $book->booked = $request->booked;
        $book->image = $request->image;
        $book->save();

        return "Data Berhasil diinput";
    }
    public function update(Request $request, $id)
    {
        $title = $request->title;
        $author = $request->author;
        $publisher = $request->publisher;
        $publication_year = $request->publication_year;
        $isbn = $request->isbn;
        $stock = $request->stock;
        $borrowed = $request->borrowed;
        $booked = $request->booked;
        $image = $request->image;

        $book = Book::find($id);
        $book->title = $title;
        $book->author = $author;
        $book->publisher = $publisher;
        $book->publication_year = $publication_year;
        $book->isbn = $isbn;
        $book->stock = $stock;
        $book->borrowed = $borrowed;
        $book->booked = $booked;
        $book->image = $image;
        $book->save();

        return "Data Berhasil dirubah";
    }
    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();

        return "Data Berhasil dihapus";
    }
}
