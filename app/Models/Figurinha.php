<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Figurinha extends Model
{
    use HasFactory;
    protected $fillable = ['nome','desc','imgAtiva','imgOff','imgOn'];
    public static function uploadImagem($request, $nameImg) {
        /* processo de upload de imagem*/
         if ($request->hasFile($nameImg) && $request->file($nameImg)->isValid()) {
            /* pegando a imagem com o name */
            $requestImage = $request->$nameImg;
            /* pegando a extensao dessa imagem */
            $extensao = $requestImage->extension();
            /*criptografando o caminho da imagem */
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now') . $extensao);
            /*movendo a imagem para a pasta imgs/upload com o seu novo caminho */
            $requestImage->move(public_path('imgs/uploads'),$imageName);
        }
        return $imageName;
    }
}
