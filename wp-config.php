<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file viene utilizzato, durante l’installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via
 * web, è anche possibile copiare questo file in «wp-config.php» e
 * riempire i valori corretti.
 *
 * Questo file definisce le seguenti configurazioni:
 *
 * * Impostazioni MySQL
 * * Prefisso Tabella
 * * Chiavi Segrete
 * * ABSPATH
 *
 * È possibile trovare ulteriori informazioni visitando la pagina del Codex:
 *
 * @link https://codex.wordpress.org/it:Modificare_wp-config.php
 *
 * È possibile ottenere le impostazioni per MySQL dal proprio fornitore di hosting.
 *
 * @package WordPress
 */

@ini_set( 'max_input_vars' , 2000 );

define('WP_MEMORY_LIMIT', '256M');
set_time_limit(300);
// ** Impostazioni MySQL - È possibile ottenere queste informazioni dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define( 'DB_NAME', 'cleopatra_2' );

/** Nome utente del database MySQL */
define( 'DB_USER', 'cleopatra' );

/** Password del database MySQL */
define( 'DB_PASSWORD', 'parsec32..' );

/** Hostname MySQL  */
define( 'DB_HOST', 'localhost' );

/** Charset del Database da utilizzare nella creazione delle tabelle. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Il tipo di Collazione del Database. Da non modificare se non si ha idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * È possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * È possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'uPUSb^<TlHQ>F [1`kFef??kq6}U6Qs*Ihkw8oBx+!23UKU(8eDFcaHMmx+{V;? ' );
define( 'SECURE_AUTH_KEY',  '&@E2:}+m3xl);6wr5.g-uPuu )zgF0l,XV<E~[t!/Tq[R*]mcHF/8D;]d_9!TwHY' );
define( 'LOGGED_IN_KEY',    '@dsi~j!]}@ddFq3~q|aq]KN-z|1U#]PDRF*bJMVlQH,TSjb]4D_l:}=7dbOZ$Y@B' );
define( 'NONCE_KEY',        'k0[:PuaFt HD$,37~~#&7%DT(8XC/fuh^$i6sXky<pL2vC3nx6~z(9)u)oN||Md;' );
define( 'AUTH_SALT',        'z<o_FTf5&xeG]3Hs}ect&#anyaJOpF,h)4eIo!yPhx6OAfy3> T_g0 xKj/%Pf3W' );
define( 'SECURE_AUTH_SALT', 'z7/R)X|=SL!bjsI?/Ywpe|0Fc]6.Tj$?.rXS~mo<(h:SA`hrZYMXjq,hm. +lENT' );
define( 'LOGGED_IN_SALT',   'YIG}?|Ga`<Yn`NA$s.c+ `D4*mY1^A`Q/rT?%xZT!zpKbbc}d@;nE#KV<,T5V2H[' );
define( 'NONCE_SALT',       'Yi)e%MBPgf=(_^ XZRusbJh./n0R^*I8H}:t{$4HP2ez!j#88,9{6@B2WzU4z9+r' );

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress.
 *
 * È possibile avere installazioni multiple su di un unico database
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * È fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all’interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);
/* define(‘FS_METHOD’, ‘direct’) */

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta le variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
