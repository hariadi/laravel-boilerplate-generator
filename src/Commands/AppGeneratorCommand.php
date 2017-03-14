<?php

namespace Hariadi\Boilerplate\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;

abstract class AppGeneratorCommand extends Command
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * The methods available.
     *
     * @var array
     */
    protected $methods = ['all', 'paginated', 'find', 'create', 'update', 'delete'];

    /**
     * Create a new controller creator command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    abstract protected function getStub();

    /**
     * Get the method file for the generator.
     *
     * @return string
     */
    abstract protected function getMethods();

    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function handle()
    {
        $name = $this->parseName($this->getClassName());

        $path = $this->getPath($name);

        if ($this->alreadyExists($this->getClassName())) {
            $this->error($this->type.' already exists!');

            return false;
        }

        $this->makeDirectory($path);

        $model = basename($this->getNameInput());
        $class = str_replace($this->getNamespace($name) . '\\', '', $name);

        $stub = $this->compileStub([
            'model' => $model,
            'namespace' => $this->getNamespace($name),
            'class' => $class,
            'variable' => strtolower($model),
        ]);

        $stub = $this->compileMethods($stub, $this->getMethods());

        $this->files->put($path, $stub);

        $this->info($this->type.' created successfully.');
    }

    /**
     * Determine if the class already exists.
     *
     * @param  string  $rawName
     * @return bool
     */
    protected function alreadyExists($rawName)
    {
        $name = $this->parseName($rawName);

        return $this->files->exists($this->getPath($name));
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = str_replace($this->laravel->getNamespace(), '', $name);

        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'.php';
    }

    /**
     * Parse the name and format according to the root namespace.
     *
     * @param  string  $name
     * @return string
     */
    protected function parseName($name)
    {
        $rootNamespace = $this->laravel->getNamespace();

        if (Str::startsWith($name, $rootNamespace)) {
            return $name;
        }

        if (Str::contains($name, '/')) {
            $name = str_replace('/', '\\', $name);
        }

        $parse = $this->getDefaultNamespace(trim($rootNamespace, '\\')).'\\' . $name;

        if (Str::contains($parse, '/')) {
            $parse = str_replace('/', '\\', $parse);
        }

        return $this->parseName($parse);
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Models';
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
    }

    /**
     * Compile the stub with the given methods to keep.
     *
     * @param  string $stub
     * @param  array $methods
     * @return string
     */
    protected function compileMethods($stub, array $methods)
    {
        foreach ($methods as $method) {
            $stub = str_replace(['{{' . $method . '}}', '{{/' . $method . '}}'], '', $stub);
        }

        foreach ($this->methods as $method) {
            $stub = preg_replace('/{{' . $method . '}}(.*){{\/' . $method . '}}(\r\n)?/s', '', $stub);
        }

        return $stub;
    }

    /**
     * Compile the stub with the given data.
     *
     * @param  string $stub
     * @param  array $data
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function compileStub(array $data)
    {
        $stub = $this->files->get($this->getStub());

        foreach ($data as $key => $value) {
            $stub = str_replace('{{' . $key . '}}', $value, $stub);
        }

        return $stub;
    }

    /**
     * Get the full namespace name for a given class.
     *
     * @param  string  $name
     * @return string
     */
    protected function getNamespace($name)
    {
        return trim(implode('\\', array_slice(explode('\\', $name), 0, -1)), '\\');
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return $this->argument('name');
    }

    /**
     * Get the intended name for class.
     *
     * @return string
     */
    protected function getClassName()
    {
        return basename($this->getNameInput());
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the class'],
        ];
    }
}
