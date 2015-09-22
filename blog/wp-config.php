<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file definisce le seguenti configurazioni: impostazioni MySQL,
 * Prefisso Tabella, Chiavi Segrete, Lingua di WordPress e ABSPATH.
 * E' possibile trovare ultetriori informazioni visitando la pagina: del
 * Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Editing wp-config.php}. E' possibile ottenere le impostazioni per
 * MySQL dal proprio fornitore di hosting.
 *
 * Questo file viene utilizzato, durante l'installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via
 * web,è anche possibile copiare questo file in "wp-config.php" e
 * rimepire i valori corretti.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - E? possibile ottenere questoe informazioni
// ** dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'db576777127');

/** Nome utente del database MySQL */
define('DB_USER', 'dbo576777127');

/** Password del database MySQL */
define('DB_PASSWORD', 'ojrKAa6mOi');

/** Hostname MySQL  */
define('DB_HOST', 'db576777127.db.1and1.com');

/** Charset del Database da utilizare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8');

/** Il tipo di Collazione del Database. Da non modificare se non si ha
idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * E' possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * E' possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|tv&m$1 &%4<8xXK{[|^8UW9JjXB-b<gk&@=VhA9`$sead[Gq1gfzHa_>S:<,||#');
define('SECURE_AUTH_KEY',  'mu$%K#[68vP1gO]K+1}yH!pSM>0UR@KrFyfd,p7|.aG>J*[tlF=ec*/U4(AiOu0!');
define('LOGGED_IN_KEY',    'q]/wf.x|jMQz2MJZ6#R4U?/oYi4gwbHM  pEKwB9%z)MBL->&([y*qC g2|V]5TY');
define('NONCE_KEY',        'CM4eOuAo/B@r~nl(,!f,rj9|<0{V,7S/ef+cK5;b :h#TmiOI|&:qyzpyaEJYw2|');
define('AUTH_SALT',        'i_,+?oq |}E4^p>Z7)z]tW+l,<N|{I4$vf9_t-OE-vlIf V+F[mg-F#dQ{kR-`D8');
define('SECURE_AUTH_SALT', '(]Eba)FMInBVO-*rs-Hw&jb=-R_g4>G%*/^%WiQ878+| t?esL7v0MO-w4J8Vz61');
define('LOGGED_IN_SALT',   'UU2jNZn+N_XuGS-NkqrM_@v3_V|I+m!q9Jv{+^o|}GX/uKyWaMtA}!Ox*Wwv)1~y');
define('NONCE_SALT',       'qkvZi!hw2rGa}rbj#M*y3qWdcF|s$0r:q>_sTr RbMweD-AhP4U=fn++S-#cme2I');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress .
 *
 * E' possibile avere installazioni multiple su di un unico database if you give each a unique
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'wp_';

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * E' fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all'interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta lle variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
