<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'cinema');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'L~,8^fC=FTBQSIz>n:jYkM@b5&3vY$5puK=M=Q4#,[WQ&/WJ+3*e(?wGcQNk L}T');
define('SECURE_AUTH_KEY',  '~V-XsJfyYlSUaV35-$2$&iH>6(841Cs{c;InV%t0H;]:0gyo#OVpF`ya47<%^C&M');
define('LOGGED_IN_KEY',    'Yqj(afW/h,!x=wB3o`|:-kOU,mA]WlR&PurCOZ*9T{C[b;{CTC76eQD `j^-Bm<4');
define('NONCE_KEY',        '#elrKx$XqFHNB}.jWA}6`&=!Yjv2lNHM6boyP|R}**3WHyVw%<5NU5!I3%sF91~5');
define('AUTH_SALT',        'wW`N5bSHJ8~V`8}JM@`:poV5x/T@`p|:GQmBvB;>9BF&CF1dWaP4L$=F=qTw.Nt{');
define('SECURE_AUTH_SALT', ' R-72Bk7m=tqPgCw=r^*OQ0O6@}EE+6E7)wGmj+!O =UEQoO^4r&}Q:qqa6-y^. ');
define('LOGGED_IN_SALT',   '!8/q*7;fB^|X4X}RK}NaL5^`5:,3q$w1Y(x}^D+z;3Z-&xq}7kUCkg}bu8mK5T v');
define('NONCE_SALT',       ':hw]JgmTu3L^oqUQaz:p%]jSuW%+ab#<573t)#5tFPe6[ICy;Hs8HU6}X.AGMy8o');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');