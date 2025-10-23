jQuery(document).ready(function($) {

    // Save note
    $('#aqn-save-note').on('click', function(e) {
        e.preventDefault();
        var note = $('#aqn-note').val();
        if(!note.trim()) { alert('Please enter a note'); return; }

        $.post(ajaxurl, {
            action: 'aqn_save_note',
            note: note,
            _ajax_nonce: aqn.nonce
        }, function(response) {
            if(response.success){
                location.reload();
            } else {
                alert('Error: ' + response.data);
            }
        });
    });

    // Delete single note
    $('.aqn-delete-note').on('click', function() {
        var index = $(this).closest('li').data('index');

        $.post(ajaxurl, {
            action: 'aqn_delete_note',
            index: index,
            _ajax_nonce: aqn.nonce
        }, function(response) {
            if(response.success){
                location.reload();
            } else {
                alert('Error: ' + response.data);
            }
        });
    });

    // Clear all notes
    $('#aqn-clear-notes').on('click', function() {
        if(!confirm('Are you sure you want to delete all notes?')) return;

        $.post(ajaxurl, {
            action: 'aqn_clear_notes',
            _ajax_nonce: aqn.nonce
        }, function(response) {
            if(response.success){
                location.reload();
            } else {
                alert('Error: ' + response.data);
            }
        });
    });
});
