<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

/**
 * 低版本提示
 * Class VersionPromptController
 * @package App\Http\Controllers\Index
 */
class VersionPromptController extends Controller
{
    public function __invoke()
    {
        return view('index.version_prompt', [
            'tdk' => []
        ]);
    }
}
