<?php
namespace AdminQuickNotes\App\Services;

class NoteService
{
    protected $option_name = 'aqn_admin_notes';

    /**
     * Get all saved notes
     */
    public function getNotes(): array
    {
        return get_option($this->option_name, []);
    }

    /**
     * Save a new note
     */
    public function saveNote(string $note)
    {
        $notes = $this->getNotes();
        $notes[] = $note;
        update_option($this->option_name, $notes);
    }

    public function deleteAll()
    {
        delete_option($this->option_name);
    }
}
