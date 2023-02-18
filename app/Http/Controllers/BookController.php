<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    public function store(Request $request)
    {
        // validate the user input

        $this->validate($request, [
            "title" => "required",
            "autor" =>  "required"
        ]);

        // add it to the database

        $book = new Book();
        $book->title = $request->input("title");
        $book->author = $request->input("author");
        $book->save();

        return response()->json($book);
    }

    public function show($id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        // validate the user input

        $this->validate($request, [
            "title" => "required",
            "author" =>  "required"
        ]);

        // add it to the database

        $book = Book::find($id);
        $book->title = $request->input("title");
        $book->author = $request->input("author");
        $book->save();

        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return response()->json($book->title . " has been deleted");
    }
}
