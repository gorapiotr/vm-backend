<?php

namespace Modules\Book\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Book\Entities\Book;
use Modules\Book\Http\Requests\CreateBookRequest;
use Modules\Book\Http\Requests\DeleteBookRequest;
use Modules\Book\Http\Requests\EditBookRequest;
use Modules\Book\Presenters\BookCollectionPresenter;
use Modules\Book\Presenters\BookInfoPresenter;

/**
 * Class BookController
 * @package Modules\Book\Http\Controllers
 */
class BookController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse|BookCollectionPresenter
     */
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
     * @param CreateBookRequest $request
     * @return BookInfoPresenter
     */
    public function create(CreateBookRequest $request)
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
     * @param $id
     * @param EditBookRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id, EditBookRequest $request)
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
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Book::findOrFail($id)->delete();
        return response()->json(['msg' => 'Successful removed']);
    }
}
