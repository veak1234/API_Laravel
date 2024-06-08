<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookReource;
use App\Http\Requests\BookRequest;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::all();
        $books = BookReource::collection($books);
        return response()->json(['data' => $books, 'message' =>'request is successfully']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        //
        $book = Book::create($request->all());
        $book = new BookReource($book);
        return response()->json(['data' => $book,'message' =>'Create is successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $book = Book::find($id);
        $book = new BookReource($book);
        return response()->json(['data' => $book,'message' =>'Show is successfully']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book, string|int $id)
    {
        //
        $book->update($request->all());
        $book = new BookReource($book);
        return response()->json(['data' => $book,'message' =>'Update is successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookRequest $book, string|int $id)
    {
        //
        $book->delete();
        return response()->json(['data' => $book,'message' =>'Delete is successfully']);
    }
}
