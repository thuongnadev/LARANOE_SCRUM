<?php

namespace App\Http\Controllers\Core\HandleModule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class HandleModuleController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'command' => 'required|string',
            'param' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        $command = $request->input('command');
        $param = $request->input('param');
        $module = $request->input('module');

        if ($command == 'module:make') {
            $param = explode(',', $param);
        }

        try {
            $status = null;
            if ($command == 'module:make') {
                $status = Artisan::call($command, [
                    'name' => $param,
                ]);

                if ($status !== 0) {
                    return response()->json(['output' => 'Error create module']);
                }
            } else if ($command == 'module:make-model') {
                $status = Artisan::call($command, [
                    'model' => $param,
                    'module' => $module
                ]);
            }

            if ($status !== 0) {
                return response()->json(['output' => 'Error create module']);
            }

            $output = Artisan::output();

            $basePath = base_path();
            $composerCommand = 'cd ' . $basePath . ' && composer dump-autoload --optimize 2>&1';
            $composerStatus = shell_exec($composerCommand);

            if ($composerStatus === null) {
                return response()->json(['output' => $output, 'composer' => 'Composer dump-autoload failed'], 500);
            }

            return response()->json(['output' => $output]);
        } catch (\Exception $e) {
            Log::error('Error creating module: ' . $e->getMessage());

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function appendCodeToFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filePath' => 'required|string',
            'code' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $relativeFilePath = $request->input('filePath');
        $filePath = base_path($relativeFilePath);

        try {
            if (File::exists($filePath)) {
                $fileContent = File::get($filePath);
                $position = strrpos($fileContent, '}');
                if ($position !== false) {
                    $before = substr($fileContent, 0, $position);
                    $after = substr($fileContent, $position);
                    $newCode = "\n    " . trim($request->input('code')) . "\n";
                    $newContent = $before . $newCode . $after;
                    File::put($filePath, $newContent);
                    $phpCsFixerPath = base_path('vendor/bin/php-cs-fixer');
                    $command = "$phpCsFixerPath fix $filePath --rules=@PSR2";
                    shell_exec($command);

                    return response()->json(['message' => 'Code appended and formatted successfully'], 200);
                } else {
                    return response()->json(['error' => 'Closing brace not found in file'], 400);
                }
            } else {
                Log::error('File does not exist: ' . $filePath);
                return response()->json(['error' => 'File does not exist'], 404);
            }
        } catch (\Exception $e) {
            Log::error('Error appending code to file: ' . $e->getMessage());
            return response()->json(['error' => 'Error appending code to file'], 500);
        }
    }

    public function removeFunctionFromFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filePath' => 'required|string',
            'functionName' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $relativeFilePath = $request->input('filePath');
        $filePath = base_path($relativeFilePath);

        try {
            if (File::exists($filePath)) {
                $content = File::get($filePath);
                $functionName = $request->input('functionName');
                $pattern = '/(public|private|protected)?\s*function\s+' . $functionName . '\s*\([^)]*\)\s*{[^{}]*(?:{[^{}]*}[^{}]*)*}/';
                $newContent = preg_replace($pattern, '', $content);

                if ($newContent !== null) {
                    File::put($filePath, $newContent);
                    return response()->json(['message' => 'Function removed successfully'], 200);
                } else {
                    Log::error('Error removing function: ' . $functionName);
                    return response()->json(['error' => 'Error removing function'], 500);
                }
            } else {
                Log::error('File does not exist: ' . $filePath);
                return response()->json(['error' => 'File does not exist'], 404);
            }
        } catch (\Exception $e) {
            Log::error('Error removing function from file: ' . $e->getMessage());
            return response()->json(['error' => 'Error removing function from file'], 500);
        }
    }

    public function deployModule(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'moduleName' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $moduleName = $request->input('moduleName');
        $sourcePath = base_path('Modules/' . $moduleName);
        $destinationPath = base_path('Deploy/' . $moduleName);
        $routesFile = base_path('Deploy/' . $moduleName . '/routes/api.php');

        try {
            if (File::exists($sourcePath)) {
                if (File::exists($destinationPath)) {
                    Log::info("Module {$moduleName} already exists in Deploy directory. Overwriting...");
                    File::deleteDirectory($destinationPath);
                }

                File::copyDirectory($sourcePath, $destinationPath);

                if (File::exists($routesFile)) {
                    $content = File::get($routesFile);
                    $updatedContent = str_replace("prefix('modules')", "prefix('deploy')", $content);
                    File::put($routesFile, $updatedContent);
                    Log::info("Updated routes in {$routesFile} to use 'deploy' prefix.");
                }

                Log::info("Module {$moduleName} has been deployed to Deploy directory.");
                return response()->json(['message' => "Module {$moduleName} has been deployed successfully"], 200);
            } else {
                Log::error('Module does not exist: ' . $sourcePath);
                return response()->json(['error' => 'Module does not exist'], 404);
            }
        } catch (\Exception $e) {
            Log::error('Error deploying module: ' . $e->getMessage());
            return response()->json(['error' => 'Error deploying module'], 500);
        }
    }

    public function listModules(Request $request)
    {
        $modules = [];
        $modulePath = base_path('Modules');

        if (File::exists($modulePath)) {
            $directories = File::directories($modulePath);

            foreach ($directories as $directory) {
                $moduleName = basename($directory);
                $modules[] = $moduleName;
            }
        }

        if ($request->expectsJson()) {
            return response()->json($modules);
        }
        
        return view('index', ['modules' => $modules]);
    }

    public function getModuleDetails($moduleName)
    {
        $modulePath = base_path("Modules/{$moduleName}");
        $details = [
            'controllers' => $this->getControllers($modulePath),
            'models' => $this->getModels($modulePath),
        ];

        return response()->json($details);
    }

    private function getControllers($modulePath)
    {
        $controllers = [];
        $controllerPath = $modulePath . '\\app\\Http\\Controllers';

        if (File::exists($controllerPath)) {
            $files = File::allFiles($controllerPath);

            foreach ($files as $file) {
                $controllers[] = $file->getFilename();
            }
        }

        return $controllers;
    }

    private function getModels($modulePath)
    {
        $models = [];
        $modelPath = $modulePath . '\\app\\Models';

        if (File::exists($modelPath)) {
            $files = File::allFiles($modelPath);

            foreach ($files as $file) {
                $models[] = $file->getFilename();
            }
        }

        return $models;
    }
}
