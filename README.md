# Codes & Projects

A collection of earlier web projects by [Uranik Sejdiu](https://github.com/UranikSejdiu),
including PHP/MySQL applications, frontend pages, and diploma project materials.
Each directory is a separate project rather than one application to install.

## Projects

| Project | Contents |
| --- | --- |
| [`1st Project/`](1st%20Project/) | Chairshop: a PHP/MySQL shop project with administrator and user modules; includes `chairshop.sql` |
| [`2nd Project/`](2nd%20Project/) | UMPGJK: a PHP/MySQL project with administrator and user modules for content, menus, and reservations; includes `umpgjk.sql` |
| [`TemaDiplomes-PDPPN/`](TemaDiplomes-PDPPN/) | E-commerce diploma project with customer, company, and administrator interfaces, SQL export, and project documents |

## Run a PHP project locally

Use Apache/PHP with MySQL or MariaDB, for example through Laragon, XAMPP, or WAMP.
These are legacy projects; no single PHP compatibility version or shared build
command is declared for the collection.

1. Clone the repository into your local web server's document root:

   ```sh
   git clone https://github.com/UranikSejdiu/codes-projects.git
   ```

2. Choose a project and import its SQL export into a local database:

   | Project | Main export | Database |
   | --- | --- | --- |
   | Chairshop | `1st Project/chairshop.sql` | `chairshop` |
   | UMPGJK | `2nd Project/umpgjk.sql` | `umpgjk` |
   | PDPPN | `TemaDiplomes-PDPPN/Important Files/pdppn.sql` | `pdppn` |

3. Update that project's database configuration files with your local settings.
   Chairshop uses `config.php` files in its modules; UMPGJK uses `konfiguro.php`;
   PDPPN uses `config.php` in its `Admin`, `Kompani`, and `Perdoruesi` directories.
4. Browse to the chosen module through your local server. For example:
   `http://localhost/codes-projects/1st%20Project/chairshop/ModuliPerdoruesit/`.
5. Follow any additional notes and license notices inside that project. Some
   features may need extra database or mail configuration.

Use local test data and your own credentials. The included exports and server
examples are historical project materials. Production readiness and compatibility
with a current PHP installation have not been verified by this documentation.

## License and usage

The author's original work is available under the
[PolyForm Noncommercial License 1.0.0](LICENSE.md). It permits use, modification,
and sharing for permitted noncommercial purposes and expressly permits use by
specified charitable, educational, research, public-service, and government
organizations. Uses outside the license's permitted purposes require separate
permission; commercial resale and monetized products or services are not
generally covered by the noncommercial grant.

See the [usage guide](USAGE.md), [copyright notice](NOTICE.md), and
[third-party notices](THIRD_PARTY_NOTICES.md). The official license governs;
these summaries add no restrictions. Third-party materials and previously valid
license grants retain their existing permissions.


## Questions

Use the repository's issue tracker for project questions or permission requests,
or the contact options on [Uranik Sejdiu's profile](https://github.com/UranikSejdiu).
