<?php
namespace AdminQuickNotes\App\Services;

use AdminQuickNotes\App\App;

class AdminMenuService
{
    public function register()
    {
        add_action('admin_menu', [$this, 'addMenuPage']);
    }

    public function addMenuPage()
    {
        add_menu_page(
            'Quick Notes',                  // Page Title
            'Quick Notes',                  // Menu Title
            'manage_options',               // Capability
            'aqn-dashboard',                // Menu Slug
            [$this, 'renderDashboard'],     // Callback
            'dashicons-welcome-write-blog', // Icon
            20                              // Position
        );
    }

    public function renderDashboard()
    {
        // Load notes from NoteService
        $notes = App::notes()->getNotes();

        // Include dashboard view
        include App::getInstance()->path() . 'resources/views/dashboard-notes.php';
    }
}
