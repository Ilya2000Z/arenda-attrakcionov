<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */
// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'arenda24_dev');
/** Имя пользователя MySQL */
define('DB_USER', 'arenda24_dev');
/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'vQ6bN5mF6d');
/** Имя сервера MySQL */
define('DB_HOST', '127.0.0.1:3310');
/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');
/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');
define ('WPCF7_LOAD_JS', true); // Added to disable JS loading
define ('WPCF7_LOAD_CSS', true); // Added to disable CSS loading
/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '4Ru?E>k=vKq7i 5KO<X4u[!cp-U`]ICe,f%o:&g+0!Tj/m8TyJXYGvMvMuH4cdl&');
define('SECURE_AUTH_KEY',  'S)S|fWZ(3T[IXKbL6M<yh-Q)jXX#$Zo:`X|-_[-s1uW(:mWnc]Ah.Z^`Gi Cpf1*');
define('LOGGED_IN_KEY',    'w5nZZ-~y|/{TMvH@2LKTR+,_>.+~@ag<^eEq`9<A=}tFu|Yji9/9I AN+5|Z>#5$');
define('NONCE_KEY',        'VBBsi<*gCh)e.VRTaz+;wtr0o1p<<B}J(^)s,]X8T)oDZGWOT!S~ZZ4/(yOHRs(c');
define('AUTH_SALT',        'cS.$c|ruEKOEH3.:_)Y+*rq@!_|SqK^5j%+-&s5KeT_:o*3D{{<YPc7Sw8w`-bSN');
define('SECURE_AUTH_SALT', ')pC(4P=NRd>ynO^>7-0=o}No3]Y&L/ZKvG`lF^LrbBn|eiOF]3=GiL<L0fC->HrM');
define('LOGGED_IN_SALT',   '[jn|F&Z1[,M6r&EKCsGHLwMLzM/O-8}v4n89&w(/C_@.F@r7q<4IB3*Z5Y-X^6%3');
define('NONCE_SALT',       '^9gCgTAPFj#K*-5P:jH6sj<.-wa{[G?1lI^/q#Z=mXhcgUGv<2ISRo)/u8cCDuCC');
define('WP_CACHE_KEY_SALT', 'arenda-attrakcionov.ru');
/**#@-*/
/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';
/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');
define('DISABLE_WP_CRON', true);
define('WP_ALLOW_REPAIR', false);
/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define( 'WP_MEMORY_LIMIT', '1G' );
define('WP_DEBUG', false);
/* Это всё, дальше не редактируем. Успехов! */
/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');