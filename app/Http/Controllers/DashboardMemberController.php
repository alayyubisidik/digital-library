<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReview;
use App\Models\Borrowing;
use App\Models\PrivateCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardMemberController extends Controller
{
    public function index(){
        return view('dashboard-member.index');
    }
    
    public function book(Request $request){

        if($request->search){
            // dd($request->search);
            $books = Book::with('bookCategory')
            ->where('deleted_at', null)
            ->where('title', 'like', '%' . $request->search . '%')
            ->withAvg('bookReviews', 'rating')
            ->get();

            // dd($books);

            return view('dashboard-member.book.index', [
                "books" => $books,
            ]);
        }

        $books = Book::with('bookCategory')->where('deleted_at', null)->withAvg('bookReviews', 'rating')->get();

        return view('dashboard-member.book.index', [
            "books" => $books,
        ]);
    }

    public function rating ($book_id){
        $ratings = BookReview::where('book_id', $book_id)->with('user')->get();
        // dd($ratings);
        return view('dashboard-member.book.rating', [
            "ratings" => $ratings
        ]);
    }

    public function privateCollection(Request $request){

        $user = User::find(Auth::user()->id);
        $private_collections = $user->privateCollections;
        
        
        return view('dashboard-member.private-collection.index', [
            "private_collections" => $private_collections
        ]);
    }

    public function privateCollectionCreate(Request $request){
        $book = Book::find($request->input('book_id'));
        $user = User::find($request->input('user_id'));
        if ($user->privateCollections->contains('id', $book->id)) {
            return redirect('/dashboard-member/book')->with('message-error', 'The book is already in your private collection');
        }
        $user->privateCollections()->attach($request->input('book_id'));
        return redirect('/dashboard-member/book')->with('message-success', 'Successfully added to private collection');;
    }

    public function privateCollectionDelete(Request $request){
        $user = User::find($request->input('user_id'));
        $user->privateCollections()->detach($request->input('book_id'));
        return redirect('/dashboard-member/private-collection')->with('message-success', 'Removing from private collection was successful');
    }

    public function borrowing(){

        $user = User::find(Auth::user()->id);
        $borrowings = $user->borrowings;
        // dd($borrowings);

        return view('dashboard-member.borrowing.index', [
            "borrowings" => $borrowings
        ]);
    }
    
    public function borrowingCreate(Request $request){

        $borrowing = Borrowing::where('user_id', Auth::user()->id)->where('book_id', $request->input('book_id'))->where('loan_status', 1)->first();

        if($borrowing){
            return redirect()->back()->with('message-error', 'Books are being borrowed');
        }
        
        $book = Book::find($request->input('book_id')); 
        if($book->stock <= 0){
            return redirect()->back()->with('message-error', 'Book stock is out');
        }
        
        $book->stock = $book->stock - 1;
        $book->save();
        
        Borrowing::create([
            "user_id" => Auth::user()->id,
            "book_id" => $request->input('book_id'),
            "loan_date" => now(),
            "loan_status" => 1
        ]);
        
        return redirect()->back()->with('message-success', 'The book loan was successful');
    }

    public function return (Request $request, $slug){

        $book = Book::where('slug', $slug)->first();
        if($request->isMethod('GET')){
            return view('dashboard-member.borrowing.return', [
                "book" => $book
            ]);
        }else{

            BookReview::create([
                "user_id" => Auth::user()->id,
                "book_id" => $book->id,
                "review" => $request->input('review'),
                "rating" =>intval( $request->input('rating'))
            ]);

            $borrowing = Borrowing::where('user_id', Auth::user()->id)->where('book_id', $book->id)->where('loan_status', 1)->first();
            $borrowing->loan_status = 0;
            $borrowing->date_of_return = now();
            $borrowing->save();

            return redirect('/dashboard-member/borrowing')->with('message-success', "Book return successful");
        }
    }
    


}
