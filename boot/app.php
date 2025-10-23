<?php
use AdminQuickNotes\App\Application;
use AdminQuickNotes\App\Handlers\ActivationHandler;
use AdminQuickNotes\App\Handlers\DeactivationHandler;

// Create App instance
$app = new Application(__FILE__);

// Activation / Deactivation
register_activation_hook(__FILE__, function() use ($app) {
    ($app->make(ActivationHandler::class))->handle();
});

register_deactivation_hook(__FILE__, function() use ($app) {
    ($app->make(DeactivationHandler::class))->handle();
});

// Admin Menu
add_action('admin_menu', function() {
    add_menu_page(
        'Admin Quick Notes',
        'Quick Notes',
        'manage_options',
        'admin-quick-notes',
        function() {
            $notes = \AdminQuickNotes\App\App::notes()->getNotes();
            include __DIR__ . '/../resources/views/dashboard-notes.php';
        },
        'dashicons-welcome-write-blog',
        20
    );
});

// Enqueue Script & Localize Nonce
add_action('admin_enqueue_scripts', function() {
    wp_enqueue_script(
        'aqn-admin-js',
        plugin_dir_url(__FILE__) . '../resources/assets/admin.js',
        ['jquery'],
        '1.0.0',
        true
    );

    wp_enqueue_style(
        'aqn-admin-css',
        plugin_dir_url(__FILE__) . '../resources/assets/admin.css',
        [],
        '1.0.0'
    );

    wp_localize_script('aqn-admin-js', 'aqn', [
        'nonce' => wp_create_nonce('aqn_nonce')
    ]);
});

// AJAX Handler
add_action('wp_ajax_aqn_save_note', function() {
    check_ajax_referer('aqn_nonce');

    if(!empty($_POST['note'])){
        \AdminQuickNotes\App\App::notes()->saveNote(sanitize_text_field($_POST['note']));
        wp_send_json_success();
    } else {
        wp_send_json_error('Empty note');
    }
});

// Delete single note
add_action('wp_ajax_aqn_delete_note', function() {
    check_ajax_referer('aqn_nonce');
    $index = isset($_POST['index']) ? intval($_POST['index']) : null;

    if($index !== null){
        $notesService = \AdminQuickNotes\App\App::notes();
        $notes = $notesService->getNotes();
        if(isset($notes[$index])){
            unset($notes[$index]);
            update_option('aqn_admin_notes', array_values($notes));
            wp_send_json_success();
        }
    }
    wp_send_json_error('Invalid note');
});

// Clear all notes
add_action('wp_ajax_aqn_clear_notes', function() {
    check_ajax_referer('aqn_nonce');
    \AdminQuickNotes\App\App::notes()->deleteAll();
    wp_send_json_success();
});


// Trigger loaded action
add_action('plugins_loaded', function() use ($app) {
    do_action('aqn_loaded', $app);
});

return $app;
