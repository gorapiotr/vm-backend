<?php

namespace Modules\Book\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Book\Entities\Book;
use Modules\Book\Presenters\BookCollectionPresenter;
use Modules\Book\Presenters\BookInfoPresenter;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::orderBy('id', 'asc')->get();

        if ($books->isNotEmpty()) {
            return new BookCollectionPresenter($books);
        } else {
            return response()->json(['msg' => 'Not found books']);
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {

        $book = Book::firstOrCreate([
            'name' => $request->get('name'),
            'isbn'  => $request->get('isbn')
        ]);

        $book->categories()->sync($request->get('categories'));

        $presenter = new BookInfoPresenter($book);
        $presenter->additional(['success' => true]);

        return $presenter;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('book::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id, Request $request)
    {
        $book = Book::findOrFail($id);

        $book->update([
           'name' => $request->get('name'),
           'isbn'  => $request->get('isbn')
        ]);

        $book->categories()->sync($request->get('categories'));

        return response()->json(['msg' => 'Successful edited']);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return response()->json(['msg' => 'Successful removed']);
    }
}
