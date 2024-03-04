<?php

namespace App\Http\Controllers;

use App\Exports\BorrowingReportExport;
use App\Models\Book;
use App\Models\BookReview;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DashboardOfficerController extends Controller
{

    public function index()
    {
        $countBook = Book::count();
        $countBorrowing = Borrowing::count();
        $countReview = BookReview::count();
        return view('dashboard-officer.index', [
            "countBook" => $countBook,
            'countBorrowing' => $countBorrowing,
            'countReview' => $countReview
        ]);
    }

    public function book(Request $request)
    {
        if($request->search){
            // dd($request->search);
            $books = Book::with('bookCategory')
            ->where('deleted_at', null)
            ->where('title', 'like', '%' . $request->search . '%')
            ->withAvg('bookReviews', 'rating')
            ->get();

            // dd($books);

            return view('dashboard-officer.book.index', [
                "books" => $books,
            ]);
        }

        $books = Book::with('bookCategory')->where('deleted_at', null)->withCount('borrowings')->withCount('bookReviews')->withAvg('bookReviews', 'rating')->get();

        return view('dashboard-officer.book.index', [
            "books" => $books,
        ]);
    }

    public function bookCreate(Request $request)
    {

        if ($request->isMethod('GET')) {
            $categories = Category::all();

            return view('dashboard-officer.book.create', [
                "categories" => $categories
            ]);
        } else {

            $request->validate([
                "title" => "required|string|min:3|unique:books,title",
                "categories" => "array",
                "writer" => "required|string|min:3",
                "publisher" => "required|string|min:3",
                "publication_year" => "required|numeric|min:3",
                "stock" => "required|numeric",
                "cover" => "required|image|mimes:jpeg,png,jpg|max:5000"
            ]);

            $cover = $request->file('cover');
            $coverName = time() . '.' . $cover->getClientOriginalExtension();
            $cover->storeAs('book-cover', $coverName, 'public');

            $slug = Str::slug($request->input('title'), '-');

            $book = Book::create([
                "title" => $request->input('title'),
                "slug" => $slug,
                "writer" => $request->input('writer'),
                "publisher" => $request->input('publisher'),
                "publication_year" => intval($request->input('publication_year')),
                "stock" => intval($request->input('stock')),
                "cover" => $coverName
            ]);

            $book->bookCategory()->attach($request->input('categories'));

            return redirect('/dashboard-officer/book');
        }
    }

    public function bookEdit(Request $request, $slug)
    {

        $book = Book::where('slug', $slug)->first();

        if ($request->isMethod('GET')) {
            return view('dashboard-officer.book.edit', [
                "book" => $book
            ]);
        } else {

            $request->validate([
                "title" => "string|min:3",
                "writer" => "string|min:3",
                "publisher" => "string|min:3",
                "publication_year" => "numeric|min:3",
                "stock" => "numeric",
                "cover" => "image|mimes:jpeg,png,jpg|max:5000"
            ]);

            if ($request->file('cover')) {
                Storage::disk('public')->delete('book-cover/' . $book->cover);

                $cover = $request->file('cover');
                $coverName = time() . '.' . $cover->getClientOriginalExtension();
                $cover->storeAs('book-cover', $coverName, 'public');
                $book->cover = $coverName;
            }

            $slug = Str::slug($request->input('title'), '-');

            $book->title = $request->input('title');
            $book->writer = $request->input('writer');
            $book->publisher = $request->input('publisher');
            $book->publication_year = intval($request->input('publication_year'));
            $book->stock = intval($request->input('stock'));

            $book->save();

            return redirect('/dashboard-officer/book');
        }
    }

    public function bookDelete($book_id){

        $bookId = $book_id;

        User::whereHas('privateCollections', function ($query) use ($bookId) {
            $query->where('book_id', $bookId);
        })->each(function ($user) use ($bookId) {
            $user->privateCollections()->detach($bookId);
        });

        BookReview::where('book_id', $bookId)->delete();

        $book = Book::find($bookId);
        $book->deleted_at = now();
        $book->save();

        return redirect()->back();
    }

    public function rating ($book_id){
        return view('dashboard-officer.book.rating', [
            "ratings" => BookReview::where('book_id', $book_id)->with('user')->get()
        ]);
    }

    public function ratingDelete ($book_id){
        $review = BookReview::find($book_id);
        $review->delete();
        return redirect()->back();
    }

    public function category()
    {
        $categories = Category::all();
        return view('dashboard-officer.category.index', [
            "categories" => $categories
        ]);
    }

    public function categoryCreate(Request $request)
    {

        if ($request->isMethod('GET')) {
            return view('dashboard-officer.category.create');
        } else {

            $request->validate([
                "name" => "required|string|min:3|unique:categories,name",
            ]);

            $slug = Str::slug($request->input('name'), '-');

            $category = Category::create([
                "name" => $request->input('name'),
                "slug" => $slug,
            ]);

            return redirect('/dashboard-officer/category');
        }
    }

    public function categoryEdit(Request $request, $slug)
    {

        $category = Category::where('slug', $slug)->first();

        if ($request->isMethod('GET')) {
            return view('dashboard-officer.category.edit', [
                "category" => $category
            ]);
        } else {

            $request->validate([
                "name" => "string|min:3",
            ]);

            $slug = Str::slug($request->input('name'), '-');
            $category->name = $request->input('name');
            $category->slug = $slug;
            $category->save();

            return redirect('/dashboard-officer/category');
        }
    }

    public function categoryDelete($slug){
        try {
            // Temukan kategori berdasarkan slug
            $category = Category::where('slug', $slug)->first();
    
            // Periksa apakah kategori memiliki relasi ke buku (categoryBook)
            if ($category->categoryBook()->exists()) {
                return redirect()->back()->with('message-error', 'Cannot delete category with associated books.');
            }
    
            // Hapus kategori jika tidak ada relasi
            $category->delete();
    
            return redirect()->back()->with('message-success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            // Tangkap kesalahan dan kembalikan respons dengan pesan kesalahan
            return redirect()->back()->with('message-error', 'Cannot delete category with associated books.');
        }
    }

    public function borrowing()
    {
        $borrowings = Borrowing::with('book')->with('user')->get();
        // dd($borrowings);
        return view('dashboard-admin.borrowing.index', [
            "borrowings" => $borrowings
        ]);
    }

    public function generateReport(Request $request)
    {

        if ($request->input('start_date')) {

            $borrowings = Borrowing::with(['book', 'user'])
                ->whereBetween('loan_date', [$request->input('start_date'), $request->input('end_date')])
                ->get();

            // dd($borrowings[0]->user->name);

            return view('dashboard-officer.generate-report.index', [
                "borrowings" => $borrowings
            ]);
        }

        return view('dashboard-officer.generate-report.index');
    }

    public function generateExcel(Request $request)
    {
        // Mendapatkan input dari pengguna untuk rentang waktu
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Menyaring data peminjaman berdasarkan rentang waktu
        $borrowings = Borrowing::with(['book', 'user'])
            ->whereBetween('loan_date', [$startDate, $endDate])
            ->get();

        // Nama file Excel yang akan dihasilkan
        $fileName = 'borrowing_report_' . now()->format('YmdHis') . '.xlsx';

        // Menggunakan Laravel Excel untuk membuat file Excel
        return Excel::download(new BorrowingReportExport($borrowings), $fileName);       
    }


}
