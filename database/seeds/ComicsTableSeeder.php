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
        foreach($comics as $elemento){
            //dichiriamo una variabile che sarà =  nome del nostro model che si trova in App
            $newComics = new Comic();
            
            $newComics->title = $elemento["title"];
            $newComics->description = $elemento["description"];
            $newComics->thumb = $elemento["thumb"];
            $newComics->price = $elemento["price"];
            $newComics->series = $elemento["series"];
            $newComics->sale_date = $elemento["sale_date"];
            $newComics->type = $elemento["type"];

            $newComics->save();
        }
    }
}
