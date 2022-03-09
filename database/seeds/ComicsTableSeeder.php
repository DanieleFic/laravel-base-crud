<?php

use App\Comic;
//usiamo il nostro model che si trova in App
use Illuminate\Database\Seeder;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config("comics");
        //il config sono i nostri dati che si trovani in config
        //cioè comics.php dove abbiamo i dati

        //facciamo il foreach per popolare il nostro database
        //newComics->nome-del-dato nel file in config = $comic["nome-del-dato nel file in config"]
        foreach($comics as $comic){
            //dichiriamo una variabile che sarà =  nome del nostro model che si trova in App
            $newComics = new Comic();
            
            $newComics->title = $comic["title"];
            $newComics->description = $comic["description"];
            $newComics->thumb = $comic["thumb"];
            $newComics->price = $comic["price"];
            $newComics->series = $comic["series"];
            $newComics->sale_date = $comic["sale_date"];
            $newComics->type = $comic["type"];
            
            $newComics->save();
        }
    }
}
