<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function create()
    {
        return view('article/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:170|min:5',
            'anons' => 'required|min:10',
            'text' => 'required|min:10',
            'main_image' => 'nullable|image|max:1000' //перевірка, якщо не заповнити то помилки не буде | тількт зображення | максимум 1000 кілобайт
        ]);

        if ($request->hasFile('main_image')) {                      //якщо в бд є запис  в цьому полі то виконується умова
            $file = $request->file('main_image')->getClientOriginalName();
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME); //вибираєм імя файлу

            $ext = $request->file('main_image')->getClientOriginalExtension();  //вибираєм розширення

            $image_name = $image_name_without_ext . "_" . time() . "." . $ext; // добавляєм time() щоб імя файлу завжди було унікальним
            $request->file('main_image')->storeAs('public/img/articles/', $image_name); // вказуєм шлях де зберігаютьмя, потім прописати php artisan storage:link
            // Storage::put('public/img/articles', $image_name);
        } else
            $image_name = 'noimage.jpg'; //

        $article = new Article();
        $article->title = $request->input('title');
        $article->anons = $request->input('anons');
        $article->text = $request->input('text');
        $article->user_id = auth()->user()->id;
        $article->image = $image_name;
        $article->save();

        return redirect('/')->with('success', 'Стаття добавлена');
    }

    public function show($id)
    {
        $article = Article::find($id);    //метод, який дозволяє знайти 1 запис по індетифікатору
        return view('article/show', compact('article'));
        // return view('article/show')->with('article', $article); //аналогіний запис
    }

    public function edit($id)
    {
        $article = Article::find($id);

        if (auth()->user()->id != $article->user_id)
            return redirect('/')->with('error', 'Це не ваша стаття');

        return view('article/edit', compact('article'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required|max:170|min:10',
            'anons' => 'required|min:10',
            'text' => 'required|min:10',
            'main_image' => 'nullable|image|max:1000',
        ]);

        if ($request->hasFile('main_image')) {                      //якщо в бд є запис  в цьому полі то виконується умова
            $file = $request->file('main_image')->getClientOriginalName();
            $image_name_without_ext = pathinfo($file, PATHINFO_FILENAME); //вибираєм імя файлу

            $ext = $request->file('main_image')->getClientOriginalExtension();  //вибираєм розширення

            $image_name = $image_name_without_ext . "_" . time() . "." . $ext; // добавляєм time() щоб імя файлу завжди було унікальним
            $request->file('main_image')->storeAs('public/img/articles/', $image_name); // вказуєм шлях де зберігаютьмя, потім прописати php artisan storage:link
            // Storage::put('public/img/articles', $image_name);
        }

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->anons = $request->input('anons');
        $article->text = $request->input('text');
        $article->user_id = auth()->user()->id; //name, email

        if ($request->hasFile('main_image')) {
            if ($article->image != 'noimage.ipg')
                Storage::delete('public/img/articles/' .  $article->image);

            $article->image = $image_name;
        }

        $article->save();

        return redirect('/')->with('success', 'Стаття змінена');
    }

    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/')->with('success', 'Стаття була видалена');

        if ($article->image != 'noimage.ipg')
            Storage::delete('public/img/articles/' .  $article->image);
    }
}
