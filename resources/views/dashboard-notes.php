<div class="wrap">
    <h1>Admin Quick Notes</h1>

    <h2>Add Note</h2>
    <textarea id="aqn-note" rows="4" cols="50"></textarea><br>
    <button id="aqn-save-note" class="button button-primary">Save Note</button>
    <button id="aqn-clear-notes" class="button button-secondary">Clear All Notes</button>

    <h2>All Notes</h2>
    <ul id="aqn-notes-list">
        <?php foreach ($notes as $index => $n) : ?>
            <li data-index="<?php echo $index; ?>">
                <?php echo esc_html($n); ?>
                <button class="button button-small aqn-delete-note">Delete</button>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
