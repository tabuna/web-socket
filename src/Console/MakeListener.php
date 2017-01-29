<?php

namespace Orchid\Socket\Console;

use Illuminate\Console\GeneratorCommand;

class MakeListener extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:socket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new socket listener class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Socket';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/listener.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Http\Sockets';
    }
}
