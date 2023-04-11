<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Figurinha extends Model
{
    use HasFactory;
    protected $fillable = ['nome','desc','imgAtiva','imgOn'];
    public static function uploadImagem($request) {
        /* processo de upload de imagem*/
         if ($request->hasFile("imgOn") && $request->file("imgOn")->isValid()) {
            /* pegando a imagem com o name */
            $requestImage = $request->imgOn;
            /* pegando a extensao dessa imagem */
            $extensao = $requestImage->extension();
            /*criptografando o caminho da imagem */
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now') . $extensao);
            /*movendo a imagem para a pasta imgs/upload com o seu novo caminho */
            $requestImage->move(public_path('imgs/uploads'),$imageName);
            return $imageName;
        }
       
    }
}
