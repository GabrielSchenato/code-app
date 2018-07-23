<?php

namespace CodePress\CodeApp\Controllers;

use Illuminate\Http\Request;
use CodePress\CodeApp\Models\Layout;
use CodePress\CodeApp\Models\AppConfig;
use Illuminate\Support\Facades\File;

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
        return view('codeapp::layouts.create');
    }

    public function store(Request $request)
    {
        $layout = $this->layout->create([
            'name' => $request->get('name')
        ]);
        $file = $request->file('layout');

        $zip = new \ZipArchive();
        $layoutPath = storage_path("app/layouts/$layout->dirname");
        $publicPath = public_path("layouts/$layout->dirname");
        if ($zip->open($file->getRealPath()) == true) {
            $zip->extractTo($layoutPath);
            $zip->close();
        }
        File::copyDirectory($layoutPath, $publicPath);
        File::delete("$publicPath/layout.blade.php");
        return redirect()->route('admin.layouts.index');
    }

    public function active(int $id)
    {
        $layout = Layout::findOrFail($id);
        $appConfig = app(AppConfig::class);
        $appConfig->frontLayout = $layout;
        $appConfig->save();
        return redirect()->route('admin.layouts.index');
    }

}
