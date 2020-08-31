-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2020 a las 23:19:40
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `envios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambio_estados`
--

CREATE TABLE `cambio_estados` (
  `cambId` bigint(20) UNSIGNED NOT NULL,
  `cambEnvioId` bigint(20) UNSIGNED NOT NULL,
  `cambEstado` int(11) NOT NULL,
  `cambCreatedBy` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cambio_estados`
--

INSERT INTO `cambio_estados` (`cambId`, `cambEnvioId`, `cambEstado`, `cambCreatedBy`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, '2020-08-27 11:54:36', '2020-08-27 11:54:36'),
(2, 2, 1, 4, '2020-08-27 11:55:11', '2020-08-27 11:55:11'),
(3, 3, 1, 5, '2020-08-27 11:56:55', '2020-08-27 11:56:55'),
(4, 4, 1, 6, '2020-08-28 23:56:42', '2020-08-28 23:56:42'),
(5, 5, 1, 7, '2020-08-30 14:46:41', '2020-08-30 14:46:41'),
(6, 6, 1, 6, '2020-08-30 15:23:05', '2020-08-30 15:23:05'),
(7, 7, 1, 4, '2020-08-30 15:42:33', '2020-08-30 15:42:33'),
(8, 6, 2, 1, '2020-08-30 15:43:19', '2020-08-30 15:43:19'),
(9, 6, 3, 1, '2020-08-30 15:43:27', '2020-08-30 15:43:27'),
(10, 3, 2, 1, '2020-08-30 15:44:05', '2020-08-30 15:44:05'),
(11, 3, 3, 1, '2020-08-30 15:44:10', '2020-08-30 15:44:10'),
(12, 1, 2, 1, '2020-08-30 19:12:35', '2020-08-30 19:12:35'),
(13, 1, 3, 1, '2020-08-30 19:12:40', '2020-08-30 19:12:40'),
(14, 2, 2, 1, '2020-08-30 19:13:31', '2020-08-30 19:13:31'),
(15, 2, 3, 1, '2020-08-30 19:13:45', '2020-08-30 19:13:45'),
(16, 4, 2, 1, '2020-08-30 19:15:06', '2020-08-30 19:15:06'),
(17, 4, 3, 1, '2020-08-30 19:15:11', '2020-08-30 19:15:11'),
(18, 7, 2, 1, '2020-08-30 19:15:46', '2020-08-30 19:15:46'),
(19, 7, 3, 1, '2020-08-30 19:15:51', '2020-08-30 19:15:51'),
(20, 5, 2, 1, '2020-08-30 19:16:25', '2020-08-30 19:16:25'),
(21, 5, 3, 1, '2020-08-30 19:16:30', '2020-08-30 19:16:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cardexcostos`
--

CREATE TABLE `cardexcostos` (
  `carCostId` bigint(20) UNSIGNED NOT NULL,
  `carCostoKilogramo` decimal(12,3) NOT NULL,
  `carCostoVolumen` decimal(12,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cardexcostos`
--

INSERT INTO `cardexcostos` (`carCostId`, `carCostoKilogramo`, `carCostoVolumen`, `created_at`, `updated_at`) VALUES
(5, '325.250', '255.550', '2020-08-30 15:12:04', '2020-08-30 15:12:04'),
(6, '125.250', '175.750', '2020-08-30 15:14:18', '2020-08-30 15:14:18'),
(7, '125.250', '175.750', '2020-08-30 15:15:27', '2020-08-30 15:15:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercios`
--

CREATE TABLE `comercios` (
  `comId` bigint(20) UNSIGNED NOT NULL,
  `comNombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comCuit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comUsuarioId` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comShoppingId` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `comercios`
--

INSERT INTO `comercios` (`comId`, `comNombre`, `comCuit`, `comUsuarioId`, `remember_token`, `created_at`, `updated_at`, `comShoppingId`) VALUES
(1, 'testComercio', '123456789', 4, NULL, '2020-08-27 11:54:04', '2020-08-27 11:54:04', 1),
(2, 'testComercio2', '12345678', 5, NULL, '2020-08-27 11:56:15', '2020-08-27 11:56:15', 1),
(3, 'testComercio3', '123456789', 6, NULL, '2020-08-28 23:19:04', '2020-08-28 23:19:04', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `dirId` bigint(20) UNSIGNED NOT NULL,
  `dirUserId` bigint(20) UNSIGNED NOT NULL,
  `dirLinea1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dirLinea2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dirCiudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dirProvincia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dirDepartamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dirZip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dirOrigenDestino` enum('origen','destino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`dirId`, `dirUserId`, `dirLinea1`, `dirLinea2`, `dirCiudad`, `dirProvincia`, `dirDepartamento`, `dirZip`, `dirOrigenDestino`, `created_at`, `updated_at`) VALUES
(1, 2, 'jdshfsjdh fjdsf hdsj fhdsj fsdhj', 'djhf hsdjf hdsjhfs djsd hjs jsd', 'San Juan', 'San Juan', 'Albardón, General San Martín', '7326', 'origen', '2020-08-22 22:49:42', '2020-08-22 22:49:42'),
(2, 2, 'destino linea 1 personatest 1 afsdfsdfds fs fsdf sd  sd', 'destino linea 2 personatest 1 afsdfsdfds fs fsdf sd  sd', 'San Juan', 'San Juan', '25 de Mayo, Santa Rosa', '12312', 'destino', '2020-08-22 22:50:31', '2020-08-22 22:50:31'),
(3, 3, 'asdasdas sadasd asd as d', 'asdasasd asd', 'San Juan', 'San Juan', 'Rawson, Villa Krause', '1234', 'origen', '2020-08-27 11:52:30', '2020-08-27 11:52:30'),
(4, 4, 'asdasd', 'asdasdasdasdas', 'San Juan', 'San Juan', 'Rivadavia', '1234', 'origen', '2020-08-27 11:54:04', '2020-08-27 11:54:04'),
(5, 4, 'asdasd', 'asdasdasd', 'San Juan', 'San Juan', '9 de Julio', '1234', 'destino', '2020-08-27 11:54:24', '2020-08-27 11:54:24'),
(6, 5, 'dsjhfdsjhf ds fjhdsjfsdj', 'dfkjghfdkjfgdkmofds', 'San Juan', 'San Juan', 'Rivadavia', '1235', 'origen', '2020-08-27 11:56:15', '2020-08-27 11:56:15'),
(7, 5, 'asdasdasd  dasd asd sad sa', 'asdasdasdasdasdasd', 'San Juan', 'San Juan', 'Jáchal, San José de Jáchal', '1234', 'destino', '2020-08-27 11:56:34', '2020-08-27 11:56:34'),
(8, 6, 'jfdsgfkjdsfh32485748', 'jfgdghdjfh48754', 'San Juan', 'San Juan', 'Chimbas, Villa Paula Albarracín de Constanza', '4564', 'origen', '2020-08-28 23:19:04', '2020-08-28 23:19:04'),
(9, 6, 'asdasdadas', 'asdasdasda', 'San Juan', 'San Juan', '25 de Mayo, Santa Rosa', '123123', 'destino', '2020-08-28 23:19:19', '2020-08-28 23:19:19'),
(10, 7, 'dsjkfhdjsfhjf kdjshfjds hf', 'djfshgfhjsdf djf hsdjf', 'San Juan', 'San Juan', 'Rivadavia', '7346', 'origen', '2020-08-30 14:46:00', '2020-08-30 14:46:00'),
(11, 7, 'dahsgdhsag asjdhgas', 'hdsagdh', 'San Juan', 'San Juan', 'Jáchal, San José de Jáchal', '1235', 'destino', '2020-08-30 14:46:26', '2020-08-30 14:46:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `envId` bigint(20) UNSIGNED NOT NULL,
  `envCosto` decimal(14,2) NOT NULL,
  `envActivo` tinyint(1) NOT NULL,
  `envCreatedBy` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `envDestinatarioId` bigint(20) UNSIGNED DEFAULT NULL,
  `envEstadoEnvio` bigint(20) UNSIGNED NOT NULL,
  `envEntregadoEn` timestamp NULL DEFAULT NULL,
  `envEntregadoA` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envComprobanteImpreso` int(11) NOT NULL DEFAULT 0,
  `envCodigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `envComprobanteFirmado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envOrigen` bigint(20) UNSIGNED NOT NULL,
  `envDestino` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`envId`, `envCosto`, `envActivo`, `envCreatedBy`, `created_at`, `updated_at`, `envDestinatarioId`, `envEstadoEnvio`, `envEntregadoEn`, `envEntregadoA`, `envComprobanteImpreso`, `envCodigo`, `envComprobanteFirmado`, `envOrigen`, `envDestino`) VALUES
(1, '200.00', 1, 4, '2020-08-27 11:54:36', '2020-08-30 19:13:14', NULL, 4, '2020-08-30 03:00:00', 'Primer Receptor', 0, 'gHMwMZXgcxBDGMhZfGxwwq28dYqbZ03m', 'comprobante_firmado_envio_1.jpeg', 4, 5),
(2, '300.00', 1, 4, '2020-08-27 11:55:11', '2020-08-30 19:14:23', NULL, 4, '2020-08-30 03:00:00', 'Segundo Receptor', 0, 'KORYolv0ArZxESLaunrK2uevhsC5NAOA', 'comprobante_firmado_envio_2.jpeg', 4, 5),
(3, '400.00', 1, 5, '2020-08-27 11:56:55', '2020-08-30 15:44:28', NULL, 4, '2020-08-30 03:00:00', 'Carmen Perez', 0, 'dxkL6OGQmHh6H1ChcAotL3PMwTDAuVMn', 'comprobante_firmado_envio_3.jpeg', 6, 7),
(4, '5645.66', 1, 6, '2020-08-28 23:56:42', '2020-08-30 19:15:32', NULL, 4, '2020-08-30 03:00:00', 'Tercer Receptor', 0, 'o12X0PWMTO9RxkyL4b8f83Is3KNnTP8c', 'comprobante_firmado_envio_4.jpeg', 8, 9),
(5, '5645.66', 1, 7, '2020-08-30 14:46:41', '2020-08-30 19:16:43', NULL, 4, '2020-08-30 03:00:00', 'Quinto Receptor', 0, 'WGucMtUzoXazXb8GjeFZp4dzMfYfh87c', 'comprobante_firmado_envio_5.jpeg', 10, 11),
(6, '1252.50', 1, 6, '2020-08-30 15:23:05', '2020-08-30 15:43:45', NULL, 4, '2020-08-30 03:00:00', 'Luis Lopez', 0, '81m7ZqmewQC1pgLAYIPJXdw827r9eeg2', 'comprobante_firmado_envio_6.jpeg', 8, 9),
(7, '1252.50', 1, 4, '2020-08-30 15:42:33', '2020-08-30 19:16:12', NULL, 4, '2020-08-30 03:00:00', 'Cuarto Receptor', 0, 'oTxs3uGn7SVNiaU4CnZzFNeFM7CNMfa2', 'comprobante_firmado_envio_7.jpeg', 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadosenvios`
--

CREATE TABLE `estadosenvios` (
  `estId` bigint(20) UNSIGNED NOT NULL,
  `estDescripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estCreatedBy` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estadosenvios`
--

INSERT INTO `estadosenvios` (`estId`, `estDescripcion`, `estCreatedBy`, `created_at`, `updated_at`) VALUES
(1, 'En Espera', 1, NULL, NULL),
(2, 'Entregado a Logística', 1, NULL, NULL),
(3, 'En Tránsito a Destino', 1, NULL, NULL),
(4, 'Entregado en Destino', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listapaquetes`
--

CREATE TABLE `listapaquetes` (
  `listId` bigint(20) UNSIGNED NOT NULL,
  `listPaqueteId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `listCantidadPaq` int(11) NOT NULL,
  `listEnvioId` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `listapaquetes`
--

INSERT INTO `listapaquetes` (`listId`, `listPaqueteId`, `created_at`, `updated_at`, `listCantidadPaq`, `listEnvioId`) VALUES
(1, 1, '2020-08-27 11:54:36', '2020-08-27 11:54:36', 2, 1),
(2, 1, '2020-08-27 11:55:11', '2020-08-27 11:55:11', 3, 2),
(3, 1, '2020-08-27 11:56:55', '2020-08-27 11:56:55', 4, 3),
(4, 1, '2020-08-28 23:56:42', '2020-08-28 23:56:42', 2, 4),
(5, 1, '2020-08-30 14:46:41', '2020-08-30 14:46:41', 2, 5),
(6, 1, '2020-08-30 15:23:05', '2020-08-30 15:23:05', 2, 6),
(7, 1, '2020-08-30 15:42:33', '2020-08-30 15:42:33', 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_15_000000_alter_users_add_columns', 1),
(5, '2020_06_15_000001_create_comercios_table', 1),
(6, '2020_06_15_000002_create_shoppings_table', 1),
(7, '2020_06_15_000003_create_personas_table', 1),
(8, '2020_06_15_000004_create_users_relationships', 1),
(9, '2020_06_15_000005_fix_users_columns', 1),
(10, '2020_06_15_000006_agregar_afiliaciones_a_comercios', 1),
(11, '2020_06_15_000007_agregar_relaciones_afiliaciones', 1),
(12, '2020_06_16_000001_create_envios_table', 1),
(13, '2020_06_16_000002_create_paquetes_table', 1),
(14, '2020_06_16_000003_create_lista_paquetes_table', 1),
(15, '2020_06_16_000004_create_relationships', 1),
(16, '2020_06_17_000000_agregar_cantidades_a_lista_paquetes', 1),
(17, '2020_06_17_000001_eliminar_destinatario_envio', 1),
(18, '2020_06_17_000002_seteando_null_destinatario_envio', 1),
(19, '2020_06_21_000000_agregando_tabla_estados_envios', 1),
(20, '2020_06_21_000001_agregando_estado_envio_y_relaciones', 1),
(21, '2020_06_21_000002_seedeando_paquete_estandar', 1),
(22, '2020_06_21_000004_agregando_fecha_entregado_a_envio', 1),
(23, '2020_06_22_000000_arreglando_relaciones_envios_listapaquetes', 1),
(24, '2020_06_22_000000_arreglando_relaciones_envios_listapaquetes_2', 1),
(25, '2020_06_24_000000_creando_tabla_tipo_user', 1),
(26, '2020_06_24_000001_arreglando_relaciones_users_tipousers', 1),
(27, '2020_07_03_000002_seedeando_estados_envios_basicos', 1),
(28, '2020_07_03_000003_seedeando_tipousuario_empleado', 1),
(29, '2020_07_05_000000_agregando_comprobante_impreso_envio', 1),
(30, '2020_07_12_000000_creando_tabla_cambio_estados', 1),
(31, '2020_07_13_000000_agregar_codigo_de_envio', 1),
(32, '2020_07_20_000000_agregar_nombre_comprobante_firmado', 1),
(33, '2020_07_28_000000_crear_tabla_direcciones_con_relaciones', 1),
(34, '2020_08_05_000000_agregando_direcciones_tabla_envio', 1),
(35, '2020_08_27_000000_agregando_ajustes_sistema', 2),
(36, '2020_08_28_000000_seedeando_paquete', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `paqId` bigint(20) UNSIGNED NOT NULL,
  `paqDescripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paqDimensionAlto` decimal(6,2) NOT NULL,
  `paqDimensionAncho` decimal(6,2) NOT NULL,
  `paqDimensionLargo` decimal(6,2) NOT NULL,
  `paqDimensionUnidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paqPeso` decimal(6,2) NOT NULL,
  `paqPesoUnidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`paqId`, `paqDescripcion`, `paqDimensionAlto`, `paqDimensionAncho`, `paqDimensionLargo`, `paqDimensionUnidad`, `paqPeso`, `paqPesoUnidad`, `created_at`, `updated_at`) VALUES
(1, 'Paquete de envío estándar', '1.25', '1.25', '1.25', 'Metros', '5.00', 'Kilogramos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `perId` bigint(20) UNSIGNED NOT NULL,
  `perNombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perApellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perDni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perUsuarioId` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`perId`, `perNombres`, `perApellidos`, `perDni`, `perUsuarioId`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'personatest', 'apellidotest', '12635663245', 2, NULL, '2020-08-22 22:49:42', '2020-08-22 22:49:42'),
(2, 'testPersona', 'testPersonaApellido', '3827467', 7, NULL, '2020-08-30 14:46:00', '2020-08-30 14:46:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shoppings`
--

CREATE TABLE `shoppings` (
  `shopId` bigint(20) UNSIGNED NOT NULL,
  `shopNombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopCuit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopUsuarioId` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `shoppings`
--

INSERT INTO `shoppings` (`shopId`, `shopNombre`, `shopCuit`, `shopUsuarioId`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'testShopping', '12345678', 3, NULL, '2020-08-27 11:52:30', '2020-08-27 11:52:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousers`
--

CREATE TABLE `tipousers` (
  `tipUsuId` bigint(20) UNSIGNED NOT NULL,
  `tipUsuDescripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipUsuCreatedBy` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipousers`
--

INSERT INTO `tipousers` (`tipUsuId`, `tipUsuDescripcion`, `tipUsuCreatedBy`, `created_at`, `updated_at`) VALUES
(1, 'persona', NULL, NULL, NULL),
(2, 'comercio', NULL, NULL, NULL),
(3, 'shopping', NULL, NULL, NULL),
(4, 'transporte', NULL, NULL, NULL),
(5, 'admin', NULL, NULL, NULL),
(6, 'empleado', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuTelefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `privilegio` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `usuTelefono`, `privilegio`) VALUES
(1, 'aevega1991@gmail.com', NULL, '$2y$10$by9knUuMI75z0X5b1oOzJurfspT8rE/BeUob4Sv9ZLb5ZlocVoOTi', 'F6QLKyC4FyNe67Qhx1edSza9Iu38fb6ZkAsbHkBGPVliEPkQ7AKuXx0b6Ykn', NULL, NULL, '2645034441', 5),
(2, 'personatest@test', NULL, '$2y$10$ozu/.yqLTLViFB1az4X98OOZ1KPbYOquY0N./YysifyvsY7v6z8hK', NULL, '2020-08-22 22:49:42', '2020-08-22 22:49:42', '237462374237', 1),
(3, 'shopping@test.com', NULL, '$2y$10$zRh6P9uF5srnUPNSdJQA.uiuMS4FQZ0ALZMoppsxyPWasnFkJRZBa', NULL, '2020-08-27 11:52:30', '2020-08-27 11:52:30', '12345678', 3),
(4, 'testComercio@test', NULL, '$2y$10$81RdrCZ4GzjzB9gtm8Yn/O2XESrrGhRJCRoP35nS61Dgy1VtLjFNa', NULL, '2020-08-27 11:54:04', '2020-08-27 11:54:04', '123456789', 2),
(5, 'testComercio2@test', NULL, '$2y$10$qjyNLjG/cPjVG12nHjesmelJlQngVNfCzLBLwSHF7eJ2mRA0MIl/W', NULL, '2020-08-27 11:56:15', '2020-08-27 11:56:15', '126346734674', 2),
(6, 'testComercio3@test', NULL, '$2y$10$48eHjeYWzTQUHPWr1K7aoezbCpIIdwbmYUvpvaobpfPlgLXPbovzm', NULL, '2020-08-28 23:19:03', '2020-08-28 23:19:03', '3475634765437', 2),
(7, 'testPersona@test', NULL, '$2y$10$PK1xA6ItmzUaBmobL8s94e4dV4rXpV73jUjjLVLJ3wsNsbx5U/NRG', NULL, '2020-08-30 14:45:59', '2020-08-30 14:45:59', '6456345236', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cambio_estados`
--
ALTER TABLE `cambio_estados`
  ADD PRIMARY KEY (`cambId`),
  ADD KEY `cambio_estados_cambenvioid_foreign` (`cambEnvioId`),
  ADD KEY `cambio_estados_cambcreatedby_foreign` (`cambCreatedBy`);

--
-- Indices de la tabla `cardexcostos`
--
ALTER TABLE `cardexcostos`
  ADD PRIMARY KEY (`carCostId`);

--
-- Indices de la tabla `comercios`
--
ALTER TABLE `comercios`
  ADD PRIMARY KEY (`comId`),
  ADD KEY `comercios_comusuarioid_foreign` (`comUsuarioId`),
  ADD KEY `comercios_comshoppingid_foreign` (`comShoppingId`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`dirId`),
  ADD KEY `direcciones_diruserid_foreign` (`dirUserId`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`envId`),
  ADD KEY `envios_envcreatedby_foreign` (`envCreatedBy`),
  ADD KEY `envios_envdestinatarioid_foreign` (`envDestinatarioId`),
  ADD KEY `envios_envestadoenvio_foreign` (`envEstadoEnvio`),
  ADD KEY `envios_envorigen_foreign` (`envOrigen`),
  ADD KEY `envios_envdestino_foreign` (`envDestino`);

--
-- Indices de la tabla `estadosenvios`
--
ALTER TABLE `estadosenvios`
  ADD PRIMARY KEY (`estId`),
  ADD KEY `estadosenvios_estcreatedby_foreign` (`estCreatedBy`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `listapaquetes`
--
ALTER TABLE `listapaquetes`
  ADD PRIMARY KEY (`listId`),
  ADD KEY `listapaquetes_listpaqueteid_foreign` (`listPaqueteId`),
  ADD KEY `listapaquetes_listenvioid_foreign` (`listEnvioId`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`paqId`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`perId`),
  ADD UNIQUE KEY `personas_perdni_unique` (`perDni`),
  ADD KEY `personas_perusuarioid_foreign` (`perUsuarioId`);

--
-- Indices de la tabla `shoppings`
--
ALTER TABLE `shoppings`
  ADD PRIMARY KEY (`shopId`),
  ADD KEY `shoppings_shopusuarioid_foreign` (`shopUsuarioId`);

--
-- Indices de la tabla `tipousers`
--
ALTER TABLE `tipousers`
  ADD PRIMARY KEY (`tipUsuId`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_privilegio_foreign` (`privilegio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cambio_estados`
--
ALTER TABLE `cambio_estados`
  MODIFY `cambId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `cardexcostos`
--
ALTER TABLE `cardexcostos`
  MODIFY `carCostId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comercios`
--
ALTER TABLE `comercios`
  MODIFY `comId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `dirId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `envId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estadosenvios`
--
ALTER TABLE `estadosenvios`
  MODIFY `estId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `listapaquetes`
--
ALTER TABLE `listapaquetes`
  MODIFY `listId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `paqId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `perId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `shoppings`
--
ALTER TABLE `shoppings`
  MODIFY `shopId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipousers`
--
ALTER TABLE `tipousers`
  MODIFY `tipUsuId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cambio_estados`
--
ALTER TABLE `cambio_estados`
  ADD CONSTRAINT `cambio_estados_cambcreatedby_foreign` FOREIGN KEY (`cambCreatedBy`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cambio_estados_cambenvioid_foreign` FOREIGN KEY (`cambEnvioId`) REFERENCES `envios` (`envId`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `comercios`
--
ALTER TABLE `comercios`
  ADD CONSTRAINT `comercios_comshoppingid_foreign` FOREIGN KEY (`comShoppingId`) REFERENCES `shoppings` (`shopId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comercios_comusuarioid_foreign` FOREIGN KEY (`comUsuarioId`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_diruserid_foreign` FOREIGN KEY (`dirUserId`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_envcreatedby_foreign` FOREIGN KEY (`envCreatedBy`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `envios_envdestinatarioid_foreign` FOREIGN KEY (`envDestinatarioId`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `envios_envdestino_foreign` FOREIGN KEY (`envDestino`) REFERENCES `direcciones` (`dirId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `envios_envestadoenvio_foreign` FOREIGN KEY (`envEstadoEnvio`) REFERENCES `estadosenvios` (`estId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `envios_envorigen_foreign` FOREIGN KEY (`envOrigen`) REFERENCES `direcciones` (`dirId`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `estadosenvios`
--
ALTER TABLE `estadosenvios`
  ADD CONSTRAINT `estadosenvios_estcreatedby_foreign` FOREIGN KEY (`estCreatedBy`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `listapaquetes`
--
ALTER TABLE `listapaquetes`
  ADD CONSTRAINT `listapaquetes_listenvioid_foreign` FOREIGN KEY (`listEnvioId`) REFERENCES `envios` (`envId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `listapaquetes_listpaqueteid_foreign` FOREIGN KEY (`listPaqueteId`) REFERENCES `paquetes` (`paqId`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_perusuarioid_foreign` FOREIGN KEY (`perUsuarioId`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `shoppings`
--
ALTER TABLE `shoppings`
  ADD CONSTRAINT `shoppings_shopusuarioid_foreign` FOREIGN KEY (`shopUsuarioId`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_privilegio_foreign` FOREIGN KEY (`privilegio`) REFERENCES `tipousers` (`tipUsuId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
