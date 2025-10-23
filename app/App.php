<?php
namespace AdminQuickNotes\App;

class App extends Application
{
    /**
     * Access NoteService easily
     */
    public static function notes()
    {
        return self::getInstance(Services\NoteService::class);
    }

    /**
     * Access AdminMenuService easily
     */
    public static function menu()
    {
        return self::getInstance(Services\AdminMenuService::class);
    }
}
