<?php
namespace AdminQuickNotes\App;

class Application
{
    protected static $instance;
    protected $services = [];
    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
        static::$instance = $this;

        $this->registerServices();
    }

    protected function registerServices()
    {
        $this->services[Services\NoteService::class] = new Services\NoteService();
    }

    public static function getInstance($key = null)
    {
        $instance = static::$instance;
        if (!$key) return $instance;
        return $instance->services[$key] ?? null;
    }

    public function make($class)
    {
        return $this->services[$class] ?? new $class();
    }

    public function path() { return plugin_dir_path($this->file); }
    public function url() { return plugin_dir_url($this->file); }
}
