<?php
namespace Modules\Ims\Controllers;

use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use League\Glide\ServerFactory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Log;
use League\Glide\Responses\LaravelResponseFactory;

class ImagesController extends Controller
{
    public function __invoke(Filesystem $filesystem, $path = null)
    {
        $server = ServerFactory::create([
            'response' => new LaravelResponseFactory(app('request')),
            'source' => $filesystem->getDriver(),
            'cache' => $filesystem->getDriver(),
            'source_path_prefix' => 'public/uploads',
            'cache_path_prefix' => '.cache',
            'cache_with_file_extensions' => true,
            'max_image_size' => 2000 * 2000,
            'defaults' => [
                'fm' => 'webp',
            ]
        ]);
        try {
            if (request()->header('cache-control') === 'no-cache') {
                $server->deleteCache($path);
            }
            if (Str::endsWith($path, '.svg')) {
                return response(Storage::get('public/uploads/' . $path))->header('Content-Type', 'image/svg+xml');
            }
            if (Str::endsWith($path, '.mp4')) {
                return response(Storage::get('public/uploads/' . $path))->header('Content-Type', 'video/mp4');
            }
            if (Str::endsWith($path, '.pdf')) {
                return response(Storage::get('public/uploads/' . $path))->header('Content-Type', 'application/pdf');
            }
            return $server->getImageResponse($path, request()->all());
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $server->getImageResponse('nophoto/nophoto.jpg', request()->all());
        }
    }
}
