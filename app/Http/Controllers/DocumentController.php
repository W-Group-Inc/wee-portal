<?php

namespace App\Http\Controllers;
use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    //

    public function index()
    {
        $documents = Document::get();

        return view('documents',
        array(
            'documents' => $documents,
        )
    
        );
    }
}
