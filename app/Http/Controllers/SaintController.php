<?php

namespace App\Http\Controllers;

use App\Models\Saint;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class SaintController extends Controller
{

    use HasRichText;
    protected $richTextFields = [
        'content'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $saints = Saint::with('article')->get();
        
        return view('saints.index', [
            'saints' => $saints,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saints.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saint = new Saint;
 
        $saint->name = $request->name;
        $saint->birth = $request->birth;
        $saint->death = $request->death;
        $saint->gender = $request->gender;
        $saint->nationality = $request->nationality;
        $saint->celebrate = $request->celebrate;
        $saint->function = $request->function;
    
        $saint->save();

        $article = $saint->article()->firstOrNew([]);
        
        $article->content = ($request->contentArticle == "" ? "Article sur . $saint->name" : $request->contentArticle) ;
        $article->resumeArticle = ($request->resumeArticle == "" ? "Résumé de l'article sur . $saint->name" : $request->resumeArticle) ;

        $article->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saint  $saint
     * @return \Illuminate\Http\Response
     */
    public function show(Saint $saint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saint  $saint
     * @return \Illuminate\Http\Response
     */
    public function edit(Saint $Saint)
    {

        return view('saints.edit', [
            'saint' => $Saint,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Saint  $saint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $saint = Saint::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'function'    => 'required|string|max:255',
            'gender'      => ['required','string','max:255',Rule::in(['Homme', 'Femme', 'Ange'])],
            'content'      => 'required',
        ]);

        
        $saint->name = $validated['name'];
        $saint->nationality = $validated['nationality'];
        $saint->function = $validated['function'];
        $saint->gender = $validated['gender'];

        $saint->save();

        $article = $saint->article()->firstOrNew([]);
        $article->content = $request->content;
        $article->save();

        return redirect(route('Saint.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saint  $saint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saint $saint)
    {
        //
    }
}
