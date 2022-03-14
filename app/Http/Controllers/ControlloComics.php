<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Comic;
//usiamo il nostro model che si trova in App
use Illuminate\Http\Request;

class ControlloComics extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /* var_dump(new Comic); */
        $comics = Comic::all(); 
        
        return view('comics.index', compact('comics'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Comic $comic)
    {
        return view('comics.create', compact('comic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $request->validate([
            "title"=>"required|string|max:50|unique:comics",
            "description"=>"required|string|max:4000",
            "thumb"=>"nullable|url",
            "price"=>"required|between:0,99.99",
            "type"=>[
                "required",
                Rule::in(['comic book','graphic novel'])
            ],
            "sale_date"=>"required|date",
            "series"=>"required|string|max:100",

        ]);
        //dobbiamo gestire i dati che ci vengono inviati tramite la view create
        //creando una struttura dati simile a quella nelle migration
        $data = $request->all(); //query che chiediamo al batabase tutti i record
        
        
        //$newComic = new Comic;
        //prendiamo tutti i data che ci arrivano dal form,
        //facciamo una variabile d'appoggio NewComics che crea una nuova classe nell db

        //prima versione senza protect sulla vista
        /* $newComic->title = $data["title"];
        $newComic->description = $data["description"];
        $newComic->thumb = $data["thumb"];
        $newComic->price = $data["price"];
        $newComic->series = $data["series"];
        $newComic->sale_date = $data["sale_date"];
        $newComic->type = $data["type"];
        $newComic->save(); */

        //seconda versione con il protect fillable  sulla classe 
        //$newComic = new Product();
        //$newComic->fill($data);
        //$newComic->save();

        //terza versione che nella classe deve essere messo fillable o il guarder
        $newComic = Comic::create($data);
        
        return redirect()->route('comics.show', $newComic->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * //show serve per mostrare un singolo record della nostra tabella
     */                 //modello //variabile con un nome che gli vuoi dare tu - deve coincidere con il nome rotta
    public function show(Comic $comic)
    //facciamo lo show e nei parametri ci vuole il nostro model
    // e l'elemento che passiamo tramite i dati
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {   

        //il request validate si fa con array chiave=>valore ci serve per fare dei controlli 
        //sul nostro form controllando i dati che ci vengono inviati
        
        $request->validate([
            "title"=>"required|string|max:50|unique:comics,title,{$comic->id}",
            "description"=>"required|string|max:4000",
            "thumb"=>"nullable|url",
            "price"=>"required",
            "type"=>[
                "required",
                Rule::in(['comic book','graphic novel'])
            ],
            "sale_date"=>"required|date",
            "series"=>"required|string|max:100",

        ]);

        $data = $request->all();
        $comic->update($data);
        //metodo delle slide ma che non mi funziona
        
        //possiamo usare il metodo update per risparmiarci questo codice 
        /* $comic->title = $data["title"];
        $comic->description = $data["description"];
        $comic->thumb = $data["thumb"];
        $comic->price = $data["price"];
        $comic->series = $data["series"];
        $comic->sale_date = $data["sale_date"];
        $comic->type = $data["type"];
        $comic->save(); */

        return redirect()->route('comics.show', $comic->id);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        //prendiamo il nostro record e ci mettiamo la funzione delete
        $comic->delete();
        return redirect()->route("comics.index");
    }
}
