<?php

namespace CodePress\CodeApp\Controllers;

use Illuminate\Http\Request;
use CodePress\CodeApp\Models\Layout;
/**
 * Description of LayoutsController
 *
 * @author gabriel
 */
class LayoutsController extends Controller
{

    private $layout;
    
    public function __construct(Layout $layout)
    {
        $this->layout = $layout;
    }
    
    public function index()
    {
        $layouts = $this->layout->all();
        return view('codeapp::layouts.index', compact('layouts'));
    }
    
    public function create()
    {

    }
    
    public function store(Request $request)
    {

    }
}
