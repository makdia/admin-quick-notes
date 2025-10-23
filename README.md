# Admin Quick Notes

**Version:** 1.0.0  
**Author:** Makdia  
**Type:** WordPress Plugin  
**Description:** Save quick notes in WordPress admin dashboard. Lightweight, useful, and portfolio-ready plugin built with modern PHP practices (PSR-4, Service Container, AJAX).

---

## 🧩 Features

- Add, view, and manage quick notes from WordPress admin.
- Save notes instantly using AJAX without page reload.
- Delete individual notes or clear all notes with one click.
- Fully modular architecture.
- PSR-4 autoloading with Composer.
- Activation and deactivation hooks included.
- Clean and minimal admin UI.

---

## 🛠️ Installation

1. Upload the `admin-quick-notes` folder to your WordPress `wp-content/plugins/` directory.
2. Run `composer install` inside the plugin folder to generate `vendor/autoload.php`.
3. Activate the plugin from WordPress Dashboard → Plugins.
4. Access the plugin via **Quick Notes** menu in the admin sidebar.

---

## ⚡ Usage

1. Go to WordPress Dashboard → **Quick Notes**.
2. Add a note in the textarea and click **Save Note**.
3. View all saved notes below the form.
4. Delete individual notes using the **Delete** button.
5. Clear all notes using the **Clear All Notes** button.

---

## 🔧 Technical Highlights

- **PSR-4 Autoloading:** Classes follow namespace → folder mapping for modularity.
- **Service Container & Facade:** Centralized service management with `App::notes()`.
- **AJAX Handling:** Nonce-secured AJAX requests for saving and deleting notes.
- **Activation/Deactivation Hooks:** Log messages on plugin activation and deactivation.
- **Composer Integration:** Handles autoloading and future dependency management.

---

## 💡 Future Enhancements

- Add note categories or priorities.
- TinyMCE or Markdown support for rich text notes.
- Import/export notes feature.
- Multi-user note sharing for WordPress admin.

---

## 📌 License

MIT License